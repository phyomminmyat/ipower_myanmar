<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.region.index', trans('menus.backend.region.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @permission('store-region')
    {{ link_to_route('admin.region.create', trans('menus.backend.region.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.region.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.region.index', trans('menus.backend.region.all')) }}</li>
            <li>{{ link_to_route('admin.region.create', trans('menus.backend.region.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>