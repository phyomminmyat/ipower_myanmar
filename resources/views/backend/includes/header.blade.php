<div class="row">
        
            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">
        
                <ul class="user-info pull-left pull-none-xsm">
        
                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ access()->user()->picture }}" alt="" class="img-circle" width="44" />
                            {{ access()->user()->full_name }}
                        </a>
        
                        <ul class="dropdown-menu">
        
                            <!-- Reverse Caret -->
                            <li class="caret"></li>
        
                            <!-- Profile sub-links -->
                            <li>
                                <a href="extra-timeline.html">
                                    <i class="entypo-user"></i>
                                    Edit Profile
                                </a>
                            </li>
        
                            <li>
                                <a href="mailbox.html">
                                    <i class="entypo-mail"></i>
                                    Inbox
                                </a>
                            </li>
        
                            <li>
                                <a href="extra-calendar.html">
                                    <i class="entypo-calendar"></i>
                                    Calendar
                                </a>
                            </li>
        
                            <li>
                                <a href="#">
                                    <i class="entypo-clipboard"></i>
                                    Tasks
                                </a>
                            </li>
                        </ul>
                    </li>
        
                </ul>
                
                <ul class="user-info pull-left pull-right-xs pull-none-xsm">
        
                    <!-- Raw Notifications -->
                    <li class="notifications dropdown">
        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-attention"></i>
                            <span class="badge badge-info">0</span>
                        </a>
        
                        <ul class="dropdown-menu">
                            <li class="top">
                                <p class="small">
                                   <!--  <a href="#" class="pull-right">Mark all Read</a> -->
                                   {{ trans_choice('strings.backend.general.you_have.notifications', 0, ['number' => 0]) }}

                                </p>
                            </li>
                            
                            <li class="external">
                                <a href="#"> {{ link_to('#', trans('strings.backend.general.see_all.notifications')) }}</a>
                            </li>
                        </ul>
        
                    </li>
        
                    <!-- Message Notifications -->
                    <li class="notifications dropdown">
        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-mail"></i>
                            <span class="badge badge-secondary">0</span>
                        </a>
        
                        <ul class="dropdown-menu">
                            <li>
                                <form class="top-dropdown-search">
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search anything..." name="s" />
                                    </div>
                                    
                                </form>
                                
                                <ul class="dropdown-menu-list scroller">
                                    <li class="active">
                                        {{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="external">
                                {{ link_to('#', trans('strings.backend.general.see_all.messages')) }}
                            </li>
                        </ul>
        
                    </li>
        
                    <!-- Task Notifications -->
                    <li class="notifications dropdown">
        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="entypo-list"></i>
                            <span class="badge badge-warning">0</span>
                        </a>
        
                        <ul class="dropdown-menu">
                            <li class="top">
                                {{ trans_choice('strings.backend.general.you_have.tasks', 0, ['number' => 0]) }}
                            </li>
                            
                            <li class="external">
                                {{ link_to('#', trans('strings.backend.general.see_all.tasks')) }}
                            </li>
                        </ul>
        
                    </li>
        
                </ul>
        
            </div>
        
        
            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">
        
                <ul class="list-inline links-list pull-right">
                    @if (config('locale.status') && count(config('locale.languages')) > 1)
                    <!-- Language Selector -->
                    <li class="dropdown language-selector">
        
                       {{ trans('menus.language-picker.language') }}
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                            <img src="assets/images/flags/flag-uk.png" width="16" height="16" />
                        </a>
                        @include('includes.partials.lang')
                     
                    </li>
                    @endif
                    <li class="sep"></li>
        
                    
                    <li>
                        <a href="#" data-toggle="chat" data-collapse-sidebar="1">
                            <i class="entypo-chat"></i>
                            Chat
        
                            <span class="badge badge-success chat-notifications-badge is-hidden">0</span>
                        </a>
                    </li>
        
                    <li class="sep"></li>
        
                    <li>
                        <a href="{!! route('frontend.auth.logout') !!}" class="btn btn-danger btn-flat">
                            
                            {{ trans('navs.general.logout') }}<i class="entypo-logout right"></i>
                        </a>

                    </li>
                </ul>
        
            </div>

</div>
