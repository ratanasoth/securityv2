@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>គ្រប់គ្រងសិទ្ធ</strong>
                </span>
            </div>
            <div class="panel-body">
                    {!! Form::open(array('url' => isset($permission->id) ? URL::route('permission.update', $permission->id) : URL::route('permission.store'),'class'=>'form-horizontal','method' =>isset($permission->id )? 'put' : 'post')) !!}
                    {{ csrf_field() }}
                    
                    @if(isset($permission->name))
                        <input type="hidden" name="id" value="{{$permission->id}}">
                    @endif

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-8">
                            <input type="text" id="name" name="name" class="form-control" value="{{ isset($permission->name)?$permission->name:old('name') }}" required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <!-- checkbox -->
                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-3">
                            <label><input type="checkbox" name="insert" value="1" {{ isset($permission->insert)?'checked':'' }} class="minimal"> Insert </label> &nbsp; &nbsp;
                            <label><input type="checkbox" name="update" value="1" {{ isset($permission->update)?'checked':'' }} class="minimal"> Update </label> &nbsp; &nbsp;
                            <label><input type="checkbox" name="delete" value="1" {{ isset($permission->delete)?'checked':'' }} class="minimal"> Delete </label> &nbsp; &nbsp;
                            <label><input type="checkbox" name="list" value="1" {{ isset($permission->list)?'checked':''}} class="minimal"> List </label> &nbsp; &nbsp;
                            <label><input type="checkbox" name="execute" value="1" {{ isset($permission->execute)?'checked':'' }} class="minimal"> execute </label> &nbsp; &nbsp;
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <a href="{{url('/permission')}}" class="btn btn-default"> Cancel </a>
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>

</div>
<!-- iCheck 1.0.1 -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
            //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
    });
</script>
@endsection