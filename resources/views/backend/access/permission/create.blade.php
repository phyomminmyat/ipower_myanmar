@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.permission.management') . ' | ' . trans('labels.backend.permission.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css")}}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.permission.management') }}
        <small>{{ trans('labels.backend.access.permission.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.permissions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.permission.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.permission.includes.partials.permission-header-buttons')
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
                                {{ Form::label('name', trans('validation.attributes.backend.access.permission.name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.permission.name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('display_name', trans('validation.attributes.backend.access.permission.display_name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('display_name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.permission.display_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.access.permission.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.permission.description')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('sort', trans('validation.attributes.backend.access.permission.sort'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('sort', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.permission.sort')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('system', trans('validation.attributes.backend.access.permission.system'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-1">
                                    {{ Form::checkbox('system', '0', false) }}
                                </div><!--col-lg-1-->
                            </div><!--form control-->

                        </div><!-- /.panel-body -->
                    
                    </div>
                
                </div>
            </div>
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.permissions.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
                    url: '{{config('app.url')}}'+ '/admin/meter/district_data/' + region_id,
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

    </script>
@endsection
