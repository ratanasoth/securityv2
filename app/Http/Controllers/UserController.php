<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\AuditLog;
use App\Models\ImageHelper;
use Auth;
use DB;
use Illuminate\Http\Request;
use Image;
use Session;
use Webpatser\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function index()
    {
        if(!Accessible::check_permission('user','l')) return redirect('nopermission');

        $this->data['users'] = DB::table('users')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->select('users.*', 'roles.name AS role_name')
            ->paginate(17);
        return view('backend.users.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Accessible::check_permission('user','i')) return redirect('nopermission');
        $this->data['action']   = "create";
        $this->data['roles']    = DB::table('roles')->get();
        return view('backend.users.form', $this->data);
    }
    public function change_password(Request $request)
    {
        if(!Accessible::check_permission('user','u')) return redirect('nopermission');

        $this->data['title']    = "User";
        $this->data['ptitle']   = "Change Password";
        return view('backend.users.change_password', $this->data);
    }

    public function save_pass(Request $request)
    {
        if(!Accessible::check_permission('user','u')) return redirect('nopermission');
        
        $this->validate($request,[
            'password' => 'required|min:3|max:20',
            'password_confirmation' => 'required|min:3|max:20|same:password',
        ]);
        $id = $request->huid;
        if($id == Auth::user()->id || Auth::user()->role_id == 1) {
            $data = array(
                'password' => bcrypt($request->password)
            );
            DB::table('users')->where('id', $id)->update($data);
            Session::flash('success',' លេខសម្ងាត់ត្រូវបានកែប្រែដោយជោគជ័យ');
            return redirect('user/change_password/'.$id);
        } else {
            Session::flash('error',' Opp, You do not have permission to change password for this user.');
            return redirect('user/change_password/'.$id);
        }
    }

    public function store(Request $request)
    {
        if(!Accessible::check_permission('user','i')) return redirect('nopermission');
        $this->validate($request,[
            'username'=>'unique:users,name|required|min:3',
            'email' => 'unique:users,email|required',
            'password' => 'required|min:3|max:20|Confirmed',
            'password_confirmation' => 'required|min:3|max:20',
            'role_id' => 'required',
        ]);

        $file_name = '';
        if($request->photo) {
            // upload your photo here...
            $file = $request->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'photo/';
            $file->move($destinationPath, $file_name);
        }

        $data = array(
            'id'           => Uuid::generate()->string,
            'name'         => $request->name,
            'username'     => $request->username,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'role_id'      => $request->role_id,
            'photo'        => $file_name
        );

       $r = DB::table('users')->insert($data);
        if ($r)
        {
            Session::flash('success','ទិន្នន័យត្រូវបានរក្សាទុកដោយជៅគជ័យ');
            return redirect('/user/create');
        }
       else{
           Session::flash('error','មិនអាចរក្សាទុកបានទេ, សូមត្រួតពិនិត្យទិន្នន័យអោយបានត្រឹមត្រូវ');
           return redirect('/user/create');
       }

    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if(!Accessible::check_permission('user','u')) return redirect('nopermission');

        $this->data['user'] = DB::table('users')->find($id);
        $this->data['roles'] = DB::table('roles')->get();
        return view('backend.users.edit', $this->data);
    }

    public function update(Request $request)
    {

        if(!Accessible::check_permission('user','u')) return redirect('nopermission');

        $this->validate($request, [
            'username'  =>'unique:users,name,'.$request->id.'|required|min:2',
            'email' => 'unique:users,email,'.$request->id.'|required|email',
            'role_id' => 'required',
        ]);
        $data=array();
        $id = $request->id;
        if($request->photo) {
            // upload your photo here...
            $file = $request->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'photo/';
            $file->move($destinationPath, $file_name);
            $data = array(
                'name'      => $request->name,
                'username'  => $request->username,
                'email'     => $request->email,
                'role_id'   => $request->role_id,
                'photo'     => $file_name
            );
        }
        else{
            $data = array(
                'name'      => $request->name,
                'username'  => $request->username,                
                'email'     => $request->email,
                'role_id'   => $request->role_id
            );
        }

        DB::table('users')->where('id','=', $id)->update($data);
        Session::flash('success','ទិន្នន័យត្រូវបានកែប្រែដោយជោគជ័យ');
        return redirect('/user');
    }

    public function delete($id)
    {
        if(!Accessible::check_permission('user','d')) return redirect('nopermission');
        $data = DB::table('users')->where('id', $id)->delete();
        if ($data) {
            Session::flash('success', 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ');
        } else {
            Session::flash('error', 'ទិន្នន័យមិនអាចលុបបានទេ');
        }
        return redirect('/user');
    }

}