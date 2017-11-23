<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->full_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
        <div class="input-group">
            {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

            <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span><!--input-group-btn-->
        </div><!--input-group-->
    {{ Form::close() }}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            @role(1)
            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.access.title') }}</span>

                    @if ($pending_approval > 0)
                        <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                    @else
                        <i class="fa fa-angle-left pull-right"></i>
                    @endif
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                        <a href="{{ route('admin.access.user.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.users.management') }}</span>

                            @if ($pending_approval > 0)
                                <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                            @endif
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                        <a href="{{ route('admin.access.role.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.roles.management') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endauth

            <li class="{{ active_class(Active::checkUriPattern('admin/nric_codes/*')) }} treeview">
                <a href="{{ route('admin.nric_codes.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.nric_codes.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/nric_township/*')) }} treeview">
                <a href="{{ route('admin.nric_township.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.nric_township.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/region/*')) }} treeview">
                <a href="{{ route('admin.region.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.region.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/district/*')) }} treeview">
                <a href="{{ route('admin.district.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.district.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/township/*')) }} treeview">
                <a href="{{ route('admin.township.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.township.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/village_tract/*')) }} treeview">
                <a href="{{ route('admin.village_tract.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.village_tract.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/communities/*')) }} treeview">
                <a href="{{ route('admin.communities.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.community.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/department/*')) }} treeview">
                <a href="{{ route('admin.department.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.department.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/civil_servant/*')) }} treeview">
                <a href="{{ route('admin.civil_servant.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.civil_servant.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/meter_owner/*')) }} treeview">
                <a href="{{ route('admin.meter_owner.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.meter_owner.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/meter/*')) }} treeview">
                <a href="{{ route('admin.meter.index') }}">
                    <i class="fa fa-circle-o"></i>
                    <span>{{ trans('labels.backend.meter.management') }}</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>