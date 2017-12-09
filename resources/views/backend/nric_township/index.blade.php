@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.nric_township.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.nric_township.management') }}
        <small>{{ trans('labels.backend.nric_township.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.nric_township.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.nric_township.includes.partials.nric-township-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
    
        <table class="table table-bordered table-striped datatable" id="nric_township-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.nric_township.table.id') }}</th>
                <th>{{ trans('labels.backend.nric_township.table.township') }}</th>
                <th>{{ trans('labels.backend.nric_township.table.short_name') }}</th>
                <th>{{ trans('labels.backend.nric_township.table.serial_no') }}</th>
                <th>{{ trans('labels.backend.nric_township.table.created') }}</th>
                <th>{{ trans('labels.backend.nric_township.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($nric_townships as $nric_township)
                <tr class="odd gradeX">
                    <td>{{ $nric_township->id }}</td>
                    <td>{{ $nric_township->township }}</td>
                    <td>{{ $nric_township->short_name }}</td>
                    <td>{{ $nric_township->serial_no }}</td>
                    <td>{!! $nric_township->created_at->diffForHumans() !!}</td>
                    <td>{{ $nric_township->updated_at->diffForHumans() }}</td>
                    <td>{!! $nric_township->action_buttons !!}</td>
                   
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

            $('#nric_township-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection