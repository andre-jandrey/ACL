<!DOCTYPE html>
<html class="loading" lang="pt-BR" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="author" content="WestSoftware">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->

    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/line-awesome/css/line-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/feather/style.css') }}">
    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- END Custom CSS-->
    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"> --}}
    <!-- END Custom CSS-->
	@toastr_css
	@yield('css')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

	<!-- fixed-top-->
	@if (isset(Auth::user()->name))
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
		<div class="navbar-wrapper">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row position-relative">
					<li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
					<li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('home') }}">
						<h3 class="brand-text">WestSoftware - ACL</h3></a>
					</li>
					<li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
					<li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
				</ul>
			</div>
			
			<div class="navbar-container content">
				<div class="collapse navbar-collapse" id="navbar-mobile">
					<ul class="nav navbar-nav mr-auto float-left">         
						
					</ul>

					<ul class="nav navbar-nav float-right">
						<li class="dropdown dropdown-user nav-item">
						<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1">Olá,<span class="user-name text-bold-700"> {{ Auth::user()->name }}</span></span><span class="avatar"><img src="{{asset('acl/images/avatar.png')}}" alt="avatar"></span></a>
							<div class="dropdown-menu dropdown-menu-right">
								{{-- <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
								<a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
								<a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
								<a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> --}}
								{{-- <div class="dropdown-divider"></div> --}}
								<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
									<i class="ft-power"></i> 
									Sair </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	  
	<!-- ////////////////////////////////////////////////////////////////////////////-->

	<!-- SIDEBAR -->
	<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
		<div class="main-menu-content">
			<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class="nav-item"><a href="{{ route('acl.index') }}"><i class="la la-home"></i>
					<span class="menu-title">Home</span></a>
				</li>
				<li class=" navigation-header">
					<span data-i18n="nav.category.admin-panels">Gerenciar ACL</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels"></i>
				</li>
				<li class="nav-item"><a href="{{ route('permissions.index') }}"><i class="la la-newspaper-o"></i>
					<span class="menu-title">Permissões</span></a>
				</li>
				<li class="nav-item"><a href="{{ route('profiles.index') }}"><i class="la la-photo"></i>
					<span class="menu-title">Perfis</span></a>
				</li>
				<li class="nav-item"><a href="{{ route('profile_permissions.index') }}"><i class="la la-folder-open"></i>
					<span class="menu-title">Permisões do perfil</span></a>
				</li>
				<li class="nav-item"><a href="{{ route('user_profiles.index') }}"><i class="la la-folder-open"></i>
					<span class="menu-title">Perfil do usuário</span></a>
				</li>
				<li class="nav-item"><a href="{{ route('users.index') }}"><i class="la la-folder-open"></i>
					<span class="menu-title">Usuários</span></a>
				</li>
			</ul>
		</div>
	</div>
	@endif
	<!-- ////////////////////////////////////////////////////////////////////////////-->
	
	<div class="app-content content">
		<div class="content-wrapper">
			<div class="content-header row">
				@yield('content-header')
			</div>

			<div class="content-body">
				@yield('content-body')
			</div>
		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////-->


	<footer class="footer footer-static footer-dark navbar-border navbar-shadow">
		<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2019 , All rights reserved. </span><span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Made by <span class="red">WestSoftware</span></span></p>
	</footer>

	<!-- BEGIN VENDOR JS-->
	<script src="{{ asset('acl/js/core/libraries/jquery.min.js') }}"></script>
	<script src="{{ asset('acl/vendors/js/ui/popper.min.js') }}"></script>
	<script src="{{ asset('acl/js/core/libraries/bootstrap.min.js') }}"></script>
	<script src="{{ asset('acl/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}"></script>
	<script src="{{ asset('acl/vendors/js/ui/unison.min.js') }}"></script>
	<script src="{{ asset('acl/vendors/js/ui/blockUI.min.js') }}"></script>
	<script src="{{ asset('acl/vendors/js/ui/jquery-sliding-menu.js') }}"></script>
	<!-- BEGIN VENDOR JS-->
	
	<!-- BEGIN PAGE VENDOR JS-->
	<!-- END PAGE VENDOR JS-->
	
	<!-- BEGIN MODERN JS-->
	<script src="{{ asset('acl/js/core/app-menu.js') }}"></script>
	<script src="{{ asset('acl/js/core/app.js') }}"></script>
	<!-- END MODERN JS-->
	
	<!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{ asset('js/scripts.js') }}"></script> --}}
	<!-- END PAGE LEVEL JS-->
    @toastr_js
    @toastr_render
	@yield('js')
</body>
</html>