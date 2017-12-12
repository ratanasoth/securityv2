@extends('layouts.app')

@section('content')

<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title">
                    <strong>តួនាទី និងសិទ្ធិ</strong>
        </span>
        &nbsp;&nbsp;
        <a href="{{url('/role/create')}}" class="text-primary"><i class="fa fa-plus" title="បន្ថែមថ្មី"></i> បន្ថែម</a>

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
        <table class="table table-hover tablesorter" id="tblRole">
            <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>តួនាទី</th>
                    <th>សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
            <?php
              $pagex = @$_GET['page'];
              if(!$pagex)
                  $pagex = 1;
              $i = 10 * ($pagex - 1) + 1;
            ?>
                @foreach($roles as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>
                            <a title="Permission" href="{{ url('/permissionrole/create?role='.$row->id) }}" data-title="ប្តូរសិទ្ធ">
                                <span class="fa fa-key text-primary"></span> </a>  &nbsp;
                            <a href="{{ url('/role/'.$row->id.'/edit') }}" title="កែប្រែ"><span class="fa fa-edit text-success"></span> </a>  &nbsp;
                            <a href="{{url('/role/delete/'.$row->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')">
                                <span class="fa fa-trash text-danger"></span> </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $roles->render() !!}
</div>
@endsection