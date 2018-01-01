@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.street.management') . ' | ' . trans('labels.backend.street.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.street.management') }}
        <small>{{ trans('labels.backend.street.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($street, ['route' => ['admin.street.update', $street], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.street.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.street.includes.partials.street-header-buttons')
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
                                {{ Form::label('street_name', trans('validation.attributes.backend.street.street_name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('street_name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.street.street_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('community_id', trans('validation.attributes.backend.street.community'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='community_id'>
                                        <option value="">Select</option>
                                         @foreach($communities as $community)
                                            @if($community->id == $street->community_id)
                                                <option value="{{ $community->id }}" selected>{{ $community->community_name }}</option>
                                            @else
                                                <option value="{{ $community->id }}"> {{ $community->community_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('street_code', trans('validation.attributes.backend.street.street_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('street_code', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.street.street_code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.street.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.street.description')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                        </div><!-- /.box-body -->
                    </div>
                
                </div>
            </div>

        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.street.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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