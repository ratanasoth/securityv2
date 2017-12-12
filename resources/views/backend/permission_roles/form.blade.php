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
                {!! Form::open(array('url' => isset($permissionrole->id) ? URL::route('permissionrole.update', $permissionrole->id) : URL::route('permissionrole.store'),'class'=>'form-horizontal','method' =>isset($permissionrole->id )? 'put' : 'post')) !!}

                    {{ csrf_field() }}
                    
                    <input type="hidden" name="prid" value="{{@$_GET['role']}}">

                    <div class="form-group hidden">
                        <label for="role_id" class="col-lg-2 control-label">Role</label>
                        <div class="col-lg-6">
                            <select name="role_id" id="role" class="form-control">
                                <option value=""> -- select role -- </option>
                                @foreach($roles as $row) 
                                <option <?php if(@$_GET['role'] == $row->id) echo 'selected'; ?> value="{{$row->id}}"> {{$row->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                        </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-1 thumbnail">
                        <table class="table table-border">
                            <tbody>
                            <?php

                            if(@$per_role != null && count($per_role) > 0) {
                                foreach ($per_role as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?php 
                                            $i = @$value->insert;
                                            $u = @$value->update;
                                            $d = @$value->delete;
                                            $l = @$value->list;
                                            $e = @$value->execute;
                                        ?>
                                        {{ strtoupper(str_replace('_',' ',$value->name)) }}
                                        <input type="hidden" name="permission_name[]" value="{{$value->name}}">
                                        <input type="hidden" name="permission[]" value="{{$value->permission_id}}">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <label><input type="checkbox" name="insert[{{$value->name}}]" value="1" {{ isset($i)?'checked':'' }} class="minimal"> Insert </label> &nbsp; &nbsp;
                                                <label><input type="checkbox" name="update[{{$value->name}}]" value="1" {{ isset($u)?'checked':'' }} class="minimal"> Update </label> &nbsp; &nbsp;
                                                <label><input type="checkbox" name="delete[{{$value->name}}]" value="1" {{ isset($d)?'checked':'' }} class="minimal"> Delete </label> &nbsp; &nbsp;
                                                <label><input type="checkbox" name="list[{{$value->name}}]" value="1" {{ isset($l)?'checked':''}} class="minimal"> List </label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php  
                                } 
                            } else { 
                                foreach ($permissions as $key => $v) {
                            ?>
                                <tr>
                                    <td>
                                        {{ strtoupper(str_replace('_',' ',$v->name)) }}
                                        <input type="hidden" name="permission_name[]" value="{{$v->name}}">
                                        <input type="hidden" name="permission[]" value="{{$v->id}}">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-lg-8">
                                                <label><input type="checkbox" name="insert[{{$v->name}}]" value="1" class="minimal"> Insert </label> &nbsp; &nbsp;
                                                <label><input type="checkbox" name="update[{{$v->name}}]" value="1" class="minimal"> Update </label> &nbsp; &nbsp;
                                                <label><input type="checkbox" name="delete[{{$v->name}}]" value="1" class="minimal"> Delete </label> &nbsp; &nbsp;
                                                <label><input type="checkbox" name="list[{{$v->name}}]" value="1" class="minimal"> List </label> &nbsp; &nbsp;
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-1">
                            <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                            <a href="{{url('/role')}}" class="btn btn-danger btn-flat">បោះបង់</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection