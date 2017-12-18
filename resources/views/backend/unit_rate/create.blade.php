@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.unit_rate.management') . ' | ' . trans('labels.backend.unit_rate.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.unit_rate.management') }}
        <small>{{ trans('labels.backend.unit_rate.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.unit_rate.store', 'class' => 'form-horizontal form-groups-bordered', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.unit_rate.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.unit_rate.includes.partials.unit-rate-header-buttons')
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
                                {{ Form::label('meter_type', trans('validation.attributes.backend.unit_rate.meter_type'), ['class' => 'col-lg-2 control-label']) }}
                                
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
                                {{ Form::label('unit_price', trans('validation.attributes.backend.unit_rate.unit_price'),
                                ['class' => 'col-lg-2 control-label']) }}
                                
                                <div class="col-lg-10">
                                    {{ Form::text('unit_price', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.unit_rate.unit_price')]) }}
                                </div>
                            </div>
                            
                            
                        </div>
                    
                    </div>
                
                </div>
            </div>

        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.unit_rate.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
@endsection
