@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.nric_codes.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.nric_codes.management') }}
        <small>{{ trans('labels.backend.nric_codes.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.nric_codes.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.nric_codes.includes.partials.nric-code-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="clearfix"></div>
        <table class="table table-bordered table-striped datatable" id="nric_codes-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.nric_codes.table.id') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.nric_code') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.created') }}</th>
                <th>{{ trans('labels.backend.nric_codes.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($nric_codes as $nric_code)
                <tr class="odd gradeX">
                    <td>{{ $nric_code->id }}</td>
                    <td>{{ $nric_code->nric_code }}</td>
                    <td>{!! $nric_code->created_at->diffForHumans() !!}</td>
                    <td>{{ $nric_code->updated_at->diffForHumans() }}</td>
                    <td>{!! $nric_code->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->
    <div class="row">
        <div style="float: left;">
            {!! $nric_codes->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $nric_codes->total()) }}
        </div>
        <div style="float: right;">
            {!! $nric_codes->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}

    <script>
        $(function () {
            // $('#nric_codes-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.nric_codes.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
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
