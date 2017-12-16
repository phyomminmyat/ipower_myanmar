@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.township.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.township.management') }}
        <small>{{ trans('labels.backend.township.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.township.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.township.includes.partials.township-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="township-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.township.table.id') }}</th>
                <th>{{ trans('labels.backend.township.table.district') }}</th>
                <th>{{ trans('labels.backend.township.table.township_name') }}</th>
                <th>{{ trans('labels.backend.township.table.township_code') }}</th>
                <th>{{ trans('labels.backend.township.table.created') }}</th>
                <th>{{ trans('labels.backend.township.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($townships as $township)
                <tr class="odd gradeX">
                    <td>{{ $township->id }}</td>
                    <td>{{ $township->district->district_name }}</td>
                    <td>{{ $township->township_name }}</td>
                    <td>{{ $township->township_code }}</td>
                    <td>{!! $township->created_at->diffForHumans() !!}</td>
                    <td>{{ $township->updated_at->diffForHumans() }}</td>
                    <td>{!! $township->action_buttons !!}</td>
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
            $('#township-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection