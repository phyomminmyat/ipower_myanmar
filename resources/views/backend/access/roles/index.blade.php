@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    <!-- {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }} -->
    {{ Html::style('js/backend/assets/datatables/datatables.css') }}
    {{ Html::style('js/backend/assets/select2/select2-bootstrap.css') }}
    {{ Html::style('js/backend/assets/select2/select2.css') }}
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
                    <td> <span class="label label-danger">{{ trans('labels.general.none')}}</span></td>
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
                <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
            </div>
        </div>
        <div class="box-body">
            {!! history()->renderType('Role') !!}
        </div>
    </div>
@endsection

@section('after-scripts')
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('js/backend/assets/select2/select2.min.js') }}
    {{ HTML::script('js/backend/assets/neon-chat.js') }}
    <script>
        $(function () {

            $('#roles-table').DataTable( {
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "bStateSave": true
            });

            $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                minimumResultsForSearch: -1
            });            
        });
    </script>
@endsection
