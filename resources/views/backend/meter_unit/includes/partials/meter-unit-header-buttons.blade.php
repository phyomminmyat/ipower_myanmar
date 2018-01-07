<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.meter_units.index', trans('menus.backend.meter_unit.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    @permission('store-monthly-meter-unit')
    {{ link_to_route('admin.meter_units.create', trans('menus.backend.meter_unit.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    @endauth
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.meter_unit.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.meter_units.index', trans('menus.backend.meter_unit.all')) }}</li>
            <li>{{ link_to_route('admin.meter_units.create', trans('menus.backend.meter_unit.create')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>