@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading bg-primary">
                <span class="panel-title">
                    <strong>បន្ថែអ្នកប្រើប្រាស់</strong>
                </span>
                &nbsp;&nbsp;
                <a href="{{url('/user')}}" class="text-success"><i class="fa fa-arrow-left" title="ត្រលប់ក្រោយ"></i> ត្រលប់ក្រោយ</a>

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
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('error')}}
                            </div>
                        @endif
                        <form action="{{url('/user/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-lg-3 control-label">នាម គោត្តនាម</label>
                            <div class="col-lg-8">
                                <input type="text" id="name" name="name" class="form-control" required>

                            </div>
                        </div>
                         <div class="form-group">
                            <label for="username" class="col-lg-3 control-label">ឈ្មេាះចូលប្រព័ន្ធ</label>
                            <div class="col-lg-8">
                                <input type="text" id="username" name="username" class="form-control" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">អ៊ីម៉ែល</label>
                            <div class="col-lg-8">
                                <input type="text" id="email" name="email" class="form-control"  required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="col-lg-3 control-label">តួនាទី</label>
                            <div class="col-lg-8">
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-3 control-label">លេខសម្ងាត់ថ្មី</label>
                            <div class="col-lg-8">
                                <input type="password" id="password" name="password" class="form-control"  required>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-lg-3 control-label">បញ្ជាក់លេខសម្ងាត់</label>
                            <div class="col-lg-8">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"  required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="upload_image" class="col-lg-3 control-label">រូបថត</label>
                            <div class="col-lg-8">
                                <input type="file" name="photo" id="upload_image" accept="image/*" onchange="loadFile(event)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="pic-wrapper col-md-8 col-md-offset-3">
                                <div class="horizontal">
                                    <div class="vertical">
                                        <img src="{{asset('photo/default.png')}}" id="img"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                <button type="reset" class="btn btn-danger btn-flat">បោះបង់</button>
                            </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 170;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection