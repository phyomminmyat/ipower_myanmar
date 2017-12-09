@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.region.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.region.management') }}
        <small>{{ trans('labels.backend.region.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.region.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.region.includes.partials.region-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="region-table">
            
            <thead>
            <tr>
                <th>{{ trans('labels.backend.region.table.id') }}</th>
                <th>{{ trans('labels.backend.region.table.region_name') }}</th>
                <th>{{ trans('labels.backend.region.table.region_code') }}</th>
                <th>{{ trans('labels.backend.region.table.created') }}</th>
                <th>{{ trans('labels.backend.region.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($regions as $region)
                <tr class="odd gradeX">
                    <td>{{ $region->id }}</td>
                    <td>{{ $region->region_name }}</td>
                    <td>{{ $region->region_code }}</td>
                    <td>{!! $region->created_at->diffForHumans() !!}</td>
                    <td>{{ $region->updated_at->diffForHumans() }}</td>
                    <td>{!! $region->action_buttons !!}</td>
                   
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

            $('#region-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection