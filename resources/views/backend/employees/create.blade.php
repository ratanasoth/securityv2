@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>បញ្ចូលបុគ្គលិកថ្មី</strong>
                </span>
        </div>
        <div class="panel-body">
            <form action="{{url('/employee/save')}}" class="form-horizontal" method="post" enctype="multipart/form-data" name="frm">
                {{csrf_field()}}
                <input type="hidden" name="con" id="con" value="{{$con}}">
                <div class="row">
                    @if(Session::has('sms'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{session('sms')}}
                        </div>
                    @endif
                    <div class="col-sm-4">
                        <fieldset>
                            <legend>ពត៌មានទូទៅ</legend>
                            <div class="form-group">
                                <label for="code" class="control-label col-sm-4">លេខកូដ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="code" id="code" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="khmer_name" class="control-label col-sm-4">ឈ្មោះខ្មែរ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="khmer_name" id="khmer_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="english_name" class="control-label col-sm-4">ឈ្មោះឡាតាំង</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="english_name" id="english_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender" class="control-label col-sm-4">ភេទ</label>
                                <div class="col-sm-8">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="Male">ប្រុស</option>
                                        <option value="Female">ស្រី</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="control-label col-sm-4">ថ្ងៃខែឆ្នាំកំណើត</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="dob" id="dob" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone1" class="control-label col-sm-4">លេខទូរស័ព្ទ១</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phone1" id="phone1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone2" class="control-label col-sm-4">លេខទូរស័ព្ទ២</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="phone2" id="phone2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_name" class="control-label col-sm-4">ឈ្មោះក្រុមហ៊ុន</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="hidden" name="company_id" id="company_id">
                                        <input type="text" class="form-control" name="company_name" id="company_name" readonly>
                                        <span class="input-group-btn">
                                                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal">ជ្រើសរើស</button>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="agency" class="control-label col-sm-4">ជាភ្នាក់ងារពត៌មាន</label>
                                <div class="col-sm-8">
                                    <select name="agency" id="agency" class="form-control">
                                        <option value="no">មិនមែន</option>
                                        <option value="yes">មែន</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <div class="holder">

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <fieldset>
                            <legend>ទីកន្លែងកំណើត</legend>
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-8">
                                    <select name="province" id="province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->name}}" id="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="control-label col-sm-4">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-8">
                                    <select name="district" id="district" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="commune" class="control-label col-sm-4">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-8">
                                    <select name="commune" id="commune" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="village" class="control-label col-sm-4">ភូមិ</label>
                                <div class="col-sm-8">
                                    <select name="village" id="village" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="group" class="control-label col-sm-4">ក្រុម</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="group" id="group">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="street" class="control-label col-sm-4">ផ្លូវ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="street" id="street">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="home" class="control-label col-sm-4">ផ្ទះលេខ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="home" id="home">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-4">
                        <fieldset>
                            <legend>ទីលំនៅបច្ចុប្បន្ន</legend>
                            <div class="form-group">
                                <label for="current_province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-8">
                                    <select name="current_province" id="current_province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->name}}" id="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_district" class="control-label col-sm-4">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-8">
                                    <select name="current_district" id="current_district" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_commune" class="control-label col-sm-4">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-8">
                                    <select name="current_commune" id="current_commune" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_village" class="control-label col-sm-4">ភូមិ</label>
                                <div class="col-sm-8">
                                    <select name="current_village" id="current_village" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_group" class="control-label col-sm-4">ក្រុម</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_group" id="current_group">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_street" class="control-label col-sm-4">ផ្លូវ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_street" id="current_street">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current_home" class="control-label col-sm-4">ផ្ទះលេខ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_home" id="current_home">
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>រូបថត</legend>
                            <div class="form-group">
                                <label for="photo" class="control-label col-sm-3">ជ្រើសរើសរូប</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" name="photo" id="photo" onchange="loadFile(event)">
                                </div>
                                <img src="" alt="preview" id="preview">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>សកម្មភាព</legend>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-1">&nbsp;</label>
                                        <div class="col-sm-11">
                                            <button class="btn btn-primary btn-flat" type="submit">រក្សាទុក</button>
                                            <button class="btn btn-success btn-flat" type="button" id="btnCon" onclick="conx()">រក្សាទុក & បន្ត</button>
                                            <a href="{{url('/employee')}}" class="btn btn-danger btn-flat">បោះបង់</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset>
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
    <script src="{{asset('js/employee.js')}}"></script>
    <script src="{{asset('js/location.js')}}"></script>
    <script src="{{asset('js/location1.js')}}"></script>
@endsection
