@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                <span class="panel-title">
                    <strong>កែប្រែអ្នកប្រើប្រាស់</strong>
                </span>
                &nbsp;&nbsp;
                <a href="{{url('/user')}}" class="text-success"><i class="fa fa-arrow-left" title="ត្រលប់ក្រោយ"></i> ត្រលប់ក្រោយ</a>
                &nbsp;&nbsp;
                <a href="{{url('/user/create')}}" class="text-primary"><i class="fa fa-plus" title="បន្ថែមថ្មី"></i> បន្ថែម</a>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="{{url('/user/update')}}" method="post" enctype="multipart/form-data" class="form-horizontal" >
                                {{ csrf_field() }}
                                @if(isset($user->name))
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                @endif

                                <div class="form-group">
                                    <label for="name" class="col-lg-3 control-label">ឈ្មោះ</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" required>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-lg-3 control-label">អ៊ីម៉ែល</label>
                                    <div class="col-lg-8">
                                        <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control"  required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role_id" class="col-lg-3 control-label">តួនាទី</label>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="role_id">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" <?php if(@$user->role_id == $role->id) echo 'selected'; ?>>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
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
                                                <img src="{{asset('photo/'.$user->photo)}}" id="img" width=120"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-flat" onclick="return confirm('តើលោកអ្នកពិតជាចង់កែប្រែមែនទេ?')">រក្សាទុក</button>
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