@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>បង្កើតសហគ្រាសគ្រឹះស្ថានថ្មី</strong>
                </span>
                &nbsp;&nbsp;<a href="{{url('/company')}}" class="text-success"><i class="fa fa-arrow-left"></i> ត្រលប់ក្រោយ</a>
        </div>
        <div class="panel-body">
            <form action="#" class="form-horizontal" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6">
                      <fieldset>
                          <legend>ពត៌មានទូទៅ</legend>
                          <div class="form-group">
                              <label for="code" class="control-label col-sm-3">លេខកូដ</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="code" id="code" required autofocus>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="name" class="control-label col-sm-3">ឈ្មោះគ្រឹះស្ថាន</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="name" id="name" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="allow_no" class="control-label col-sm-3">លេខដីកា</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="allow_no" id="allow_no">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="allow_date" class="control-label col-sm-3">ថ្ងៃខែដីកា</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="allow_date" id="allow_date">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-sm-3">ច្បាប់អនុញ្ញាត</label>
                              <div class="col-sm-9">
                                  <select name="isallowed" id="isallowed" class="form-control">
                                      <option value="yes">មានច្បាប់</option>
                                      <option value="no">គ្មានច្បាប់</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="photo" class="control-label col-sm-3">និមិត្តសញ្ញា</label>
                              <div class="col-sm-9">
                                  <input type="file" class="form-control" name="photo" id="photo" onchange="loadFile(event)">
                                  <br>
                                  <img src="" alt="" id="preview">
                              </div>

                          </div>
                      </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>អាស័យដ្ឋាន</legend>
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-3">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-9">
                                    <select name="province" id="province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="control-label col-sm-3">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-9">
                                    <select name="district" id="district" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="commune" class="control-label col-sm-3">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-9">
                                    <select name="commune" id="commune" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="village" class="control-label col-sm-3">ភូមិ</label>
                                <div class="col-sm-9">
                                    <select name="village" id="village" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="street_no" class="control-label col-sm-3">ផ្លូវ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="street_no" name="street_no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="home_no" class="control-label col-sm-3">ផ្ទះលេខ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="home_no" name="home_no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other" class="control-label col-sm-3">ផ្សេងៗ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="other" id="other">
                                </div>
                            </div>
                        </fieldset>
                        <div class="holder">
                            <button class="btn btn-primary btn-flat" type="button" onclick="save()">រក្សាទុក</button>
                            <a href="{{url('/company')}}" class="btn btn-danger btn-flat">បោះបង់</a>
                            <div id="sms">

                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('js/company.js')}}"></script>
@endsection