@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.notification.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.notification.management') }}
        <small>{{ trans('labels.backend.notification.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.notification.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.notification.includes.partials.notification-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="notification-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.notification.table.id') }}</th>
                <th>{{ trans('labels.backend.notification.table.street') }}</th>
                <th>{{ trans('labels.backend.notification.table.name') }}</th>
                <th>{{ trans('labels.backend.notification.table.created') }}</th>
                <th>{{ trans('labels.backend.notification.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($notifications as $notification)
                <tr class="odd gradeX">
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->street->street_name }}</td>
                    <td>{{ $notification->name }}</td>
                    <td>{!! $notification->created_at->diffForHumans() !!}</td>
                    <td>{{ $notification->updated_at->diffForHumans() }}</td>
                    <td>{!! $notification->action_buttons !!}</td>
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

            $('#notification-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection
