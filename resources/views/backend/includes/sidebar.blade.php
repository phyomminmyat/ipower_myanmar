<!-- Left side column. contains the logo and sidebar -->


<div class="sidebar-menu">

        <div class="sidebar-menu-inner">
            
            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="index.html">
                        <img src="assets/images/logo@2x.png" width="120" alt="" />
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

                                
                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>
            
                                    
            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="active opened active has-sub">
                    <a href="#">
                        <i class="entypo-gauge"></i>
                        <span class="title">Dashboard</span>
                    </a>

                    <ul class="visible">
                        <li class="active {{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                            <a href="{{ route('admin.access.user.index') }}">
                                <i class="fa fa-circle-o"></i>
                                <span>{{ trans('labels.backend.access.users.management') }}</span>

                                @if ($pending_approval > 0)
                                    <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>

                        <li class="active {{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                            <a href="{{ route('admin.access.role.index') }}">
                                <i class="fa fa-circle-o"></i>
                                <span>{{ trans('labels.backend.access.roles.management') }}</span>
                            </a>
                        </li>
                        </ul>
                </li>
                <li class="has-sub {{ active_class(Active::checkUriPattern('admin/nric_codes/*')) }} ">
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
            </ul>
            
        </div>

    </div>