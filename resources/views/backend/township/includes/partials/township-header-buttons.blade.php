<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.township.index', trans('menus.backend.township.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @permission('store-township')
    {{ link_to_route('admin.township.create', trans('menus.backend.township.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.township.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.township.index', trans('menus.backend.township.all')) }}</li>
            <li>{{ link_to_route('admin.township.create', trans('menus.backend.township.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>