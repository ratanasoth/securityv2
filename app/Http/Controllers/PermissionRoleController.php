<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Auth;
use Webpatser\Uuid\Uuid;
use App\Models\AuditLog;

class PermissionRoleController extends Controller
{
    public function __construct()
    {
       // date_default_timezone_set("Asia/Bangkok");
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = "Permission Role";
        $this->data['ptitle'] = "List";

        $this->data['permissionroles'] = DB::table('permission_roles')
                ->leftJoin('permissions', 'permissions.id', '=', 'permission_roles.permission_id')
                ->leftJoin('roles', 'roles.id', '=', 'permission_roles.role_id')
                ->select('permission_roles.*', 'permissions.name', 'roles.name AS role')
                ->paginate(10);

        return view('backend.permission_roles.index', $this->data);
    }


    public function view_permission($role_id = null)
    {
        $this->data['title'] = "Permission Role";
        $this->data['ptitle'] = "List";
        $this->data['permissionroles'] = DB::table('permission_roles')
                    ->leftJoin('permissions', 'permissions.id', '=', 'permission_roles.permission_id')
                    ->leftJoin('roles', 'roles.id', '=', 'permission_roles.role_id')
                    ->where('permission_roles.role_id', $role_id)
                    ->select('permission_roles.*', 'permissions.name', 'roles.name AS role')
                    ->paginate(10);

        return view('backend.role.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->data['title']    = "Permission";
        $this->data['ptitle']   = "Create";
        $this->data['action']   = "create";
        $this->data['permissions'] = DB::table('permissions')->orderBy('permissions.seq', 'ASC')->get();
        $this->data['roles'] = DB::table('roles')->get();

        if($request->role != '') {
            $this->data['per_role'] = DB::select('select `tb`.insert,
       `tb`.update,
             `tb`.delete,
       `tb`.list,
       `permissions`.`name`,
             `permissions`.`id` as permission_id
            from  `permissions`
            left join (select * from `permission_roles` where `permission_roles`.`role_id` = ' . $request->role . ') tb on `permissions`.id = tb.permission_id
            order by `permissions`.`seq` asc');
        }
        return view('backend.permission_roles.form', $this->data);
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
            'role_id' => 'required'
        ]);
        $inserts  = $request->insert;
        $updates  = $request->update;
        $deletes  = $request->delete;
        $lists    = $request->list;
        $executes = $request->execute;

        if($request->prid) {
            DB::table('permission_roles')->where('role_id', $request->prid)->delete();
        }
        
        foreach ($request->permission_name as $key => $value) {
            $data = array(
                'id'       => Uuid::generate()->string,
                'permission_id' => $request->permission[$key],
                'role_id'  => $request->role_id,
                'insert'   => @$inserts[$value],
                'update'   => @$updates[$value],
                'delete'   => @$deletes[$value],
                'list'     => @$lists[$value],
            );

            DB::table('permission_roles')->insert($data);
            
        }

        Session::flash('message_success','Successfully saved.');

        // $permissions = DB::table('permissions')->find($request->permission_id);
        // $permission_name = ($permissions->name);
        // $roles = DB::table('roles')->find($request->role_id);
        // $role_name = ($roles->name);

        // $permission = AuditLog::makelog('Add Permission Role','permission_id', $permission_name);
        // $role = AuditLog::makelog('','role_id', $role_name);
        // $insert = AuditLog::makelog('', 'insert', $request->insert);
        // $update = AuditLog::makelog('', 'update', $request->update);
        // $delete = AuditLog::makelog('', 'delete',$request->delete);
        // $list = AuditLog::makelog('', 'list',$request->list);
        // $execute = AuditLog::makelog('', 'execute', $request->execute);

        // AuditLog::log($permission.', '.$role.', '.$insert.', '.$update.', '.$delete.', '.$list.', '.$execute);


        return redirect('role');
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
        $this->data['title']    = "Permission";
        $this->data['ptitle']   = "Create";
        $this->data['action']   = "create";
        $this->data['permissionroles'] = DB::table('permission_roles')->find($id);
        return view('backend.permission_roles.form', $this->data);
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
            'permission_id'=>'required'
        ]);
        $data = array(
            'name'     => $request->name,
            'insert'   => $request->insert,
            'update'   => $request->update,
            'delete'   => $request->delete,
            'list'     => $request->list,
            'execute'   => $request->execute,
        );
        DB::table('permission_roles')->where('id', $request->id)->update($data);
        Session::flash('message_success','Successfully updated.');
        return redirect()
        ->route('permissionrole.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('permission_roles')->where('id', $id)->delete();
        if ($data) {
            \Session::flash('message_success', 'You have been deleted permission role from this system');
        } else {
            \Session::flash('message_error', 'You cannot delete permission role from this system');
        }
        return redirect()
        ->route('permissionrole.index');
    }
}
