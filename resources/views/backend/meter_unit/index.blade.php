@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter_unit.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter_unit.management') }}
        <small>{{ trans('labels.backend.meter_unit.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.meter_unit.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.meter_unit.includes.partials.meter-unit-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="meter_unit-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.meter_unit.table.id') }}</th>
                <th>{{ trans('labels.backend.meter_unit.table.meter') }}</th>
                <th>{{ trans('labels.backend.meter_unit.table.read_date') }}</th>
                <th>{{ trans('labels.backend.meter_unit.table.unit') }}</th>
                <th>{{ trans('labels.backend.meter_unit.table.service_amount') }}</th>
                <th>{{ trans('labels.backend.meter_unit.table.created') }}</th>
                <th>{{ trans('labels.backend.meter_unit.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($monthly_meter_units as $meter_unit)
                <tr class="odd gradeX">
                    <td>{{ $meter_unit->id }}</td>
                    <td>{{ $meter_unit->meter_id }}</td>
                    <td>{{ $meter_unit->read_date }}</td>
                    <td>{{ $meter_unit->reading_unit }}</td>
                    <td>{{ $meter_unit->total_amount }}</td>
                    <td>{!! $meter_unit->created_at->diffForHumans() !!}</td>
                    <td>{{ $meter_unit->updated_at->diffForHumans() }}</td>
                    <td>{!! $meter_unit->action_buttons !!}</td>
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

            $('#meter_unit-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection