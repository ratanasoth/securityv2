<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use DB;
use Auth;

class Users extends Model
{
    public $incrementing = false;
    
    public static function resetMobileUser($tel, $app_code) {

        //Do nothing if tel or app_code is blank
        if(strlen($tel) == 0 || strlen($app_code) == 0) {
            return;
        }

    	$student = DB::table('students')
                    ->where(function($query) use ($tel) {
                        $query->where('tel', $tel)
                              ->orWhere('mother_tel', $tel)
                              ->orWhere('father_tel', $tel);
                        })
                    ->where('app_code', $app_code)
                    ->first();

    	if($student != null) {
    		if(Users::isUserExists($tel, $app_code) == false) {
    			Users::createUser($tel, $student->app_code);
                echo "Create user " . $tel . ", " . $app_code;
    		}
    	}
    	else {
            Users::removeUser($tel, $app_code);
            echo "Remove user " . $tel . ", " . $app_code;
    	}
    }

    private static function isUserExists($tel, $app_code) {
    	$user = DB::table('users')
                    ->where('tel', $tel)
                    ->where('name', $app_code)
                    ->first();
    	return $user != null;
    }

    private static function createUser($tel, $app_code) {

        $api_token = '000000' . str_random(54);

        $data = array(
            'id'           => Uuid::generate()->string,
            'name'         => $app_code,
            'tel'          => $tel,
            'user_name'    => $tel . '-' . $app_code,
            //'email'        => $request->email,
            'password'     => bcrypt($app_code),
            'api_token'    => $api_token,
            'role_id'      => 0
            //'school_id'    => $request->school_id,
            //'branch_id'    => $request->branch_id,
        );

        DB::table('users')->insert($data);
    }

    private static function userCurrentlyLogin($tel) {
    	$user = DB::table('users')->where('tel', $tel)->first();
    	if($user != null && substr($user->api_token, 0, 6) != '000000') {
    		return true;
    	}
    	return false;
    }
	
    private static function removeUser($tel, $app_code) {
    	DB::table('users')
            ->where('tel', $tel)
            ->where('name', $app_code)
            ->delete();
    }

    public static function getUserPhoto($user_id) {
        $user = DB::table('users')->where('id', $user_id)->first();

        if(!is_null($user)) {
            $photo = $user->photo;
            return $photo;
        }

        return '';
    }
}