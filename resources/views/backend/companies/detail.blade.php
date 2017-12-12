@extends('layouts.app')
@section('content')
    <div class="panel">
        <div class="panel-heading bg-primary">
                 <span class="panel-title">
                    <strong>
                        <?php
                            $type = $company->type=='company'?'company':'enterprise';
                        ?>
                            {{$company->type=='company'?'ពត៌មានលម្អិតរបស់សហគ្រាសគ្រឹះស្ថាន':'ពត៌មានលម្អិតរបស់ក្រុមហ៊ុនផ្តល់សេវា'}}
                </span>
                &nbsp;&nbsp;
                <a href="{{url('/'. $type .'/edit/'.$company->id)}}" class="text-primary"><i class="fa fa-pencil"></i> កែប្រែ</a>&nbsp;&nbsp;
                <a href="{{url('/company')}}" class="text-success"><i class="fa fa-arrow-left"></i> ត្រលប់ក្រោយ</a>&nbsp;&nbsp;
                <a href="{{url('/report/companyprofile/'.$company->id)}}" class="text-danger" target="_blank"><i class="fa fa-print"></i> បេាះពុម្ព</a>
        </div>
        <div class="panel-body">
            <form action="#" class="form-horizontal">
                <div class="row">
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>ពត៌មានទូទៅ</legend>
                            <div class="form-group">
                                <label for="code" class="control-label col-sm-3">លេខកូដ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="code" name="code" disabled value="{{$company->code}}">
                                    {{csrf_field()}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="company_name" class="control-label col-sm-3">ឈ្មោះ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                           disabled value="{{$company->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_allowed" class="control-label col-sm-3">ច្បាប់អនុញ្ញាត</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="is_allowed" name="is_allowed"
                                           disabled value="{{$company->isallowed=='yes'?'មានច្បាប់':'គ្មានច្បាប់'}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="allow_no" class="control-label col-sm-3">លេខដីកា</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="allow_no" name="allow_no"
                                           disabled value="{{$company->allow_no}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="allow_date" class="control-label col-sm-3">ថ្ងៃខែដីកា</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="allow_date" name="allow_date"
                                           disabled value="{{$company->allow_date}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type" class="control-label col-sm-3">ប្រភេទ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="type" name="type"
                                           disabled value="{{$company->type=='company'?'គ្រឹះស្ថានសន្តិសុខ':'សហគ្រាស'}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="control-label col-sm-3">និមិត្តសញ្ញា</label>
                                <div class="col-sm-9">
                                    <img src="{{asset('logo/'.$company->logo)}}" alt="" id="preview" width="54">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-sm-6">
                        <fieldset>
                            <legend>អាស័យដ្ឋាន</legend>
                            <div class="form-group">
                                <label for="province" class="control-label col-sm-3">ខេត្ត/ក្រុង</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="province" name="province"
                                           disabled value="{{$company->province_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="control-label col-sm-3">ស្រុក/ខណ្ឌ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="district" name="district"
                                           disabled value="{{$company->district_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="commune" class="control-label col-sm-3">ឃុំ/សង្កាត់</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="commune" name="commune"
                                           disabled value="{{$company->commune_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="village" class="control-label col-sm-3">ភូមិ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="village" name="village"
                                           disabled value="{{$company->village_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="street_no" class="control-label col-sm-3">ផ្លូវ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="street_no" name="street_no"
                                           disabled value="{{$company->street_no}}">
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="home_no" class="control-label col-sm-3">ផ្ទះលេខ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="home_no" name="home_no"
                                           disabled value="{{$company->home_no}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="other" class="control-label col-sm-3">ផ្សេងៗ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="other" name="other"
                                           disabled value="{{$company->other}}">
                                </div>
                            </div>
                            
                        </fieldset>
                    </div>
                </div>
                <br>
              
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
                            <table class="table table-condensed table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ឈ្មោះជាភាសាខ្មែរ</th>
                                    <th>ឈ្មោះជាអក្សរឡាតាំង</th>
                                    <th>ភេទ</th>

                                    <th>លេខទូរស័ព្ទ</th>
                                    <th class="text-danger">ទីតាំងគោលដៅ</th>
                                    <th>សកម្មភាព</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                <script>
                                    var arr = [];
                                    var arr1 = [];
                                </script>
                                 @if(count($employees)>0)
                                    @foreach($employees as $emp)
                                        <tr id="{{$emp->id}}">
                                            <td>{{\App\Models\Utility::toKh($i++)}}</td>
                                            <td><a href="{{url('/employee/detail/'.$emp->id)}}">{{$emp->khmer_name}}</a></td>
                                            <td><a href="{{url('/employee/detail/'.$emp->id)}}">{{$emp->english_name}}</a></td>
                                            <td>{{$emp->gender=='Male'?'ប្រុស':'ស្រី'}}</td>

                                            <td>{{$emp->phone1}}</td>
                                            <td id="sd{{$emp->id}}" class="text-danger">{{$emp->destination}}</td>
                                            <td>
                                                <a href="#" onclick="setDestination('#sd{{$emp->id}}', event)" data-toggle="modal" data-target="#myModal"><i class="fa fa-map-marker text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <script>
                                            arr.push("{{$emp->destination}}");
                                            arr1.push("<a href='" + "{{url('/employee/detail/'.$emp->id)}}" + "'>{{$emp->khmer_name}}</a>");
                                        </script>
                                    @endforeach
                                @endif 
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-primary">
                        ទីតាំងក្រុមហ៊ុន-សហគ្រាស និងទីតាំងគោលដៅ
                    </h4>
                    <div id="map" style="width:100%;height:550px">
                    <img src="{{asset('img/ajax-loader.gif')}}" alt="">
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">កំណត់ទីតាំងគោលដៅ</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="txtds" class="form-control">
                    <input type="hidden" id="boxid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" onclick="saveDs()">រក្សាទុក</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ចាកចេញ</button>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var emp_id = "";
        // set destination function
        function setDestination(obj, evt)
        {

            evt.preventDefault();
            var ds = $(obj).html();
            var tr = $(obj).parent();
            emp_id = $(tr).attr('id');
           
            $("#txtds").val(ds);
            $("#boxid").val(obj);
        }
        function saveDs()
        {
            var newds = $("#txtds").val();

            // save to database
            $.ajax({
                type: "POST",
                url: burl +"/employee/update/ds",
                data: {destination: newds, emp_id: emp_id },
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
                },
                success: function (sms) {
                    $("#sms5").html("");
                    if(sms)
                    {
                        var bid = $("#boxid").val();
                        $(bid).html(newds);
                        $('#myModal').modal('hide');

                    }
                }
            });
        }
        function initMap()
        {
           
            var options = {
                zoom: 12,
                center: {lat: 11.531728, lng: 104.928847}
            };
            var map = new google.maps.Map(document.getElementById('map'), options);
            var geocoder = new google.maps.Geocoder();
            // marker for the company
            geocodeAddress(geocoder, map, "{{$company->name}}", "{{asset('img/company-marker.png')}}", "");
            // marker for destination{
            for(var i=0;i<arr.length;i++)
            {
                
                geocodeAddress(geocoder, map, arr[i], "{{asset('img/destination-marker.png')}}", arr1[i]);
            }

 
        }
        
     function geocodeAddress(geocoder, resultsMap, address, iconMarker, str) {
            // var address = document.getElementById('address').value;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        icon: iconMarker
                    });
                    var infoWindow = new google.maps.InfoWindow(
                        {
                            content: address + "<p class='text-center'>" + str + "</p>"
                        }
                    );
                    marker.addListener('click', function(){
                        infoWindow.open(resultsMap, marker);
                    });
                } else {
                   // alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF7yMA8-_MxooFoPfVvzuLGsN-Ppa4uR8&callback=initMap">
    </script>

@endsection