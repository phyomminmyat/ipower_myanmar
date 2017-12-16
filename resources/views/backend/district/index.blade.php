@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.district.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.district.management') }}
        <small>{{ trans('labels.backend.district.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.district.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.district.includes.partials.district-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
   

        <table class="table table-bordered table-striped datatable" id="district-table">
            <thead>
            <tr>
                <th>{{ trans('labels.backend.district.table.id') }}</th>
                <th>{{ trans('labels.backend.district.table.district_name') }}</th>
                <th>{{ trans('labels.backend.district.table.district_code') }}</th>
                <th>{{ trans('labels.backend.district.table.created') }}</th>
                <th>{{ trans('labels.backend.district.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($districts as $district)
                <tr class="odd gradeX">
                    <td>{{ $district->id }}</td>
                    <td>{{ $district->district_name }}</td>
                    <td>{{ $district->district_code }}</td>
                    <td>{!! $district->created_at->diffForHumans() !!}</td>
                    <td>{{ $district->updated_at->diffForHumans() }}</td>
                    <td>{!! $district->action_buttons !!}</td>
                   
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

            $('#district-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection