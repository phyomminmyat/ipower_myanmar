<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.department.index', trans('menus.backend.department.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.department.create', trans('menus.backend.department.create'), [], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.department.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.department.index', trans('menus.backend.department.all')) }}</li>
            <li>{{ link_to_route('admin.department.create', trans('menus.backend.department.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>