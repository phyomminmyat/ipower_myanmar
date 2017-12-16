@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.community.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
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
@endsection

@section('after-scripts')
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('js/backend/assets/select2/select2.min.js') }}
    {{ HTML::script('js/backend/assets/neon-chat.js') }}

    <script>
        $(function () {

            $('#community-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection
