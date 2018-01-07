@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.permission.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.permission.management') }}
        <small>{{ trans('labels.backend.access.permission.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.permission.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.permission.includes.partials.permission-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="permission-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.access.permission.table.id') }}</th>
                <th>{{ trans('labels.backend.access.permission.table.name') }}</th>
                <th>{{ trans('labels.backend.access.permission.table.display_name') }}</th>
                <th>{{ trans('labels.backend.access.permission.table.system') }}</th>
                <th>{{ trans('labels.backend.access.permission.table.created') }}</th>
                <th>{{ trans('labels.backend.access.permission.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr class="odd gradeX">
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->display_name }}</td>
                    <td>{!! $permission->system_label !!}</td>
                    <td>{!! $permission->created_at->diffForHumans() !!}</td>
                    <td>{{ $permission->updated_at->diffForHumans() }}</td>
                    <td>{!! $permission->action_buttons !!}</td>
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

            $('#permission-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection