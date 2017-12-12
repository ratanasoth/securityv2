<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // load employee from database
    public function index()
    {
        $data['employees'] = DB::table('employees')->orderBy('english_name')->paginate(12);
        $data['name'] = "";
        return view('backend.employees.index', $data);
    }
    // load create form
    public function create()
    {
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['con'] = "no";
        return view('backend.employees.create', $data);
    }
    // save employee info to database
    public function save(Request $r)
    {
        // upload photo first
        $file_name ="default.png";
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'photo/'; // usually in public folder
            $file->move($destinationPath, $file_name);
        }
        // prepare data to insert
        $data = array(
            'code' => $r->code,
            'english_name' => $r->english_name,
            'khmer_name' => $r->khmer_name,
            'gender' => $r->gender,
            'dob' => $r->dob,
            'phone1' => $r->phone1,
            'phone2' => $r->phone2,
            'company_id' => $r->company_id,
            'company_name' => $r->company_name,
            'photo' => $file_name,
            'pob_home' => $r->home,
            'pob_street' => $r->street,
            'pob_krom' => $r->group,
            'pob_village' => $r->village,
            'pob_commune' => $r->commune,
            'pob_district' => $r->district,
            'pob_province' => $r->province,
            'cur_home' => $r->current_home,
            'cur_street' => $r->current_street,
            'cur_krom' => $r->current_group,
            'cur_village' => $r->current_village,
            'cur_commune' => $r->current_commune,
            'cur_district' => $r->current_district,
            'cur_province' => $r->current_province,
            'is_agency' => $r->agency
        );
        if($r->con=='yes')
        {
            $i = DB::table('employees')->insertGetId($data);
            return redirect('/employee/detail/'.$i);
        }

        DB::table('employees')->insert($data);
        $r->session()->flash('sms', "ទិន្នន័យត្រូវបានរក្សាទុកដោយជោគជ័យ។");
        return redirect('/employee/create');
    }
    public function print_cv($id)
    {
        $data['employee'] = DB::table('employees')->join('companies', 'employees.company_id', '=', 'companies.id')
                            ->where('employees.id', $id)->select('employees.*', 'companies.name as cname')
                            ->first();
        $data['educations'] = DB::table('education')->where('employee_id', $id)->get();
        $data['languages'] = DB::table('language')->where('employee_id', $id)->get();
        $data['experience'] = DB::table('experience')->where('employee_id', $id)->get();
        $data['father'] = DB::table('families')->where('employee_id', $id)->where('relationship','father')->first();
        $data['mother'] = DB::table('families')->where('employee_id', $id)->where('relationship','mother')->first();
        $data['criminals'] = DB::table('criminals')->where('employee_id', $id)->get();
        return view('backend.reports.cv', $data);
    }
    // delete employee
    public function delete($id)
    {
        $emp = DB::table('employees')->where('id', $id)->first();
        $i = DB::table('employees')->where('id', $id)->delete();
        if($i)
        {
            // delete photo
            $photo = $emp->photo;
            // delete education
            DB::table('education')->where('employee_id', $id)->delete();
            // delete experience
            DB::table('experience')->where('employee_id', $id)->delete();
            // delete family
            DB::table('families')->where('employee_id', $id)->delete();
            // delete document
            DB::table('documents')->where('employee_id', $id)->delete();
            // delete criminals
            DB::table('criminals')->where('employee_id', $id)->delete();
            // delete training
            DB::table('training')->where('employee_id', $id)->delete();
        }
        return redirect('/employee');
    }
    // save profile
    public function save_profile(Request $r)
    {
        // prepare data to update
        $data = array(
            'code' => $r->code,
            'english_name' => $r->english_name,
            'khmer_name' => $r->khmer_name,
            'gender' => $r->gender,
            'dob' => $r->dob,
            'phone1' => $r->phone1,
            'phone2' => $r->phone2,
            'company_id' => $r->company_id,
            'company_name' => $r->company_name,
            'is_agency' => $r->agency
        );
        $i = DB::table('employees')->where('id', $r->employee_id)->update($data);
        return $i;
    }
    // update pob
    public function save_pob(Request $r)
    {
        $data = array(
            'pob_home' => $r->home,
            'pob_street' => $r->street,
            'pob_krom' => $r->group,
            'pob_village' => $r->village,
            'pob_commune' => $r->commune,
            'pob_district' => $r->district,
            'pob_province' => $r->province
        );
        $i = DB::table('employees')->where('id', $r->employee_id)
            ->update($data);
        return $i;
    }
    public function save_add(Request $r)
    {
        $data = array(
            'cur_home' => $r->current_home,
            'cur_street' => $r->current_street,
            'cur_krom' => $r->current_group,
            'cur_village' => $r->current_village,
            'cur_commune' => $r->current_commune,
            'cur_district' => $r->current_district,
            'cur_province' => $r->current_province
        );
        $i = DB::table('employees')->where('id', $r->employee_id)
            ->update($data);
        return $i;
    }
    public function change_photo(Request $r)
    {
        // upload photo first
        $file_name ="";
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'photo/'; // usually in public folder
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'photo' => $file_name
        );
        $i = DB::table('employees')->where('id', $r->employee_id)
            ->update($data);
        return $i;

    }
    // update education
    public function update_education(Request $r)
    {
        $data = array(
            'education' => $r->education,
            'school_name' => $r->school_name,
            'study_place' => $r->study_place,
            'study_year' => $r->study_year
        );
        $i = DB::table('employees')->where('id', $r->employee_id)
            ->update($data);
        return $i;
    }
    // update training
    public function update_training(Request $r)
    {
        $i=0;
        if($r->id>0)
        {
            // update
            $data = array(
                'level_name' => $r->level_name,
                'school_name' => $r->school_name,
                'study_place' => $r->study_place,
                'study_year' => $r->study_year
            );
            DB::table('education')->where('id', $r->id)->update($data);
            $i=$r->id;
        }
        else{
            // insert new
            $data = array(
                'level_name' => $r->level_name,
                'school_name' => $r->school_name,
                'study_place' => $r->study_place,
                'study_year' => $r->study_year,
                'employee_id' => $r->employee_id
            );
           $i = DB::table('education')->insertGetId($data);
        }
        return $i;
    }
    // update language
    public function update_language(Request $r)
    {
        $i=0;
        if($r->id>0)
        {
            // update
        }
        else{
            // insert new
            $data = array(
                'name' => $r->name,
                'employee_id' => $r->employee_id
            );
            $i = DB::table('language')->insertGetId($data);
        }
        return $i;
    }
    // update and add new exp
    public function update_exp(Request $r)
    {
        $i=0;
        if($r->id>0)
        {
            // update
            $data = array(
                'description' => $r->description,
                'company_name' => $r->company_name,
            );
            DB::table('experience')->where('id', $r->id)->update($data);
            $i=$r->id;
        }
        else{
            // save new
            $data = array(
                'description' => $r->description,
                'company_name' => $r->company_name,
                'employee_id' => $r->employee_id
            );
            $i = DB::table('experience')->insertGetId($data);
        }
        return $i;
    }
    // update criminal
    public function update_criminal(Request $r)
    {
        $i=0;
        if($r->id>0)
        {
            // update
        }
        else{
            // insert new
            $data = array(
                'name' => $r->name,
                'employee_id' => $r->employee_id
            );
            $i = DB::table('criminals')->insertGetId($data);
        }
        return $i;
    }
    // delete criminal
    public function del_criminal($id)
    {
        DB::table('criminals')->where('id', $id)->delete();
        return 1;
    }
    // delete a language by its id
    public function del_lang($id)
    {
        DB::table('language')->where('id', $id)->delete();
        return 1;
    }
    // delete experience
    public function del_exp($id)
    {
        DB::table('experience')->where('id', $id)->delete();
        return 1;
    }
    // detail information
    public function detail($id)
    {
        // employee info
        $data['employee'] = DB::table('employees')->where('id', $id)->first();
        $data['provinces'] = DB::table('provinces')->orderBy('name')->get();
        $data['trainings'] = DB::table('education')->where('employee_id', $id)->get();
        $data['languages'] = DB::table('language')->where('employee_id', $id)->get();
        $data['criminals'] = DB::table('criminals')->where('employee_id', $id)->get();
        $data['documents'] = DB::table('documents')->where('employee_id', $id)->get();
        $data['experiences'] = DB::table('experience')->where('employee_id', $id)->get();
        $data['father'] = DB::table('families')->where('employee_id', $id)->where('relationship','father')->first();
        $data['mother'] = DB::table('families')->where('employee_id', $id)->where('relationship','mother')->first();
        $data['courses'] = DB::table('training')->where('employee_id', $id)->get();
        return view('backend.employees.detail', $data);
    }
    // function to update spouse
    public function update_spouse(Request $r)
    {
        $data = array(
            'has_husband' => $r->husband,
            'has_wife' => $r->wife,
            'is_single' => $r->single,
            'spoud_name' => $r->name,
            'is_alive' => $r->live,
            'is_dead' => $r->die,
            'age' => $r->age,
            'career' => $r->career,
            'x_home' => $r->home,
            'x_street' => $r->street,
            'x_krom' => $r->krom,
            'x_village' =>$r->village,
            'x_commune' => $r->commune,
            'x_district' => $r->district,
            'x_province' => $r->province
        );
        $i = DB::table('employees')->where('id', $r->id)->update($data);
        return $i;
    }
    public function update_father(Request $f)
    {
        $i = 0;
        if($f->id>0)
        {
            // update
            $data = array(
                'name' => $f->name,
                'age' => $f->age,
                'career' => $f->career,
                'home_no' => $f->home,
                'street_no' => $f->street,
                'krom' => $f->krom,
                'village' => $f->village,
                'commune' =>$f->commune,
                'district' =>$f->district,
                'province' =>$f->province,
                'is_live' =>$f->live,
                'is_die' => $f->die
            );
            DB::table('families')->where('id', $f->id)->update($data);
            $i = $f->id;
        }
        else{
            // insert
            $data = array(
                'name' => $f->name,
                'relationship'=> 'father',
                'age' => $f->age,
                'career' => $f->career,
                'employee_id' => $f->employee_id,
                'home_no' => $f->home,
                'street_no' => $f->street,
                'krom' => $f->krom,
                'village' => $f->village,
                'commune' =>$f->commune,
                'district' =>$f->district,
                'province' =>$f->province,
                'is_live' =>$f->live,
                'is_die' => $f->die
            );
            $i=DB::table('families')->insertGetId($data);
        }
        return $i;
    }
    public function update_mother(Request $f)
    {
        $i = 0;
        if($f->id>0)
        {
            // update
            $data = array(
                'name' => $f->name,
                'age' => $f->age,
                'career' => $f->career,
                'home_no' => $f->home,
                'street_no' => $f->street,
                'krom' => $f->krom,
                'village' => $f->village,
                'commune' =>$f->commune,
                'district' =>$f->district,
                'province' =>$f->province,
                'is_live' =>$f->live,
                'is_die' => $f->die
            );
            DB::table('families')->where('id', $f->id)->update($data);
            $i = $f->id;
        }
        else{
            // insert
            $data = array(
                'name' => $f->name,
                'relationship'=> 'mother',
                'age' => $f->age,
                'career' => $f->career,
                'employee_id' => $f->employee_id,
                'home_no' => $f->home,
                'street_no' => $f->street,
                'krom' => $f->krom,
                'village' => $f->village,
                'commune' =>$f->commune,
                'district' =>$f->district,
                'province' =>$f->province,
                'is_live' =>$f->live,
                'is_die' => $f->die
            );
            $i=DB::table('families')->insertGetId($data);
        }
        return $i;
    }
    // delete document
    public function delete_doc($id)
    {
        $doc = DB::table('documents')->where('id', $id)->first();
        $file_name = $doc->name;
        \File::delete('document/' . $file_name);
        $i = DB::table('documents')->where('id', $id)->delete();
        return $i;
    }
    // upload new file
    public function insert_doc(Request $r)
    {
        // upload photo first
        $file_name ="";
        if($r->file_name)
        {
            $file = $r->file('file_name');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'document/'; // usually in public folder
            $file->move($destinationPath, $file_name);
        }
        $data = array(
            'name' => $file_name,
            'employee_id' => $r->employee_id
        );
        $i = DB::table('documents')->insertGetId($data);
        return $i;
    }
    // get employee info by employee id
    public  function getEmployee($id)
    {
        $employee = DB::table("employees")->where('id', $id)->first();
        return json_encode($employee);
    }
    // update employee status
    public function update_status(Request $r)
    {
        $data = array(
            'has_husband' => $r->has_husband,
            'has_wife' => $r->has_wife,
            'is_single' => $r->is_single
        );
        $i = DB::table('employees')->where('id', $r->id)->update($data);
        return $i;
    }
    // search employee by name or code
    public function search()
    {
        $id = $_GET['name'];
        $data['employees'] = DB::table('employees')
            ->where('code', 'like', "%{$id}%")
            ->orWhere('khmer_name', 'like', "%{$id}%")
            ->orWhere('english_name', 'like', "%{$id}%")
            ->paginate(27);
        $data['name'] = "";
        return view('backend.employees.index', $data);
    }
    // update destination for each employee
    public function updateDs(Request $r)
    {
        $data = [
            'destination' => $r->destination
        ];
        $i=DB::table('employees')->where('id', $r->emp_id)->update($data);
        return $i;
    }

}
