@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>បង្កើតភូមិ</strong>
                </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        @if(Session::has('sms'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('sms')}}
                            </div>
                        @endif
                        <form action="{{url('/village/save')}}" class="form-horizontal" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-8">
                                    <select name="province" id="province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="control-label col-sm-4">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-8">
                                    <select name="district" id="district" class="form-control">
                                        @foreach($districts as $dis)
                                            <option value="{{$dis->id}}">{{$dis->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="communes" class="control-label col-sm-4">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-8">
                                    <select name="commune" id="commune" class="form-control">
                                        @foreach($communes as $com)
                                            <option value="{{$com->id}}">{{$com->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-sm-4">ឈ្មោះ ភូមិ</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" autofocus required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">&nbsp;</label>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                    <a href="{{url('/village')}}" class="btn btn-danger btn-flat">បោះបង់</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{asset('js/add_village.js')}}"></script>
@endsection