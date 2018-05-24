@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.report_type.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.report_type.management') }}
        <small>{{ trans('labels.backend.report_type.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.report_type.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.report_type.includes.partials.report-type-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="clearfix"></div>
        <table class="table table-bordered table-striped datatable" id="report_type-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.report_type.table.id') }}</th>
                <th>{{ trans('labels.backend.report_type.table.type_name') }}</th>
                <th>{{ trans('labels.backend.report_type.table.created') }}</th>
                <th>{{ trans('labels.backend.report_type.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($report_types as $report_type)
                <tr class="odd gradeX">
                    <td>{{ $report_type->id }}</td>
                    <td>{{ $report_type->type_name }}</td>
                    <td>{!! $report_type->created_at->diffForHumans() !!}</td>
                    <td>{!! $report_type->updated_at->diffForHumans() !!}</td>
                    <td>{!! $report_type->action_buttons !!}</td>
                   
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
            
            $('#report_type-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });

        } );
    </script>
@endsection