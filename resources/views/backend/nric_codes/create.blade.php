@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.nric_codes.management') . ' | ' . trans('labels.backend.nric_codes.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.nric_codes.management') }}
        <small>{{ trans('labels.backend.nric_codes.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.nric_codes.store', 'class' => 'form-horizontal form-groups-bordered', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.nric_codes.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.nric_codes.includes.partials.nric-code-header-buttons')
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
                                {{ Form::label('nric_code', trans('validation.attributes.backend.nric_codes.nric_code'), ['class' => 'col-lg-2 control-label']) }}

                                
                                <div class="col-lg-10">
                                    {{ Form::text('nric_code', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.nric_codes.nric_code')]) }}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.nric_codes.description'),
                                ['class' => 'col-lg-2 control-label']) }}
                                
                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.nric_codes.description')]) }}
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
                    {{ link_to_route('admin.nric_codes.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
