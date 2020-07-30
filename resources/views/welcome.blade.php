
<!DOCTYPE html>
<html lang="en">
<head>
	<title>API DOCS</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="{{asset('public/css/icons/icomoon/styles.min.css')}}">
	<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('public/css/colors.min.css')}}" rel="stylesheet" type="text/css">


	@yield('css')
	@toastr_css
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center bg-white">			
			<div class="navbar-brand navbar-brand-md">
				<a href="" class="d-inline-block">
					<img src="" alt=""  class="ml-3">
				</a>
			</div>
			
			<div class="navbar-brand navbar-brand-xs">
                <a href="index.html" class="d-inline-block">
                  
                </a>
            </div>
		</div>
		<!-- /header with logos -->
	

		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="" alt="">
				</a>
			</div>	

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

			</ul>
			
		</div>
		<!-- /navbar content -->
		
	</div>
	<!-- /main navbar -->

					
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark  sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				
				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{asset('public/image/foto_user/dummy.jpeg')}}" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold"></div>
								<div class="font-size-xs opacity-50">
									<i class="icon-pin font-size-sm"></i> &nbsp;Dimana-mana, IYA
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->

				
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                            <li class="nav-item">
                                <a href="" class="nav-link active">
                                    <i class="icon-home4"></i>
                                    <span>
                                        API DOCS
                                        <span class="d-block font-weight-normal opacity-50">Documentation</span>
                                    </span>
                                </a>
                            </li>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"> <span>API</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="" class="nav-link">closing</a></li>
							</ul>
						</li>
						<!-- <li class="nav-item">
							<a href="" class="nav-link"><span>Users management</span></a>
						</li> -->
						<!-- /main -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper" id="app">

			<!-- Content area -->
			<div class="content pt-0 mt-3" id="app">

			@yield('content')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2020 API DOCS
					</span>

				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>


	<!-- Core JS files -->
    
	<script src="{{asset('public/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/js/apps.js')}}"></script>
	<script src="{{asset('public/js/javascript.js')}}"></script>
	<script src="{{asset('public/js/npm.js')}}"></script>

	<script src="{{asset('public/js/plugins/core.min.js')}}"></script>
	<script src="{{asset('public/js/plugins/effects.min.js')}}"></script>
	<script src="{{asset('public/js/plugins/interactions.min.js')}}"></script>

</body>
</html>




