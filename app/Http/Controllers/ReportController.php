<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        if(!Accessible::check_permission('report','l')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        return view('backend.reports.index', $data);
    }
    // load report by month only
    public function reportByMonth(Request $r)
    {
        $province_id = $r->province;
        $data['companies'] = DB::select("select * from companies where province_id={$province_id} and month(create_date)=month('{$r->monthyear}') and year(create_date)=year('{$r->monthyear}')");
        return view('backend.reports.monthly', $data);
    }
    // load report from month to month
    public function reportAll(Request $r)
    {
        $province_id = $r->province;
        $data['companies'] = DB::select("select * from companies where province_id={$province_id} and create_date between '{$r->from_date}' and '{$r->to_date}'");
        return view('backend.reports.all', $data);
    }
    // detail info for company and enterprise
    public function company_detail($id)
    {
        $data['company'] = DB::table('companies')->where('id', $id)->first();
        $data['employees'] = DB::table('employees')->where('company_id', $id)->get();
        $data['total_male'] = DB::table('employees')->where('gender','Male')->where('company_id', $id)->count();
        $data['total_female'] = DB::table('employees')->where('gender','Female')->where('company_id', $id)->count();
        $data['total'] = DB::table('employees')->where('company_id', $id)->count();
        return view('backend.reports.company_profile', $data);
    }
}
