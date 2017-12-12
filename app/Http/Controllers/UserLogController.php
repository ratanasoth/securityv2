<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Webpatser\Uuid\Uuid;
use Session;
use Auth;
use App\Models\AuditLog;

class UserLogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->data['title'] = "User";
        $this->data['ptitle'] = "User Log";

        if($request->date) {
            $dr = explode(' - ', $request->date);
            $s_date = date('Y-m-d', strtotime(@$dr[0]));
            $e_date = date('Y-m-d', strtotime(@$dr[1]));
            $this->data['logs'] = DB::table('log_audit')
                    ->leftJoin('users', 'users.id', '=', 'log_audit.user_id')
                    ->leftJoin('branches', 'branches.id', '=', 'log_audit.branch_id')
                    ->where('is_user_input', 0)
                    ->whereBetween('log_audit.time', array($s_date, $e_date))
                    ->select('log_audit.*', 'users.name', 'branches.name AS branch_name')
                    ->orderBy('log_audit.time','desc')
                    ->paginate(10);
        }
        else {
            $this->data['logs'] = DB::table('log_audit')
                            ->leftJoin('users', 'users.id', '=', 'log_audit.user_id')
                            ->leftJoin('branches', 'branches.id', '=', 'log_audit.branch_id')
                            ->where('is_user_input', 0)
                            ->select('log_audit.*', 'users.name', 'branches.name AS branch_name')
                            ->orderBy('log_audit.time','desc')
                            ->paginate(10);
        }

        $this->data['log'] = "active";
        return view('backend.users_log.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function log_form(Request $request)
    {
        $this->data['title'] = "Student Log";
        $this->data['ptitle'] = "Create";
        $this->data['student_id'] = $request->student_id;
        $this->data['logs'] = DB::table('log_audit')->find($request->id);
        return view('backend.logs.log_form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");
        $data = array(
            'id'           => Uuid::generate()->string,
            'user_id'      => Auth::user()->id,
            'branch_id'    =>  Auth::user()->branch_id,
            'student_id'   => $request->student_id,
            'time'          => date('Y-m-d H:i:s'),
            'description'   => $request->description,
            'is_user_input' => 1,
        );
        DB::table('log_audit')->insert($data);
        //log audit
        AuditLog::log(sprintf("[Add] StudentLog : %s", $data['description']), $request->student_id);

        return redirect('student/log/index/' . $request->student_id);
    }

    public function update(Request $request){
        $id = $request->id;
        date_default_timezone_set("Asia/Bangkok");
        $data = array(
            'time'          => date('Y-m-d H:i:s'),
            'description'   => $request->description,
        );
        DB::table('log_audit')->where('id','=', $id)->update($data);
        AuditLog::log(sprintf("[Update] StudentLog : %s", $data['description']),$request->student_id);
        return redirect('student/log/index/'.$request->student_id);
    }

    public function destroyLog($id, $student_id){

        $data = DB::table('log_audit')->where('id', $id)->delete();

        AuditLog::log(sprintf("[Delete] StudentLog : %s", "Delete $id"),$student_id);

        if ($data) {
            \Session::flash('msg_log_success', 'You have been student log from this system');
             
        } else {
            \Session::flash('msg_log_error', 'You cannot delete student log from this system');
        }
        return redirect('student/log/index/'.$student_id);
    }
   
}
