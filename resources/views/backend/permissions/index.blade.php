@extends('layouts.app')

@section('content')

<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title">
            <span class="fa fa-table"></span> {{ $ptitle }}</span>
        <div class="pull-right">
            <a href="{{url('/permission/create')}}" class="mr20"><span class="fa fa-plus" style="color:#fff;"></span></a>
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
        <table class="table table-hover" id="tblPermission">
            <thead>
                <tr>
                    <th>&numero;</th>
                    <th>Name</th>
                    <th>Insert</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>List</th>
                    <th>execute</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $pagex = @$_GET['page'];
              if(!$pagex)
                  $pagex = 1;
              $i = 10 * ($pagex - 1) + 1;
            ?>
                @foreach($permissions as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ isset($row->insert)?'Yes':'No' }}</td>
                        <td>{{ isset($row->update)?'Yes':'No' }}</td>
                        <td>{{ isset($row->delete)?'Yes':'No' }}</td>
                        <td>{{ isset($row->list)?'Yes':'No' }}</td>
                        <td>{{ isset($row->execute)?'Yes':'No' }}</td>
                        <td>
                            <a href="{{ url('/permission/'.$row->id.'/edit') }}"><span class="fa fa-pencil"></span> </a> | 
                            <a onclick="return confirm('Are you sure want to delete this ?');" href="{{ url('/permission/'.$row->id.'/destroy') }}"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{$permissions->links()}}
@endsection