@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
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

        <div class="box-body">
            <div class="table-responsive">
                <table id="meter-table" class="table table-condensed table-hover">
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
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            $('#meter-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.meter.get") }}',
                    type: 'post',
                    data: {trashed: false},
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'meter_no', name: 'meter_no'},
                    {data: 'owner', name: 'owner'},
                    {data: 'region', name: ''},
                    {data: 'township', name: ''},
                    {data: 'district', name: ''},
                    {data: 'village', name: ''},
                    {data: 'community', name: ''},
                    {data: 'register_date', name: 'register_date'},
                    {data: 'created_at', name: ''},
                    {data: 'updated_at', name: ''},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
