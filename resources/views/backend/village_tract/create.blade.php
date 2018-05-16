@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.village_tract.management') . ' | ' . trans('labels.backend.village_tract.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.village_tract.management') }}
        <small>{{ trans('labels.backend.village_tract.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.village_tract.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.village_tract.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.village_tract.includes.partials.village-tract-header-buttons')
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
                                {{ Form::label('village_name', trans('validation.attributes.backend.village_tract.village_name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('village_name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.village_tract.village_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('township_id', trans('validation.attributes.backend.village_tract.township'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='township_id'>
                                        <option value="">Select</option>
                                        @foreach($townships as $township)
                                            @if(old('township') == $township->id)
                                                <option value="{{ $township->id }}" selected>{{ $township->township_name }}</option>
                                            @else
                                                <option value="{{ $township->id }}"> {{ $township->township_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('village_code', trans('validation.attributes.backend.village_tract.village_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('village_code', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.village_tract.village_code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.village_tract.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.village_tract.description')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            
                            <div class="form-group">
                                {{ Form::label('latitude', trans('validation.attributes.backend.village_tract.latitude'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('latitude', null, ['class' => 'form-control','id' => 'input-latitude', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.village_tract.latitude')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('longitude', trans('validation.attributes.backend.village_tract.longitude'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('longitude', null, ['class' => 'form-control','id' => 'input-longitude' , 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.village_tract.longitude')]) }}
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

                        </div><!-- /.panel-body -->
                       
                    </div>
                
                </div>
            </div>
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.village_tract.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js") }}

    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.app_setting.google_map') }}&libraries=weather,geometry,visualization,places,drawing&callback=initMap"
            async defer></script>


    <script type="text/javascript">
        
        $('.select2').select2({ 
            placeholder:"Please Select"
        });

        function initMap() {
            var mapOptions = {
                center: new google.maps.LatLng(16.9041018,96.029423111),
                zoom: 13
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'),
                    mapOptions);

            var marker_position = new google.maps.LatLng(16.9041018,96.029423111);
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


            google.maps.event.addListener(marker, 'dragend', function() {

                $('#input-latitude').val(place.geometry.location.lat());
                $('#input-longitude').val(place.geometry.location.lng());

            });

        }

        if ($('#map-canvas').length != 0) {
            google.maps.event.addDomListener(window, 'load', initMap);
        }
    </script>
@endsection
