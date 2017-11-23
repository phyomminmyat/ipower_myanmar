@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter_owner.management') . ' | ' . trans('labels.backend.meter_owner.edit'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css")}}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter_owner.management') }}
        <small>{{ trans('labels.backend.meter_owner.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($meter_owner, ['route' => ['admin.meter_owner.update', $meter_owner], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.meter_owner.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.meter_owner.includes.partials.meter-owner-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-primary" data-collapsed="0">
                    
                        <div class="panel-heading">
                            <div class="panel-title">
                               
                            </div>
                        </div>
                        
                        <div class="box-body">
                            <div class="form-group">
                                {{ Form::label('name', trans('validation.attributes.backend.meter_owner.name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('nric_township', trans('validation.attributes.backend.meter_owner.nric_township'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='nric_township'>
                                        <option></option>
                                        @foreach($nric_townships as $nric_township)
                                            @if($nric_township->id) == $meter_owner->nric_township_id)
                                                <option value="{{ $nric_township->id }}" selected>{{ $nric_township->township }}</option>
                                            @else
                                                <option value="{{ $nric_township->id }}"> {{ $nric_township->township}} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 
                            
                            <div class="form-group">
                                {{ Form::label('email', trans('validation.attributes.backend.meter_owner.email'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.email')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <input type="hidden" name="password" value="{{$meter_owner->password}}">

                           <!--  <div class="form-group">
                                {{ Form::label('password', trans('validation.attributes.backend.meter_owner.password'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('password', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.password')]) }}
                                </div>
                            </div>
                            -->
                            <div class="form-group">
                                {{ Form::label('dob', trans('validation.attributes.backend.meter_owner.dob'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('dob', null, ['class' => 'form-control datepicker', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.dob')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('contact_no', trans('validation.attributes.backend.meter_owner.contact_no'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('contact_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.contact_no')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('fax_no', trans('validation.attributes.backend.meter_owner.fax_no'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('fax_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.fax_no')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                        

                            <div class="form-group">
                                {{ Form::label('nric_code', trans('validation.attributes.backend.meter_owner.nric_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='nric_code'>
                                        <option></option>
                                        @foreach($nric_codes as $nric_code)
                                            @if($nric_code->id) == $meter_owner->nric_code)
                                                <option value="{{ $nric_code->id }}" selected>{{ $nric_code->nric_code }}</option>
                                            @else
                                                <option value="{{ $nric_code->id }}"> {{ $nric_code->nric_code }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 
                            
                            
                            <div class="form-group">
                                {{ Form::label('gender', trans('validation.attributes.backend.meter_owner.gender'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='gender'>
                                        <option></option>
                                        <option value="male" {{ (($meter_owner->gender) == 'male') ? "selected" : '' }}>Male</option>
                                        <option value="female" {{ (($meter_owner->gender) == 'female') ? "selected" : '' }}>Female</option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('martial_status', trans('validation.attributes.backend.meter_owner.martial_status'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='martial_status'>
                                        <option></option>
                                        <option value="single" {{ (($meter_owner->martial_status) == 'single') ?  'selected' : '' }}>Single</option>
                                        <option value="married" {{ (($meter_owner->martial_status) == 'married') ?  'selected' : '' }}> Married </option>
                                        <option value="separated" {{ (($meter_owner->martial_status) == 'separated') ?  'selected' : '' }}> Separated </option>
                                        <option value="divorced" {{ (($meter_owner->martial_status) == 'divorced') ?  'selected' : '' }}> Divorced </option>
                                        <option value="widowed" {{ (($meter_owner->martial_status) == 'widowed') ?  'selected' : '' }}> Widowed </option>
                                        <option value="single_parent" {{ (($meter_owner->martial_status) == 'single_parent') ?  'selected' : '' }}> Single Parent </option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('nationality', trans('validation.attributes.backend.meter_owner.nationality'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('nationality', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.nationality')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            
                            <div class="form-group">
                                {{ Form::label('address', trans('validation.attributes.backend.meter_owner.address'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.address')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('position', trans('validation.attributes.backend.meter_owner.position'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('position', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.meter_owner.position')]) }}
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
                    {{ link_to_route('admin.meter_owner.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js") }}
    <!-- {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js") }} -->
    {{ HTML::script('js/backend/assets/bootstrap-datepicker.js') }}
    
    <script type="text/javascript">
        
        $('.select2').select2({ 
            placeholder:"Please Select"
        });
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
