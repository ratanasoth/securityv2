<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class CommuneController extends Controller
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
        if(!Accessible::check_permission('commune','l')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['def_province_id'] = "";
        $data['communes'] = DB::table('communes')->paginate(12);
        return view("backend.communes.index", $data);
    }

    public function create()
    {
        if(!Accessible::check_permission('commune','i')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['districts'] = DB::table('districts')->orderBy('name')->get();
        return view("backend.communes.add", $data);
    }

    public function save(Request $r)
    {
        if(!Accessible::check_permission('commune','i')) return redirect('nopermission');
        $data = [
            'name' => $r->name,
            'province_id' => $r->province,
            'district_id' => $r->district
        ];
        DB::table('communes')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/commune/create');
    }

    public function edit($id)
    {
        if(!Accessible::check_permission('commune','u')) return redirect('nopermission');
        $data['communes'] = 
            DB::table('communes')->where('id', $id)->first();
        $data['districts'] = 
            DB::table('districts')->orderBy('name')->get();
        $data['provinces'] = 
            DB::table('provinces')->orderBy('name')->get();
       return view("backend.communes.edit", $data);
    }

    public  function update(Request $r)
    {
        if(!Accessible::check_permission('commune','u')) return redirect('nopermission');
        $data = array(
            'name' => $r->name,
            'province_id' => $r->province,
            'district_id' => $r->district
        );
        DB::table('communes')->where('id', $r->id)->update($data);
        return redirect('/commune');
    }

    public function delete($id)
    {
        if(!Accessible::check_permission('commune','d')) return redirect('nopermission');
        DB::table('communes')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/commune');
    }
    public function search(Request $r)
    {
        if(!Accessible::check_permission('commune','l')) return redirect('nopermission');
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $query = DB::table('communes');
        if($r->province_id!=='all')
        {
            if ($r->district==='all')
            {
                $query = $query->where('province_id', $r->province_id);
            }
            else
            {
                $query = $query->where('district_id', $r->district)
                ->where('province_id', $r->province_id);
            }
        }
        $data['communes'] =$query->paginate(12);

        $data['def_province_id'] = $r->province_id;
        $data['def_district_id'] = $r->district;
        return view("backend.communes.index", $data);
    }
}
