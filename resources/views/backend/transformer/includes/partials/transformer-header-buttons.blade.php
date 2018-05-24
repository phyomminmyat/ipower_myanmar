<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.transformer.index', trans('menus.backend.transformer.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @permission('store-transformer')
    {{ link_to_route('admin.transformer.create', trans('menus.backend.transformer.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.transformer.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.transformer.index', trans('menus.backend.transformer.all')) }}</li>
            <li>{{ link_to_route('admin.transformer.create', trans('menus.backend.transformer.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>