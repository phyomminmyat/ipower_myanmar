@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meter_owner.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.meter_owner.management') }}
        <small>{{ trans('labels.backend.meter_owner.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.meter_owner.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.meter_owner.includes.partials.meter-owner-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="meter_owner-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.meter_owner.table.id') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.name') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.email') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.nric_township') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.nric_code') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.created') }}</th>
                <th>{{ trans('labels.backend.meter_owner.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($meter_owners as $meter_owner)
                <tr class="odd gradeX">
                    <td>{{ $meter_owner->id }}</td>
                    <td>{{ $meter_owner->name }}</td>
                    <td>{{ $meter_owner->email }}</td>
                    <td>{{ $meter_owner->nric_township }}</td>
                    <td>{{ $meter_owner->nric_code }}</td>
                    <td>{!! $meter_owner->created_at->diffForHumans() !!}</td>
                    <td>{{ $meter_owner->updated_at->diffForHumans() }}</td>
                    <td>{!! $meter_owner->action_buttons !!}</td>
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

            $('#meter_owner-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection