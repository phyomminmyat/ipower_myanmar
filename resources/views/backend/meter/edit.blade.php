@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter.management') . ' | ' . trans('labels.backend.meter.edit'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
    <style type="text/css">
        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }
    </style>
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter.management') }}
        <small>{{ trans('labels.backend.meter.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($meter, ['route' => ['admin.meter.update', $meter], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.meter.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.meter.includes.partials.meter-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-primary" data-collapsed="0">
                    
                        <div class="panel-heading">
                            <div class="panel-title">
                               
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('meter_no', trans('validation.attributes.backend.meter.meter_no'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('meter_no', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.meter_no')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('meter_type', trans('validation.attributes.backend.meter.meter_type'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='meter_type'>
                                        <option></option>
                                        <option value="resident" {{ ($meter->meter_type == 'resident') ? "selected" : ''}}>Resident</option>
                                        <option value="sme" {{ ($meter->meter_type == 'sme') ? "selected" : ''}}> SME </option>
                                        <option value="factory" {{ ($meter->meter_type == 'factory') ? "selected" : ''}}> Factory </option>
                                        <option value="individual" {{ ($meter->meter_type == 'individual') ? "selected" : ''}}> Individual </option>
                                        <option value="school" {{ ($meter->meter_type == 'school') ? "selected" : ''}}> School </option>
                                        <option value="goverment" {{ ($meter->meter_type == 'goverment') ? "selected" : ''}}> Goverment </option>
                                        <option value="public_hospital" {{ ($meter->meter_type == 'public_hospital') ? "selected" : ''}}> Public Hospital </option>
                                        <option value="private_hospital" {{ ($meter->meter_type == 'private_hospital') ? "selected" : ''}}> Private Hospital </option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('register_date', trans('validation.attributes.backend.meter.register_date'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('register_date', null, ['class' => 'form-control datepicker', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.register_date')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->


                            <div class="form-group">
                                {{ Form::label('owner_id', trans('validation.attributes.backend.meter.owner'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='owner_id' id='owner_id'>
                                        <option></option>
                                        @foreach($owners as $owner)
                                            @if($owner->id == $meter->owner_id)
                                                <option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
                                            @else
                                                <option value="{{ $owner->id }}"> {{ $owner->name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('region_id', trans('validation.attributes.backend.meter.region'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='region_id' id='region_id'>
                                        <option></option>
                                        @foreach($regions as $region)
                                            @if($region->id == $meter->region_id)
                                                <option value="{{ $region->id }}" selected>{{ $region->region_name }}</option>
                                            @else
                                                <option value="{{ $region->id }}"> {{ $region->region_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 
                
                            <div class="form-group">
                                {{ Form::label('district_id', trans('validation.attributes.backend.meter.district'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='district_id' id='district_id'>
                                        <option></option>
                                        @foreach($districts as $district)
                                            @if($district->id == $meter->district_id)
                                                <option value="{{ $district->id }}" selected>{{ $district->district_name }}</option>
                                            @else
                                                <option value="{{ $district->id }}"> {{ $district->district_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('township_id', trans('validation.attributes.backend.meter.township'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='township_id' id='township_id'>
                                        <option></option>
                                        @foreach($townships as $township)
                                            @if($township->id == $meter->township_id)
                                                <option value="{{ $township->id }}" selected>{{ $township->township_name }}</option>
                                            @else
                                                <option value="{{ $township->id }}"> {{ $township->township_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('village_tract_id', trans('validation.attributes.backend.meter.village'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='village_tract_id' id='village_id'>
                                        <option></option>
                                        @foreach($villages as $village)
                                            @if($village->id == $meter->village_tract_id)
                                                <option value="{{ $village->id }}" selected>{{ $village->village_name }}</option>
                                            @else
                                                <option value="{{ $village->id }}"> {{ $village->village_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('community_id', trans('validation.attributes.backend.meter.community'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='community_id' id='community_id'>
                                        <option></option>
                                        @foreach($communities as $community)
                                            @if($community->id == $meter->community_id)
                                                <option value="{{ $community->id }}" selected>{{ $community->community_name }}</option>
                                            @else
                                                <option value="{{ $community->id }}"> {{ $community->community_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div>

                            <div class="form-group">
                                {{ Form::label('street_id', trans('validation.attributes.backend.meter.street'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='street_id' id='street_id'>
                                        <option value="">Select</option>
                                        @foreach($streets as $street)
                                            @if($street->id == $meter->street_id)
                                                <option value="{{ $street->id }}" selected>{{ $street->street_name }}</option>
                                            @else
                                                <option value="{{ $street->id }}"> {{ $street->street_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div>  

                            <div class="form-group">
                                {{ Form::label('address', trans('validation.attributes.backend.meter.address'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.address')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('latitude', trans('validation.attributes.backend.meter.latitude'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('latitude', null, ['class' => 'form-control','id' => 'input-latitude', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.latitude')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('longitude', trans('validation.attributes.backend.meter.longitude'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('longitude', null, ['class' => 'form-control','id' => 'input-longitude' , 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.longitude')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <input id="pac-input" class="controls" type="text" placeholder="Search Place">

                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div id="map-canvas"
                                         style="width:97%;height:400px;"></div>
                                    <div id="ajax_msg"></div>
                                </div>
                            </div>


                            <div class="form-group">
                                {{ Form::label('status', trans('validation.attributes.backend.meter.status'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='status'>
                                        <option></option>
                                        <option value="in-operation" {{ ($meter->status == 'in-operation') ? "selected" : ''}}>In-Operation</option>
                                        <option value="offline" {{ ($meter->status == 'offline') ? "selected" : ''}}> Offline </option>
                                        <option value="reminder" {{ ($meter->status == 'reminder') ? "selected" : ''}}> Reminder </option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                        </div><!-- /.panel-body -->
                    
                    </div>
                
                </div>
            </div>
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.meter.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js") }}
    <!-- {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js") }} -->
    {{ HTML::script('js/backend/assets/bootstrap-datepicker.js') }}
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.app_setting.google_map') }}&libraries=weather,geometry,visualization,places,drawing&callback=map_pos"
            async defer></script>
    
    <script type="text/javascript">
        
        $('.select2').select2({ 
            placeholder:"Please Select"
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });


        $('#region_id').on('change', function () {

            var region_id = $(this).val();

            console.log(region_id);

            if (region_id > 0) {
                
                $.ajax({
                    url: '{{config('app.url')}}'+ '/admin/meter/district_data/' + region_id,
                    type: 'GET',
                    success: function (data) {
                        console.log(data);
                        $('#district_id').find('option').remove().end().append('<option value="">-- Please Select --</option>');

                        $.each(data, function (key, value) {
                            $('#district_id').append(
                                $('<option></option>').attr('value', value.id).text(value.district_name)
                            );
                        });

                        $('#district_id').removeAttr('disabled');
                    }
                });
            } else {
                $('#district_id').attr('disabled', true);
            }
        });

        $('#district_id').on('change', function () {

            var district_id = $(this).val();

            console.log(district_id);

            if (district_id > 0) {
                
                $.ajax({
                    url: '{{config('app.url')}}'+ '/admin/meter/township_data/' + district_id,
                    type: 'GET',
                    success: function (data) {

                        console.log(data);

                        $('#township_id').find('option').remove().end().append('<option value="">-- Please Select --</option>');

                        $.each(data, function (key, value) {
                            $('#township_id').append(
                                $('<option></option>').attr('value', value.id).text(value.township_name)
                            );
                        });

                        $('#township_id').removeAttr('disabled');
                    }
                });
            } else {
                $('#township_id').attr('disabled', true);
            }
        });

        $('#township_id').on('change', function () {

            var township_id = $(this).val();

            console.log(township_id);

            if (township_id > 0) {
                
                $.ajax({
                    url: '{{config('app.url')}}'+ '/admin/meter/village_data/' + township_id,
                    type: 'GET',
                    success: function (data) {
                        console.log('township');
                        console.log(data);

                        $('#village_id').find('option').remove().end().append('<option value="">-- Please Select --</option>');

                        $.each(data, function (key, value) {
                            $('#village_id').append(
                                $('<option></option>').attr('value', value.id).text(value.village_name)
                            );
                        });

                        $('#village_id').removeAttr('disabled');
                    }
                });
            } else {
                $('#village_id').attr('disabled', true);
            }
        });


        $('#village_id').on('change', function () {

            var village_id = $(this).val();

            console.log(village_id);

            if (village_id > 0) {
                
                $.ajax({
                    url: '{{config('app.url')}}'+ '/admin/meter/community_data/' + village_id,
                    type: 'GET',
                    success: function (data) {
                        console.log('village');
                        console.log(data);

                        $('#community_id').find('option').remove().end().append('<option value="">-- Please Select --</option>');

                        $.each(data, function (key, value) {
                            $('#community_id').append(
                                $('<option></option>').attr('value', value.id).text(value.community_name)
                            );
                        });

                        $('#community_id').removeAttr('disabled');
                    }
                });
            } else {
                $('#community_id').attr('disabled', true);
            }
        });

        $('#community_id').on('change', function () {

            var community_id = $(this).val();

            console.log(community_id);

            if (community_id > 0) {
                
                $.ajax({
                    url: '{{config('app.url')}}'+ '/admin/meter/street_data/' + community_id,
                    type: 'GET',
                    success: function (data) {
                        console.log(data);

                        $('#street_id').find('option').remove().end().append('<option value="">-- Please Select --</option>');

                        $.each(data, function (key, value) {
                            $('#street_id').append(
                                $('<option></option>').attr('value', value.id).text(value.street_name)
                            );
                        });

                        $('#street_id').removeAttr('disabled');
                    },
                    error: function (error){
                        console.log(error);  
                        alert(error) 
                    }
                });
            } else {
                $('#street_id').attr('disabled', true);
            }
        });


        function map_pos() {
            if('{{ @$meter->latitude }}'  && '{{ @$meter->longitude }}' ) {
                initMap({{ $meter->latitude }},{{ $meter->longitude }})
            }else{
                initMap(16.9041018,96.029423111)
            }
        }

        function initMap(mylat, mylong) {
            var mapOptions = {
                center: {lat: mylat, lng: mylong},
                zoom: 13
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);

            var marker_position = {lat: mylat, lng: mylong};
            var input = /** @type {HTMLInputElement} */(
                    document.getElementById('pac-input'));

            var types = document.getElementById('type-selector');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                position: marker_position,
                draggable: true,
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });


            google.maps.event.addListener(marker, "mouseup", function (event) {
                $('#input-latitude').val(this.position.lat());
                $('#input-longitude').val(this.position.lng());
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                $('#input-latitude').val(place.geometry.location.lat());
                $('#input-longitude').val(place.geometry.location.lng());

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                $('input[name=address]').val(place.formatted_address);

                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(map, marker);
            });


            google.maps.event.addListener(marker, 'dragend', function () {

                $('#input-latitude').val(place.geometry.location.lat());
                $('#input-longitude').val(place.geometry.location.lng());

            });

        }

        if ($('#map-canvas').length != 0) {
            google.maps.event.addDomListener(window, 'load', initMap);
        }
    

    </script>
@endsection
