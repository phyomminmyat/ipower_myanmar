@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter_owner.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter_owner.management') }}
        <small>{{ trans('labels.backend.meter_owner.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.meter_owner.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.meter_owner.includes.partials.meter-owner-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="meter_owner-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.meter_owner.table.id') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.name') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.email') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.nric_township') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.nric_code') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.created') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($meter_owners as $meter_owner)
                <tr class="odd gradeX">
                    <td>{{ $meter_owner->id }}</td>
                    <td>{{ $meter_owner->name }}</td>
                    <td>{{ $meter_owner->email }}</td>
                    <td>{{ $meter_owner->nric_township }}</td>
                    <td>{{ $meter_owner->nric_code }}</td>
                    <td>{!! $meter_owner->created_at->diffForHumans() !!}</td>
                    <td>{{ $meter_owner->updated_at->diffForHumans() }}</td>
                    <td>{!! $meter_owner->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
           
    </div><!--box-->

    <div class="row">
        <div style="float: left;">
            {!! $meter_owners->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $meter_owners->total()) }}
        </div>
        <div style="float: right;">
            {!! $meter_owners->render() !!}
        </div>
    </div>
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('../resources/assets/js/plugin/sweetalert/sweetalert.min.js') }}

    <script>
        $(function () {

            // $('#meter_owner-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.meter_owner.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'name', name: 'name'},
            //         {data: 'email', name: 'email'},
            //         {data: 'nric_township', name: 'nric_township'},
            //         {data: 'nric_code', name: 'nric_code'},
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
