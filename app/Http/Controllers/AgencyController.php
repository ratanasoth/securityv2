<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AgencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        $data['name'] = "";
        $data['employees'] = DB::table('employees')->where('is_agency', 'yes')->paginate(15);
        return view('backend.agencies.index', $data);
    }
    // search employee by name or code
    public function search()
    {
        $id = $_GET['name'];
        $data['employees'] = DB::table('employees')
            ->where('is_agency', 'yes')
            ->where(function($query) use ($id){
                $query->where('code', 'like', "%{$id}%")
                    ->orWhere('khmer_name', 'like', "%{$id}%")
                    ->orWhere('english_name', 'like', "%{$id}%");
            })
            ->paginate(27);
        $data['name'] = "";
        return view('backend.agencies.index', $data);
    }

}
