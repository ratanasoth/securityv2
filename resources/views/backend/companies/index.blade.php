@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីសហគ្រាសគ្រឹះស្ថាន</strong>
        </span>&nbsp;&nbsp;<a href="{{url('/company/create')}}"><i class="fa fa-plus"></i> បង្កើតថ្មី</a>
        </div>
        <div class="panel-body">
            <form action="{{url('/company/search')}}" class="form-horizontal" method="get">
            <div class="row">

                <div class="col-sm-3 bl">
                    <div class="input-group">
                        <span class="input-group-addon" for="province_id">ខេត្ត/ក្រុង</span>
                        <select name="id" id="province_id" class="form-control">
                            <option value="all">មើលទាំងអស់</option>
                            @foreach($provinces as $pro)
                                <option value="{{$pro->id}}" {{$pro->id==$def_province_id?"selected":""}}>{{$pro->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-sm-3 bl">
                    <div class="input-group">
                        <span class="input-group-addon" for="from_date">ឈ្មោះ</span>
                        <input type="text" class="form-control d1" id="name" name="name" value="{{$name}}">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <button class="btn btn-primary btn-flat" type="submit">ស្វែងរក</button>
                    </div>
                </div>
            </div>
            </form>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>លេខកូដ</th>
                    <th>ឈ្មោះគ្រឹះស្ថាន</th>
                    <th>ភូមិ</th>
                    <th>ឃុំ/សង្កាត់</th>
                    <th>ក្រុង/ស្រុក</th>
                    <th>ខេត្ត</th>
                    <th>លេខដីកា</th>
                    <th>ថ្ងៃខែអនុញ្ញាត</th>
                    <th>ច្បាប់អនុញ្ញាត</th>
                    <th>ផ្សេងៗ</th>
                    <th>សកម្មភាព</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $pagex = @$_GET['page'];
                if(!$pagex)
                $pagex = 1;
                $i = 12 * ($pagex - 1) + 1;
                ?>
                @foreach($companies as $com)
                    <tr>
                        <td>{{App\Models\Utility::toKh($i++)}}</td>
                        <td>{{$com->code}}</td>
                        <td><a href="{{url('/company/detail/'.$com->id)}}">{{$com->name}}</a></td>
                        <td>{{$com->village_name}}</td>
                        <td>{{$com->commune_name}}</td>
                        <td>{{$com->district_name}}</td>
                        <td>{{$com->province_name}}</td>
                        <td>{{$com->allow_no}}</td>
                        <td>{{$com->allow_date}}</td>
                        <td>{{$com->isallowed=="no"?"គ្មានច្បាប់":"មានច្បាប់"}}</td>
                        <td>{{$com->other}}</td>
                        <td>
                            <a href="{{url('/company/edit/'.$com->id)}}" title="កែប្រែ"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                            <a href="{{url('/company/delete/'.$com->id.'?page='.@$_GET['page'])}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$companies->appends(request()->input())->links()}}
        </div>
    </div>
@endsection