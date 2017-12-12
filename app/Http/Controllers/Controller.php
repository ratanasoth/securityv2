<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use DB;
use Auth;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        date_default_timezone_set("Asia/Bangkok");
    }

/*
    public function current_school()
    {
    	$school = DB::table('schools')->where('id', Auth::user()->school_id)->first();
        Session::put('school', $school->name);
    	return $school->name;
    }
    
    public function current_branch()
    {
    	$branch = DB::table('branches')->where('id', Auth::user()->branch_id)->first();
        Session::put('branch', $branch->name);
    	return $branch->name;
    }
*/
}
