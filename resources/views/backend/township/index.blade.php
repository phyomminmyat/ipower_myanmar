@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.township.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.township.management') }}
        <small>{{ trans('labels.backend.township.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.township.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.township.includes.partials.township-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="township-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.township.table.id') }}</th>
                <th>{{ trans('labels.backend.township.table.district') }}</th>
                <th>{{ trans('labels.backend.township.table.township_name') }}</th>
                <th>{{ trans('labels.backend.township.table.township_code') }}</th>
                <th>{{ trans('labels.backend.township.table.created') }}</th>
                <th>{{ trans('labels.backend.township.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($townships as $township)
                <tr class="odd gradeX">
                    <td>{{ $township->id }}</td>
                    <td>{{ $township->district->district_name }}</td>
                    <td>{{ $township->township_name }}</td>
                    <td>{{ $township->township_code }}</td>
                    <td>{!! $township->created_at->diffForHumans() !!}</td>
                    <td>{{ $township->updated_at->diffForHumans() }}</td>
                    <td>{!! $township->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->
    <div class="row">
        <div style="float: left;">
            {!! $townships->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $townships->total()) }}
        </div>
        <div style="float: right;">
            {!! $townships->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#township-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.township.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'district', name: ''},
            //         {data: 'township_name', name: 'township_name'},
            //         {data: 'township_code', name: 'township_code'},
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
