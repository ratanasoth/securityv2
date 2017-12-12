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
    <style>
        .tbl tr td
        {
            padding: 4px 4px;
        }
        .tbl1{
            width: 100%;
            border-spacing: 0;
        }
        .tbl1 thead tr th{
            padding : 8px 4px;
            border-bottom: 1px solid #ccc;
        }
        .tbl1 tbody tr td{
            padding: 7px 4px;
            border-bottom: 1px solid #ccc;
        }
        .tbl1 tbody tr:last-child td
        {
            border: none;
        }
    </style>
</head>
<body>
<div class="container">
    <table style="width: 100%; border-spacing: 0;">
        <tr>
            <td style="width:30%;text-align: center; line-height: 27px;" class="khmoul">
                ក្រសួងមហាផ្ទៃ <br>
                អគ្គស្នងការដ្ឋាននគរបាលជាតិ <br>
                នាយកដ្ឋានកណ្តាលសន្តិសុខ <br>
                នាយកដ្ឋានគ្រប់គ្រងសន្តិសុខឯកជន
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
            <h4 class="text-center khmoul">ពត៌មានលម្អិតរបស់</h4>
            <h4 class="text-center khmoul">គ្រឹះស្ថានសន្តិសុខឯកជន ឬសហគ្រាស</h4>
        </div>

    </div>
    <hr>
    <table style="width: 100%; border-spacing: 0">
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <fieldset>
                    <legend>ពត៌មានទូទៅ</legend>
                    <table style="width: 100%;border-spacing: 0;" class="tbl">
                        <tr>
                            <td style="width: 120px"><br>លេខកូដ</td>
                            <td style="width: 4px"><br>:</td>
                            <td><br><strong>{{$company->code}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ឈ្មោះ</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->name}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ច្បាប់អនុញ្ញាត</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->isallowed=='yes'?'មានច្បាប់':'គ្មានច្បាប់'}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">លេខដីកា</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->allow_no}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ថ្ងៃខែដីកា</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->allow_date}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ប្រភេទក្រុមហ៊ុន</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->type=='company'?'គ្រឹះស្ថានសន្តិសុខ':'សហគ្រាស'}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </table>
                </fieldset>
            </td>
            <td style="width: 50%; vertical-align: top;">
                <fieldset>
                    <legend>អាស័យដ្ឋាន</legend>
                    <table style="width: 100%;border-spacing: 0;" class="tbl">
                        <tr>
                            <td style="width: 120px"><br>ខេត្ត-ក្រុង</td>
                            <td style="width: 4px"><br>:</td>
                            <td><br><strong>{{$company->province_name}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ស្រុក-ខណ្ឌ</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->district_name}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ឃុំ-សង្កាត់</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->commune_name}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ភូមិ</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->village_name}}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ផ្សេងៗ</td>
                            <td style="width: 4px">:</td>
                            <td><strong>{{$company->other}}</strong></td>
                        </tr>

                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>ចំនួនបុគ្គលិក</legend>
                <p style="padding: 18px 8px;">
                    <strong>
                        សរុប: <span id="total" class="text-primary">{{$total}} នាក់</span> &nbsp;&nbsp;
                        ប្រុស: <span id="male" class="text-success">{{$total_male}} នាក់</span> &nbsp;&nbsp;
                        ស្រី: <span id="female" class="text-danger">{{$total_female}} នាក់</span>
                    </strong>
                </p>
            </fieldset>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <fieldset>
                <legend>បញ្ជីបុគ្គលិក</legend>
                <table class="tbl1">
                    <thead>
                    <tr>
                        <th><b>ល.រ</b></th>
                        <th><b>ឈ្មោះជាភាសាខ្មែរ</b></th>
                        <th><b>ឈ្មោះជាអក្សរឡាតាំង</b></th>
                        <th><b>ភេទ</b></th>
                        <th><b>ថ្ងៃខែឆ្នាំកំណើត</b></th>
                        <th><b>លេខទូរស័ព្ទ</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    @foreach($employees as $emp)
                        <tr>
                            <td>{{\App\Models\Utility::toKh($i++)}}</td>
                            <td>{{$emp->khmer_name}}</td>
                            <td>{{$emp->english_name}}</td>
                            <td>{{$emp->gender=='Male'?'ប្រុស':'ស្រី'}}</td>
                            <td>{{$emp->dob}}</td>
                            <td>{{$emp->phone1}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>