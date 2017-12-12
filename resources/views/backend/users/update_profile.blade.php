@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading bg-primary">
                <span class="panel-title"><span class="fa fa-edit"></span> {{ $ptitle }}</span>
                <div class="pull-right">
                    <a href="{{url('/user')}}" class="mr20"><span class="fa fa-list" style="color:#fff;"></span></a>
                </div>
            </div>
            <div class="panel-body">
                    {!! Form::open(array('url' => isset($user->id) ? URL::route('user.update', $user->id) : URL::route('user.store'),'class'=>'form-horizontal','method' =>isset($user->id )? 'put' : 'post','enctype'=>'multipart/form-data')) !!}
                    {{ csrf_field() }}
                    
                    @if(isset($user->name))
                        <input type="hidden" name="id" value="{{$user->id}}">
                    @endif

                    <div class="form-group">
                        <label for="name" class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-8">
                            <input type="text" id="name" name="name" class="form-control" value="{{ isset($user->name)?$user->name:old('name') }}" required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_name" class="col-lg-3 control-label">User Name</label>
                        <div class="col-lg-8">
                            <input type="text" id="user_name" name="user_name" class="form-control" value="{{ isset($user->user_name)?$user->user_name:old('user_name') }}" required>
                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="text" id="email" name="email" class="form-control" value="{{ isset($user->email)?$user->email:old('email') }}" required>
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="col-lg-3 control-label">Role</label>
                        <div class="col-lg-8">
                            <input type="text" id="role_name" name="role_name" class="form-control" value="{{ isset($user->user_name)?$user->user_name:old('user_name') }}" required>
                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="school_id" class="col-lg-3 control-label">School</label>
                        <div class="col-lg-8">
                            <select class="form-control" id="school_id" name="school_id">
                                <option value=""> -- Select school -- </option>
                                @foreach($schools as $school)
                                <option value="{{ $school->id }}" <?php if(@$user->school_id == $school->id || $school->id == old('school_id')) echo 'selected'; ?>>{{ $school->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('school_id') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branch_id" class="col-lg-3 control-label">Branche</label>
                        <div class="col-lg-8">
                            <select class="form-control" id="branch_id" name="branch_id">
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}" <?php if(@$user->branch_id == $branch->id || $branch->id == old('branch_id')) echo 'selected'; ?>>{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                        </div>
                    </div>
                    <?php if($action == "create") { ?>
                        <div class="form-group">
                            <label for="password" class="col-lg-3 control-label">New Password</label>
                            <div class="col-lg-8">
                                <input type="password" id="password" name="password" class="form-control" value="{{ isset($user->password)?$user->password:old('password') }}" required>
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-lg-3 control-label">Confirm Password</label>
                            <div class="col-lg-8">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ isset($user->password)?$user->password:old('password') }}" required>
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            </div>
                        </div>
                    <?php } ?>

                   <div class="form-group">
                          <label for="upload_image" class="col-lg-3 control-label">Photo</label>
                          <div class="col-lg-8">
                            <input type="file" name="photo" value="{{ isset($user->photo)?$user->photo:old('photo') }}" id="upload_image">
                          </div>
                    </div> 
                    <div class="form-group"> 
                        <div class="pic-wrapper col-md-8 col-md-offset-3">
                            <div class="horizontal">
                                <div class="vertical">
                                    <img src="{{ url('/api/user_photo/') }}?user_id={{@$user->id}}&width=100&height=100"/>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <a href="{{url('/user')}}" class="btn btn-default"> Cancel </a>
                            <button type="submit" class="btn btn-primary"> Save </button>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>

</div>
<script type="text/javascript">

function sch_select() {
    var school_id = $("#school_id option:selected").val();
    var branch_id = $("#branch_id option:selected").val();
    $.ajax({
        type:'POST',
        url:'/get_branch',
        data:{_token:'<?php echo csrf_token() ?>', school_id:school_id },
        success:function(data){
            $('#branch_id').html(data);
            $('#branch_id option[value="'+branch_id+'"]').prop('selected', true)
        }
    });
}
function update_photo(user_id, photo) {
        $.ajax({
            type: "POST",
            url : "/student/update_photo",
            data:{_token:'<?php echo csrf_token() ?>', id:user_id ,photo:photo },
            success : function(data){
                $('.modal-upload-image').modal('hide');
                location.reload();
            }
        },"html");
    }


$(document).ready(function() {

    sch_select();

    $('#school_id').change(function(){
        var school_id = $(this).val();
        $.ajax({
            type:'POST',
            url:'/get_branch',
            data:{_token:'<?php echo csrf_token() ?>', school_id:school_id },
            success:function(data){
                $('#branch_id').html(data);
            }
        });
    });
});
</script>
@endsection