@extends('frontend.master.master')
@section('title','Hoàn tất')
@section('content')
<!-- main -->

<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="process-wrap">
                    <div class="process text-center active">
                        <p><span>01</span></p>
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>02</span></p>
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="process text-center active">
                        <p><span>03</span></p>
                        <h3>Hoàn tất thanh toán</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <span class="icon"><i class="icon-shopping-cart"></i></span>
                <h2>Cảm ơn bạn đã mua hàng, Đơn hàng của bạn đã đặt thành công</h2>
                <p>
                    <a href="" class="btn btn-primary">Trang chủ</a>
                    <a href="product" class="btn btn-primary btn-outline">Tiếp tục mua sắm</a>
                </p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-md-4">
                <h3 class="billing-title mt-20 pl-15">Thông tin đơn hàng</h3>
                <table class="order-rable">
                    <tbody>
                        <tr>
                            <td>Đơn hàng số</td>
                            <td>: {{ $customer->id }}</td>
                        </tr>
                        <tr>
                            <td>Ngày mua</td>
                            <td>: {{ $customer->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền</td>
                            <td>: ₫ {{ number_format($customer->total,0,'','.') }}</td>
                        </tr>
                        <tr>
                            <td>Phương thức thanh toán</td>
                            <td>: Ship Code </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h3 class="billing-title mt-20 pl-15">Địa chỉ thanh toán</h3>
                <table class="order-rable">
                    <tbody>
                        <tr>
                            <td>Họ Tên</td>
                            <td>: {{ $customer->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>: {{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>: {{ $customer->address }} </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h3 class="billing-title mt-20 pl-15">Địa chỉ giao hàng</h3>
                <table class="order-rable">
                    <tbody>
                        <tr>
                            <td>Họ Tên</td>
                            <td>: {{ $customer->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>: {{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>: {{ $customer->address }} </td>
                        </tr>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="billing-form">
            <div class="row">
                <div class="col-12">
                    <div class="order-wrapper mt-50">
                        <h3 class="billing-title mb-10">Hóa đơn</h3>
                        <div class="order-list">
                            <div class="list-row d-flex justify-content-between">
                                <div class="col-md-4">SẢN PHẨM</div>

                                <div class="col-md-4 offset-md-4" align='right'>TỔNG CỘNG</div>
                            </div>

                            @foreach ($customer->order as $order)
                                <div class="list-row d-flex justify-content-between">
                                    <div class="col-md-4">{{ $order->name }} (
                                        @foreach ($order->attr as $attr)
                                            {{ $attr->name }} : {{ $attr->value }}| 
                                        @endforeach
                                        )</div>

                                    <div class="col-md-4" align='right'>x {{ $order->quantity }}</div>
                                    <div class="col-md-4" align='right'>₫ {{ number_format($order->price*$order->quantity,0,'','.') }}</div>
                                </div>
                            @endforeach
                           

                            <div class="list-row border-bottom-0 d-flex justify-content-between">
                                <div class="col-md-4">
                                    <h6>Tổng</h6>
                                </div>
                                <div class="col-md-4 offset-md-4" align='right'>₫ {{ number_format($customer->total,0,'','.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@endsection

