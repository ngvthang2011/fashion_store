@extends('frontend.master.master')
@section('title','Thông tin sản phẩm')
	
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-detail-wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-entry">
                                <div class="product-img" style="background-image: url(public/backend/img/{{ $product->img }});">

                                </div>

                            </div>
                        </div>
                        <div class="col-md-7">
                            <form action="product/addCart" method="post">
                                @csrf
                                <div class="desc">
                                    <h3>{{ $product->name }}</h3>
                                    <p class="price">
                                        <span>{{ number_format($product->price,0,'','.') }} VNĐ</span>
                                    </p>
                                    <p>{{ $product->info }}</p>
                                    
                                    @foreach (attr_values($product->values) as $attr=>$values)
                                    <div class="size-wrap">
                                        <p class="size-desc">
                                            {{ $attr }}:
                                            @foreach ($values as $value)
                                               <a class="size">{{ $value }}</a>
                                            @endforeach
                                            
                                        </p>
                                    </div>
                                    @endforeach
                                    
                                    <h4>Lựa chọn</h4>
                                    <div class="row">

                                        @foreach (attr_values($product->values) as $attr=>$values)
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ $attr }}:</label>
                                                <select class="form-control " name="attr[{{ $attr }}]" id="">
                                                    @foreach ($values as $value)
                                                    <option value="{{ $value }}"> {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        @endforeach
                                        

                                    </div>
                                    <div class="row row-pb-sm">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn"
                                                        data-type="minus" data-field="">
                                                        <i class="icon-minus2"></i>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity"
                                                    class="form-control input-number" value="1" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn"
                                                        data-type="plus" data-field="">
                                                        <i class="icon-plus2"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_product" value="{{ $product->id }}">
                                    <p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ
                                            hàng</button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 tabulation">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in active">
                                {{ $product->describe }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>Sản phẩm Mới</span></h2>
            </div>
        </div>
        <div class="row">

            @foreach ($products_new as $prd_new)
                <div class="col-md-3 text-center">
                <div class="product-entry">
                    <div class="product-img" style="background-image: url(public/backend/img/{{ $prd_new->img }});">
                        <p class="tag"><span class="new">New</span></p>
                        <div class="cart">
                            <p>
                                <span class="addtocart"><a href="product/detail/{{ $prd_new->id }}"><i class="icon-shopping-cart"></i></a></span>
                                <span><a href="product/detail/{{ $prd_new->id }}"><i class="icon-eye"></i></a></span>


                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="product/detail/{{ $prd_new->id }}">{{ $prd_new->name }}</a></h3>
                        <p class="price"><span>{{ number_format($prd_new->price,0,'','.') }} VNĐ</span></p>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- end main -->

@endsection