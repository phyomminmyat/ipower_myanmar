@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.civil_servant.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.civil_servant.management') }}
        <small>{{ trans('labels.backend.civil_servant.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.civil_servant.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.civil_servant.includes.partials.civil-servant-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="civil_servant-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('labels.backend.civil_servant.table.id') }}</th>
                        <th>{{ trans('labels.backend.civil_servant.table.name') }}</th>
                        <th>{{ trans('labels.backend.civil_servant.table.email') }}</th>
                        <th>{{ trans('labels.backend.civil_servant.table.department') }}</th>
                        <th>{{ trans('labels.backend.civil_servant.table.nric_code') }}</th>
                        <th>{{ trans('labels.backend.civil_servant.table.created') }}</th>
                        <th>{{ trans('labels.backend.civil_servant.table.last_updated') }}</th>
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
            $('#civil_servant-table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.civil_servant.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'department', name: ''},
                    {data: 'nric_code', name: 'nric_code'},
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
