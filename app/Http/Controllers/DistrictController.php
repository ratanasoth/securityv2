<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(!Accessible::check_permission('district','l')) return redirect('nopermission');

        $data['districts'] = DB::table('districts')
            ->join('provinces',"districts.province_id","provinces.id")
            ->where("districts.active",1)
            ->orderBy("districts.name")
            ->select("districts.*", "provinces.name as province_name")
            ->paginate(17);
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['def_province_id'] = "";
        return view("districts.index", $data);
    }

    public function create()
    {
        if(!Accessible::check_permission('district','i')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        return view("districts.add", $data);
    }

    public function save(Request $r)
    {
        if(!Accessible::check_permission('district','i')) return redirect('nopermission');
        $data = [
            'name' => $r->name,
            'province_id' => $r->province
        ];
        DB::table('districts')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/district/create?pid='.$r->province);
    }

    public function edit($id)
    {
        if(!Accessible::check_permission('district','u')) return redirect('nopermission');
        $data['districts'] = DB::table('districts')->where('id', $id)->first();
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
       return view("districts.edit", $data);
    }

    public  function update(Request $r)
    {
        if(!Accessible::check_permission('district','u')) return redirect('nopermission');
        $data = array(
            'name' => $r->name,
            'province_id' => $r->province
        );
        DB::table('districts')->where('id', $r->id)->update($data);
        return redirect('/district');
    }

  	public function delete($id)
    {
        if(!Accessible::check_permission('district','d')) return redirect('nopermission');
        DB::table('districts')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/district');
    }

    // search province
    public function search(Request $r)
    {
        if(!Accessible::check_permission('district','l')) return redirect('nopermission');

        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();

        $data['def_province_id'] = $r->province_id;
        $data['districts'] = DB::table('districts')
        ->join('provinces',"districts.province_id","provinces.id")
        ->where("districts.active",1)
        ->orderBy("districts.name")
        ->select("districts.*", "provinces.name as province_name")
        ->paginate(17);
            if ($r->province_id!=='all')
            {
                $data['districts'] = DB::table('districts')
                ->join('provinces',"districts.province_id","provinces.id")
                ->where("districts.active",1)
                ->where('districts.province_id', $r->province_id)
                ->orderBy("districts.name")
                ->select("districts.*", "provinces.name as province_name")
                ->paginate(17);
            }
           
        return view("districts.index", $data);
    }
}
