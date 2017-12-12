@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading bg-primary">
                <span class="panel-title">
                    <strong>ប្តូរលេខសម្ងាត់</strong>
                </span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('success')}}
                            </div>
                        @endif
                        <form class='form-horizontal' action="{{url('user/save_pass')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="huid" value="{{Request::segment(3)}}">
                            <div class="form-group">
                                <label for="password" class="col-lg-3 control-label">លេខសម្ងាត់ថ្មី</label>
                                <div class="col-lg-8">
                                    <input type="password" id="password" name="password" class="form-control" value="{{ isset($user->password)?$user->password:old('password') }}" required>
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-lg-3 control-label">បញ្ជាក់លេខសម្ងាត់</label>
                                <div class="col-lg-8">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ isset($user->password_confirmation)?$user->password_confirmation:old('password_confirmation') }}" required>
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary btn-flat" onclick="return confirm('តើលោកអ្នកពិតជាចង់កែប្រែលេខសម្ងាត់មែនទេ?')"> រក្សាទុក </button>
                                    <a href="{{ url('/user') }}" class="btn btn-danger btn-flat"> បោះបង់ </a>
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