@extends('layouts.app')

@section('content')
<style type="text/css">
    .table>thead>tr>th {
    border-bottom: 2px solid #f4f4f4;
    padding: 0;
}
</style>
<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title">
            <span class="fa fa-table"></span> {{ $ptitle }}</span>
        <div class="pull-right">
            <a href="{{url('/permissionrole/create?role='.Request::segment(3))}}" class="mr20">
                <span class="fa fa-plus" style="color:#fff;"></span>
            </a>
        </div>
    </div>
    <div class="panel-body pn">
        @if(Session::get('message_success'))
            <div class="alert alert-success">
              <i class="fa fa-user" aria-hidden="true"></i>
                {{ Session::get('message_success') }}
            </div>
        @endif
        @if(Session::get('user_success_update'))
            <div class="alert alert-success">
             <i class="fa fa-wrench" aria-hidden="true"></i>
             {{ Session::get('user_success_update') }}
            </div>
        @endif
        @if(Session::get('user_had_delete'))
            <div class="alert alert-success">
              <i class="fa fa-trash" aria-hidden="true"></i>
             {{ Session::get('user_had_delete') }}
            </div>
        @endif
        <table class="table table-hover table-responsive permiss">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Permission Name</th>
                    <th>Role</th>
                    <th>Insert</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>List</th>
                    <th>Execute</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
              $pagex = @$_GET['page'];
              if(!$pagex)
                  $pagex = 1;
              $i = 10 * ($pagex - 1) + 1;
            ?>
                @foreach($permissionroles as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->role }}</td>
                        <td>{{ isset($row->insert)?'Yes':'No' }}</td>
                        <td>{{ isset($row->update)?'Yes':'No' }}</td>
                        <td>{{ isset($row->delete)?'Yes':'No' }}</td>
                        <td>{{ isset($row->list)?'Yes':'No' }}</td>
                        <td>{{ isset($row->execute)?'Yes':'No' }}</td>
                        <td>
                            <a class="detele_comfirm" href="javascript:void(0)" title="Are you sure want to delete ?"  data-href="{{ url('/permissionrole/'.$row->id.'/destroy') }}"><span class="fa fa-trash"></span> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{$permissionroles->links()}}
@endsection