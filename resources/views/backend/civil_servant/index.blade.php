@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.civil_servant.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.civil_servant.management') }}
        <small>{{ trans('labels.backend.civil_servant.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.civil_servant.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.civil_servant.includes.partials.civil-servant-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="civil_servant-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.civil_servant.table.id') }}</th>
                <th>{{ trans('labels.backend.civil_servant.table.name') }}</th>
                <th>{{ trans('labels.backend.civil_servant.table.email') }}</th>
                <th>{{ trans('labels.backend.civil_servant.table.department') }}</th>
                <th>{{ trans('labels.backend.civil_servant.table.nric_code') }}</th>
                <th>{{ trans('labels.backend.civil_servant.table.created') }}</th>
                <th>{{ trans('labels.backend.civil_servant.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($civil_servants as $civil_servant)
                <tr class="odd gradeX">
                    <td>{{ $civil_servant->id }}</td>
                    <td>{{ $civil_servant->name }}</td>
                    <td>{{ $civil_servant->email }}</td>
                    <td>{{ $civil_servant->department->department_name }}</td>
                    <td>{{ $civil_servant->nric_code }}</td>
                    <td>{!! $civil_servant->created_at->diffForHumans() !!}</td>
                    <td>{{ $civil_servant->updated_at->diffForHumans() }}</td>
                    <td>{!! $civil_servant->action_buttons !!}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}

    <script>
        $(function () {

            $('#civil_servant-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection