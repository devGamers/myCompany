<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow navbar-static-top navbar-light navbar-brand-center">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto">
                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ft-menu font-large-1"></i></a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="index.html">
                    <img class="brand-logo" alt="{{ config('app.name') }}" src="{{ asset('storage/logo/logo.png') }}">
                <h3 class="brand-text">{{ config('app.name') }}</h3></a>
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="la la-ellipsis-v"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);">
                            <i class="ft-menu"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="javascript:void(0);">
                            <i class="ficon ft-maximize"></i>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                            <span class="avatar avatar-online">
                                <img src="{{ asset('storage/user.png') }}" alt="avatar">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">

                                <a class="dropdown-item" href="javascript:void(0);">
                                    <span class="avatar avatar-online">
                                        <img src="{{ asset('storage/user.png') }}" alt="avatar">
                                        <span class="user-name text-bold-700 ml-1">
                                            John Doe
                                        </span>
                                    </span>
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                    <i class="ft-home"></i>
                                    Accueil
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user-profile.html">
                                    <i class="ft-user"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="email-application.html">
                                    <i class="ft-mail"></i>
                                    Mon compte
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ft-power"></i> Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
