<!-- Start Header Area -->
<header class="header_area sticky-header">

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
									<li class="nav-item"><a class="nav-link" href="/viewcart">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="/transaction">Transactions</a></li>
								</ul>
							</li>
							@if(Auth::check())
                            @php
                                $id = Auth::id();
                                $jum = auth()->user()->unreadNotifications->count();
                                $notif = DB::table('admin_notifications')->where('notifiable_id',$id)->get();
								@endphp
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Notification</a>
									@if($jum != 0)<span class="badge bg-danger text-light">{{$jum}}</span>@endif <span class="caret"></span>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" id="readnotif"><b>Mark All As Read</b></a></li>
										@foreach(auth()->user()->unreadNotifications as $notif)
										<li class="nav-item"><a>{!!$notif->data!!}</a></li>
										@endforeach
									</ul>
								</li>
								@endif

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
<script src="{{asset('frontEnd/js/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#readnotif').click(function(){
            console.log("terklik");
            var baseUrl = window.location.protocol+"//"+window.location.host;
            $.ajax({
				url: baseUrl+'/markRead',  
				type : 'post',
				dataType: 'JSON',
				data: {
                    "_token": "{{ csrf_token() }}",
                    
                    },
				success:function(response){
					location.reload();
				},
				error:function(){
                    alert("GAGAL");
				}

			});
        });
    });
</script>
	<!-- End Header Area -->