<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="MyStaff : Système de gestion des personnels aux divers postes de la structure">
<meta name="keywords" content="admin, app, travail, work, staff, mystaff, poste, processus, salaire, employés, direction">
<meta name="author" content="devGame">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }}</title>

<link rel="apple-touch-icon" href="{{ asset('storage/ico/apple-icon-120.png') }}">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/ico/favicon.ico') }}">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/forms/toggle/switchery.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/forms/switch.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-switch.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/extensions/toastr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/forms/selects/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/tables/datatable/datatables.min.css') }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-extended.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/colors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/components.min.css') }}">
<!-- END: Theme CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/horizontal-menu.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-gradient.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/login-register.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/advanced-cards.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/feather/style.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/line-awesome/line-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/fonts/simple-line-icons/style.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/extensions/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/pages/users.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-tooltip.min.css') }}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<!-- END: Custom CSS-->

@hasSection('css')
    @yield('css')
@endif
