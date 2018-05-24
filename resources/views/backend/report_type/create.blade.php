@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.report_type.management') . ' | ' . trans('labels.backend.report_type.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.report_type.management') }}
        <small>{{ trans('labels.backend.report_type.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.report_type.store', 'class' => 'form-horizontal form-groups-bordered', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.report_type.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.report_type.includes.partials.report-type-header-buttons')
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
                                {{ Form::label('type_name', trans('validation.attributes.backend.report_type.type_name'),
                                ['class' => 'col-lg-2 control-label']) }}
                                
                                <div class="col-lg-10">
                                    {{ Form::text('type_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.report_type.type_name')]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.report_type.description'),
                                ['class' => 'col-lg-2 control-label']) }}
                                
                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.report_type.description')]) }}
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
                    {{ link_to_route('admin.report_type.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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