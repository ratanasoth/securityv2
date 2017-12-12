<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BroadcastHelper;
use App\Models\Articles;
use App\Http\Requests;
use DB;
use Auth;
use DateTime;
use Webpatser\Uuid\Uuid;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $this->data['title'] = "Articles";
        $this->data['ptitle'] = "List";
        $this->data['broadcasts'] = DB::table('articles')
                                    ->join('categories','articles.category_id','categories.id')
                                    ->select('articles.*','categories.name AS category_name')
                                    ->orderBy('articles.created_at','desc')
                                ->paginate(10);
                                
        return view('backend.article.index', $this->data);
    }
    public function create()
    {
        $this->data['title'] = "Broadcast";
        $this->data['ptitle'] = "Create";
        $this->data['categories']  = DB::table('categories')
                            ->where('is_removed',0)
                            ->pluck('name','id');
        return view('backend.article.form', $this->data);
    }
    public function store(Request $request)
    {
        
        $todaydate = new DateTime('today');
        $image = DB::table('medias')
                 ->where('article_id',$request->bid)
                 ->pluck('id')
                 ->first();
        if ($image == null){
            $mage = ''; 
        }
        $article = new Articles();
        $article->id = $request->bid;
        $article->title = $request->title;
        $article->date = $todaydate->format("Y-m-d") ; 
        $article->image_header = $image;
        $article->category_id = $request->category_id;
        $article->video = $request->video;
        $article->body = $request->body;
        $article->is_removed = 0;
        // $data = array(
        //     'id' => $request->bid,
        //     'title' => $request->title,
        //     'date' => $todaydate->format("Y-m-d") , 
        //     'image_header' => $image,
        //     'category_id' => $request->category_id,
        //     'video' => $request->video,
        //     'body' => $request->body,
        //     'is_removed' => 0,
        // );
        $article->save();
        //$saved = DB::table('articles')->insert($data);
        //if($saved) {
            return redirect('/article');
        //}

    }
    public function edit($id)
    {
        $this->data['title'] = "Articles";
        $this->data['ptitle'] = "List";
        $this->data['categories']  = DB::table('categories')
                            ->where('is_removed',0)
                            ->pluck('name','id');
        $this->data['article'] = DB::table('articles')->find($id);
        return view('backend.article.form', $this->data);
    }

    public function update(Request $request, $id)
    {
        $todaydate = new DateTime('today');
        $image = DB::table('medias')
                 ->where('article_id',$request->bid)
                 ->pluck('id')
                 ->first();
        if ($image == null){
            $mage = ''; 
        }
        $data = array(
            'title' => $request->title,
            'date' => $todaydate->format("Y-m-d") , 
            'image_header' => $image,
            'category_id' => $request->category_id,
            'video' => $request->video,
            'body' => $request->body,
            'is_removed' => 0,
        );
         DB::table('articles')->where('id', $id)->update($data);
         return redirect('/article');
    }


    public function message(Request $request){
        
        if(!Accessible::check_permission('message','l')) return redirect('nopermission');

        $this->data['title'] = "Message for Payment";
        $this->data['ptitle'] = "Create";

        $this->data['mge_cat'] = DB::table('message_categories')
                    ->select('id','name')
                    ->where('school_id',Auth::user()->school_id)
                    ->where('is_removed',0)
                    ->get();
 
        if($request->date_rang) {
            $this->data['date_rang'] = $request->date_rang;
            $dr = explode(' - ', $request->date_rang);
            $s_date = date('Y-m-d', strtotime(@$dr[0]));
            $e_date = date('Y-m-d', strtotime(@$dr[1]));

            $this->data['students'] = DB::table('students')
                ->join('invoices', 'invoices.student_id', '=', 'students.id')
                ->where('reg_branch_id', Auth::user()->branch_id)
                ->select('students.id','students.id_number','students.app_code','students.name_en','students.name_kh')
                ->groupBy('students.id','students.id_number','students.app_code','students.name_en','students.name_kh')
                ->get();
            $this->data['invoices'] = DB::table('invoices')
                ->join('invoice_details', 'invoices.id', '=', 'invoice_details.invoice_id')
                ->where('invoices.branch_id', Auth::user()->branch_id)
                ->where('is_paid', 0)
                ->where('is_cancel', 0)
                ->whereBetween('invoices.inv_date', array($s_date, $e_date))
                ->select('invoice_details.*','invoices.id','invoices.student_id')
                ->get();
            $this->data['invoice_detail'] = DB::table('invoice_details')
                ->where('branch_id', Auth::user()
                ->branch_id)->get();
        }
        
        return view('backend.broadcast.message', $this->data);
    }

    public function add_photo(Request $request) {
        $data = array(
           'id' => Uuid::generate()->string,
           'file_name' => $request->photo,
           'article_id' => $request->aid,
        );
        DB::table('medias')->insert($data);
        return redirect()->route('article.index');
    }

    public function update_picture(Request $request) {
        DB::table('medias')->where('id','=', $request->pid)->delete();

        $data = array(
            'id' => Uuid::generate()->string,
            'file_name' => $request->photo,
            'article_id' => $request->mid,
        );
        DB::table('medias')->insert($data);

        return redirect()
            ->route('article.index');
    }

    public function delete_picture(Request $request) {

        DB::table('medias')->where('id','=', $request->mid)->delete();

        return redirect()->route('article.index');
    }

    public function send(Request $request)
    {

        BroadcastHelper::cleanExpireImage();

        date_default_timezone_set("Asia/Bangkok");
        $stu_list = $request->receiver_stu;
        $level_list = $request->receiver_level;
        $recives = array();
        if($stu_list == NULL) {
            $recives = $level_list;
            $is_level = 1;
        } else {
            $recives = $stu_list;
            $is_level = 0;
        }
        if($request->levels != '') {
            $recives = $request->levels;
            $is_level = 1;
        }
        $str_list = '';
        $receiver_name = $request->receiver;
        if (is_array($recives)) {
            $c = count($recives) - 1;
            if($recives) {
                foreach ($recives as $key => $value) {
                    if($key < $c) $cm  = ','; else $cm = '';
                    $str_list .= '{'.$value.'}'.$cm;
                }
            }
        } else {
            $allevel = DB::table('levels')->where('branch_id', Auth::user()->branch_id)->get();
            $c = count($allevel) - 1;
            foreach ($allevel as $key => $value) {
                if($key < $c) $cm  = ','; else $cm = '';
                $str_list .= '{'.$value->id.'}'.$cm;
                $receiver_name.= '{'.$value->level.'}'.$cm;
            }
        }
        $data = array(
            'id' => $request->bid,
            'title' => $request->title,
            'date' => date('Y-m-d',strtotime($request->date)),
            'time' => $request->time,//date('H:i:s'),
            'is_level' =>  $is_level,
            'receiver_list' => $str_list,
            'category_id' => $request->mge_cat,
            'branch_id' => Auth::user()->branch_id,
            'user_name' => Auth::user()->name,
            'body' => $request->body,
            'receiver_name' => $receiver_name
        );
        if($request->id) {
            $saved = DB::table('broadcast_history')->where('id', $request->id)->update($data);
        } else {
            $saved = DB::table('broadcast_history')->insert($data);
        }
        if($saved) {
            return redirect('/broadcast');
        }
    }

    public function load_images(Request $request) {

        $medias = DB::table('medias')->where('article_id', $request->id)->get();
        $data = array();

        $i = 0;
        foreach ($medias as $value) {
            $data[$i] = $value->id;
            $i++;
        }

        echo json_encode($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('articles')->where('id','=', $id)->delete();
        if ($data) {
            \Session::flash('message_success', 'You have been deleted article from this system');
        } else {
            \Session::flash('message_error', 'You cannot delete article from this system');
        }
        return redirect()
            ->route('article.index')
            ->withSuccess('You have been deleted article from this system');
    }
}
