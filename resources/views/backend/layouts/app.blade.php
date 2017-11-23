<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>Neon | Dashboard</title>
     @yield('before-styles')
   {{ Html::style('css/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}
   {{ Html::style('css/assets/css/font-icons/entypo/css/entypo.css')}}
  <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"> -->
   {{ Html::style('css/assets/css/bootstrap.css')}}
   {{ Html::style('css/assets/css/neon-core.css')}}
   {{ Html::style('css/assets/css/neon-theme.css')}}
   {{ Html::style('css/assets/css/neon-forms.css')}}
   {{ Html::style('css/assets/css/custom.css')}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
    {{ HTML::script('js/backend/assets/jquery-1.11.3.min.js') }}

      @yield('after-styles')
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    
     @include('backend.includes.sidebar')

    <div class="main-content">
                
        @include('backend.includes.header')
        
        <hr />
        @yield('before-scripts')

     
        @yield('page-header')
        @include('includes.partials.messages')
        @yield('content')
        
        <!-- Footer -->
        <footer class="main">
            
            &copy; 2015 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
        
        </footer>
    </div>

        
    <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">
    
        <div class="chat-inner">
    
    
            <h2 class="chat-header">
                <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>
    
                <i class="entypo-users"></i>
                Chat
                <span class="badge badge-success is-hidden">0</span>
            </h2>
    
    
            <div class="chat-group" id="group-1">
                <strong>Favorites</strong>
    
                <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
            </div>
    
    
            <div class="chat-group" id="group-2">
                <strong>Work</strong>
    
                <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                <a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
            </div>
    
    
            <div class="chat-group" id="group-3">
                <strong>Social</strong>
    
                <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
            </div>
    
        </div>
    
        <!-- conversation template -->
        <div class="chat-conversation">
    
            <div class="conversation-header">
                <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>
    
                <span class="user-status"></span>
                <span class="display-name"></span>
                <small></small>
            </div>
    
            <ul class="conversation-body">
            </ul>
    
            <div class="chat-textarea">
                <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
            </div>
    
        </div>
    
    </div>
    
    
    <!-- Chat Histories -->
    <ul class="chat-history" id="sample_history">
        <li>
            <span class="user">Art Ramadani</span>
            <p>Are you here?</p>
            <span class="time">09:00</span>
        </li>
    
        <li class="opponent">
            <span class="user">Catherine J. Watkins</span>
            <p>This message is pre-queued.</p>
            <span class="time">09:25</span>
        </li>
    
        <li class="opponent">
            <span class="user">Catherine J. Watkins</span>
            <p>Whohoo!</p>
            <span class="time">09:26</span>
        </li>
    
        <li class="opponent unread">
            <span class="user">Catherine J. Watkins</span>
            <p>Do you like it?</p>
            <span class="time">09:27</span>
        </li>
    </ul>
    
    
    
    
    <!-- Chat Histories -->
    <ul class="chat-history" id="sample_history_2">
        <li class="opponent unread">
            <span class="user">Daniel A. Pena</span>
            <p>I am going out.</p>
            <span class="time">08:21</span>
        </li>
    
        <li class="opponent unread">
            <span class="user">Daniel A. Pena</span>
            <p>Call me when you see this message.</p>
            <span class="time">08:27</span>
        </li>
    </ul>

    
</div>

    <!-- Sample Modal (Default skin) -->
    <div class="modal fade" id="sample-modal-dialog-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Default Modal</h4>
                </div>
                
                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sample Modal (Skin inverted) -->
    <div class="modal invert fade" id="sample-modal-dialog-2">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
                </div>
                
                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sample Modal (Skin gray) -->
    <div class="modal gray fade" id="sample-modal-dialog-3">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
                </div>
                
                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Imported styles on this page -->
    {{ Html::style('assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}
    {{ Html::style('assets/js/rickshaw/rickshaw.min.css') }}

    <!-- Bottom scripts (common) -->
    {{ HTML::script('js/backend/assets/gsap/TweenMax.min.js') }}
    {{ HTML::script('js/backend/assets/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}
    {{ HTML::script('js/backend/assets/bootstrap.min.js') }}
    {{ HTML::script('js/backend/assets/joinable.js') }}
    {{ HTML::script('js/backend/assets/resizeable.js') }}
    {{ HTML::script('js/backend/assets/neon-api.js') }}
    {{ HTML::script('js/backend/assets/jvectormap/jquery-jvectormap-1.2.2.min.js') }}


    <!-- Imported scripts on this page -->
    {{ HTML::script('js/backend/assets/jvectormap/jquery-jvectormap-europe-merc-en.js') }}
    {{ HTML::script('js/backend/assets/jquery.sparkline.min.js') }}
    {{ HTML::script('js/backend/assets/rickshaw/vendor/d3.v3.js') }}
    {{ HTML::script('js/backend/assets/rickshaw/rickshaw.min.js') }}
    {{ HTML::script('js/backend/assets/raphael-min.js') }}
    {{ HTML::script('js/backend/assets/morris.min.js') }}
    {{ HTML::script('js/backend/assets/toastr.js') }}
    {{ HTML::script('js/backend/assets/neon-chat.js') }}


    <!-- JavaScripts initializations and stuff -->

    {{ HTML::script('js/backend/assets/neon-custom.js') }}



    <!-- Demo Settings -->
    {{ HTML::script('js/backend/assets/neon-demo.js') }}
    {{ HTML::script('../resources/assets/js/plugin/sweetalert/sweetalert.min.js') }}

    @yield('after-scripts')

</body>
</html>