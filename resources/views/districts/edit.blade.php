@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>កែប្រែខេត្តក្រុង</strong>
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
                            <form action="{{url('/district/update')}}" class="form-horizontal" method="post" onsubmit="save()">
                                {{ csrf_field() }}
                                <input type="hidden" id="province_name" name="province_name">
                                <input type="hidden" name="id" value="{{$districts->id}}">
                                <div class="form-group">
                                    <label for="province" class="control-label col-sm-4">ខេត្ត/ក្រុង</label>
                                    <div class="col-sm-8">
                                        <select name="province" id="province" class="form-control">
                                            @foreach($provinces as $pro)
                                                <option value="{{$pro->id}}" @if($pro->id==$districts->province_id) selected='selected' @endif 
                                                >{{$pro->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label col-sm-4">ឈ្មោះស្រុក/ខណ្ឌ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" 
                                        value="{{$districts->name}}" id="name" autofocus required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4">&nbsp;</label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-flat">រក្សាទុក</button>
                                        <a href="{{url('/district')}}" class="btn btn-danger btn-flat">បោះបង់</a>
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
    <script>
        function save() {
            $("#province_name").val($("#province :selected").text());
        }
    </script>
@endsection