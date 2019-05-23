@extends('frontEnd.layouts.master')
@section('title','Cart Page')
@section('content')

    <section id="cart_items">
        <div class="container">
            @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-bordered">
                    <thead class="table-dark text-center">
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="discount">Discount</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody class="text-dark">

                        @foreach($cart_datas as $cart_data)
                        <?php
                                $image_products=DB::table('products')->select('image_name')->join('product_images','product_images.product_id','=','products.id')->where('products.id',$cart_data->product_id)->get()->first();
                                $image_data = DB::table('products')->where('products.id',$cart_data->product_id)->get()->first();
                        ?>
                        
                            <input type="hidden" name="id" value="{{$cart_data->id}}" id="id-{{$cart_data->id}}">
                            <input type="hidden" name="stock" id="stock" value="{{$cart_data->stock}}">
                            <tr id="tr-{{$cart_data->id}}">
                                <td class="cart_product text-center">
                                    {{-- @foreach($image_products as $image_product) --}}
                                        <a href=""><img class="img-fluid" src="{{url('img/product/',$image_products->image_name)}}" alt="" style="width: 100px;"></a>
                                    {{-- @endforeach --}}
                                </td>
                                <td class="cart_description">
                                    <p style="font-size: 15px">{{$image_data->product_name}}</p>
                                </td>
                                <td class="cart_price">
                                    <p style="font-size: 15px">Rp {{number_format($image_data->price)}}</p>
                                </td>

                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <button id="klik1-{{$cart_data->id}}" class="btn btn-warning btn-sm"> - </button>
                                        <input class="cart_quantity_input-{{$cart_data->id}}" style="text-align: center; background-color: white;" type="text" name="quantity" value="{{$cart_data->qty}}" autocomplete="off" disabled="" size="3">
                                        <button id="klik-{{$cart_data->id}}" class="btn btn-warning btn-sm"> + </button>

                                    </div>
                                </td>
                                <td>
                                    {{$cart_data->percentage}}%
                                </td>

                                <td class="cart_total">
                                    <p style="font-size: 15px">Rp {{number_format($cart_data->price*$cart_data->qty)}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="javascript:" rel="{{$cart_data->id}}"  id="hapus-{{$cart_data->id}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                            <script type="text/javascript">

                                $(document).ready(function(){
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $('#klik-{{$cart_data->id}}').click(function(){

                                        console.log("terklik");
                                        var baseUrl = window.location.protocol+"//"+window.location.host;
                                        var qty_awal = $('.cart_quantity_input-{{$cart_data->id}}').val();
                                        var stock = parseInt($('#stock-{{$cart_data->id}}').val());
                                        var qty_akhir = parseInt(qty_awal) + 1;
                                        var id = parseInt($('#id-{{$cart_data->id}}').val());

                                        // axios.patch()
                                        $.ajax({
                                            url: baseUrl+'/cart/update/'+id,  
                                            type : 'post',
                                            dataType: 'JSON',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                id: id,
                                                qty : qty_akhir,
                                                },
                                            success:function(response){
                                                    alert("TEST");
                                                    $('.cart_quantity_input-{{$cart_data->id}}').val(qty_akhir);
                                                    event.preventDefault();
                                            },
                                            error:function(){
                                                alert(qty_akhir);
                                            }

                                        });
                                    });
                                });
                            </script>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            @if(Session::has('message_apply_sucess'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message_apply_sucess')}}
                </div>
            @endif
            <div class="text-right mb-3">
                <ul>
                    @if(Session::has('discount_amount_price'))
                        <li>Sub Total <span>Rp {{number_format($total_price)}}</span></li>
                        <li>Coupon Discount (Code : {{Session::get('coupon_code')}}) <span>Rp {{number_format(Session::get('discount_amount_price'))}}</span></li>
                        <li>Total <span>Rp {{number_format($total_price-Session::get('discount_amount_price'))}}</span></li>
                    @else
                        <li>Total <span>Rp {{number_format($total_price)}}</span></li>
                    @endif
                </ul>
            </div>
            <div class="text-center">
                <a href="{{url('/check-out')}}"><button class="btn btn-warning">CHECK OUT</button></a>
            </div>
        </div>
    </section><!--/#do_action-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(".cart_quantity_delete").click(function () {
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/cart/deleteItem/"+id;
            });
        });
    
    </script>
@endsection