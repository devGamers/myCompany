<!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">

    <!-- BEGIN: Head-->
    <head>
        @include('layouts.css')
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="horizontal-layout horizontal-menu 2-columns" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

        <!-- BEGIN: Header-->
        @include('partials.nav')
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        @include('partials.sidebar', ['sidebar' => isset($noSidebar), 'sideCompta' => isset($sideCompta)])
        <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            @yield('content')
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Footer-->
    <a class="btn btn-try-builder btn-bg-gradient-x-purple-red btn-glow white" href="mailto:devmagame@gmail.com" target="_blank">
        Réalisé par : @devGame
    </a>
    <footer class="footer footer-static footer-light navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-block d-md-inline-block">
                2021  &copy; Copyright
            </span>
        </div>
    </footer>
    <!-- END: Footer-->


    @include('layouts.js')

  </body>
  <!-- END: Body-->
</html>
