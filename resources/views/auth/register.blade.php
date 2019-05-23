@extends('frontEnd.layouts.master')
@section('title','Register Page')
@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h3 class="text-center">New Account</h3>
            <form class="row login_form" method="POST" action="{{ route('register') }}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="profile_image" value=NULL>
                <input type="hidden" name="status" value=NULL>
            
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'">
                </div>

                <div class="col-md-12 form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                </div>

                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                </div>

                <div class="col-md-12 form-group">
                    <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="primary-btn">Register</button>
                </div>

                <div class="col-md-12 form-control-plaintext text-center">
                    Sudah punya akun? <a class="text-warning" href="login"><u>Klik Disni</u></a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
