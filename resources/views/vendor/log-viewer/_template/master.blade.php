<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', app_name())</title>

        <!-- Styles -->
        @yield('before-styles-end')

        {{ Html::style('js/backend/assets/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}
        {{ Html::style('css/assets/css/font-icons/entypo/css/entypo.css')}}
        {{ Html::style('css/assets/css/bootstrap.css')}}
        {{ Html::style('css/assets/css/neon-core.css')}}
        {{ Html::style('css/assets/css/neon-theme.css')}}
        {{ Html::style('css/assets/css/neon-forms.css')}}
        {{ Html::style('css/assets/css/custom.css')}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
      
        {{ HTML::script('js/backend/assets/jquery-1.11.3.min.js') }}

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <!-- @langRTL
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endif -->

        @yield('after-styles-end')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.min.css">
        @include('log-viewer::_template.style')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
            {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        @include('includes.partials.logged-in-as')

       
        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible"  to make chat appear always -->
            
             @include('backend.includes.sidebar')
        
            <div class="main-content">
                        
                @include('backend.includes.header')
                
                <hr />
                @yield('before-scripts')
        
             
                @yield('page-header')
                @include('includes.partials.messages')
                @yield('content')
                @include('backend.includes.footer')
        
            </div>
        
            
        </div>

        <!-- JavaScripts -->
        @yield('before-scripts-end')
        {{ Html::script(mix('js/backend.js')) }}
        @yield('after-scripts-end')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/js/bootstrap-datetimepicker.min.js"></script>
        <script>
            Chart.defaults.global.responsive      = true;
            Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
            Chart.defaults.global.animationEasing = "easeOutQuart";
        </script>
        @yield('modals')
        @yield('scripts')
    </body>
</html>
