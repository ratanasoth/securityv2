<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // default action
    public function index()
    {
        if(!Accessible::check_permission('company','l')) return redirect('nopermission');
        // get all companies
        $data['companies'] = DB::table('companies')->where('type','company')->orderBy('name')->paginate(15);
        $data['provinces'] = DB::table("provinces")->orderBy('name')->get();
        // set default province id and name
        $data['def_province_id'] = "";
        $data['name'] = "";
        return view('backend.companies.index', $data);
    }
    // load detail info of a company
    public function detail($id)
    {
        $data['company'] = DB::table('companies')->where('id', $id)->first();
        $data['employees'] = DB::table('employees')->where('company_id', $id)->get();
        $data['total_male'] = DB::table('employees')->where('gender','Male')->where('company_id', $id)->count();
        $data['total_female'] = DB::table('employees')->where('gender','Female')->where('company_id', $id)->count();
        $data['total'] = DB::table('employees')->where('company_id', $id)->count();
        return view('backend.companies.detail', $data);
    }
    // search by province
    public function search(Request $r)
    {
        // load all provinces
        $data['provinces'] = DB::table("provinces")->orderBy('name')->get();
        // construct search query
        $query = DB::table("companies")->where('type','company');
        if($r->id != "all")
        {
            $query = $query->where('province_id', $r->id);
        }
        if($r->name!='')
        {
            $query = $query->where('name', 'like', "%{$r->name}%");
        }
        $data['companies'] = $query->orderBy('name')->paginate(12);
        $data['def_province_id'] = $r->id;
        $data['name'] = $r->name;
        return view("backend.companies.index", $data);
    }
    // find company or enterprise by name
    public function find()
    {
        $name = $_GET['q'];
        $companies=DB::table('companies')->get();
        if ($name!=""){
            $companies = DB::table('companies')->where('name', 'like', "%{$name}%")
                ->orWhere('code','like',"%{$name}%")->get();
        }
        return $companies;
    }
    // load create form
    public function create()
    {
        // get all provinces
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        return view('backend.companies.create', $data);
    }
    public function save(Request $r)
    {
      
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
            'type' => 'company',
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
        if(!Accessible::check_permission('company','u')) return redirect('nopermission');
        $data['company'] = DB::table("companies")->where("id", $id)->first();
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['def_province_id'] = $data['company']->province_id;
        $data['def_district_id'] = $data['company']->district_id;
        $data['def_commune_id'] = $data['company']->commune_id;
        $data['def_village_id'] = $data['company']->village_id;
        $data['districts'] = DB::table('districts')->where('province_id', $data['company']->province_id)->get();
        $data['communes'] = DB::table('communes')->where('district_id', $data['company']->district_id)->get();
        $data['villages'] = DB::table("villages")->where("commune_id", $data['company']->commune_id)->get();
        return view("backend.companies.edit", $data);
    }
    // save update
    public  function update(Request $r)
    {
        $i=0;
       
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
        // // // upload photo first
        if($r->photo!='undefined')
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'logo/'; // usually in public folder
            $file->move($destinationPath, $file_name);
            $data['logo'] = $file_name;
        }

         $i=DB::table('companies')->where('id',$r->id)->update($data);
        return $data;
    }
    // delete
    public function delete($id)
    {
        if(!Accessible::check_permission('company','d')) return redirect('nopermission');

        DB::table('companies')->where('id', $id)->delete();
        $page =@$_GET['page'];
        if ($page>0)
        {
            return redirect('/company?page='.$page);
        }
        else{
            return redirect('/company');
        }
    }
    // get all districts by province
    public function getDistrict($id)
    {
        $result = DB::table('districts')->where('province_id', $id)->orderBy('name')->get();
        return $result;
    }
    // get all communes by district
    public function getCommune($id)
    {
        $result = DB::table("communes")->where('district_id', $id)->orderBy("name")->get();
        return $result;
    }
    // get all villages
    public function getVillage($id)
    {
        $result = DB::table("villages")->where('commune_id', $id)->orderBy("name")->get();
        return $result;
    }
    // test function
    public function test()
    {
        $data = array(
            'code' => "556677",
            'name' => "សណ្ឋាការភ្នំពេជ្រ",
            'other' => "",
            'allow_no' => "៣/៣៤",
            'allow_date' => "១៥/០៩/២០១៥",
            'allow_date' => "១៥/០៩/២០១៥",
            'allow_no' => "៣/៣៤",
            'code' => "556677",
            'commune_id' => "1",
            'commune_name' => "ពងទឹក",
            'create_date' => "2017-04-24",
            'district_id' => "1",
            'district_name' => "ដំណាក់ចង្អើរ",
            'isallowed' => "yes",
            'name' => "សណ្ឋាការភ្នំពេជ្រ",
            'other' => "",
            'province_id' => "11",
            'province_name' => "កែប",
            'type' => "company",
            'village_id' => "3",
            'village_name' =>"រនេស"
        );
        DB::table('companies')->insert($data);
    }
}
