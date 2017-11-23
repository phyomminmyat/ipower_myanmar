@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.community.management') . ' | ' . trans('labels.backend.community.create'))

@section('after-styles')
      {{ Html::style("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.community.management') }}
        <small>{{ trans('labels.backend.community.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.communities.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.community.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.communities.includes.partials.community-header-buttons')
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
                                {{ Form::label('community_name', trans('validation.attributes.backend.community.community_name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('community_name', null, ['class' => 'form-control','autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.community.community_name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('village_tract_id', trans('validation.attributes.backend.community.village'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <select class='form-control' name='village_tract_id'>
                                        <option value="">Select</option>
                                        @foreach($villages as $village)
                                            @if(old('village') == $village->id)
                                                <option value="{{ $village->id }}" selected>{{ $village->village_name }}</option>
                                            @else
                                                <option value="{{ $village->id }}"> {{ $village->village_name }} </option>
                                            @endif
                                        @endforeach
                                    </select><br>
                                </div><!--col-lg-10-->
                            </div> 

                            <div class="form-group">
                                {{ Form::label('community_code', trans('validation.attributes.backend.community.community_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('community_code', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.community.community_code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group">
                                {{ Form::label('description', trans('validation.attributes.backend.community.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.backend.community.description')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                        </div><!-- /.box-body -->
                    </div>
                
                </div>
            </div>
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.communities.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
