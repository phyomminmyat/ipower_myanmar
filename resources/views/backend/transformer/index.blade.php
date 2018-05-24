@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.transformer.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.transformer.management') }}
        <small>{{ trans('labels.backend.transformer.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.transformer.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.transformer.includes.partials.transformer-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="transformer-table">

            <thead>
            <tr>
                <th>{{ trans('labels.backend.transformer.table.id') }}</th>
                <th>{{ trans('labels.backend.transformer.table.transformer_name') }}</th>
                <th>{{ trans('labels.backend.transformer.table.street') }}</th>
                <th>{{ trans('labels.backend.transformer.table.created') }}</th>
                <th>{{ trans('labels.backend.transformer.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
            </thead>

            <tbody>
                @foreach($transformer as $transformer)
                <tr class="odd gradeX">
                    <td>{{ $transformer->id }}</td>
                    <td>{{ $transformer->transformer_name }}</td>
                    <td>{{ $transformer->street->street_name }}</td>
                    <td>{!! $transformer->created_at->diffForHumans() !!}</td>
                    <td>{{ $transformer->updated_at->diffForHumans() }}</td>
                    <td>{!! $transformer->action_buttons !!}</td>
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

            $('#transformer-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        } );
    </script>
@endsection
