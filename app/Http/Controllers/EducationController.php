<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // delete edu by its id
    public function delete($id)
    {
        $i = DB::table("education")->where('id', $id)->delete();
        return $i;
    }
}
