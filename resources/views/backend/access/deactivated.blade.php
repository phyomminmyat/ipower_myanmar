@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.deactivated'))

@section('after-styles')
    <!-- {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }} -->
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.deactivated') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.users.deactivated') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.user-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="users-table">
            <thead>
                <tr>
                    <th>{{ trans('labels.backend.access.users.table.last_name') }}</th>
                    <th>{{ trans('labels.backend.access.users.table.first_name') }}</th>
                    <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                    <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                    <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
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
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function() {
            $('#users-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $('#users-table').closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });
        });
    </script>
@endsection
