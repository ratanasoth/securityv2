@extends('layouts.app')

@section('content')

<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title"><span class="fa fa-table"></span> {{ $ptitle }}</span>
    </div>
    <div class="panel-body pn">

        <form method="get">
            <div class="col-md-6">
                <label for="datepicker" class="col-md-3 control-label"> Select Date  </label>
                <div class="form-group">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="date" value="<?php if(@$_GET['date']) echo $_GET['date']; else echo date('d/m/Y');  ?>" class="form-control pull-right reservation" id="datepicker">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <button class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>
        </form>

        <table class="table table-hover tablesorter" id="tblUserLog">
            <thead>
                <tr>
                    <th style="width: 60px;">&numero;</th>
                    <th>Time</th>
                    <th>User </th>
                    <th>Branch </th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $pagex = @$_GET['page'];
              if(!$pagex)
                  $pagex = 1;
              $i = 10 * ($pagex - 1) + 1;
            ?>
                @foreach($logs as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ date('d/m/Y',strtotime($row->time)) }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->branch_name }}</td>
                        <td>{{ $row->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $logs->links() }}
<script src="{{asset('tablesorter/jquery.tablesorter.min.js')}}"></script>
<script>
    $(function () {
        // make table sortable
        $("#tblUserLog").tablesorter();
    });
</script>
@endsection