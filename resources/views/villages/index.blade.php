@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីឈ្មោះ ភូមិ</strong>
        </span>
        </div>
        <div class="panel-body pn">
            @if(Session::has('sms'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('sms')}}
                </div>
            @endif
            <form action="{{url('/village/search')}}" class="form-horizontal" method="get">
                {{csrf_field()}}
                 <div class="row">
                    <div class="col-sm-3 bl">
                        <div class="input-group">
                            <span class="input-group-addon" id="province_id">ខេត្ត/ក្រុង</span>
                            <select name="province_id" id="province" class="form-control" onchange="getDistrict()">
                                <option value="all">មើលទាំងអស់</option>
                                @foreach($provinces as $pro)
                                    <option value="{{$pro->id}}" {{$pro->id==$def_province_id?"selected":""}}>{{$pro->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 bl">
                        <div class="input-group">
                            <span  class="input-group-addon" id="l_commune">ស្រុក/ខណ្ឌ</span>
                            <select name="district" id="district" class="form-control" onchange="getCommune()" >
                                <option value="all">មើលទាំងអស់</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 bl">
                        <div class="input-group">
                            <span  class="input-group-addon" id="l_commune">ឃុំ/សង្កាត់</span>
                            <select name="commune" id="commune" class="form-control">
                                <option value="all">              មើលទាំងអស់
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary btn-flat" type="submit">ស្វែងរក</button>
                    </div>
                </div><br>
            </form>
            <table class="table table-hover table-bordered" id="tblUser">
                <thead>
                <tr>
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះភូមិ</th>
                    <th>ឈ្មោះឃុំ/សង្កាត់</th>
                    <th>ឈ្មោះខេត្ត/ក្រុង</th>
                    <th>ឈ្មោះ ស្រុក/ខណ្ឌ</th>
                    <th>សកម្មភាព</th>
                </tr>
                </thead>
                <tbody>
                @foreach($villages as $vil)
                    <tr>
                        <td>{{$vil->id}}</td>
                        <td>{{$vil->name}}</td>
                        <td>{{$vil->commune_name}}</td>
                        <td>{{$vil->district_name}}</td>
                        <td>{{$vil->province_name}}</td>
                        <td>
                            <a href="{{url('/village/edit/'.$vil->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/village/delete/'.$vil->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $villages->appends(Input::except('page'))->links() !!}
        </div>
    </div> 
    <script>
        var def_district_id = "{{@$def_district_id}}";
        var def_commune_id = "{{@$def_commune_id}}";
        
    </script>
@endsection
@section('js')
    <script src="{{asset('js/search_village.js')}}"></script>
@endsection