@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.region.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.region.management') }}
        <small>{{ trans('labels.backend.region.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.region.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.region.includes.partials.region-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="region-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.region.table.id') }}</th>
                <th>{{ trans('labels.backend.region.table.region_name') }}</th>
                <th>{{ trans('labels.backend.region.table.region_code') }}</th>
                <th>{{ trans('labels.backend.region.table.created') }}</th>
                <th>{{ trans('labels.backend.region.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($regions as $region)
                <tr class="odd gradeX">
                    <td>{{ $region->id }}</td>
                    <td>{{ $region->region_name }}</td>
                    <td>{{ $region->region_code }}</td>
                    <td>{!! $region->created_at->diffForHumans() !!}</td>
                    <td>{{ $region->updated_at->diffForHumans() }}</td>
                    <td>{!! $region->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->

    <div class="row">
        <div style="float: left;">
            {!! $regions->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $regions->total()) }}
        </div>
        <div style="float: right;">
            {!! $regions->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#region-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.region.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'region_name', name: 'region_name'},
            //         {data: 'region_code', name: 'region_code'},
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
