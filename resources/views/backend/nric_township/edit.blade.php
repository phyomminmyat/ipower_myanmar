@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.nric_township.management') . ' | ' . trans('labels.backend.nric_township.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.nric_township.management') }}
        <small>{{ trans('labels.backend.nric_township.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($nric_township, ['route' => ['admin.nric_township.update', $nric_township], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.nric_township.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.nric_township.includes.partials.nric-township-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('township', trans('validation.attributes.backend.nric_township.township'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('township', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.nric_township.township')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('nric_code_id', trans('validation.attributes.backend.nric_township.nric_code'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select class='form-control select2' name='nric_code_id'>
                            <option></option>
                            @foreach($nric_codes as $nric_code)
                                @if($nric_code->id == $nric_township->nric_code_id)
                                    <option value="{{ $nric_code->id }}" selected>{{ $nric_code->nric_code }}</option>
                                @else
                                    <option value="{{ $nric_code->id }}"> {{ $nric_code->nric_code }} </option>
                                @endif
                            @endforeach
                        </select><br>
                    </div><!--col-lg-10-->
                </div> 


                <div class="form-group">
                    {{ Form::label('short_name', trans('validation.attributes.backend.nric_township.short_name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('short_name', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.nric_township.short_name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('serial_no', trans('validation.attributes.backend.nric_township.serial_no'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('serial_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.nric_township.serial_no')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.nric_township.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
