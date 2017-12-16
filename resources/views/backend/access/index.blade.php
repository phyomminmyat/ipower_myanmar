@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management'))

@section('after-styles')
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.user-header-buttons')
           </div> <!--box-tools pull-right-->
      </div><!-- /.box-header -->
    </div><!--box-->

    <table class="table table-bordered table-striped datatable" id="table-2">
        <thead>
            <tr>
                <th>{{ trans('labels.backend.access.users.table.last_name') }}</th>
                <th>{{ trans('labels.backend.access.users.table.first_name') }}</th>
                <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                <!-- <th>{{ trans('labels.backend.access.users.table.social') }}</th> -->
                <th>{{ trans('labels.backend.access.users.table.created') }}</th>
                <th>{{ trans('labels.backend.access.users.table.last_updated') }}</th>
                <th>{{ trans('labels.general.actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr class="odd gradeX">
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{!! $user->confirmed_label !!}</td>
                <td>{!! $user->roles->count() ? implode('<br/>', $user->roles->pluck('name')->toArray()) : trans('labels.general.none')!!}</td>
                <!-- <td>{!! $user->social_label !!}</td> -->
                <td>{!! $user->created_at->diffForHumans() !!}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                <td>{!! $user->action_buttons !!}</td>
               
            </tr>
            @endforeach
        </tbody>
        
    </table>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
            </div> <!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('User') !!}
        </div> <!-- /.box-body -->
     </div> <!--box box-success-->
@endsection

@section('after-scripts')
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('js/backend/assets/select2/select2.min.js') }}
    {{ HTML::script('js/backend/assets/neon-chat.js') }}
    <script>
        $(function () {

            $('#table-2').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $('#table-2').closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        });
    </script>
@endsection
