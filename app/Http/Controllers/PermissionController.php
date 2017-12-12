<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Auth;
use Webpatser\Uuid\Uuid;

use App\Http\Controllers\Accessible;

class PermissionController extends Controller
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
        if(!Accessible::check_permission('permission','l')) return redirect('nopermission');
        $this->data['title'] = "Permission";
        $this->data['ptitle'] = "List";
        $this->data['permissions'] = DB::table('permissions')->paginate(10);
        return view('backend.permissions.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Accessible::check_permission('permission','i')) return redirect('nopermission');
        $this->data['title']    = "Permission";
        $this->data['ptitle']   = "Create";
        $this->data['action']   = "create";
        return view('backend.permissions.form', $this->data);
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
            'name'=>'unique:permissions,name|required'
        ]);
        $data = array(
            'id'       => Uuid::generate()->string,
            'name'     => $request->name,
            'insert'   => $request->insert,
            'update'   => $request->update,
            'delete'   => $request->delete,
            'list'     => $request->list,
            'execute'   => $request->execute,
        );
        DB::table('permissions')->insert($data);
        Session::flash('message_success','Successfully saved.');
        return redirect()
        ->route('permission.index');
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
        if(!Accessible::check_permission('permission','u')) return redirect('nopermission');
        $this->data['title']    = "Permission";
        $this->data['ptitle']   = "Create";
        $this->data['action']   = "create";
        $this->data['permission'] = DB::table('permissions')->find($id);
        return view('backend.permissions.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'unique:permissions,name,'.$request->id.'|required'
        ]);
        $data = array(
            'name'     => $request->name,
            'insert'   => $request->insert,
            'update'   => $request->update,
            'delete'   => $request->delete,
            'list'     => $request->list,
            'execute'   => $request->execute,
        );
        DB::table('permissions')->where('id', $request->id)->update($data);
        Session::flash('message_success','Successfully updated.');
        return redirect()
        ->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Accessible::check_permission('permission','d')) return redirect('nopermission');

        $data = DB::table('permissions')->where('id', $id)->delete();
        if ($data) {
            \Session::flash('message_success', 'You have been deleted permission from this system');
        } else {
            \Session::flash('message_error', 'You cannot delete permission from this system');
        }
        return redirect()
        ->route('permission.index');
    }
}
