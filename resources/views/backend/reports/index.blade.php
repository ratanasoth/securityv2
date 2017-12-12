@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>របាយការណ៍ប្រចាំខែ</strong>
        </span>
        </div>
        <div class="panel-body pn">
            <div class="row">
                <div class="col-sm-5">
                    <fieldset>
                        <legend>មើលតាមខែ</legend>
                        <form action="{{url('/report/monthly')}}" class="form-horizontal" method="get" target="_blank">
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-2">ខេត្ត:</label>
                                <div class="col-sm-8">
                                    <select name="province" id="province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="monthyear" class="control-label col-sm-2">ខែឆ្នាំ:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="monthyear" id="monthyear" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-sm-2">&nbsp;</label>
                                <div class="col-sm-8">
                                    <input type="submit" class="btn btn-primary btn-flat" value="បោពុម្ព">
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
                <div class="col-sm-5">
                    <fieldset>
                        <legend>មើលច្រើនខែ</legend>
                        <form action="{{url('/report/all')}}" class="form-horizontal" method="get" target="_blank">
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-2">ខេត្ត:</label>
                                <div class="col-sm-8">
                                    <select name="province" id="province" class="form-control">
                                        @foreach($provinces as $pro)
                                            <option value="{{$pro->id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="from_date" class="control-label col-sm-2">ចាប់ពី:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="from_date" id="from_date" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="to_date" class="control-label col-sm-2">ដល់:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="to_date" id="to_date" class="form-control datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-sm-2">&nbsp;</label>
                                <div class="col-sm-8">
                                    <input type="submit" class="btn btn-primary btn-flat" value="បោពុម្ព">
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('plugins/datepicker/locales/bootstrap-datepicker.kh.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                setDate: 'now',
                autoclose: true,
                todayHighlight :true,
                language: 'kh'
            });
            if($("#monthyear").val()=="")
            {
                $("#monthyear").val(dd);
            }
            if($("#from_date").val()==""||$("#to_date").val()=="")
            {
                $("#from_date").val(dd);
                $("#to_date").val(dd);
            }
        });


    </script>
@endsection