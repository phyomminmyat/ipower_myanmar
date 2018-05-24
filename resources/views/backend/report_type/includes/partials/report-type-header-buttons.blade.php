<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.report_type.index', trans('menus.backend.report_type.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @permission('store-unit-rate')
    {{ link_to_route('admin.report_type.create', trans('menus.backend.report_type.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.report_type.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.report_type.index', trans('menus.backend.report_type.all')) }}</li>
            <li>{{ link_to_route('admin.report_type.create', trans('menus.backend.report_type.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>