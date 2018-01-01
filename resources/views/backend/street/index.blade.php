@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.street.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.street.management') }}
        <small>{{ trans('labels.backend.street.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.street.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.street.includes.partials.street-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="street-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.street.table.id') }}</th>
                <th>{{ trans('labels.backend.street.table.community') }}</th>
                <th>{{ trans('labels.backend.street.table.street_name') }}</th>
                <th>{{ trans('labels.backend.street.table.street_code') }}</th>
                <th>{{ trans('labels.backend.street.table.created') }}</th>
                <th>{{ trans('labels.backend.street.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($street as $street)
                <tr class="odd gradeX">
                    <td>{{ $street->id }}</td>
                    <td>{{ $street->community->community_name }}</td>
                    <td>{{ $street->street_name }}</td>
                    <td>{{ $street->street_code }}</td>
                    <td>{!! $street->created_at->diffForHumans() !!}</td>
                    <td>{{ $street->updated_at->diffForHumans() }}</td>
                    <td>{!! $street->action_buttons !!}</td>
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

            $('#street-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection
