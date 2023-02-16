<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

	<link rel="stylesheet" href="{{URL::asset('cssfiles/style.css')}}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
	<title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/sass/app.scss')

    <!-- Custom styles for this Page-->
    @yield('custom_styles')

</head>
<body class="theme-light">
    <div class="page">
        <div class="sticky-top">
			<header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-2">
							<a href=""><img src="{{ url('img/logo_outreach.png') }}" class="img-fluid"></a>
						</div>
						<div class="col-lg-8">	
							<ul class="navbar-nav  app_ul_set">
								
								<li class="nav-item @if(request()->routeIs('home')) active @endif">
									<a class="nav-link" href="{{ route('home') }}" >
										<i class="ti ti-home nav_icon_set"></i>
										<span class="nav-link-title">
											{{ __('Dashboard') }}
										</span>
									</a>
								</li>

								<li class="nav-item dropdown @if(request()->routeIs('users.index')) active @endif">
									<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<i class="ti ti-users nav_icon_set"></i>
										<span class="nav-link-title">
											{{ __('Users') }}
										</span>
									</a>

									<div class="dropdown-menu">
										<div class="dropdown-menu-columns">
											<div class="dropdown-menu-column">
											<a class="dropdown-item"  href="{{ route('users.index') }}">
													{{ __('Users') }}
												</a>
												<a class="dropdown-item"  href="/user_roles">
													User Roles
												</a>
											</div>
										</div>
									</div>
								</li>

								<li class="nav-item @if(request()->routeIs('about')) active @endif">
									<a class="nav-link" href="{{ route('about') }}" >
										<i class="ti ti-info-circle nav_icon_set"></i>
										<span class="nav-link-title">
											{{ __('About') }}
										</span>
									</a>
								</li>
								
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<i class="ti ti-apps nav_icon_set"></i>
										<span class="nav-link-title">
											{{__('Master Data') }}
										</span>
									</a>
									<div class="dropdown-menu">
										<div class="dropdown-menu-columns">
											<div class="dropdown-menu-column">
												<a class="dropdown-item" href="/companies" >
													Companies
												</a>
													
												<a class="dropdown-item" href="/clients" >
													Clients
												</a>
												<a class="dropdown-item" href="/countries" >
													Countries
												</a>

												<a class="dropdown-item" href="/cities" >
													Cities
												</a>

												<a class="dropdown-item" href="/zones" >
													Zones
												</a>

											</div>
											<div class="dropdown-menu-column">
												<a class="dropdown-item" href="/regions" >
													Regions
												</a>

												<a class="dropdown-item" href="/areas" >
													Areas
												</a>

												<a class="dropdown-item" href="/towns" >
													Towns
												</a>

												<a class="dropdown-item" href="/routes" >
													Routes
												</a>
											</div>
										</div>
									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<i class="ti ti-flame nav_icon_set"></i>
										<span class="nav-link-title">
											Products
										</span>
									</a>
									<div class="dropdown-menu">
										<div class="dropdown-menu-columns">
											<div class="dropdown-menu-column">
												<a class="dropdown-item" href="/products" >
													Products
												</a>
												<a class="dropdown-item" href="/categories" >
													Category
												</a>
												<a class="dropdown-item" href="/subcategories" >
													Subcategory
												</a>

											</div>
										</div>
									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<i class="ti ti-building nav_icon_set"></i>
										<span class="nav-link-title">
											Markets
										</span>
									</a>
									<div class="dropdown-menu">
										<div class="dropdown-menu-columns">
											<div class="dropdown-menu-column">
												
												<a class="dropdown-item" href="/shops" >
													Shops
												</a>

												<a class="dropdown-item" href="/channels" >
													Channels
												</a>

												<a class="dropdown-item" href="/classes" >
													Classes
												</a>

												<a class="dropdown-item" href="/shop_categories" >
													Shop Categories
												</a>

												<a class="dropdown-item" href="/shop_subcategories" >
													Shop Subcategories
												</a>

											</div>
										</div>
									</div>
								</li>



								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
										<i class="ti ti-building nav_icon_set"></i>
										<span class="nav-link-title">
											Engagement
										</span>
									</a>
									<div class="dropdown-menu">
										<div class="dropdown-menu-columns">
											<div class="dropdown-menu-column">
												
												<a class="dropdown-item" href="/compaigns" >
													Campaigns
												</a>

												<a class="dropdown-item" href="/surveys" >
													Surveys
												</a>
											</div>
										</div>
									</div>
								</li>

							</ul>
						</div>
							
						<div class="col-lg-2">
							<div class="navbar-nav flex-row order-md-last">

								@auth
								<div class="nav-item dropdown">
									<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
										<span class="avatar avatar-sm" style="background-image: url(https://eu.ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }})"></span>
										<div class="d-none d-xl-block ps-2">
											{{ auth()->user()->name ?? null }}
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<a href="{{ route('profile.show') }}" class="dropdown-item">{{ __('Profile') }}</a>
											<div class="dropdown-divider"></div>
											<form method="POST" action="{{ route('logout') }}">
												@csrf
												<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
													{{ __('Log Out') }}
												</a>
											</form>
										</a>
									</div>
								</div>
								@endauth
							</div>
						</div>
						
					</div>
					
				</div>
			</header>

         	

			</div>
			<div class="page-wrapper">
				@yield('content')
        	</div>
      	</div>
    </div>

	<script src="{{asset('js/main_javascript.js')}}"></script>
    <!-- Core plugin JavaScript-->
    @vite('resources/js/app.js')

    <!-- Page level custom scripts -->
    @yield('custom_scripts')

</body>
</html>
