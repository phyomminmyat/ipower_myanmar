@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.lamp.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.lamp.management') }}
        <small>{{ trans('labels.backend.lamp.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.lamp.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.lamp.includes.partials.lamp-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="lamp-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.lamp.table.id') }}</th>
                <th>{{ trans('labels.backend.lamp.table.lamp_post_name') }}</th>
                <th>{{ trans('labels.backend.lamp.table.street') }}</th>
                <th>{{ trans('labels.backend.lamp.table.latitude') }}</th>
                <th>{{ trans('labels.backend.lamp.table.longitude') }}</th>
                <th>{{ trans('labels.backend.lamp.table.created') }}</th>
                <th>{{ trans('labels.backend.lamp.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($lamp as $lamp)
                <tr class="odd gradeX">
                    <td>{{ $lamp->id }}</td>
                    <td>{{ $lamp->street->street_name }}</td>
                    <td>{{ $lamp->lamp_post_name }}</td>
                    <td>{{ $lamp->latitude }}</td>
                    <td>{{ $lamp->longitude }}</td>
                    <td>{!! $lamp->created_at->diffForHumans() !!}</td>
                    <td>{{ $lamp->updated_at->diffForHumans() }}</td>
                    <td>{!! $lamp->action_buttons !!}</td>
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

            $('#lamp-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection
