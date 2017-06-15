<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Core Styles -->
	<link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <!-- Styles -->
	<link href="{{ asset('css/cpanel/master.css') }}" rel="stylesheet">
	@section('css')
	@show

    <!-- Core Scripts -->
	<script src="{{ asset('js/core.js') }}"></script>
    <!-- Scripts -->
	<script src="{{ asset('js/cpanel/master.js') }}"></script>
	@section('js')
	@show
</head>
<body>
	<div class="wrap">
		<div class="sidebar-content">
			<div class="brand">
				<img src="{{ asset('img/logo.png') }}" alt="Logo">
				<div>Project Name</div>
			</div>
			<i class="fa fa-bars fa-2x open-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<ul class="menu-content collapse out" id="menu-content">
				<li id="dashboard-menu"><a href="{{ route('cpanel.index') }}"><i class="fa fa-tachometer fa-fw fa-lg" aria-hidden="true"></i> Dashboard</a></li>
				<li id="zones-menu"><a href="#"><i class="fa fa-desktop fa-fw fa-lg" aria-hidden="true"></i> Zones</a></li>
				<li id="ads-menu"><a href="{{ route('cpanel.ads.index') }}"><i class="fa fa-video-camera fa-fw fa-lg" aria-hidden="true"></i> Ads</a></li>
				<li id="profile-menu"><a href="#"><i class="fa fa-user fa-fw fa-lg" aria-hidden="true"></i> Profile</a></li>
				<li id="users-menu"><a href="#"><i class="fa fa-users fa-fw fa-lg" aria-hidden="true"></i> Users</a></li>
				<li id="notifications-menu" data-toggle="collapse" data-target="#menu-nested-content" aria-expanded="false">
					<a href="/"><i class="fa fa-flag fa-fw fa-lg" aria-hidden="true"></i> Notifications</a>
					<span class="arrow"></span>
				</li>
				<ul class="menu-nested-content collapse" id="menu-nested-content">
					<li id="notifications-create-menu"><a href="#"><i class="fa fa-flag fa-fw fa-lg" aria-hidden="true"></i> Create</a></li>
					<li id="notifications-edit-menu"><a href="#"><i class="fa fa-flag fa-fw fa-lg" aria-hidden="true"></i> Edit</a></li>
				</ul>
				<li><a href="#"><i class="fa fa-edit fa-fw fa-lg" aria-hidden="true"></i> Logs</a></li>
			</ul>
		</div>
		<div class="page-content">
			@section('body')
			@show
		</div>
	</div>
</body>
</html>
