@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.nric_township.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.nric_township.management') }}
        <small>{{ trans('labels.backend.nric_township.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.nric_township.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.nric_township.includes.partials.nric-township-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="nric_township-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.nric_township.table.id') }}</th>
                        <th>{{ trans('labels.backend.nric_township.table.township') }}</th>
                        <th>{{ trans('labels.backend.nric_township.table.short_name') }}</th>
                        <th>{{ trans('labels.backend.nric_township.table.serial_no') }}</th>
                        <th>{{ trans('labels.backend.nric_township.table.created') }}</th>
                        <th>{{ trans('labels.backend.nric_township.table.last_updated') }}</th>
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
            $('#nric_township-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.nric_township.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'township', name: 'nric_code'},
                    {data: 'short_name', name: 'short_name'},
                    {data: 'serial_no', name: 'serial_no'},
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
