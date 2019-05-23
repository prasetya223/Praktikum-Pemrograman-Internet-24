@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
	<style type="text/css">
		.container{
			color: black;
		}
	</style>
    <div class="container text-center">
        <h3>YOUR ORDER HAS BEEN PLACED</h3>
        <p>Thanks for your Order that use Options on Cash On Delivery</p>
        <a href="/transaction" class="text-warning"><u>Process Your Order Here</u></a>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection