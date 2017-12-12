@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>ប្រវត្តិរូបបុគ្គលិក&nbsp;&nbsp;<a href="{{url('/report/cv/'.$employee->id)}}" target="_blank" class="btn btn-xs btn-danger">បោះពុម្ព</a></strong>
                </span>
        </div>
        <div class="panel-body">
            <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">

                    <div class="col-sm-4">
                        <fieldset id="profile1">
                            <legend>ពត៌មានទូទៅ&nbsp;&nbsp;<a href="#" class="btn btn-success btn-xs" id="btnEdit1">កែប្រែ</a> </legend>
                            <div class="form-group">
                                <label for="code" class="control-label col-sm-4">លេខកូដ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="code" id="code" value="{{$employee->code}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="khmer_name" class="control-label col-sm-4">ឈ្មោះខ្មែរ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="khmer_name" id="khmer_name"
                                          value="{{$employee->khmer_name}}" disabled>
                                    <input type="hidden" name="employee_id" id="employee_id" value="{{$employee->id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="english_name" class="control-label col-sm-4">ឈ្មោះឡាតាំង</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="english_name" id="english_name" disabled value="{{$employee->english_name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="control-label col-sm-4">ភេទ</label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" class="form-control" disabled>
                                        <option value="Male" {{$employee->gender=='Male'?"selected":""}}>ប្រុស</option>
                                        <option value="Female" {{$employee->gender=='Female'?"selected":""}}>ស្រី</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="control-label col-sm-4">ថ្ងៃខែឆ្នាំកំណើត</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="dob" id="dob" disabled value="{{$employee->dob}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone1" class="control-label col-sm-4">លេខទូរស័ព្ទ១</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phone1" id="phone1" disabled value="{{$employee->phone1}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone2" class="control-label col-sm-4">លេខទូរស័ព្ទ២</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phone2" id="phone2" disabled value="{{$employee->phone2}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_name" class="control-label col-sm-4">ឈ្មោះក្រុមហ៊ុន</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="hidden" name="company_id" id="company_id" value="{{$employee->company_id}}">
                                        <input type="text" class="form-control" name="company_name" id="company_name" readonly value="{{$employee->company_name}}">
                                        <span class="input-group-btn">
                                                    <button class="btn btn-success" id="btnSelect1" disabled type="button" data-toggle="modal" data-target="#myModal">ជ្រើសរើស</button>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agency" class="control-label col-sm-4">ជាភ្នាក់ងារពត៌មាន</label>
                                <div class="col-sm-8">
                                    <select name="agency" id="agency" class="form-control" disabled>
                                        <option value="no" {{$employee->is_agency=='no'?'selected':''}}>មិនមែន</option>
                                        <option value="yes" {{$employee->is_agency=='yes'?'selected':''}}>មែន</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hide" id="group1">
                                <label class="control-label col-sm-4">&nbsp;</label>
                                <div class="col-sm-8">
                                    <button id="btnSave1" class="btn btn-primary btn-flat" type="button">រក្សាទុក</button>
                                    <button id="btnCancel1" class="btn btn-danger btn-flat" type="button">បោះបង់</button>
                                    <p id="sms"></p>
                                </div>
                            </div>
                        </fieldset>
                        <div class="holder">

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <fieldset id="profile2">
                            <legend>ទីកន្លែងកំណើត&nbsp;&nbsp;<a href="#" class="btn btn-success btn-xs" id="btnEdit2">កែប្រែ</a></legend>
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-8">
                                    <select name="province" id="province" class="form-control" disabled>
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->name}}" id="{{$pro->id}}"
                                                    {{$pro->name==$employee->pob_province?'selected':''}}>{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="control-label col-sm-4">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-8">
                                    <select name="district" id="district" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="commune" class="control-label col-sm-4">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-8">
                                    <select name="commune" id="commune" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="village" class="control-label col-sm-4">ភូមិ</label>
                                <div class="col-sm-8">
                                    <select name="village" id="village" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="group" class="control-label col-sm-4">ក្រុម</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="group" id="group" disabled
                                           value="{{$employee->pob_krom}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="street" class="control-label col-sm-4">ផ្លូវ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="street" id="street" disabled
                                           value="{{$employee->pob_street}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="home" class="control-label col-sm-4">ផ្ទះលេខ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="home" id="home" disabled
                                           value="{{$employee->pob_home}}">
                                </div>
                            </div>
                            <div class="form-group hide" id="group2">
                                <label class="control-label col-sm-4">&nbsp;</label>
                                <div class="col-sm-8">
                                    <button id="btnSave2" class="btn btn-primary btn-flat" type="button">រក្សាទុក</button>
                                    <button id="btnCancel2" class="btn btn-danger btn-flat" type="button">បោះបង់</button>
                                    <p id="sms2"></p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4">
                        <fieldset id="profile3">
                            <legend>ទីលំនៅបច្ចុប្បន្ន&nbsp;&nbsp;<a href="#" class="btn btn-success btn-xs" id="btnEdit3">កែប្រែ</a></legend>
                            <div class="form-group">
                                <label for="current_province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-8">
                                    <select name="current_province" id="current_province" class="form-control" disabled>
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->name}}" id="{{$pro->id}}"
                                                    {{$pro->name==$employee->cur_province?'selected':''}}>{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_district" class="control-label col-sm-4">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-8">
                                    <select name="current_district" id="current_district" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_commune" class="control-label col-sm-4">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-8">
                                    <select name="current_commune" id="current_commune" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_village" class="control-label col-sm-4">ភូមិ</label>
                                <div class="col-sm-8">
                                    <select name="current_village" id="current_village" class="form-control" disabled></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_group" class="control-label col-sm-4">ក្រុម</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_group" id="current_group"
                                           disabled value="{{$employee->cur_krom}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_street" class="control-label col-sm-4">ផ្លូវ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_street" id="current_street" disabled
                                           value="{{$employee->cur_street}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_home" class="control-label col-sm-4">ផ្ទះលេខ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_home" id="current_home" disabled value="{{$employee->cur_home}}">
                                </div>
                            </div>
                            <div class="form-group hide" id="group3">
                                <label class="control-label col-sm-4">&nbsp;</label>
                                <div class="col-sm-8">
                                    <button id="btnSave3" class="btn btn-primary btn-flat" type="button">រក្សាទុក</button>
                                    <button id="btnCancel3" class="btn btn-danger btn-flat" type="button">បោះបង់</button>
                                    <p id="sms3"></p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>រូបថត</legend>
                            <form action="{{url('/employee/savephoto')}}" method="post" enctype="multipart/form-data" id="frm1" name="frm1">
                                <div class="form-group">
                                    <label for="photo" class="control-label col-sm-3">ជ្រើសរើសរូប</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" name="photo" id="photo" onchange="loadFile(event)">
                                        <input type="hidden" id="emp_id" value="{{$employee->id}}">
                                        <br>
                                        <button class="btn btn-primary btn-flat" type="button" id="btnPhoto" disabled>ផ្លាស់ប្តូរ</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <img src="{{asset('img/ajax-loader.gif')}}" alt="កំពុងដំណើរការ ..." id="sms4" class="hide">
                                    </div>
                                    <img src="{{asset('photo/'.$employee->photo)}}" alt="រូបថត 4x6" id="preview" width="54">
                                </div>
                            </form>

                        </fieldset>
                    </div>

                </div>
                <div class="row">
                <div class="col-sm-12">
                    <hr>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#education" aria-controls="education" role="tab" data-toggle="tab"><strong>កម្រិតវប្បធម៌</strong></a>
                    </li>
                    <li role="presentation">
                        <a href="#experience" aria-controls="experience" role="tab" data-toggle="tab">បទពិសោធន៍</a>
                    </li>
                    <li role="presentation">
                        <a href="#family" aria-controls="family" role="tab" data-toggle="tab">គ្រួសារ</a>
                    </li>
                    <li role="presentation">
                        <a href="#document" aria-controls="document" role="tab" data-toggle="tab">ឯកសារភ្ជាប់</a>
                    </li>
                    <li role="presentation">
                        <a href="#criminal" aria-controls="criminal" role="tab" data-toggle="tab">បទល្មើស</a>
                    </li>
                    <li role="presentation">
                        <a href="#training" aria-controls="criminal" role="tab" data-toggle="tab">វគ្គបណ្តុះបណ្តាល</a>
                    </li>
                </ul>
                <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="education">
                    <br>
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th>វគ្គ ឬកម្រិតសិក្សា</th>
                            <th>ឈ្មោះគ្រឹះស្ថានសិក្សា<br>គ្រឹះស្ថានបណ្តុះបណ្តាល</th>
                            <th>កន្លែងសិក្សា</th>
                            <th>ឆ្នាំសិក្សា</th>
                        </tr>
                        <tr>
                            <td colspan="4">- កម្រិតវប្បធម៌ទូទៅ
                                <a href="#" class="btn btn-success btn-xs" id="btnEditEducation">កែប្រែ</a>
                            </td>
                        </tr>
                        <tr id="edu">
                            <td><input type="text" name="general_education" id="general_education" disabled
                                      value="{{$employee->education}}" class="form-control"></td>
                            <td><input type="text" class="form-control" name="school_name" disabled
                                      value="{{$employee->school_name}}" id="school_name"></td>
                            <td><input type="text" class="form-control" name="study_place" disabled
                                      value="{{$employee->study_place}}" id="study_place"></td>
                            <td><input type="text" class="form-control" name="study_year" disabled
                                      value="{{$employee->study_year}}" id="study_year">

                                <div id="group5" class="hide">
                                    <br>
                                    <button id="btnSave5" class="btn btn-primary btn-xs btn-flat" type="button">រក្សាទុក</button>
                                    <button id="btnCancel5" class="btn btn-danger btn-xs btn-flat" type="button">បោះបង់</button>
                                    <p id="sms5"></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">- កម្រិតបណ្តុះបណ្តាលវិជ្ជាជីវៈមួលដ្ឋាន និងក្រោមមូលដ្ឋាន ​
                                <a href="#" class="btn btn-xs btn-success" id="btnAddTraining">បន្ថែម</a></td>
                        </tr>
                        <tbody id="block1">
                        @foreach($trainings as $tr)
                            <tr id="{{$tr->id}}">
                                <td><input type="text" class="form-control" disabled value="{{$tr->level_name}}"></td>
                                <td><input type="text" class="form-control" disabled value="{{$tr->school_name}}"></td>
                                <td><input type="text" class="form-control" disabled value="{{$tr->study_place}}"></td>
                                <td><input type="text" class="form-control" disabled
                                          style="width:90px; display: inline;" value="{{$tr->study_year}}">
                                    <a href='#' class='btn btn-link' onclick='edit(this, event)'><i class="fa fa-pencil text-primary"></i></a>
                                    <a href='#' class='btn btn-link' onclick='del(this, event)'><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <td colspan="4">- ភាសបរទេស ​
                                <a href="#" class="btn btn-success btn-xs" id="btnAddLanguage">បន្ថែម</a></td>
                        </tr>
                        <tbody id="block2">
                        @foreach($languages as $lang)
                            <tr id="{{$lang->id}}">
                                <td>
                                    <input type="text" class="form-control" value="{{$lang->name}}" disabled>
                                </td>
                                <td><a href='#' class='btn btn-link' onclick='delLanguage(this, event)'><i class="fa fa-remove text-danger"></i></a></td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="experience">
                    <br>
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th>បរិយាយបទពិសោធន៍ <a href="#" class="btn btn-success btn-xs" id="btnAddExp">បន្ថែម</a></th>
                                <th>ឈ្មោះក្រុមហ៊ុន</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody id="block6">
                        @foreach($experiences as $ex)
                            <tr id="{{$ex->id}}">
                                <td>{{$ex->description}}</td>
                                <td>{{$ex->company_name}}</td>
                                <td>
                                    <a href="#" class="btn btn-link" onclick="editExp(this,event)">
                                        <i class="fa fa-pencil text-primary"></i>
                                    </a>
                                    <a href="#" class="btn btn-link" onclick="delExp(this,event)">
                                        <i class="fa fa-remove text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="family">
                    <div class="row">
                        <div class="col-sm-12">
                            <br>
                            <form action="#" class="form-horizontal" id="frm5">
                                <label><input type="checkbox" id="ch1" onchange="save_status(this, '{{$employee->id}}')"
                                              value="{{$employee->has_husband}}" {{$employee->has_husband?'checked':''}}> មានប្តី</label>
                                <label><input type="checkbox" id="ch2" onchange="save_status(this, '{{$employee->id}}')"
                                              value="{{$employee->has_wife}}" {{$employee->has_wife?'checked':''}}> មានប្រពន្ធ</label>
                                <label><input type="checkbox" id="ch3" onchange="save_status(this, '{{$employee->id}}')"
                                              value="{{$employee->is_single}}" {{$employee->is_single?'checked':''}}> នៅលីវ</label>
                            </form>
                            <form action="#" class="form-horizontal" id="frm6">
                                <fieldset>
                                    <legend>ប្តី ប្រពន្ធ <a href="#" class="btn btn-success btn-xs" id="btnSpouse" onclick="editFamily(event, this)">កែប្រែ</a></legend>
                                    <p class="spouse-box">
                                        ឈ្មោះ <input type="text" style="width: 170px" disabled value="{{$employee->spoud_name}}" id="s_name">&nbsp;&nbsp;
                                        <input type="checkbox" id="s_live" value="{{$employee->is_alive}}" {{$employee->is_alive?'checked':''}} disabled onchange="live_status(this)"> រស
                                        &nbsp;&nbsp;
                                        <input type="checkbox"​ disabled value="{{$employee->is_dead}}" id="s_die" {{$employee->is_dead?'checked':''}} onchange="live_status(this)"> ស្លាប់ &nbsp;&nbsp;
                                        អាយុ <input type="number" id="s_age" min="18" max="99" style="width:70px" value="{{$employee->age}}" disabled> &nbsp;&nbsp;
                                        មុខរបរ <input type="text" id="s_career" style="width: 170px" value="{{$employee->career}}" disabled>

                                    </p>
                                    <p class="spouse-box">
                                        ទីលំនៅបច្ចុប្បន្នផ្ទះលេខ <input type="text" id="s_home" style="width: 80px;" value="{{$employee->x_home}}" disabled>&nbsp;
                                        ផ្លូវលេខ <input type="text" id="s_street" style="width: 80px;" value="{{$employee->x_street}}" disabled>
                                        ក្រុម <input type="text" id="s_krom" style="width: 70px" value="{{$employee->x_krom}}" disabled>&nbsp;
                                        ភូមិ <input type="text" id="s_village" style="width: 170px" value="{{$employee->x_village}}" disabled>&nbsp;
                                    </p>
                                    <p class="spouse-box">
                                        ឃុំ/សង្កាត់ <input type="text" id="s_commune" style="width: 170px;" value="{{$employee->x_commune}}" disabled>&nbsp;
                                        ស្រុក/ខណ្ឌ <input type="text" id="s_district" style="width: 170px;" value="{{$employee->x_district}}" disabled>
                                        រាជធានី/ខេត្ត <input type="text" id="s_province" style="width: 170px" value="{{$employee->x_province}}" disabled>&nbsp;
                                    </p>
                                    <p class="spouse-btn">
                                        <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="update_spouse({{$employee->id}})">រក្សាទុក</button>
                                        <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="cancel_spouse()">បោះបង់</button>
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="#" class="form-horizontal">
                                <input type="hidden" id="father_id" value="{{$father!=null?$father->id:'0'}}">
                                <fieldset>
                                    <legend>ឪពុក <a href="#" class="btn btn-success btn-xs" id="btnFather" onclick="editFather(event, this)">កែប្រែ</a></legend>
                                    <p class="father-box">
                                        ឈ្មោះ <input type="text" style="width: 170px" disabled value="{{$father!=null?$father->name:''}}" id="f_name">&nbsp;&nbsp;
                                        <input type="checkbox" id="f_live" value="{{$father!=null?$father->is_live:'0'}}" {{$father!=null?($father->is_live?'checked':''):''}} disabled onchange="father_status(this)"> រស
                                        &nbsp;&nbsp;
                                        <input type="checkbox"​ disabled value="{{$father!=null?$father->is_die:'0'}}" id="f_die" {{$father!=null?($father->is_die?'checked':''):''}} onchange="father_status(this)"> ស្លាប់ &nbsp;&nbsp;
                                        អាយុ <input type="number" id="f_age" min="18" max="99" style="width:70px" value="{{$father!=null?$father->age:''}}" disabled> &nbsp;&nbsp;
                                        មុខរបរ <input type="text" id="f_career" style="width: 170px" value="{{$father!=null?$father->career:''}}" disabled>

                                    </p>
                                    <p class="father-box">
                                        ទីលំនៅបច្ចុប្បន្នផ្ទះលេខ <input type="text" id="f_home" style="width: 80px;" value="{{$father!=null?$father->home_no:''}}" disabled>&nbsp;
                                        ផ្លូវលេខ <input type="text" id="f_street" style="width: 80px;" value="{{$father!=null?$father->street_no:''}}" disabled>
                                        ក្រុម <input type="text" id="f_krom" style="width: 70px" value="{{$father!=null?$father->krom:''}}" disabled>&nbsp;
                                        ភូមិ <input type="text" id="f_village" style="width: 170px" value="{{$father!=null?$father->village:''}}" disabled>&nbsp;
                                    </p>
                                    <p class="father-box">
                                        ឃុំ/សង្កាត់ <input type="text" id="f_commune" style="width: 170px;" value="{{$father!=null?$father->commune:''}}" disabled>&nbsp;
                                        ស្រុក/ខណ្ឌ <input type="text" id="f_district" style="width: 170px;" value="{{$father!=null?$father->district:''}}" disabled>
                                        រាជធានី/ខេត្ត <input type="text" id="f_province" style="width: 170px" value="{{$father!=null?$father->province:''}}" disabled>&nbsp;
                                    </p>
                                    <p class="father-btn">
                                        <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="save_father({{$employee->id}})">រក្សាទុក</button>
                                        <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="cancel_father()">បោះបង់</button>
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="#" class="form-horizontal">
                                <input type="hidden" id="mother_id" value="{{$mother!=null?$mother->id:'0'}}">
                                <fieldset>
                                    <legend>ម្តាយ <a href="#" class="btn btn-success btn-xs" id="btnMother" onclick="editMother(event, this)">កែប្រែ</a></legend>
                                    <p class="mother-box">
                                        ឈ្មោះ <input type="text" style="width: 170px" disabled value="{{$mother!=null?$mother->name:''}}" id="m_name">&nbsp;&nbsp;
                                        <input type="checkbox" id="m_live" value="{{$mother!=null?$mother->is_live:'0'}}" {{$mother!=null?($mother->is_live?'checked':''):''}} disabled onchange="mother_status(this)"> រស
                                        &nbsp;&nbsp;
                                        <input type="checkbox"​ disabled value="{{$mother!=null?$mother->is_die:'0'}}" id="m_die" {{$mother!=null?($mother->is_die?'checked':''):''}} onchange="mother_status(this)"> ស្លាប់ &nbsp;&nbsp;
                                        អាយុ <input type="number" id="m_age" min="18" max="99" style="width:70px" value="{{$mother!=null?$mother->age:''}}" disabled> &nbsp;&nbsp;
                                        មុខរបរ <input type="text" id="m_career" style="width: 170px" value="{{$mother!=null?$mother->career:''}}" disabled>
                                    </p>
                                    <p class="mother-box">
                                        ទីលំនៅបច្ចុប្បន្នផ្ទះលេខ <input type="text" id="m_home" style="width: 80px;" value="{{$mother!=null?$mother->home_no:''}}" disabled>&nbsp;
                                        ផ្លូវលេខ <input type="text" id="m_street" style="width: 80px;" value="{{$mother!=null?$mother->street_no:''}}" disabled>
                                        ក្រុម <input type="text" id="m_krom" style="width: 70px" value="{{$mother!=null?$mother->krom:''}}" disabled>&nbsp;
                                        ភូមិ <input type="text" id="m_village" style="width: 170px" value="{{$mother!=null?$mother->village:''}}" disabled>&nbsp;
                                    </p>
                                    <p class="mother-box">
                                        ឃុំ/សង្កាត់ <input type="text" id="m_commune" style="width: 170px;" value="{{$mother!=null?$mother->commune:''}}" disabled>&nbsp;
                                        ស្រុក/ខណ្ឌ <input type="text" id="m_district" style="width: 170px;" value="{{$mother!=null?$mother->district:''}}" disabled>
                                        រាជធានី/ខេត្ត <input type="text" id="m_province" style="width: 170px" value="{{$mother!=null?$mother->province:''}}" disabled>&nbsp;
                                    </p>
                                    <p class="mother-btn">
                                        <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="save_mother({{$employee->id}})">រក្សាទុក</button>
                                        <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="cancel_mother()">បោះបង់</button>
                                    </p>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="document">
                    <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">ឈ្មោះឯកសារ</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="doc" id="doc">
                                        <br>
                                        <button type="button" class="btn btn-primary btn-flat" id="btnSaveDoc">រក្សាទុក</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table-condensed table-bordered" style="width: 50%">
                        <thead>
                            <tr>
                                <th>ឈ្មោះឯកសារ</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody id="block4">
                            @foreach($documents as $doc)
                                <tr id="{{$doc->id}}">
                                    <td><a href="{{url('/')."/document/" .$doc->name}}" target="_blank">{{$doc->name}}</a></td>
                                    <td>
                                        <a href="#" class="btn btn-link" onclick="delDoc(this,event)">
                                            <i class="fa fa-remove text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="criminal">
                    <br>
                    <table class="table table-condensed" style="width:60%">
                        <thead>
                            <tr>
                                <th>ឈ្មោះបទល្មើស <a href="#" class="btn btn-success btn-xs" id="btnAddCriminal">បន្ថែម</a></th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody id="block3">
                        @foreach($criminals as $crim)
                            <tr id="{{$crim->id}}">
                                <td>{{$crim->name}}</td>
                                <td>
                                    <a href="#" class="btn btn-link" onclick="delCrm(this,event)"><i class="fa fa-remove text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    <div role="tabpanel" class="tab-pane" id="training">
                        <br>
                        <form action="#" class="horizontal-form" method="post">
                            <p>
                                <label class="control-label"><input type="radio" name="is_trained" value="no" id="not_train" {{$employee->training=='no'?'checked':''}} onchange="changeTrainingStatus()">&nbsp;មិនធ្លាប់ឆ្លងកាត់វគ្គបណ្តុះបណ្តាល</label>
                                &nbsp;&nbsp;&nbsp;
                                <label class="control-label"><input type="radio" name="is_trained" value="yes" id="ban_train" {{$employee->training=='yes'?'checked':''}} onchange="changeTrainingStatus()">&nbsp;ធ្លាប់ឆ្លងកាត់វគ្គបណ្តុះបណ្តាល</label>
                            </p>
                        </form>
                        <table class="table table-condensed table-responsive {{$employee->training=='no'?'hide':''}}" id="tblTrainingCourse">
                            <thead>
                                <tr>
                                    <th>ឈ្មោះវគ្គបណ្តុះបណ្តាល&nbsp;&nbsp;<a href="#" class="btn btn-success btn-xs" id="btnAddTraining1">បន្ថែម</a></th>
                                    <th>ទីកន្លែងបណ្តុះបណ្តាល</th>
                                    <th>ឆ្នាំបណ្តុះបណ្តាល</th>
                                    <th>សកម្មភាព</th>
                                </tr>
                            </thead>
                            <tbody id="training_block">
                            @foreach($courses as $training)
                                <tr id="{{$training->id}}">
                                    <td>{{$training->name}}</td>
                                    <td>{{$training->training_place}}</td>
                                    <td>{{$training->training_year}}</td>
                                    <td>
                                        <a href="#" onclick="editTraining(this,event)"><i class="fa fa-pencil text-primary"></i></a>&nbsp;&nbsp;
                                        <a href="#" onclick="delTraining(this,event)"><i class="fa fa-remove text-danger"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">ស្វែងរកក្រុមហ៊ុន ឬសហគ្រាស</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search_name" id="search_name"
                                       placeholder="ឈ្មោះ ឬលេខកូដ">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" id="btnSearch">ស្វែងរក</button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>លេខ ID</th>
                                    <th>លេខកូដ</th>
                                    <th>ឈ្មោះ</th>
                                    <th>ប្រភេទ</th>
                                </tr>
                                </thead>
                                <tbody id="data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" id="btnSelect">ជ្រើសរើស</button>
                    <button type="button" class="btn btn-danger btn-flat" id="btnClose">ចាកចេញ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var asset = "{{asset('document')}}";
        var cur_district = "{{$employee->pob_district}}";
        var cur_commune = "{{$employee->pob_commune}}";
        var cur_village = "{{$employee->pob_village}}";
        var cur_province = "{{$employee->pob_province}}";
        var district = "{{$employee->cur_district}}";
        var commune = "{{$employee->cur_commune}}";
        var village = "{{$employee->cur_village}}";
        var province = "{{$employee->cur_province}}";
    </script>
    <script src="{{asset('js/location2.js')}}"></script>
    <script src="{{asset('js/location3.js')}}"></script>
    <script src="{{asset('js/location4.js')}}"></script>
    <script src="{{asset('js/employee-edit.js')}}"></script>
@endsection
