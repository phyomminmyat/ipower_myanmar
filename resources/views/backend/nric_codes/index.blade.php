@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.nric_codes.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.nric_codes.management') }}
        <small>{{ trans('labels.backend.nric_codes.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.nric_codes.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.nric_codes.includes.partials.nric-code-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="clearfix"></div>
        <table class="table table-bordered table-striped datatable" id="nric_codes-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.nric_codes.table.id') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.nric_code') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.description') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.created') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($nric_codes as $nric_code)
                <tr class="odd gradeX">
                    <td>{{ $nric_code->id }}</td>
                    <td>{{ $nric_code->nric_code }}</td>
                    <td>{{ $nric_code->description }}</td>
                    <td>{!! $nric_code->created_at->diffForHumans() !!}</td>
                    <td>{{ $nric_code->updated_at->diffForHumans() }}</td>
                    <td>{!! $nric_code->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('js/backend/assets/select2/select2.min.js') }}

    <script>
        $(function () {
            
            $('#nric_codes-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });

        } );
    </script>
@endsection