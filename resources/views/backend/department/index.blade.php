@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.department.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.department.management') }}
        <small>{{ trans('labels.backend.department.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.department.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.department.includes.partials.department-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="department-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.department.table.id') }}</th>
                <th>{{ trans('labels.backend.department.table.department_name') }}</th>
                <th>{{ trans('labels.backend.department.table.region') }}</th>
                <th>{{ trans('labels.backend.department.table.township') }}</th>
                <th>{{ trans('labels.backend.department.table.district') }}</th>
                <th>{{ trans('labels.backend.department.table.village') }}</th>
                <th>{{ trans('labels.backend.department.table.community') }}</th>
                <th>{{ trans('labels.backend.department.table.department_code') }}</th>
                <th>{{ trans('labels.backend.department.table.created') }}</th>
                <th>{{ trans('labels.backend.department.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($departments as $department)
                <tr class="odd gradeX">
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>{{ $department->region->region_name }}</td>
                    <td>{{ $department->township->township_name }}</td>
                    <td>{{ $department->district->district_name }}</td>
                    <td>{{ $department->village->village_name }}</td>
                    <td>{{ $department->community->community_name }}</td>
                    <td>{{ $department->department_code }}</td>
                    <td>{!! $department->created_at->diffForHumans() !!}</td>
                    <td>{{ $department->updated_at->diffForHumans() }}</td>
                    <td>{!! $department->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--box-->

    <div class="row">
        <div style="float: left;">
            {!! $departments->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $departments->total()) }}
        </div>
        <div style="float: right;">
            {!! $departments->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#department-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.department.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'department_name', name: 'department_name'},
            //         {data: 'region', name: ''},
            //         {data: 'township', name: ''},
            //         {data: 'district', name: ''},
            //         {data: 'village', name: ''},
            //         {data: 'community', name: ''},
            //         {data: 'department_code', name: 'department_code'},
            //         {data: 'created_at', name: ''},
            //         {data: 'updated_at', name: ''},
            //         {data: 'actions', name: 'actions', searchable: false, sortable: false}
            //     ],
            //     order: [[0, "asc"]],
            //     searchDelay: 500
            // });
        });
    </script>
@endsection
