@extends('admin.include.master')
@section('title') لوحة التحكم | الدول والمدن @endsection
@section('content')

    <section class="content">
            <div class="row">
            <div class="col-md-12">
            <div class="box-header">
                    <h3 class="box-title">تعديل الدولة</h3>
                </div>
                    <div class="box ">
                        {{ Form::open(array('method' => 'patch','url' =>"adminpanel/countries/$editarea->id" )) }}
                            <input type="hidden" name="addcountry">
                            <div class="box-body">

                                <div class="form-group col-md-6">
                                    <label>اسم الدولة باللغة العربية</label>
                                    <input type="text" class="form-control" required="required" name="name" value="{{ $editarea->name }}">
                                    @if ($errors->has('name'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label>اسم الدولة باللغة الانجليزية</label>
                                    <input type="text" class="form-control" required="required" name="enname" value="{{ $editarea->enname }}">
                                    @if ($errors->has('enname'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enname') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-md-12">حدد موقع الدولة ع الخريطة</label>
                                    <button type="button" class="btn btn-default col-md-2" data-toggle="modal" data-target="#modal-default">تغيير الموقع</button>
                                    <div class="col-md-10"></div>
                                </div>

                                <div style="width:100%;" class="modal fade" id="modal-default" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">تحديد موقع الدولة ع الخريطة</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="adlat" name="lat" value="{{$editarea->lat}}">
                                            <input type="hidden" id="adlng" name="lng" value="{{$editarea->lng}}">
                                            <div id="googleMap" style="width:100%;height:400px;"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">اغلاق</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            <div style="padding: 24px;" class="box-footer col-md-offset-4 col-md-4">
                                <button type="submit" class="btn btn-primary col-md-12">تعديل</button>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div> 
            </div>
            </div>
    </section>

    <script>
        var map;
        var currentLocation;
        var markers = [];
        var adlat  = parseFloat(document.getElementById("adlat").value);
        var adlng  = parseFloat(document.getElementById("adlng").value);
        console.log(adlat);
        function myMap() {
            var haightAshbury = {lat: adlat, lng: adlng};

            map = new google.maps.Map(document.getElementById('googleMap'), {
                zoom: 5,
                center: haightAshbury,
            });

        var marker = new google.maps.Marker({
          position: haightAshbury,
          map: map,
        });

        var cityCircle = new google.maps.Circle({
        strokeColor: '#ae72c5',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        map: map,
        center: haightAshbury,
        radius: 500
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