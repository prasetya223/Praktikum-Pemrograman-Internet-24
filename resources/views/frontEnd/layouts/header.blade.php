<!-- Start Header Area -->
<header class="header_area sticky-header">

@php
    $jum = DB::table('admin_notifications')->where('read_at',NULL)->count();
    $notif = DB::table('admin_notifications')->where('read_at',NULL)->get();
@endphp

		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/"><img src="{{URL::asset('img/logo.png')}}" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="/viewcart">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								aria-expanded="false">NOTIF</a>
								<ul class="dropdown-menu">
									<li class="dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon icon-bell"></i> Notification
										@if($jum != 0)<span class="badge" style="background-color: red;">1</span>@endif <span class="caret"></span></a>

										<ul class="dropdown-menu">
											<center><button id="readnotif"><a  style="color: green;">----Mark All As Read---</a></button></center>
											@foreach($notif as $notif)
											<li><a href="#"> {!!$notif->data!!}</a></li>
											@endforeach
										</ul>
									</li>
								</ul>
							</li>
							@if (Route::has('login'))
								@auth
							<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">Logout</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>

								</li>
								@else
								<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">login</a></li>
								@endauth
								@endif
							{{-- @if (Route::has('login'))
							<ul class="nav-item"><a class="nav-link">
								@auth
								<li><a href="/">Home</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">Logout</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
									</form>
								</li>
								@else
								<li><a href="{{ route('login') }}">login</a></li>
								@endauth
								@endif
							--}}	
							</ul>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->