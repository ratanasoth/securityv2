<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ប្រវត្តិរូបបុគ្គលិក</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet"  href="{{asset('css/report.css')}}">
    <style>
        table.llb tr td{
            padding-top: 4px;
            padding-bottom: 4px;
        }
        .tbl{
            border: 1px solid #ddd;
        }
        .tbl tr th{
            padding: 4px 2px;
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }
        .tbl tr th:last-child{
            border-right: none;
        }
        .tbl tr td{
            padding: 4px 2px;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }
        .tbl tr td:last-child{
            border-right: none;
        }
        .tbl tr:last-child td{
            border-bottom: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 khmoul text-center">
           
            <h3 class="text-center khmoul"><u>ប្រវត្តិរូបសង្ខេប</u></h3>
            <hr>
            <br>
        </div>
    </div>
    <table style="width: 100%; border: 0; border-spacing:0">
        <tr>
            <td style="width:50%; vertical-align: top">
                    <p style="font-weight:bold"><u>ព័ត៌មានផ្ទាល់ខ្លួន</u></p>
                    <table style="width:100%;border-spacing:0" class='llb'>
                        <tr>
                            <td style="width: 120px">លេខកូដ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->code}}</td>
                        </tr>
                        <tr>
                            <td>ឈ្មេាះជាខ្មែរ</td>
                            <td>:</td>
                            <td>{{$employee->khmer_name}}</td>
                        </tr>
                        <tr>
                            <td>ឈ្មេាះជាឡាតាំង</td>
                            <td>:</td>
                            <td>{{$employee->english_name}}</td>
                        </tr>
                        <tr>
                            <td>ភេទ</td>
                            <td>:</td>
                            <td>{{$employee->gender=='Male'?'ប្រុស':'ស្រី'}}</td>
                        </tr>
                         <tr>
                            <td>ថ្ងៃខែឆ្នាំកំណើត</td>
                            <td>:</td>
                            <td>{{$employee->dob}}</td>
                        </tr>
                         <tr>
                            <td>លេខទូរស័ព្ទ</td>
                            <td>:</td>
                            <td>{{$employee->phone1}}{{strlen($employee->phone2)>3?' / '.$employee->phone2:''}}</td>
                        </tr>
                         <tr>
                            <td>ឈ្មេាះក្រុមហ៊ុន</td>
                            <td>:</td>
                            <td>{{$employee->cname}}</td>
                        </tr>
                         <tr>
                            <td>ជាភ្នាក់ងារព័ត៌មាន</td>
                            <td>:</td>
                            <td>{{$employee->is_agency=='yes'?'មែន':'មិនមែន'}}</td>
                        </tr>
                    </table>
            </td>
            <td style="width: 50%; vertical-align: top">
                <p style="font-weight:bold"><u>ទីកន្លែងកំណើត</u></p>
                    <table style="width:100%;border-spacing:0" class='llb'>
                        <tr>
                            <td style="width: 120px">ផ្ទះលេខ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_home}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ផ្លូវ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_street}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ក្រុម</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_krom}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ភូមិ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_village}}</td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ឃុំ-សង្កាត់</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_commune}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ស្រុក-ខណ្ឌ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_district}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ខេត្ត-ក្រុង</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_province}}</td>
                        </tr>
                    </table> 
            </td>
        </tr>
    </table>
    <br>
      <table style="width: 100%; border: 0; border-spacing:0">
        <tr>
            <td style="width:50%; vertical-align: top">
                    <p style="font-weight:bold"><u>ទីលំនៅបច្ចុប្បន្ន</u></p>
                    <table style="width:100%;border-spacing:0" class='llb'>
                        <tr>
                            <td style="width: 120px">ផ្ទះលេខ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_home}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ផ្លូវ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_street}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ក្រុម</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_krom}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ភូមិ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_village}}</td>
                        </tr>
                        <tr>
                            <td style="width: 120px">ឃុំ-សង្កាត់</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_commune}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ស្រុក-ខណ្ឌ</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_district}}</td>
                        </tr>
                         <tr>
                            <td style="width: 120px">ខេត្ត-ក្រុង</td>
                            <td style="width: 27px">:</td>
                            <td>{{$employee->pob_province}}</td>
                        </tr>
                    </table>
            </td>
            <td style="width: 50%; vertical-align: top">
                <p style="font-weight:bold"><u>រូបថតចំពីមុខ</u></p>
                <br>
                <img src="{{asset('photo/'.$employee->photo)}}">
            </td>
        </tr>
    </table>
    <br>
    <p style="font-weight:bold"><u>កម្រិតវប្បធម៌</u></p>
    <table style="width: 100%; border-spacing:0" class="llb tbl">
        <tr>
            <th>វគ្គ ឬកម្រិតសិក្សា</th>
            <th>ឈ្មេាះគ្រឹះស្ថានសិក្សា</th>
            <th>ទីកន្លែងសិក្សា</th>
            <th>ឆ្នាំសិក្សា</th>
        </tr>
        <tr>
            <td colspan="4">- កម្រិតវប្បធម៌ទូទៅ</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>
</body>
</html>