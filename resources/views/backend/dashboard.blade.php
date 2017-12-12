@extends('layouts.app')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <p>សរុប</p>
                    <h3 class="text-info">{{$total_company}}</h3>
                    <p>
                        <span class="text-black">មានច្បាប់: {{$company_allow}}</span>
                        <span class="text-danger pull-right">គ្មានច្បាប់: {{$company_notallow}}</span>
                    </p>
                </div>

                <div class="company-name">
                    សហគ្រាស
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <p>សរុប</p>
                    <h3>{{$total_enterprise}}</h3>
                    <p>
                        <span class="text-black">មានច្បាប់: {{$enterprise_allow}}</span>
                        <span class="text-danger pull-right">គ្មានច្បាប់: {{$enterprise_notallow}}</span>
                    </p>
                </div>
                <div class="company-name">
                    ក្រុមហ៊ុនផ្តលសេវា
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <p>សរុប</p>
                    <h3>{{$total_employee}}នាក់</h3>
                    <p>
                        <span class="text-black">ប្រុស: {{$male}}នាក់</span>
                        <span class="text-danger pull-right">ស្រី: {{$female}}នាក់</span>
                    </p>

                </div>
                <div class="company-name">
                    បុគ្គលិក
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box gray">
                <div class="inner">
                    <p>សរុប</p>
                    <h3>{{$agency}}នាក់</h3>
                    <p>
                        <span class="text-black">ប្រុស: {{$agency_male}}នាក់</span>
                        <span class="text-danger pull-right">ស្រី: {{$agency_female}}នាក់</span>
                    </p>

                </div>
                <div class="company-name">
                    ភ្នាក់ងារពត៌មាន
                </div>

            </div>
        </div>
    </div>
@endsection
