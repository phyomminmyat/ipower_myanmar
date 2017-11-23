@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.village_tract.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.village_tract.management') }}
        <small>{{ trans('labels.backend.village_tract.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.village_tract.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.village_tract.includes.partials.village-tract-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
  
        <table class="table table-bordered table-striped datatable" id="village_tract-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.village_tract.table.id') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.township') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.village_tract_name') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.village_tract_code') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.created') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($village_tracts as $village_tract)
                <tr class="odd gradeX">
                    <td>{{ $village_tract->id }}</td>
                    <td>{{ $village_tract->township->township_name }}</td>
                    <td>{{ $village_tract->village_name }}</td>
                    <td>{{ $village_tract->village_code }}</td>
                    <td>{!! $village_tract->created_at->diffForHumans() !!}</td>
                    <td>{{ $village_tract->updated_at->diffForHumans() }}</td>
                    <td>{!! $village_tract->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->
    <div class="row">
        <div style="float: left;">
            {!! $village_tracts->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $village_tracts->total()) }}
        </div>
        <div style="float: right;">
            {!! $village_tracts->render() !!}
        </div>
    </div>
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#village_tract-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.village_tract.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'township', name: ''},
            //         {data: 'village_name', name: 'village_name'},
            //         {data: 'village_code', name: 'village_tract_code'},
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
