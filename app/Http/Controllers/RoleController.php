<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Roles;
use DB;
use Session;
use Auth;
use App\Models\AuditLog;

class RoleController extends Controller
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
    public function index()
    {
        if(!Accessible::check_permission('role','l')) return redirect('nopermission');
        $this->data['title'] = "Role";
        $this->data['ptitle'] = "List";
        $this->data['roles'] = Roles::paginate(10);
        return view('backend.roles.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Accessible::check_permission('role','i')) return redirect('nopermission');
        $this->data['title'] = "Role";
        $this->data['ptitle'] = "Create";
        return view('backend.roles.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2'
        ]);
        $role = new Roles;
        $role->name = $request->input('name');
        $role->save();

        Session::flash('flash_message','Successfully saved.');
        return redirect()
        ->route('role.index');
    }

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
    public function edit($id)
    {
        if(!Accessible::check_permission('role','u')) return redirect('nopermission');
        $role = new Roles();
        $this->data['role'] = $role->find($id);
        return view('backend.roles.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2'
        ]);
        $id = $request->input('id');
        $data = array(
            'name' => $request->input('name')
        );
        Roles::where('id','=', $id)->update($data);

        Session::flash('flash_message','Successfully updated.');
        return redirect()
        ->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $roles = DB::table('roles')
                ->where('roles.id', $id)
                ->select('name')
                ->get();

        $name = ($roles[0]->name);
        $result = Roles::where('id', $id)->delete();
        if ($result) {
            \Session::flash('message_success', 'You have been deleted Role from this system');
             
        } else {
            \Session::flash('message_error', 'You cannot delete Role from this system');
        }
        return redirect()
        ->route('role.index');
    }
}
