@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit') )

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($user, ['route' => ['admin.access.user.update', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
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
                                {{ Form::label('first_name', trans('validation.attributes.backend.access.users.first_name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('first_name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.first_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('last_name', trans('validation.attributes.backend.access.users.last_name'),
                                ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('last_name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.last_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('department_id', trans('validation.attributes.backend.access.users.department'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='department_id'>
                                        <option value="">Select</option>
                                        @foreach($departments as $department)
                                            @if($user->department_id == $department->id)
                                                <option value="{{ $department->id }}" selected>{{ $department->department_name }}</option>
                                            @else
                                                <option value="{{ $department->id }}"> {{ $department->department_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 
                            
                            <div class="form-group">
                                {{ Form::label('dob', trans('validation.attributes.backend.access.users.dob'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('dob', null, ['class' => 'form-control datepicker', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.dob')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('contact_no', trans('validation.attributes.backend.access.users.contact_no'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('contact_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.contact_no')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('fax_no', trans('validation.attributes.backend.access.users.fax_no'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('fax_no', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.fax_no')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                        
                            <div class="form-group">
                                {{ Form::label('nric_code', trans('validation.attributes.backend.access.users.nric_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='nric_code'>
                                        <option value="">Select</option>
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
                                {{ Form::label('gender', trans('validation.attributes.backend.access.users.gender'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='gender'>
                                        <option value="">Select</option>
                                        <option value="male" {{ ($user->gender == 'male') ? "selected" : ''}}>Male</option>
                                        <option value="male" {{ ($user->gender == 'female') ? "selected" : ''}}>Female</option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('martial_status', trans('validation.attributes.backend.access.users.martial_status'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='martial_status'>
                                        <option value="">Select</option>
                                        <option value="single" {{ ($user->martial_status == 'single') ? "selected" : ''}}>Single</option>
                                        <option value="married" {{ ($user->martial_status == 'married') ? "selected" : ''}}> Married </option>
                                        <option value="separated" {{ ($user->martial_status == 'separated') ? "selected" : ''}}> Separated </option>
                                        <option value="divorced" {{ ($user->martial_status == 'divorced') ? "selected" : ''}}> Divorced </option>
                                        <option value="widowed" {{ ($user->martial_status == 'widowed') ? "selected" : ''}}> Widowed </option>
                                        <option value="single_parent" {{ (old('martial_status') == 'single_parent') ? "selected" : ''}}> Single Parent </option>
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('nationality', trans('validation.attributes.backend.access.users.nationality'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('nationality', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.nationality')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                            
                            <div class="form-group">
                                {{ Form::label('address', trans('validation.attributes.backend.access.users.address'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.address')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('position', trans('validation.attributes.backend.access.users.position'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('position', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.access.users.position')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            @if ($user->id != 1)
                                <div class="form-group">
                                    {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}

                                    <div class="col-lg-1">
                                        {{ Form::checkbox('status', '1', $user->status == 1) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->

                                <div class="form-group">
                                    {{ Form::label('is_meter_owner', trans('validation.attributes.backend.access.users.is_meter_owner'), ['class' => 'col-lg-2 control-label']) }}

                                    <div class="col-lg-1">
                                        {{ Form::checkbox('is_meter_owner', '1', $user->is_meter_owner == 1) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->

                                <div class="form-group">
                                    {{ Form::label('is_civil_servant', trans('validation.attributes.backend.access.users.is_civil_servant'), ['class' => 'col-lg-2 control-label']) }}

                                    <div class="col-lg-1">
                                        {{ Form::checkbox('is_civil_servant', '1', $user->is_civil_servant == 1) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->

                                <div class="form-group">
                                    {{ Form::label('associated_roles', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                                    <div class="col-lg-3">
                                        @if (count($roles) > 0)
                                            @foreach($roles as $role)
                                                <input type="checkbox" value="{{$role->id}}" name="assignees_roles[{{ $role->id }}]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $user_roles) ? 'checked' : '') }} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{{ $role->name }}</label>
                                                    <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                                                        (
                                                            <span class="show-text">{{ trans('labels.general.show') }}</span>
                                                            <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                                            {{ trans('labels.backend.access.users.permissions') }}
                                                        )
                                                    </a>
                                                <br/>
                                                <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                                    @if ($role->all)
                                                        {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                                                    @else
                                                        @if (count($role->permissions) > 0)
                                                            <blockquote class="small">{{--
                                                        --}}@foreach ($role->permissions as $perm){{--
                                                        --}}{{$perm->display_name}}<br/>
                                                                @endforeach
                                                            </blockquote>
                                                        @else
                                                            {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                                        @endif
                                                    @endif
                                                </div><!--permission list-->
                                            @endforeach
                                        @else
                                            {{ trans('labels.backend.access.users.no_roles') }}
                                        @endif
                                    </div><!--col-lg-3-->
                                </div><!--form control-->
                            @endif
                        </div><!-- /.box-body -->

                    </div>
                
                </div>
            </div>


        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

        @if ($user->id == 1)
            {{ Form::hidden('status', 1) }}
            {{ Form::hidden('assignees_roles[0]', 1) }}
        @endif

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
