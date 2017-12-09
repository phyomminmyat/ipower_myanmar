@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter.management') }}
        <small>{{ trans('labels.backend.meter.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.meter.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.meter.includes.partials.meter-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="meter-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.meter.table.id') }}</th>
                <th>{{ trans('labels.backend.meter.table.meter_no') }}</th>
                <th>{{ trans('labels.backend.meter.table.owner') }}</th>
                <th>{{ trans('labels.backend.meter.table.region') }}</th>
                <th>{{ trans('labels.backend.meter.table.township') }}</th>
                <th>{{ trans('labels.backend.meter.table.district') }}</th>
                <th>{{ trans('labels.backend.meter.table.village') }}</th>
                <th>{{ trans('labels.backend.meter.table.community') }}</th>
                <th>{{ trans('labels.backend.meter.table.register_date') }}</th>
                <th>{{ trans('labels.backend.meter.table.created') }}</th>
                <th>{{ trans('labels.backend.meter.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($meters as $meter)
                <tr class="odd gradeX">
                    <td>{{ $meter->id }}</td>
                    <td>{{ $meter->meter_no }}</td>
                    <td>{{ $meter->owner->name }}</td>
                    <td>{{ $meter->region->region_name }}</td>
                    <td>{{ $meter->township->township_name }}</td>
                    <td>{{ $meter->district->district_name }}</td>
                    <td>{{ $meter->village->village_name }}</td>
                    <td>{{ $meter->community->community_name }}</td>
                    <td>{{ $meter->register_date }}</td>
                    <td>{!! $meter->created_at->diffForHumans() !!}</td>
                    <td>{{ $meter->updated_at->diffForHumans() }}</td>
                    <td>{!! $meter->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
           
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}

    <script>
        $(function () {

            $('#meter-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection