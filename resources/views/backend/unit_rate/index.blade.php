@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.unit_rate.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.unit_rate.management') }}
        <small>{{ trans('labels.backend.unit_rate.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.unit_rate.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.unit_rate.includes.partials.unit-rate-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="clearfix"></div>
        <table class="table table-bordered table-striped datatable" id="unit_rate-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.unit_rate.table.id') }}</th>
                <th>{{ trans('labels.backend.unit_rate.table.meter_type') }}</th>
                <th>{{ trans('labels.backend.unit_rate.table.unit_price') }}</th>
                <th>{{ trans('labels.backend.unit_rate.table.created') }}</th>
                <th>{{ trans('labels.backend.unit_rate.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($unit_rates as $unit_rate)
                <tr class="odd gradeX">
                    <td>{{ $unit_rate->id }}</td>
                    <td>{{ $unit_rate->meter_type }}</td>
                    <td>{{ $unit_rate->unit_price }}</td>
                    <td>{!! $unit_rate->created_at->diffForHumans() !!}</td>
                    <td>{{ $unit_rate->updated_at->diffForHumans() }}</td>
                    <td>{!! $unit_rate->action_buttons !!}</td>
                   
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
            
            $('#unit_rate-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });

        } );
    </script>
@endsection