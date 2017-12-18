@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.unit_rate.management') . ' | ' . trans('labels.backend.unit_rate.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.unit_rate.management') }}
        <small>{{ trans('labels.backend.unit_rate.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($unit_rate, ['route' => ['admin.unit_rate.update', $unit_rate], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.unit_rate.edit') }}</h3>

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
                                        <option value="resident" {{ ($unit_rate->meter_type == 'resident') ? "selected" : ''}}>Resident</option>
                                        <option value="sme" {{ ($unit_rate->meter_type == 'sme') ? "selected" : ''}}> SME </option>
                                        <option value="factory" {{ ($unit_rate->meter_type == 'factory') ? "selected" : ''}}> Factory </option>
                                        <option value="individual" {{ ($unit_rate->meter_type == 'individual') ? "selected" : ''}}> Individual </option>
                                        <option value="school" {{ ($unit_rate->meter_type == 'school') ? "selected" : ''}}> School </option>
                                        <option value="goverment" {{ ($unit_rate->meter_type == 'goverment') ? "selected" : ''}}> Goverment </option>
                                        <option value="public_hospital" {{ ($unit_rate->meter_type == 'public_hospital') ? "selected" : ''}}> Public Hospital </option>
                                        <option value="private_hospital" {{ ($unit_rate->meter_type == 'private_hospital') ? "selected" : ''}}> Private Hospital </option>
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

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.unit_rate.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
@endsection
