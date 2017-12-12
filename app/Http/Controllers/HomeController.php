<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\Utility;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // total company
        // company = សហគ្រាសគ្រឹះស្ថាន
        // enterprise = ក្រុមហ៊ុនផ្តល់សេវា
        $data['total_company'] = DB::table('companies')->where('type', 'company')->count();
        $data['company_allow'] = DB::table('companies')->where('type', 'company')->where('isallowed', 'yes')->count();
        $data['company_notallow'] = DB::table('companies')->where('type', 'company')->where('isallowed', 'no')->count();

        $data['total_enterprise'] = DB::table('companies')->where('type', 'enterprise')->count();
        $data['enterprise_allow'] = DB::table('companies')->where('type', 'enterprise')->where('isallowed', 'yes')->count();
        $data['enterprise_notallow'] = DB::table('companies')->where('type', 'enterprise')->where('isallowed', 'no')->count();
        $data['total_employee'] = DB::table('employees')->count();
        $data['male'] = DB::table('employees')->where('gender', 'Male')->count();
        $data['female'] = DB::table('employees')->where('gender', 'Female')->count();
        $data['agency'] = DB::table('employees')->where('is_agency', 'yes')->count();
        $data['agency_male'] = DB::table('employees')->where('is_agency', 'yes')->where('gender', 'Male')->count();
        $data['agency_female'] = DB::table('employees')->where('is_agency', 'yes')->where('gender', 'Female')->count();
        return view('backend/dashboard', $data);
    }
    public function nopermission()
    {
        return view('backend/nopermission');
    }

}
