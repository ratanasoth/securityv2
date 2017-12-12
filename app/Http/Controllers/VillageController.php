<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Auth;

class VillageController extends Controller
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
        $data['provinces'] = 
            DB::table('provinces')->orderBy("name")->get();
        $data['def_province_id'] = "";
        $data['villages'] = DB::table('villages')
            ->join('communes', "villages.commune_id", "communes.id")
            ->join("districts", "communes.district_id", "districts.id")
            ->join("provinces", "districts.province_id", "provinces.id")
            ->where("villages.active", 1)
            ->select("villages.*", "communes.name as commune_name", "districts.name as district_name", "provinces.name as province_name")
            ->paginate(17);

        return view("villages.index", $data);
    }

    public function create()
    {
        $data['provinces'] = 
            DB::table('provinces')->orderBy('name')->get();
        $data['districts'] = 
            DB::table('districts')->orderBy('name')->get();
        $data['communes'] = 
            DB::table('communes')->orderBy('name')->get();

        return view("villages.add", $data);
    }

    public function save(Request $r)
    {
        $data = [
            'name' => $r->name,
            'commune_id' => $r->commune,
        ];
        DB::table('villages')->insert($data);
        Session::flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុក​ដោយជោគជ័យ");
        return redirect('/village/create');
    }

     public function edit($id)
    {
        $data['villages'] = 
            DB::table('villages')->where('id', $id)->first();
        $data['communes'] = 
            DB::table('communes')->orderBy('name')->get();
        $data['districts'] = 
            DB::table('districts')->orderBy('name')->get();
        $data['provinces'] = 
            DB::table('provinces')->orderBy('name')->get();
       return view("villages.edit", $data);
    }

    public  function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'commune_id' => $r->commune
        );
        DB::table('villages')->where('id', $r->id)->update($data);
        return redirect('/village');
    }

    public function delete($id)
    {
        $test = DB::table('villages')->where('id', $id)->delete();
        Session::flash('sms', "ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ");
        return redirect('/village');
    }

    public function search(Request $r)
    {
        $data['provinces'] = 
            DB::table('provinces')->orderBy("name")->get();
        $data['def_province_id'] = "";
        $query = DB::table('villages')
                ->join('communes', "villages.commune_id", "communes.id")
                ->join("districts", "communes.district_id", "districts.id")
                ->join("provinces", "districts.province_id", "provinces.id")
                ->where("villages.active", 1);
            if($r->province_id !== 'all')
            {
                if ($r->district === 'all')
                {
                    $query = $query->where('provinces.id', $r->province_id);
                }
                else if($r->district !== 'all')
                {
                    $query = $query->where('districts.id', $r->district);
                }
                if($r->commune !== 'all'){
                    $query = $query->where('communes.id', $r->commune);
                }
            }
            $data['villages'] = $query->select("villages.*", "communes.name as commune_name", "districts.name as district_name", "provinces.name as province_name")
                ->paginate(17);
            $data['def_province_id'] = $r->province_id;
            $data['def_district_id'] = $r->district;
            $data['def_commune_id'] = $r->commune;
            return view("villages.index", $data);
    }
}
