<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/test', function (){
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/logout', 'UserController@logout');
});

Route::get('/nopermission', 'HomeController@nopermission');

Route::group(['middleware' => 'auth'], function () {

    // set up roles for user
    Route::resource('/role', 'RoleController');
    Route::get('/role/delete/{id}','RoleController@delete');
    //set up usermanegment
    Route::resource('/user','UserController');
    Route::get('/user/{id}/destroy','UserController@destroy');
    Route::get('/user/change_password/{id}','UserController@change_password');
    Route::post('/user/save_pass','UserController@save_pass');
    Route::resource('/permission_pending','PermissionPendingController');
    Route::get('/permission_pending/destroy/{id}','PermissionPendingController@destroy');
    Route::get('/permission_pending/approved/{id}/{is_approval}','PermissionPendingController@approved');
    Route::post('/user/store', 'UserController@store');
    Route::post('/user/update', 'UserController@update');
    Route::get('/user/delete/{id}', 'UserController@delete');
    
    Route::resource('/permission','PermissionController');
    Route::get('/permission/{id}/destroy','PermissionController@destroy');
    
    Route::resource('/permissionrole','PermissionRoleController');
    Route::get('/permissionrole/{id}/destroy','PermissionRoleController@destroy');
    Route::get('/permissionrole/view_permission/{role_id}','PermissionRoleController@view_permission');
    //Route::get('/permissionrole/setup_permission/{role_id}','PermissionRoleController@setup_permission');
});
Route::get('/module', "ModuleController@index");
// Provinces
Route::get("/province", "ProvinceController@index");
Route::get('/province/create', "ProvinceController@create");
Route::post('/province/save', 'ProvinceController@save');
Route::get('/province/edit/{id}', "ProvinceController@edit");
Route::post('/province/update', "ProvinceController@update");
Route::get('/province/delete/{id}', 'ProvinceController@delete');
Route::get('/province/get', "ProvinceController@get");
// Company
Route::get('/company', 'CompanyController@index');
Route::get('/company/create', 'CompanyController@create');
Route::get("/company/getdistrict/{id}", "CompanyController@getDistrict");
Route::get("/company/getcommune/{id}", "CompanyController@getCommune");
Route::get("/company/getvillage/{id}", "CompanyController@getVillage");
Route::post('/company/save', "CompanyController@save");
Route::get("/company/delete/{id}", "CompanyController@delete");
Route::get("/company/edit/{id}", "CompanyController@edit");
Route::post("/company/update", "CompanyController@update");
Route::get("/company/search", "CompanyController@search");
Route::get('/company/find', "CompanyController@find");
Route::get('/company/detail/{id}', 'CompanyController@detail');
// enterprise
Route::get('/enterprise', 'EnterpriseController@index');
Route::get('/enterprise/create', "EnterpriseController@create");
Route::get('/enterprise/search', "EnterpriseController@search");
Route::post('/enterprise/save', "EnterpriseController@save");
Route::get("/enterprise/edit/{id}", "EnterpriseController@edit");
Route::get("/enterprise/delete/{id}", "EnterpriseController@delete");
Route::post('/enterprise/update', "EnterpriseController@update");
// employee routes
Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee/save', 'EmployeeController@save');
Route::get('/employee/detail/{id}', "EmployeeController@detail");
Route::get("/employee/get/{id}", "EmployeeController@getEmployee");
Route::post('/employee/saveprofile', "EmployeeController@save_profile");
Route::post('/employee/savepob', "EmployeeController@save_pob");
Route::post('/employee/saveadd', "EmployeeController@save_add");
Route::post('/employee/savephoto', "EmployeeController@change_photo");
Route::post('/employee/updateedu', "EmployeeController@update_education");
Route::post('/employee/updatetraining', "EmployeeController@update_training");
Route::get('/employee/dellang/{id}', "EmployeeController@del_lang");
Route::get('/employee/delcrm/{id}', "EmployeeController@del_criminal");
Route::post('/employee/updatecriminal', "EmployeeController@update_criminal");
Route::post('/employee/savedoc', "EmployeeController@insert_doc");
Route::get('/employee/deldoc/{id}', "EmployeeController@delete_doc");
Route::get('/employee/delexp/{id}', "EmployeeController@del_exp");
Route::post('/employee/saveexp', "EmployeeController@update_exp");
Route::post('/employee/updatestatus', "EmployeeController@update_status");
Route::post('/employee/updatespouse', "EmployeeController@update_spouse");
Route::post('/employee/updatefather', "EmployeeController@update_father");
Route::post('/employee/updatemother', "EmployeeController@update_mother");
Route::get('/employee/search', "EmployeeController@search");
Route::get('/employee/delete/{id}', "EmployeeController@delete");
Route::post('/employee/update/ds', "EmployeeController@updateDs");
// education
Route::get('/education/delete/{id}', "EducationController@delete");
// language
Route::post('/employee/updatelanguage', "EmployeeController@update_language");
// Districts
Route::get("/district", "DistrictController@index");
Route::get("/district/delete/{id}", "DistrictController@delete");
Route::get("/district/create", "DistrictController@create");
Route::get('/district/edit/{id}', "DistrictController@edit");
Route::post('/district/update', "DistrictController@update");
Route::post("/district/save", "DistrictController@save");
Route::get("/district/search", "DistrictController@search");

// Communes
Route::get("/commune", "CommuneController@index");
Route::get("/commune/delete/{id}", "CommuneController@delete");
Route::get("/commune/create", "CommuneController@create");
Route::get('/commune/edit/{id}', "CommuneController@edit");
Route::post('/commune/update', "CommuneController@update");
Route::post("/commune/save", "CommuneController@save");
Route::get("/commune/search", "CommuneController@search");

// Village
Route::get("/village", "VillageController@index");
Route::get("/village/delete/{id}", "VillageController@delete");
Route::get("/village/create", "VillageController@create");
Route::get('/village/edit/{id}', "VillageController@edit");
Route::post('/village/update', "VillageController@update");
Route::post("/village/save", "VillageController@save");
Route::get("/village/search", "VillageController@search");
// reports
Route::get("/report", "ReportController@index");
Route::get('/report/monthly', "ReportController@reportByMonth");
Route::get('/report/all', 'ReportController@reportAll');
Route::get('/report/companyprofile/{id}', "ReportController@company_detail");
Route::get('/report/cv/{id}', "EmployeeController@print_cv");

Route::get('/test', "CompanyController@test");
Route::get('/download/{id}', function($id){
    $file = asset('document'). "/" . $id;
    return response()->download($file);
});
// training
Route::get('/training/get/{id}', "TrainingController@get");
Route::get('/training/getbyid/{id}', "TrainingController@getById");
Route::get('/training/delete/{id}', "TrainingController@delete");
Route::post('/training/save', "TrainingController@insert_or_update");
Route::post('/training/updatestatus', "TrainingController@update_training_status");
// agency
Route::get('/agency', "AgencyController@index");
Route::get('/agency/search', "AgencyController@search");
// map
Route::get('/map', "MapController@index");
// test
Route::get('/province/excel', "ProvinceController@excel");