<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="assets/images/favicon.ico">
    <title>@yield('title', app_name())</title>
     @yield('before-styles')
   {{ Html::style('js/backend/assets/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}
   {{ Html::style('css/assets/css/font-icons/entypo/css/entypo.css')}}
  <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"> -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
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
        @include('includes.partials.logged-in-as')    
        @include('backend.includes.header')
        
        <hr />
        @yield('before-scripts')

     
        @yield('page-header')
        @include('includes.partials.messages')
        @yield('content')
        @include('backend.includes.footer')

    </div>

    
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
    {{ Html::style('js/backend/assets/jvectormap/jquery-jvectormap-1.2.2.css') }}
    {{ Html::style('js/backend/assets/srickshaw/rickshaw.min.css') }}

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
    {{ HTML::script('js/backend/fileinput.js') }}

    {{ Html::script(mix('js/backend.js')) }}
    <!-- JavaScripts initializations and stuff -->

    {{ HTML::script('js/backend/assets/neon-custom.js') }}



    <!-- Demo Settings -->
    {{ HTML::script('js/backend/assets/neon-demo.js') }}
    {{ HTML::script('/resources/assets/js/plugin/sweet_alert/sweetalert.min.js') }}

     <!-- <script type="text/javascript" src="http://localhost/ipower_myanmar/resources/assets/js/plugin/sweet_alert/sweetalert.min.js"></script> -->
     <script type="text/javascript">
          $(function () {

            $("body").on("click", "a[name='delete_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");
                console.log(linkURL);
                swal({
                    title: "{{ trans('strings.backend.general.are_you_sure') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }else {

                    }
                });
            });
        } );  
     </script>

    @yield('after-scripts')

</body>
</html>