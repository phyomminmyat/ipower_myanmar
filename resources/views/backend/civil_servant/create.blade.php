@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.civil_servant.management') . ' | ' . trans('labels.backend.civil_servant.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css")}}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.civil_servant.management') }}
        <small>{{ trans('labels.backend.civil_servant.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.civil_servant.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.civil_servant.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.civil_servant.includes.partials.civil-servant-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.backend.civil_servant.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('department_id', trans('validation.attributes.backend.civil_servant.department'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select class='form-control select2' name='department_id'>
                            <option></option>
                            @foreach($departments as $department)
                                @if(old('department') == $department->id)
                                    <option value="{{ $department->id }}" selected>{{ $department->department_name }}</option>
                                @else
                                    <option value="{{ $department->id }}"> {{ $department->department_name }} </option>
                                @endif
                            @endforeach
                        </select><br>
                    </div><!--col-lg-10-->
                </div> 
                
                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.civil_servant.email'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.email')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.civil_servant.password'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('password', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.password')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('dob', trans('validation.attributes.backend.civil_servant.dob'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('dob', null, ['class' => 'form-control datepicker', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.dob')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('contact_no', trans('validation.attributes.backend.civil_servant.contact_no'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('contact_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.contact_no')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('fax_no', trans('validation.attributes.backend.civil_servant.fax_no'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('fax_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.fax_no')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            
                <div class="form-group">
                    {{ Form::label('nric_code', trans('validation.attributes.backend.civil_servant.nric_code'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select class='form-control select2' name='nric_code'>
                            <option></option>
                            @foreach($nric_codes as $nric_code)
                                @if(old('nric_code') == $nric_code->id)
                                    <option value="{{ $nric_code->id }}" selected>{{ $nric_code->nric_code }}</option>
                                @else
                                    <option value="{{ $nric_code->id }}"> {{ $nric_code->nric_code }} </option>
                                @endif
                            @endforeach
                        </select><br>
                    </div><!--col-lg-10-->
                </div> 
                
                <div class="form-group">
                    {{ Form::label('gender', trans('validation.attributes.backend.civil_servant.gender'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select class='form-control select2' name='gender'>
                            <option></option>
                            <option value="male" {{ (old('gender') == 'male') ? "selected" : ''}}>Male</option>
                            <option value="male" {{ (old('gender') == 'female') ? "selected" : ''}}>Female</option>
                        </select><br>
                    </div><!--col-lg-10-->
                </div> 

                <div class="form-group">
                    {{ Form::label('martial_status', trans('validation.attributes.backend.civil_servant.martial_status'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        <select class='form-control select2' name='martial_status'>
                            <option></option>
                            <option value="single" {{ (old('martial_status') == 'single') ? "selected" : ''}}>Single</option>
                            <option value="married" {{ (old('martial_status') == 'married') ? "selected" : ''}}> Married </option>
                            <option value="separated" {{ (old('martial_status') == 'separated') ? "selected" : ''}}> Separated </option>
                            <option value="divorced" {{ (old('martial_status') == 'divorced') ? "selected" : ''}}> Divorced </option>
                            <option value="widowed" {{ (old('martial_status') == 'widowed') ? "selected" : ''}}> Widowed </option>
                            <option value="single_parent" {{ (old('martial_status') == 'single_parent') ? "selected" : ''}}> Single Parent </option>
                        </select><br>
                    </div><!--col-lg-10-->
                </div> 

                <div class="form-group">
                    {{ Form::label('nationality', trans('validation.attributes.backend.civil_servant.nationality'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('nationality', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.nationality')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('address', trans('validation.attributes.backend.civil_servant.address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('address', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('position', trans('validation.attributes.backend.civil_servant.position'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('position', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.civil_servant.position')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.civil_servant.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js") }}
    <script type="text/javascript">
        
        $('.select2').select2({ 
            placeholder:"Please Select"
        });

        $('.datepicker').datepicker();
    </script>
@endsection
