@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.village_tract.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.village_tract.management') }}
        <small>{{ trans('labels.backend.village_tract.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.village_tract.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.village_tract.includes.partials.village-tract-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
  
        <table class="table table-bordered table-striped datatable" id="village_tract-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.village_tract.table.id') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.township') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.village_tract_name') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.village_tract_code') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.created') }}</th>
                <th>{{ trans('labels.backend.village_tract.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($village_tracts as $village_tract)
                <tr class="odd gradeX">
                    <td>{{ $village_tract->id }}</td>
                    <td>{{ $village_tract->township->township_name }}</td>
                    <td>{{ $village_tract->village_name }}</td>
                    <td>{{ $village_tract->village_code }}</td>
                    <td>{!! $village_tract->created_at->diffForHumans() !!}</td>
                    <td>{{ $village_tract->updated_at->diffForHumans() }}</td>
                    <td>{!! $village_tract->action_buttons !!}</td>
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

            $('#village_tract-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection