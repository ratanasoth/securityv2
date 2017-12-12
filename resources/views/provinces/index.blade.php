@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីឈ្មោះ ខេត្ត-ក្រុង</strong>

        </span>
        </div>
        <div class="panel-body pn">
            @if(Session::has('sms'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('sms')}}
                </div>
            @endif
            <table class="table table-hover table-bordered" id="tblUser">
                <thead>
                <tr>
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះខេត្ត/ក្រុង</th>
                    <th>សកម្មភាព</th>
                </tr>
                </thead>
                <tbody>
                @foreach($provinces as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        <td>
                            <a href="{{url('/province/edit/'.$pro->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a> &nbsp;&nbsp;
                            <a href="{{url('/province/delete/'.$pro->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection