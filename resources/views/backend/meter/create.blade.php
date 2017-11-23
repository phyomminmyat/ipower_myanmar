@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter.management') . ' | ' . trans('labels.backend.meter.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css")}}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter.management') }}
        <small>{{ trans('labels.backend.meter.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.meter.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.meter.create') }}</h3>

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
                                        <option value="">Select</option>
                                        <option value="resident" {{ (old('meter_type') == 'resident') ? "selected" : ''}}>Resident</option>
                                        <option value="sme" {{ (old('meter_type') == 'sme') ? "selected" : ''}}> SME </option>
                                        <option value="factory" {{ (old('meter_type') == 'factory') ? "selected" : ''}}> Factory </option>
                                        <option value="individual" {{ (old('meter_type') == 'individual') ? "selected" : ''}}> Individual </option>
                                        <option value="school" {{ (old('meter_type') == 'school') ? "selected" : ''}}> School </option>
                                        <option value="goverment" {{ (old('meter_type') == 'goverment') ? "selected" : ''}}> Goverment </option>
                                        <option value="public_hospital" {{ (old('meter_type') == 'public_hospital') ? "selected" : ''}}> Public Hospital </option>
                                        <option value="private_hospital" {{ (old('meter_type') == 'private_hospital') ? "selected" : ''}}> Private Hospital </option>
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
                                        <option value="">Select</option>
                                        @foreach($owners as $owner)
                                            @if(old('owner') == $owner->id)
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
                                        <option value="">Select</option>
                                        @foreach($regions as $region)
                                            @if(old('region') == $region->id)
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
                                    <select class='form-control' disabled name='district_id' id='district_id'>
                                        <option value="">Select</option>
                                       <!--  @foreach($districts as $district)
                                            @if(old('district') == $district->id)
                                                <option value="{{ $district->id }}" selected>{{ $district->district_name }}</option>
                                            @else
                                                <option value="{{ $district->id }}"> {{ $district->district_name }} </option>
                                            @endif
                                        @endforeach -->
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('township_id', trans('validation.attributes.backend.meter.township'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' disabled name='township_id' id='township_id'>
                                        <option value="">Select</option>
                                        <!-- @foreach($townships as $township)
                                            @if(old('township') == $township->id)
                                                <option value="{{ $township->id }}" selected>{{ $township->township_name }}</option>
                                            @else
                                                <option value="{{ $township->id }}"> {{ $township->township_name }} </option>
                                            @endif
                                        @endforeach -->
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('village_tract_id', trans('validation.attributes.backend.meter.village'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' disabled name='village_tract_id' id='village_id'>
                                        <option value="">Select</option>
                                        <!-- @foreach($villages as $village)
                                            @if(old('village') == $village->id)
                                                <option value="{{ $village->id }}" selected>{{ $village->village_name }}</option>
                                            @else
                                                <option value="{{ $village->id }}"> {{ $village->village_name }} </option>
                                            @endif
                                        @endforeach -->
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('community_id', trans('validation.attributes.backend.meter.community'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' disabled name='community_id' id='community_id'>
                                        <option value="">Select</option>
                                        <!-- @foreach($communities as $community)
                                            @if(old('community') == $community->id)
                                                <option value="{{ $community->id }}" selected>{{ $community->community_name }}</option>
                                            @else
                                                <option value="{{ $community->id }}"> {{ $community->community_name }} </option>
                                            @endif
                                        @endforeach -->
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('street', trans('validation.attributes.backend.meter.street'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('street', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.street')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('address', trans('validation.attributes.backend.meter.address'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter.address')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('status', trans('validation.attributes.backend.meter.status'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='status'>
                                        <option value="">Select</option>
                                        <option value="in-operation" {{ (old('status') == 'in-operation') ? "selected" : ''}}>In-Operation</option>
                                        <option value="offline" {{ (old('status') == 'offline') ? "selected" : ''}}> Offline </option>
                                        <option value="reminder" {{ (old('status') == 'reminder') ? "selected" : ''}}> Reminder </option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                        </div><!-- /.panel-body -->
                    
                    </div>
                
                </div>
            </div>
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.meter.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    <!-- {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js") }} -->
    {{ HTML::script('js/backend/assets/bootstrap-datepicker.js') }}


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
                    url: '/admin/meter/district_data/' + region_id,
                    type: 'GET',
                    success: function (data) {

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
                    url: '/admin/meter/township_data/' + district_id,
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
                    url: '/admin/meter/village_data/' + township_id,
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
                    url: '/admin/meter/community_data/' + village_id,
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


    </script>
@endsection
