@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.region.management') . ' | ' . trans('labels.backend.region.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.region.management') }}
        <small>{{ trans('labels.backend.region.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.region.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.region.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.region.includes.partials.region-header-buttons')
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
                                {{ Form::label('region_name', trans('validation.attributes.backend.region.region_name'), ['class' => 'col-lg-2 control-label']) }}
                                
                                <div class="col-lg-10">
                                    {{ Form::text('region_name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.region.region_name')]) }}
                                </div>
                            </div>

                              <div class="form-group">
                                {{ Form::label('region_code', trans('validation.attributes.backend.region.region_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('region_code', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.region.region_code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->


                             <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.region.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.region.description')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            
                        </div>
                    
                    </div>
                
                </div>
            </div>

        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.region.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    </script>
@endsection
