@extends('frontEnd.layouts.master')
@section('title','Login Page')
@section('slider')
@endsection
@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Pengguna Baru?</h4>
							<p>ayo daftarkan dirimu sekarang dan temukan berbagai produk menarik di BukaWarung!</p>
							<a class="primary-btn" href="register">Register</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
                        <div class="login_form_inner">
                            <h3>Log in</h3>
                            <form class="row login_form" action="{{ route('login') }}" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                <div class="col-md-12 form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="selector">
                                        <label for="f-option2">Keep me logged in</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="primary-btn">Log In</button>
                                </div>
                            </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

@endsection