<?php

namespace App\Models;

use Auth;
use DB;
use Session;

class Utility {
    public static function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function updatePendding() {
        $ppending = DB::table('leaves')
                ->join('students','students.id','=','leaves.student_id')
                ->leftJoin('users','users.id','=','leaves.status_by')
                ->where('students.cur_branch_id', Auth::user()->branch_id)
                ->where('leaves.status_id', 0)
                ->select('students.id_number','students.name_en','students.tel','leaves.from_date','leaves.to_date','leaves.reason','leaves.status_id','leaves.status_by', 'leaves.id', 'users.name as status_by','students.tel')
                ->orderBy('leaves.from_date', 'DESC')
                ->get();
        Session::put('ppending', $ppending);

        $feedback = DB::table('feedbacks')
                ->where('feedbacks.branch_id', Auth::user()->branch_id)
                ->where('feedbacks.is_seen', 0)
                ->select('feedbacks.*')
                ->orderBy('feedbacks.date', 'DESC')
                ->get();
        Session::put('feedback', $feedback);

        if(Session::get('school') == '') {
            $school = DB::table('schools')->where('id', Auth::user()->school_id)->first();
            Session::put('school', $school->name);
            $branch = DB::table('branches')->where('id', Auth::user()->branch_id)->first();
            Session::put('branch', $branch->name);
        }
    }
    public static function toKh($n)
    {
        $kn = ['០','១','២','៣','៤','៥','៦','៧','៨','៩'];
        $n ="$n";
        $r = "";
        for ($i=0; $i<strlen($n); $i++)
        {
            $r = $r . $kn[(int) $n[$i]];
        }
        return $r;
    }
}