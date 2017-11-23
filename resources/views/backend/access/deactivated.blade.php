@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.deactivated'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
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
        </table>
        <tbody>
            @if($users->count()>0)
                @foreach($users as $user)
                <tr class="odd gradeX">
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{!! $user->confirmed_label !!}</td>
                    <!-- <td>{!! $user->roles !!}</td> -->
                    <!-- <td>{!! $user->social_label !!}</td> -->
                    <td>{!! $user->created_at->diffForHumans() !!}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                    <td>{!! $user->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            @else
                <tr><td col="7">No data available in table</td></tr>

            @endif
        </tbody>
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function() {
            // $('#users-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.access.user.get") }}',
            //         type: 'post',
            //         data: {status: 0, trashed: false},
            //         error: function (xhr, err) {
            //             if (err === 'parsererror')
            //                 location.reload();
            //         }
            //     },
            //     columns: [
            //         {data: 'last_name', name: '{{config('access.users_table')}}.last_name'},
            //         {data: 'first_name', name: '{{config('access.users_table')}}.first_name'},
            //         {data: 'email', name: '{{config('access.users_table')}}.email'},
            //         {data: 'confirmed', name: '{{config('access.users_table')}}.confirmed'},
            //         {data: 'roles', name: '{{config('access.roles_table')}}.name', sortable: false},
            //         {data: 'created_at', name: '{{config('access.users_table')}}.created_at'},
            //         {data: 'updated_at', name: '{{config('access.users_table')}}.updated_at'},
            //         {data: 'actions', name: 'actions', searchable: false, sortable: false}
            //     ],
            //     order: [[0, "asc"]],
            //     searchDelay: 500
            // });
        });
    </script>
@endsection
