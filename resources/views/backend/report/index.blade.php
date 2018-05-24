@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.report.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.report.management') }}
        <small>{{ trans('labels.backend.report.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.report.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.report.includes.partials.report-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="report-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.report.table.id') }}</th>
                <th>{{ trans('labels.backend.report.table.report_type') }}</th>
                <th>{{ trans('labels.backend.report.table.report_name') }}</th>
                <th>{{ trans('labels.backend.report.table.created') }}</th>
                <th>{{ trans('labels.backend.report.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($reports as $report)
                <tr class="odd gradeX">
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->report_type->type_name }}</td>
                    <td>{{ $report->report_name }}</td>
                    <td>{!! $report->created_at->diffForHumans() !!}</td>
                    <td>{!! $report->updated_at->diffForHumans() !!}</td>
                    <td>{!! $report->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('js/backend/assets/select2/select2.min.js') }}
    {{ HTML::script('js/backend/assets/neon-chat.js') }}

    <script>
        $(function () {

            $('#report-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection
