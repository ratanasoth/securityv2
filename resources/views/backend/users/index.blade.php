@extends('layouts.app')

@section('content')

<div class="panel" id="spy3">
    <div class="panel-heading bg-primary">
        <span class="panel-title">
           <strong>បញ្ជីឈ្មោះអ្នកប្រើប្រាស់</strong>&nbsp;&nbsp;
        </span>
         <a href="{{url('/user/create')}}" class="text-primary"><i class="fa fa-plus" title="បន្ថែមថ្មី"></i> បន្ថែម</a>
    </div>
    <div class="panel-body pn">
        @if(Session::has('sms'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{session('success')}}
            </div>
        @endif
        <table class="table table-hover" id="tblUser">
            <thead>
                <tr>
                    <th>ល.រ</th>
                    <th>នាម គោត្តនាម</th>
                    <th>ឈ្មេាះចូលប្រព័ន្ធ</th>
                    <th>អ៊ីម៉ែល</th>
                    <th>តួនាទី</th>
                    <th>សកម្មភាព</th>
                </tr>
            </thead>
            <tbody>
            @php($i=1)
                @foreach($users as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{$row->username}}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->role_name }}</td>

                        <td>
                            <a title="ប្តូរលេខសម្ងាត់"
                            href="{{ url('/user/change_password/'.$row->id) }}"><span class="fa fa fa-key text-yellow"></span> </a>&nbsp;&nbsp;
                            <a title="កែប្រែ" href="{{ url('/user/'.$row->id.'/edit') }}"><span class="fa fa-edit text-success"></span> </a>&nbsp;&nbsp;
                            <a href="{{url('/user/delete/'.$row->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុមមែនទេ?')"><i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! $users->render() !!}
@endsection