@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
        <span class="panel-title">
            <strong>មុខងារមីនុយ</strong>

        </span>
        </div>
        <div class="panel-body pn">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><a href="#"><i class="fa fa-plus-circle text-primary" title="បន្ថែមថ្មី"></i></a>&nbsp;&nbsp;ល.រ</th>
                    <th>ឈ្មោះ</th>
                    <th>បញ្ចូល</th>
                    <th>លុប</th>
                    <th>កែ</th>
                    <th>មើល</th>
                    <th>លំដាប់</th>
                    <th>សកម្មភាព</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>អ្នកប្រើប្រាស់</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>
                        <a href="#"><i class="fa fa-trash text-danger" title="លុប"></i></a>
                        &nbsp;&nbsp;
                        <a href="#"><i class="fa fa-edit text-success" title="កែប្រែ"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection