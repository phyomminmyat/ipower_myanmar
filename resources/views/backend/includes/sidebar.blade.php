<!-- Left side column. contains the logo and sidebar -->
<div class="sidebar-menu">

		<div class="sidebar-menu-inner">

			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="index.html">
						<img src="{{ asset('img/logo.png') }}" width="120" alt="" />
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
				<li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
					<a href="{{ route('admin.dashboard') }}">
						<i class="entypo-gauge"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>

				<li @if(Request::segment(2) == 'nric_codes' || Request::segment(2) == 'nric_township' || Request::segment(2) == 'region' || Request::segment(2) == 'district' || Request::segment(2) == 'township' || Request::segment(2) == 'village_tract' || Request::segment(2) == 'communities' || Request::segment(2) == 'department') class="opened active has-sub" @else class="has-sub" @endif>
					<a href="#">
						<i class="entypo-cog"></i>
						<span class="title">Setting</span>
					</a>

					<ul>
						@permission('manage-nric-code')
						<li class="{{ active_class(Active::checkUriPattern('admin/nric_codes/*')) }} ">
							<a href="{{ route('admin.nric_codes.index') }}">
								<i class="entypo-vcard"></i>
								<span>{{ trans('labels.backend.nric_codes.management') }}</span>
							</a>
						</li>
						@endauth

						@permission('manage-nric-township')
						<li class="{{ active_class(Active::checkUriPattern('admin/nric_township/*')) }} treeview">
							<a href="{{ route('admin.nric_township.index') }}">
								<i class="entypo-vcard"></i>
								<span>{{ trans('labels.backend.nric_township.management') }}</span>
							</a>
						</li>
						@endauth

						@permission('manage-region')
						<li class="{{ active_class(Active::checkUriPattern('admin/region/*')) }} treeview">
							<a href="{{ route('admin.region.index') }}">
								<i class="entypo-map"></i>
								<span>{{ trans('labels.backend.region.management') }} (ျပည္နယ္/တိုင္း)</span>
							</a>
						</li>
						@endauth

						@permission('manage-district')
						<li class="{{ active_class(Active::checkUriPattern('admin/district/*')) }} treeview">
							<a href="{{ route('admin.district.index') }}">
								<i class="entypo-globe"></i>
								<span>{{ trans('labels.backend.district.management') }} (ခရိုင္)</span>
							</a>
						</li>
						@endauth

						@permission('manage-township')
						<li class="{{ active_class(Active::checkUriPattern('admin/township/*')) }} treeview">
							<a href="{{ route('admin.township.index') }}">
								<i class="entypo-location"></i>
								<span>{{ trans('labels.backend.township.management') }} (ျမိဳ ႔နယ္)</span>
							</a>
						</li>
						@endauth

						@permission('manage-village_tract')
						<li class="{{ active_class(Active::checkUriPattern('admin/village_tract/*')) }} treeview">
							<a href="{{ route('admin.village_tract.index') }}">
								<i class="fa fa-map-pin"></i>
								<span>{{ trans('labels.backend.village_tract.management') }} (ေက်းရြာ)</span>
							</a>
						</li>
						@endauth

						@permission('manage-community')
						<li class="{{ active_class(Active::checkUriPattern('admin/communities/*')) }} treeview">
							<a href="{{ route('admin.communities.index') }}">
								<i class="entypo-direction"></i>
								<span>{{ trans('labels.backend.community.management') }} (ရပ္ကြက္)</span>
							</a>
						</li>
						@endauth

						@permission('manage-street')
						<li class="{{ active_class(Active::checkUriPattern('admin/street/*')) }} treeview">
							<a href="{{ route('admin.street.index') }}">
								<i class="entypo-address"></i>
								<span>{{ trans('labels.backend.street.management') }} (လမ္း)</span>
							</a>
						</li>
						@endauth

						@permission('manage-department')
						<li class="{{ active_class(Active::checkUriPattern('admin/department/*')) }} treeview">
							<a href="{{ route('admin.department.index') }}">
								<i class="fa fa-bank"></i>
								<span>{{ trans('labels.backend.department.management') }} (ဌာန)</span>
							</a>
						</li>
						@endauth
					</ul>
				</li>

				@permission('manage-users')
				<li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
					<a href="{{ route('admin.access.user.index') }}">
						<i class="entypo-users"></i>
						<span>{{ trans('labels.backend.access.users.management') }}</span>

						@if ($pending_approval > 0)
							<span class="label label-danger pull-right">{{ $pending_approval }}</span>
						@endif
					</a>
				</li>
				@endauth

				@permission('manage-roles')
				<li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
					<a href="{{ route('admin.access.role.index') }}">
						<i class="entypo-flow-tree"></i>
						<span>{{ trans('labels.backend.access.roles.management') }}</span>
					</a>
				</li>
				@endauth

				@permission('manage-permissions')
				<li class="{{ active_class(Active::checkUriPattern('admin/access/permissions*')) }}">
					<a href="{{ route('admin.access.permissions.index') }}">
						<i class="entypo-lock"></i>
						<span>{{ trans('labels.backend.access.permission.management') }}</span>
					</a>
				</li>
				@endauth

				@permission('manage-civil-servant')
				<li class="{{ active_class(Active::checkUriPattern('admin/civil_servant/*')) }} treeview">
					<a href="{{ route('admin.civil_servant.index') }}">
						<i class="entypo-user"></i>
						<span>{{ trans('labels.backend.civil_servant.management') }} (အစိုးရဝန္ထမ္း)</span>
					</a>
				</li>
				@endauth

				@permission('manage-meter-owner')
				<li class="{{ active_class(Active::checkUriPattern('admin/meter_owner/*')) }} treeview">
					<a href="{{ route('admin.meter_owner.index') }}">
						<i class="entypo-users"></i>
						<span>{{ trans('labels.backend.meter_owner.management') }}</span>
					</a>
				</li>
				@endauth

				@permission('manage-meter')
				<li class="{{ active_class(Active::checkUriPattern('admin/meter/*')) }} treeview">
					<a href="{{ route('admin.meter.index') }}">
						<i class="entypo-clipboard"></i>
						<span>{{ trans('labels.backend.meter.management') }}</span>
					</a>
				</li>
				@endauth

				@permission('manage-lamp')
				<li class="{{ active_class(Active::checkUriPattern('admin/lamp/*')) }} treeview">
					<a href="{{ route('admin.lamp.index') }}">
						<i class="entypo-address"></i>
						<span>{{ trans('labels.backend.lamp.management') }} (ဓါတ္တိုင္)</span>
					</a>
				</li>
				@endauth

				@permission('manage-monthly-meter-unit')
				<li class="{{ active_class(Active::checkUriPattern('admin/meter_units/*')) }} treeview">
					<a href="{{ route('admin.meter_units.index') }}">
						<i class="entypo-chart-pie"></i>
						<span>{{ trans('labels.backend.meter_unit.management') }}</span>
					</a>
				</li>
				@endauth

				@permission('manage-unit-rate')
				<li class="{{ active_class(Active::checkUriPattern('admin/unit_rate/*')) }} treeview">
					<a href="{{ route('admin.unit_rate.index') }}">
						<i class="entypo-chart-bar"></i>
						<span>{{ trans('labels.backend.unit_rate.management') }}</span>
					</a>
				</li>
				@endauth

				{{-- <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
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
				</li> --}}
			</ul>

		</div>

	</div>
