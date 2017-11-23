@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management'))

@section('after-styles')
    {{ Html::style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
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
                <!-- <th>{{ trans('labels.backend.access.users.table.roles') }}</th> -->
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
                <!-- <td>{!! $user->roles !!}</td> -->
                <!-- <td>{!! $user->social_label !!}</td> -->
                <td>{!! $user->created_at->diffForHumans() !!}</td>
                <td>{{ $user->updated_at->diffForHumans() }}</td>
                <td>{!! $user->action_buttons !!}</td>
               
            </tr>
            @endforeach
        </tbody>
        
    </table>


    <div class="row">
        <div style="float: left;">
            {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
        </div>
        <div style="float: right;">
            {!! $users->render() !!}
        </div>
    </div>

    <!-- <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div> --><!-- /.box tools -->
       <!--  </div> --><!-- /.box-header -->
        <!-- <div class="box-body">
            {!! history()->renderType('User') !!}
        </div> --><!-- /.box-body -->
   <!--  </div> --><!--box box-success-->
@endsection

@section('after-scripts')
   <!--  {{ Html::script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables-extend.js") }} -->
    {{ HTML::script('js/backend/assets/datatables/datatables.js') }}
    {{ HTML::script('js/backend/assets/select2/select2.min.js') }}
    {{ HTML::script('js/backend/assets/neon-chat.js') }}
    <script>
        $(function () {

            var $table2 = jQuery( "#table-2" );
            
            // Initialize DataTable
            $table2.DataTable( {
                "sDom": "tip",
                "bStateSave": false,
                "iDisplayLength": 8,
                "aoColumns": [
                    { "bSortable": false },
                    null,
                    null,
                    null,
                    null
                ],
                "bStateSave": true
            });
            
        });
    </script>
@endsection
