@extends('frontEnd.layouts.master')
@section('title','Detail Page')
@section('content')


    <div class="container">
        <div class="col-sm-6">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                    @if(Session::has('success'))
                    {{Session::get('success')}}
                    <span><a href="/viewcart" class="nav-link"><u>View cart</u></a></span>@endif
                </div>
            @endif
        <div class="row">
                
        <div class="product-details"><!--product-details-->

            <div class="col-sm-5">
                    <a href="{{url('images/large/',$detail_product->image_name)}}">
                        <img src="{{url('images/large/',$detail_product->image_name)}}" alt="" id="dynamicImage"/>
                    </a>
                </div>

                <ul class="thumbnails" style="margin-left: -10px;">
                    <li>
                        @foreach($imagesGalleries as $imagesGallery)
                            <a href="{{url('images/small/',$imagesGallery->image_name)}}" data-standard="{{url('images/small',$imagesGallery->image_name)}}">
                                <img src="{{url('images/small/',$imagesGallery->image_name)}}" alt="" width="75" style="padding: 8px;">
                            </a>
                        @endforeach
                    </li>
                </ul>
            </div>
            <div class="col-sm-7">
                <form action="{{route('addToCart')}}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->product_name}}">
                    <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                    <input type="hidden" name="stock" value="{{$detail_product->stock}}">

                    <div class="product-information"><!--/product-information-->
                        <img src="{{asset('frontEnd/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h2>{{$detail_product->product_name}}</h2>
                        <div id="dynamic_price">Rp {{number_format($detail_product->price)}}</div>
                        <label>Quantity:</label>
                        <input type="text" name="quantity" id="inputStock" required/>
                        @if($detail_product->stock >0)
                        <div>
                            <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </div>
                        @endif
                        <p><b>Availability:</b>
                            @if($detail_product->stock >0)
                                <span id="availableStock">In Stock</span>
                            @else
                                <span id="availableStock" class="text-danger">Out of Stock</span>
                            @endif
                        </p>
                        <p><b>Condition:</b> New</p>

                        <p><b>Discount:</b>@if(empty($dis)) None @else {{$dis->percentage}}% untill {{date('d M Y', strtotime($dis->end))}} @endif</p>
                        {{-- <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a> --}}
                    </div><!--/product-information-->
                </form>

            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                    {{-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                    <li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li> --}}
                </ul>
            </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                    @foreach($review as $review)
                        <p><b>{{$review->name}}</b></p>
                        @php
                            $a = 5;
                        @endphp
                        @for($i=0 ; $i< $review->rate; $i++)
                            @php
                                $a = $a-1;
                            @endphp
                            <span style="color: gold;" class="fa fa-star checked"></span>
                        @endfor
                        @for($i=0 ; $i< $a; $i++)
                            <span style="color: grey;" class="fa fa-star"></span>
                        @endfor
                        <p input style="background-color: white;" readonly="">{{$review->content}}</p>
                        <hr>

                    @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div><!--/category-tab-->
    </div>
</div>
</div>

@endsection