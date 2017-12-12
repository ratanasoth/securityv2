<form action="{{ isset($logs->id)?url('student/update_log'):url('student/save_log')}}" method="post" class="form-horizontal"> 

    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{@$logs->id}}">

    <input type="hidden" name="student_id" value="{{$student_id}}">

    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Description</label>
        <div class="col-sm-8">
            <textarea class="form-control" rows="3" id="description" name="description">{{ isset($logs->description)?$logs->description:old('description') }}</textarea>
             <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="width:90px;
        margin-left: 347px;"> Cancel </button>&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary" style="width:90px; float: right;
        margin-right: 66px;"> Save </button>
    </div>
</form>
