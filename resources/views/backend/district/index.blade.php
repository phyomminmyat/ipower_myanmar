@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.district.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.district.management') }}
        <small>{{ trans('labels.backend.district.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.district.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.district.includes.partials.district-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
   

        <table class="table table-bordered table-striped datatable" id="district-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.district.table.id') }}</th>
                <th>{{ trans('labels.backend.district.table.district_name') }}</th>
                <th>{{ trans('labels.backend.district.table.district_code') }}</th>
                <th>{{ trans('labels.backend.district.table.created') }}</th>
                <th>{{ trans('labels.backend.district.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($districts as $district)
                <tr class="odd gradeX">
                    <td>{{ $district->id }}</td>
                    <td>{{ $district->district_name }}</td>
                    <td>{{ $district->district_code }}</td>
                    <td>{!! $district->created_at->diffForHumans() !!}</td>
                    <td>{{ $district->updated_at->diffForHumans() }}</td>
                    <td>{!! $district->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--box-->

    <div class="row">
        <div style="float: left;">
            {!! $districts->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $districts->total()) }}
        </div>
        <div style="float: right;">
            {!! $districts->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#district-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.district.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'district_name', name: 'district_name'},
            //         {data: 'district_code', name: 'district_code'},
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
