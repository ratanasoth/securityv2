<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Webpatser\Uuid\Uuid;
use Session;
use Auth;
use App\Models\AuditLog;
use App\Models\Students;

class PermissionPendingController extends Controller
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
        if(!Accessible::check_permission('attendance','l')) return redirect('nopermission');
        $this->data['title'] = "Permission Pending";
        $this->data['ptitle'] = "Permission Pending";
        $this->data['pendings'] = DB::table('leaves')
                                ->leftJoin('students','students.id','=','leaves.student_id')
                                ->leftJoin('users','users.id','=','leaves.status_by')
                                ->where('students.cur_branch_id', Auth::user()->branch_id)
                                ->where('leaves.status_id', 0)
                                ->select('students.id_number','students.name_en','leaves.tel','leaves.from_date','leaves.to_date','leaves.reason','leaves.status_id','leaves.status_by', 'leaves.id', 'users.name as status_by')
                                ->orderBy('leaves.from_date', 'DESC')
                                ->paginate(10);
        return view('backend.attendances.permission_pending', $this->data);
    }

    public function approved($id, $is_approval){
        Students::approve_leave($id, $is_approval, Auth::user()->name);
        return redirect('permission_pending');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = DB::table('leaves')->where('id', $id)->delete();
        if ($data) {
            \Session::flash('message_success', ' You have been deleted Permission Pending from this system');
        } else {
            \Session::flash('message_error', ' You cannot delete Permission Pending from this system');
        }
        return redirect('permission_pending');
    }
}
