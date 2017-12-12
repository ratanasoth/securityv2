<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Excel;
class ProvinceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        if(!Accessible::check_permission('province','l')) return redirect('nopermission');

        $data['provinces'] = DB::table('provinces')->orderBy('id')->get();
        $data['def_province_id'] = "";
        return view("provinces.index", $data);
    }
    public function create()
    {
        if(!Accessible::check_permission('province','i')) return redirect('nopermission');
        return view("provinces.add");
    }
    public function  save(Request $r)
    {
        if(!Accessible::check_permission('province','i')) return redirect('nopermission');
        $data = array(
            'name' => $r->name
        );
        DB::table('provinces')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/province/create');
    }
    public function edit($id)
    {
        if(!Accessible::check_permission('province','u')) return redirect('nopermission');
        $data['province'] = DB::table('provinces')->where('id', $id)->first();
        return view("provinces.edit", $data);
    }
    public  function update(Request $r)
    {
        if(!Accessible::check_permission('province','u')) return redirect('nopermission');
        $data = array(
            'name' => $r->name
        );
        DB::table('provinces')->where('id', $r->id)->update($data);
        return redirect('/province');
    }
    public function delete($id)
    {
        if(!Accessible::check_permission('province','d')) return redirect('nopermission');
        DB::table('provinces')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/province');
    }
    public function get()
    {
        $pro = DB::table('provinces')->orderBy('name')->get();
        return $pro;
    }
    public function excel()
    {
        Excel::create('test', function($excel) {
            $excel->sheet('Province List', function(){

            });
            $excel->sheet('District List', function(){
                
            });
        })->export('xlsx');
    }
}
