@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.department.management') . ' | ' . trans('labels.backend.department.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.department.management') }}
        <small>{{ trans('labels.backend.department.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.department.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.department.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.department.includes.partials.department-header-buttons')
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
                                {{ Form::label('department_name', trans('validation.attributes.backend.department.department_name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('department_name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.department.department_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('region_id', trans('validation.attributes.backend.department.region'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control ' name='region_id' id='region_id'>
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
                                {{ Form::label('district_id', trans('validation.attributes.backend.department.district'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select disabled class='form-control' name='district_id' id='district_id'>
                                        <option></option>
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
                                {{ Form::label('township_id', trans('validation.attributes.backend.department.township'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select disabled class='form-control ' name='township_id' id='township_id'>
                                        <option></option>
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
                                {{ Form::label('village_tract_id', trans('validation.attributes.backend.department.village'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select disabled class='form-control ' name='village_tract_id' id='village_id'>
                                        <option></option>
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
                                {{ Form::label('community_id', trans('validation.attributes.backend.department.community'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select disabled class='form-control ' name='community_id' id='community_id'>
                                        <option></option>
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
                                {{ Form::label('department_code', trans('validation.attributes.backend.department.department_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('department_code', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.department.department_code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.department.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.department.description')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                        </div><!-- /.box-body -->
                       
                    </div>
                
                </div>
            </div>

        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.department.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    <script type="text/javascript">
        
        $('.select2').select2({ 
            placeholder:"Please Select"
        });

        $('#region_id').on('change', function () {

            var region_id = $(this).val();

            console.log(region_id);

            if (region_id > 0) {
                 $('#district_id').removeAttr('disabled');
                $.ajax({
                    url: 'http://localhost/ipower_myanmar/public/admin/department/district_data/' + region_id,
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
                    url: 'http://localhost/ipower_myanmar/public/admin/department/township_data/' + district_id,
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
                    url: 'http://localhost/ipower_myanmar/public/admin/department/village_data/' + township_id,
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
                    url: 'http://localhost/ipower_myanmar/public/admin/department/community_data/' + village_id,
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
