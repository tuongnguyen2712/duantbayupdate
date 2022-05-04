@extends('layouts.app')
@section('content')
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>save</th>
                                    <th>Delete</th>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th class="p-name"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><a href="#" style="font-size: 25px"><i class="fa fa-save edit-tatca" id="edit-all"></i></a></th>
                                    <th><a href="#" style="font-size: 25px"><i class="fa fa-close del-all"></i></a></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (Session::has("cart") != null)
                                @foreach (Session::get('cart')->products as $item)
                                <tr>
                                    <td class="cart-pic"><img src="img/cart-page/product-3.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>{{$item['productInfo']->name}}</h5>
                                    </td>
                                    <td class="p-price">{{number_format($item['productInfo']->giamgia)}}</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input data-id="{{$item['productInfo']->id}}" id="quanty-item-{{$item['productInfo']->id}}" type="number" value="{{$item['quanty']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">{{number_format($item['productInfo']->giamgia * $item['quanty'])}}</td>
									<td class="close-td"><a href="#"><i class="fa fa-save" onclick="Updateitemcart({{$item['productInfo']->id}});"></i></a></td>
                                    <td class="close-td"><a href="#"><i class="fa fa-close" onclick="Deleteitemcart({{$item['productInfo']->id}});"></i></a></td>

                                </tr>
                                @endforeach
                                @else
                                <h3>Không có sản phẩm nào trong giỏ hàng vui lòng thêm sản phẩm : <a href="/">Trang chủ </a></h3>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                    @if (Session::has("cart") != null)
                                    <li class="subtotal">Total Quanty<span> {{Session::get('cart')->totalQty}}</span></li>
                                    <li class="subtotal">Total Price<span> {{number_format(Session::get('cart')->totalPrice)}} VNĐ</span></li>
                                    @else
                                    <li class="subtotal">Total Quanty<span> 0</span></li>
                                    <li class="subtotal">Total Price<span> 0 VNĐ</span></li>
                                    @endif

                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shopping Cart Section End -->
    @endsection

