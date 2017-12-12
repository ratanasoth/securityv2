<?php

namespace App\Models;
use DB;
use Webpatser\Uuid\Uuid;
use Auth;

class AuditLog {
	
	public static function log($description, $student_id = "")
	{
		$data = array(
			'id' => Uuid::generate()->string,
			'user_id' => Auth::user()->id,
			'branch_id' => Auth::user()->branch_id,
			'time' => date('Y-m-d H:i:s'),
			'description' => $description,
			'is_user_input' => 0,
			'student_id' => $student_id
		);
		$log = DB::table('log_audit')->insert($data);
		if($log) {
			return true;
		} else {
			return false;
		}
	}

	public static function compare($logtext, $field, $old, $new) {
		$text = "";
		if(strlen($logtext) > 0){
			$text = $logtext.' => ';
		}
		if($old != $new){
			$text = $text.$field.':'.$old.'->'.$new.', ';
		}
		return $text;
	}

	public static function makelog($logtext, $field, $new){
		if(strlen($logtext) > 0){
			$logtext = $logtext.' => ';
		}
		$logtext = $logtext.$field.':'.$new;
		
		return $logtext;
	}
}

?>