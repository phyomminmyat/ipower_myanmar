@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.village_tract.management') . ' | ' . trans('labels.backend.village_tract.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.village_tract.management') }}
        <small>{{ trans('labels.backend.village_tract.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($village_tract, ['route' => ['admin.village_tract.update', $village_tract], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.village_tract.edit') }}</h3>

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
                                        <option></option>
                                        @foreach($townships as $township)
                                            @if($township->id == $village_tract->township_id)
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

                        </div><!-- /.panel-body -->
                       
                    </div>
                
                </div>
            </div>
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.village_tract.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
