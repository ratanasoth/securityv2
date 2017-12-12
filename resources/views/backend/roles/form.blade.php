@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-md-12">

        <div class="panel">
            <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>តួនាទី និងសិទ្ធ</strong>
                </span>
                &nbsp;&nbsp;
                <a href="{{url('/role')}}" class="text-success"><i class="fa fa-arrow-left" title="ត្រលប់ក្រោយ"></i> ត្រលប់ក្រោយ</a>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::open(array('url' => isset($role->id) ? URL::route('role.update', $role->id) : URL::route('role.store'),'class'=>'form-horizontal', 'method' => isset($role->id) ? 'put' : 'post')) !!}
                        {{ csrf_field() }}

                        @if(isset($role->name))
                            <input type="hidden" name="id" value="{{$role->id}}">
                        @endif
                        <div class="form-group">
                            <label for="name" class="col-lg-2 control-label">ឈ្មោះ</label>
                            <div class="col-lg-10">
                                <input type="text" id="name" name="name" class="form-control" value="{{ isset($role->name)?$role->name:old('name') }}" required>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                <span class="text-danger">{{ $errors->first('message_error') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                <button type="reset" class="btn btn-danger btn-flat">បោះបង់</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
@endsection