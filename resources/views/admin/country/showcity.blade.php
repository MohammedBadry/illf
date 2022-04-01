@extends('admin.include.master')
@section('title') لوحة التحكم | مشاهدة الاحياء  @endsection
@section('content')

    <section class="content">
            <div class="row">
            <div class="col-md-12">
            <div class="box-header">
                    <h3 class="box-title"> اضافة حى داخل هذة المدينة</h3>
                </div>
                    <div class="box ">
                        {{ Form::open(array('method' => 'POST','files' => true,'url' =>'adminpanel/countries' )) }}
                            <input type="hidden" name="addcity">
                            <div class="box-body">

                                <div class="form-group col-md-6">
                                    <label>اسم الحى باللغة العربية</label>
                                    <input type="text" class="form-control" required="required" name="cityname" value="{{ Request::old('cityname') }}">
                                    <input type="hidden" class="form-control" name="parent" value="{{ $showarea->id }}">
                                    @if ($errors->has('cityname'))
                                    <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('cityname') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label>اسم الحى باللغة الانجليزية</label>
                                    <input type="text" class="form-control" required="required" name="enname" value="{{ Request::old('enname') }}">
                                    @if ($errors->has('enname'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enname') }}</div>
                                    @endif
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="col-md-12">حدد موقع الدولة ع الخريطة</label>
                                    <button type="button" class="btn btn-default col-md-2" data-toggle="modal" data-target="#modal-default">تحديد الموقع</button>
                                    <div class="col-md-10"></div>
                                    <div class="col-md-12">
                                        @if ($errors->has('lat'))
                                            <div style="color: crimson;font-size: 18px;" class="error">لا بد من تحديد الموقع</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-default" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">تحديد موقع الدولة ع الخريطة</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="adlat" name="lat">
                                            <input type="hidden" id="adlng" name="lng">
                                            <div id="googleMap" style="width:100%;height:400px;"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">اغلاق</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            <div style="padding: 24px;" class="box-footer col-md-offset-4 col-md-4">
                                <button type="submit" class="btn btn-primary col-md-12">إضافة</button>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div> 
            </div>
            </div>
    </section> 

<!-- End timeline -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="table-responsive box-body">
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>اسم الحى بالعربية</th>
                            <th>اسم الحى بالانجليزية</th>
                            <th> تعديل </th>
                            <th> تعطيل </th>
                            <th> حذف </th>
                        </tr>   
                    </thead>
                    <tbody>
                    @foreach($allcities as $area)
                    <tr>
                        <th>{{ $area->name }}</th>
                        <th>{{ $area->enname }}</th>

                        <th>
                            <a href='{{asset("adminpanel/countries/".$area->id."/edit")}}' class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </th>
                        
                        <th>
                           {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/countries/'.$area->id )) }}
                                <input type="hidden" name="suspensed" >
                                <button type="submit" class="btn btn-default">
                                @if($area->suspensed == 1) 
                                <i style="color:crimson" class="fa fa-lock" aria-hidden="true"></i> 
                                @else 
                                <i style="color:#1FAB89" class="fa fa-unlock" aria-hidden="true"></i> 
                                @endif
                                </button>
                            {!! Form::close() !!}
                       </th>
                    
                        <th>
                            {!!Form::open(['url' => "adminpanel/countries/$area->id",'id' => 'delcountry'.$area->id,"method"=>"DELETE","onclick"=>"return confirm('هل انت متاكد؟!')"])!!}
                            <input type="hidden" name="delcity">
                                <button style="margin-bottom: -13px;" form="delcountry{{$area->id}}" type="submit" class="btn btn-block btn-danger"><i class="fa fa-trash-o" aria-hidden="true" fa-2x></i> حذف</button>
                            {!! Form::close() !!} 
                        </th>
                    </tr>
                    @endforeach 
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
    </div>
</section>

    <script>
        var map;
        var currentLocation;
        var markers = [];
        function myMap() {
            var haightAshbury = {lat: 24.7326194, lng: 47.3060768};

            map = new google.maps.Map(document.getElementById('googleMap'), {
                zoom: 5,
                center: haightAshbury,
            });

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                deleteMarkers();
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                $("input[name='lat']").val(lat);
                $("input[name='lng']").val(lng);
                addMarker(event.latLng);
            });

        }

        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_foD6VvulHSpxKYjtgehkQ_UoVGHH64Y&callback=myMap"></script>

@endsection