@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('content')

<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
            @if(Session::has('success'))
            {{Session::get('success')}}
            <span><a href="/viewcart" class="nav-link"><u>View cart</u></a></span>
            @endif
        </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <ul class="main-categories">
                </ul>
            </div>
        </div>       
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                    <select>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                        <option value="1">Default sorting</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                <div class="pagination">
                    <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Filter Bar -->
            
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                
                <div class="row">
                    @foreach($products as $product)  
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <a href="{{url('/product-detail',$product->id)}}">
                                <img class="img-fluid" src="{{asset('images/large/'.$product['image_name']) }}" alt="">
                            </a>
                            <div class="product-details">
                                <h5>{{$product->product_name}}</h5>
                                <div class="price">
                                    <h6 class="text-warning">Rp {{number_format($product->price)}}</h6>
                                </div>
                                <div class="prd-bottom">
                                    <form action="{{route('addToCart')}}" method="post" role="form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" name="product_name" value="{{$product->product_name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}" id="dynamicPriceInput">
                                        <input type="hidden" name="stock" value="{{$product->stock}}">
                                        <input type="hidden" name="quantity" id="inputStock" value="1" required/>

                                        @if($product->stock > 0)
                                        <a onclick="this.parentNode.submit(); return false;" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to cart</p>
                                        </a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting mr-auto">
                    <select>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                        <option value="1">Show 12</option>
                    </select>
                </div>
                <div class="pagination">
                    <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    <a href="#">6</a>
                    <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>
@endsection