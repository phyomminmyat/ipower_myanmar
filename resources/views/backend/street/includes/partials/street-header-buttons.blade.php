<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.street.index', trans('menus.backend.street.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.street.create', trans('menus.backend.street.create'), [], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.street.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.street.index', trans('menus.backend.street.all')) }}</li>
            <li>{{ link_to_route('admin.street.create', trans('menus.backend.street.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>