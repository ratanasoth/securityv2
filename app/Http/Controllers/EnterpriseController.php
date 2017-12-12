<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class EnterpriseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // default action
    public function index()
    {
        if(!Accessible::check_permission('enterprise','l')) return redirect('nopermission');
        $data['enterprises'] = DB::table('companies')->where('type','enterprise')->orderBy('name')->paginate(15);
        $data['provinces'] = DB::table("provinces")->orderBy('name')->get();
        $data['def_province_id'] = "";
        $data['name'] = "";
        return view('backend.enterprises.index', $data);
    }
    // search by province
    public function search(Request $r)
    {
        // load all provinces
        $data['provinces'] = DB::table("provinces")->orderBy('name')->get();
        $query = DB::table('companies')->where('type', 'enterprise');
        if($r->id != "all")
        {
            $query = $query->where('province_id', $r->id);
        }
        if($r->name!='')
        {
            $query = $query->where('name', 'like', "%{$r->name}%");
        }
        $data['enterprises'] = $query->orderBy('name')->paginate(12);
        $data['def_province_id'] = $r->id;
        $data['name'] = $r->name;
        return view("backend.enterprises.index", $data);
    }
    // load create form
    public function create()
    {
        // get all provinces
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        return view('backend.enterprises.create', $data);
    }
    // save enterprise to db
    public function save(Request $r)
    {
        if(!Accessible::check_permission('enterprise','i'))
        {
            return 'no';
        }
        // upload photo first
        $file_name ="default.png";
        if($r->photo!='undefined')
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'logo/'; // usually in public folder
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'code' => $r->code,
            'name' => $r->name,
            'other' => $r->other,
            'allow_no' => $r->allow_no,
            'allow_date' => $r->allow_date,
            'province_id' => $r->province_id,
            'province_name' => $r->province_name,
            'district_id' => $r->district_id,
            'district_name' => $r->district_name,
            'commune_id' => $r->commune_id,
            'commune_name' => $r->commune_name,
            'village_id' => $r->village_id,
            'village_name' => $r->village_name,
            'isallowed' => $r->isallowed,
            'create_date' => date('Y-m-d'),
            'type' => 'enterprise',
            'logo' => $file_name,
            'street_no' => $r->street_no,
            'home_no' => $r->home_no
        );
        DB::table('companies')->insert($data);
        return 'ok';
    }
    // load edit form
    public function edit($id)
    {
        if(!Accessible::check_permission('enterprise','u')) return redirect('nopermission');
        $data['company'] = DB::table("companies")->where("id", $id)->first();
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['def_province_id'] = $data['company']->province_id;
        $data['def_district_id'] = $data['company']->district_id;
        $data['def_commune_id'] = $data['company']->commune_id;
        $data['def_village_id'] = $data['company']->village_id;
        $data['districts'] = DB::table('districts')->where('province_id', $data['company']->province_id)->get();
        $data['communes'] = DB::table('communes')->where('district_id', $data['company']->district_id)->get();
        $data['villages'] = DB::table("villages")->where("commune_id", $data['company']->commune_id)->get();
        return view("backend.enterprises.edit", $data);
    }
    // save update
    public  function update(Request $r)
    {
        if(!Accessible::check_permission('enterprise','u'))
        {
            return 'No';
        }

        $data = array(
            'code' => $r->code,
            'name' => $r->name,
            'other' => $r->other,
            'allow_no' => $r->allow_no,
            'allow_date' => $r->allow_date,
            'province_id' => $r->province_id,
            'province_name' => $r->province_name,
            'district_id' => $r->district_id,
            'district_name' => $r->district_name,
            'commune_id' => $r->commune_id,
            'commune_name' => $r->commune_name,
            'village_id' => $r->village_id,
            'village_name' => $r->village_name,
            'isallowed' => $r->isallowed,
            'street_no' => $r->street_no,
            'home_no' => $r->home_no
        );
        if($r->photo!='undefined')
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'logo/'; // usually in public folder
            $file->move($destinationPath, $file_name);
            $data['logo'] = $file_name;
        }
        DB::table('companies')->where('id',$r->id)->update($data);
        return 'Ok';
    }
    // delete
    public function delete($id)
    {
        if(!Accessible::check_permission('company','d')) return redirect('nopermission');

        DB::table('companies')->where('id', $id)->delete();
        $page =@$_GET['page'];
        if ($page>0)
        {
            return redirect('/enterprise?page='.$page);
        }
        else{
            return redirect('/enterprise');
        }
    }
}
