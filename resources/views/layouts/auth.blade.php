<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        @include('layouts.css')
    </head>
    <!-- END: Head-->

  <!-- BEGIN: Body-->
    <body style="background: url({{ asset('storage/backgrounds/bg-18.jpg') }}) center center no-repeat fixed;-webkit-background-size:cover;background-size:cover" class="horizontal-layout horizontal-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-wrapper-before"></div>
                <div class="content-header row"></div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
                                @yield('authentification')
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- END: Content-->


        @include('layouts.js')
    </body>
    <!-- END: Body-->
</html>
