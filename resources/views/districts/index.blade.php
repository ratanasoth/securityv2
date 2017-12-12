@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីឈ្មោះ ស្រុក-ខណ្ឌ</strong>
        </span>
        </div>
        <div class="panel-body pn">
            @if(Session::has('sms'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('sms')}}
                </div>
            @endif
            <form action="{{url('/district/search')}}" class="form-horizontal" method="get">
                <div class="row">
                    <div class="col-sm-3 bl">
                        <div class="input-group">
                            <span class="input-group-addon" id="province_id">ខេត្ត/ក្រុង</span>
                            <select name="province_id" id="province_id" class="form-control">
                                <option value="all">មើលទាំងអស់</option>
                                @foreach($provinces as $pro)
                                    <option value="{{$pro->id}}" {{$pro->id==$def_province_id?"selected":""}}>{{$pro->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-flat" type="submit">ស្វែងរក</button>
                    </div>
                </div>
            </form><br>
            <table class="table table-hover table-bordered" id="tblUser">
                <thead>
                <tr>
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះស្រុក/ខណ្ឌ</th>
                    <th> ឈ្មោះខេត្ត/ក្រុង</th>
                    <th>សកម្មភាព</th>
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $dis)
                          <tr>
                        <td>{{$dis->id}}</td>
                        <td>{{$dis->name}}</td>
                        <td>{{$dis->province_name}}</td>
                        <td>
                            <a href="{{url('/district/edit/'.$dis->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/district/delete/'.$dis->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $districts->appends(Input::except('page'))->links() !!}
        </div>
    </div> 
@endsection