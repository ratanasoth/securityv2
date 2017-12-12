<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // get employee's training info
    public function get($id)
    {
        return DB::table('training')->where('employee_id', $id)->get();
    }
    // get training by id
    public function getById($id)
    {
        return DB::table('training')->where('id', $id)->first();
    }
    // delete training by id
    public function delete($id)
    {
        $i = DB::table('training')->where('id', $id)->delete();
        return $i;
    }
    // insert get id
    public function insert_or_update(Request $r)
    {
        $i=0;
        $data = array(
            'name' => $r->name,
            'training_place' => $r->training_place,
            'training_year' => $r->training_year,
            'employee_id' => $r->employee_id
        );
        if($r->id>0)
        {
            // update
            DB::table('training')->where('id', $r->id)->update($data);
            $i = $r->id;
        }
        else{
            // insert
            $i = DB::table('training')->insertGetId($data);
        }

        return $i;
    }

    // update training status for each employee
    public function update_training_status(Request $r)
    {
        $data = array(
            'training' => $r->training
        );
        $i = DB::table('employees')->where('id', $r->id)->update($data);
        return $i;
    }
}
