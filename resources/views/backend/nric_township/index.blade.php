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
    
        <table class="table table-bordered table-striped datatable" id="nric_township-table">
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
            <tbody>
                @foreach($nric_townships as $nric_township)
                <tr class="odd gradeX">
                    <td>{{ $nric_township->id }}</td>
                    <td>{{ $nric_township->township }}</td>
                    <td>{{ $nric_township->short_name }}</td>
                    <td>{{ $nric_township->serial_no }}</td>
                    <td>{!! $nric_township->created_at->diffForHumans() !!}</td>
                    <td>{{ $nric_township->updated_at->diffForHumans() }}</td>
                    <td>{!! $nric_township->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->
    
    <div class="row">
        <div style="float: left;">
            {!! $nric_townships->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $nric_townships->total()) }}
        </div>
        <div style="float: right;">
            {!! $nric_townships->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#nric_township-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.nric_township.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'township', name: 'nric_code'},
            //         {data: 'short_name', name: 'short_name'},
            //         {data: 'serial_no', name: 'serial_no'},
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
