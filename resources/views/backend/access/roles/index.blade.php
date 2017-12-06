@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.roles.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.roles.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.role-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <table class="table table-bordered table-striped datatable" id="roles-table">
            <thead>
                <tr>
                    <th>{{ trans('labels.backend.access.roles.table.role') }}</th>
                    <th>{{ trans('labels.backend.access.roles.table.permissions') }}</th>
                    <th>{{ trans('labels.backend.access.roles.table.number_of_users') }}</th>
                    <th>{{ trans('labels.backend.access.roles.table.sort') }}</th>
                    <th>{{ trans('labels.general.actions') }}</th>
                </tr>
            </thead>
             <tbody>
                @foreach($roles as $role)
                <tr class="odd gradeX">
                    <td>{{ $role->name }}</td>
                    @if ($role->all)
                       <td> <span class="label label-success">{{ trans('labels.general.all')}}</span></td>
                   

                    @elseif($role->permissions->count())
                        <td> <span> {{ implode('<br/>', $role->permissions->pluck('display_name')->toArray()) }}</span>  </td> 
                    @else
                    <td> <span> class="label label-danger">{{ trans('labels.general.none')}}</span></td>
                    @endif

                   
                    <td>{{ $role->users->count() }}</td>
                    <td>{{ $role->sort }}</td>
                   
                    <td>{!! $role->action_buttons !!}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Role') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection

@section('after-scripts')
    {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function() {
            // $('#roles-table').DataTable({
            //     dom: 'lfrtip',
            //     processing: false,
            //     serverSide: true,
            //     autoWidth: false,
            //     ajax: {
            //         url: '{{ route("admin.access.role.get") }}',
            //         type: 'post',
            //         error: function (xhr, err) {
            //             if (err === 'parsererror')
            //                 location.reload();
            //         }
            //     },
            //     columns: [
            //         {data: 'name', name: '{{config('access.roles_table')}}.name'},
            //         {data: 'permissions', name: '{{config('access.permissions_table')}}.display_name', sortable: false},
            //         {data: 'users', name: 'users', searchable: false},
            //         {data: 'sort', name: '{{config('access.roles_table')}}.sort'},
            //         {data: 'actions', name: 'actions', searchable: false, sortable: false}
            //     ],
            //     order: [[3, "asc"]]
            // });
        });
    </script>
@endsection
