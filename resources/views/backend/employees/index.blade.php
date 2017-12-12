@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីបុគ្គលិក <a href="{{url('/employee/create')}}">បន្ថែមថ្មី</a></strong>
        </span>
        </div>
        <div class="panel-body">
            <form action="{{url('/employee/search')}}" class="form-horizontal" method="get">
                <div class="row">
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
                    <th>ឈ្មោះខ្មែរ</th>
                    <th>ឈ្មោះអង់គ្លេស</th>
                    <th>ភេទ</th>
                    <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                    <th>លេខទូរស័ព្ទ</th>
                    <th>ក្រុមហ៊ុន</th>
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
                @foreach($employees as $emp)
                    <tr>
                        <td>{{App\Models\Utility::toKh($i++)}}</td>
                        <td>{{$emp->code}}</td>
                        <td><a href="{{url('/employee/detail/'.$emp->id)}}">{{$emp->khmer_name}}</a></td>
                        <td>{{$emp->english_name}}</td>
                        <td>{{$emp->gender}}</td>
                        <td>{{$emp->dob}}</td>
                        <td>{{$emp->phone1}}</td>
                        <td>{{$emp->company_name}}</td>
                        <td>
                            <a href="{{url('/employee/delete/'.$emp->id.'?page='.@$_GET['page'])}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$employees->appends(request()->input())->links()}}
        </div>
    </div>
@endsection
