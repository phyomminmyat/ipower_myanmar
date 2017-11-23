@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.community.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.community.management') }}
        <small>{{ trans('labels.backend.community.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.community.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.communities.includes.partials.community-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="community-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.community.table.id') }}</th>
                <th>{{ trans('labels.backend.community.table.village') }}</th>
                <th>{{ trans('labels.backend.community.table.community_name') }}</th>
                <th>{{ trans('labels.backend.community.table.community_code') }}</th>
                <th>{{ trans('labels.backend.community.table.created') }}</th>
                <th>{{ trans('labels.backend.community.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($communities as $community)
                <tr class="odd gradeX">
                    <td>{{ $community->id }}</td>
                    <td>{{ $community->village->village_name }}</td>
                    <td>{{ $community->community_name }}</td>
                    <td>{{ $community->community_code }}</td>
                    <td>{!! $community->created_at->diffForHumans() !!}</td>
                    <td>{{ $community->updated_at->diffForHumans() }}</td>
                    <td>{!! $community->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--box-->
    <div class="row">
        <div style="float: left;">
            {!! $communities->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $communities->total()) }}
        </div>
        <div style="float: right;">
            {!! $communities->render() !!}
        </div>
    </div>

@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            // $('#community-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.communities.get") }}',
            //         type: 'post'
            //     },
            //     columns: [
            //         {data: 'id', name: 'id'},
            //         {data: 'village', name: ''},
            //         {data: 'community_name', name: 'community_name'},
            //         {data: 'community_code', name: 'community_code'},
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
