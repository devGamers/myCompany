@if (!$sidebar)
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark navbar-without-dd-arrow navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item">
                <a class="nav-link" href="{{ route($sideCompta ? 'dashboard.entree-sortie' : 'dashboard.travailleur') }}">
                    <i class="ft-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if ($sideCompta)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('activite.index') }}">
                        <i class="ft-activity"></i>
                        <span>Activité</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('type-entree.index') }}">
                        <i class="ft-sliders"></i>
                        <span>Type d'entrée</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('type-depense.index') }}">
                        <i class="ft-sliders"></i>
                        <span>Type de dépense</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('entree-sorties.index') }}">
                        <i class="ft-shuffle"></i>
                        <span>Entrées Sortie</span>
                    </a>
                </li>
            @else
                <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">
                        <i class="la la-cogs"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="arrow_box">
                            <li data-menu="">
                                <a class="dropdown-item" href="email-application.html" data-toggle="dropdown">Générale</a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="chat-application.html" data-toggle="dropdown">Primes</a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="full-calender.html" data-toggle="dropdown">Contraintes</a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="project-summary.html" data-toggle="dropdown">Proccédures</a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown">
                                    Agents
                                </a>
                                <ul class="dropdown-menu">
                                    <div class="arrow_box">
                                        <li data-menu="">
                                            <a class="dropdown-item" href="timeline-center.html" data-toggle="dropdown">Actifs</a>
                                        </li>
                                        <li data-menu="">
                                            <a class="dropdown-item" href="timeline-horizontal.html" data-toggle="dropdown">Inactifs</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ft-trending-up"></i>
                        <span>Traçabilité</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ft-trending-down"></i>
                        <span>Contre Performance</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="la la-bolt"></i>
                        <span>Abattement sur salaire</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ft-clock"></i>
                        <span>Pointage</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ft-layers"></i>
                        <span>Edition</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
@endif

