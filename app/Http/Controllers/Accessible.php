<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Auth;

class Accessible
{

    public static function check_permission($permission_name, $action) {
    	$role_id = Auth::user()->role_id;
    	$q = DB::table('permission_roles')
                ->join('permissions', 'permissions.id', '=', 'permission_roles.permission_id')
                ->select('permission_roles.list','permission_roles.insert','permission_roles.update','permission_roles.update','permission_roles.execute')
                ->where(['permission_roles'.'.role_id' => $role_id, 'permissions.name' => $permission_name]);

        switch ($action) {
        	case 'i':
        		$q = $q->where('permission_roles.insert', 1);
        		break;
        	case 'u':
        		$q = $q->where('permission_roles.update', 1);
        		break;
        	case 'd':
        		$q = $q->where('permission_roles.delete', 1);
        		break;
    		case 'l':
        		$q = $q->where('permission_roles.list', 1);
        		break;	
    		case 'e':
        		$q = $q->where('permission_roles.execute', 1);
        		break;
        	default:
        		break;
        }
	   
       	return $q->count() > 0;
    }

}