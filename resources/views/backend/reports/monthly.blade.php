<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>របាយការប្រចាំខែ</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/report.css')}}">
</head>
<body>
<div class="container">
    <table style="width: 100%; border-spacing: 0;">
        <tr>
            <td style="width:30%;text-align: center; line-height: 27px;" class="khmoul">
                ក្រសួងមហាផ្ទៃ <br>
                អគ្គស្នងការដ្ឋាននគរបាលជាតិ <br>
                នាយកដ្ឋានកណ្តាលសន្តិសុខ <br>
                ន/.យ គ្រប់គ្រងសន្តិសុខឯកជន
            </td>
            <td style="width:40%"></td>
            <td style="width:30%;text-align: center;" class="khmoul">
                ព្រះរាជាណាចក្រកម្ពុជា <br/><br>
                ជាតិ&nbsp;&nbsp;សាសនា&nbsp;&nbsp;ព្រះមហាក្សត្រ <br><br>
                <img src="{{asset('img/bar.jpg')}}" width="120">
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-sm-12">
            <h4 class="text-center khmoul">តារាងគ្រិះស្ថានសន្តិសុខឯកជន</h4>
            <h4 class="text-center khmoul">ដែលបង្កើត និងប្រើប្រាស់កម្លាំងសន្តិសុខផ្ទាល់ខ្លូន</h4>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>
                <a href="{{url('/company/create')}}"><i class="fa fa-plus-circle text-primary" title="បន្ថែមថ្មី"></i></a>&nbsp;&nbsp;ល.រ
            </th>
            <th>ឈ្មោះគ្រិះស្ថាន</th>
            <th>ភូមិ</th>
            <th>ឃុំ/សង្កាត់</th>
            <th>ក្រុង/ស្រុក</th>
            <th>ខេត្ត</th>
            <th>លេខ</th>
            <th>ថ្ងៃខែឆ្នាំ</th>
            <th>ប្រុស</th>
            <th>ស្រី</th>
            <th>សរុប</th>
            <th>ផ្សេងៗ</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=1;
        ?>
        @foreach($companies as $com)
            <tr>
                <td>{{App\Models\Utility::toKh($i++)}}</td>
                <td>{{$com->name}}</td>
                <td>{{$com->village_name}}</td>
                <td>{{$com->commune_name}}</td>
                <td>{{$com->district_name}}</td>
                <td>{{$com->province_name}}</td>
                <td>{{$com->allow_no}}</td>
                <td>{{$com->allow_date}}</td>
                <td>{{App\Models\Utility::toKh($com->male)}}</td>
                <td>{{App\Models\Utility::toKh($com->female)}}</td>
                <td>{{App\Models\Utility::toKh($com->male + $com->female)}}</td>
                <td>{{$com->other}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>