@extends('front.layout.master')
@section('title', 'Shop')
@section('body')
    
    <!-- breadcrumb section begin -->
    <div class="breadcrumb-section">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="breadcrumb-text">
                         <a href="index.html"><i class="fa fa-home"></i>Trang chủ</a>
                         <span>Shop</span>
                     </div>
                 </div>
             </div>
        </div>
    </div>
    <!-- breadcrumb section end -->

    <!-- product shop section begin -->
    <section class="product-shop spad">
       <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                @include('front.shop.components.sibar')
            </div>
            <div class="col-lg-9 order-lg-2">   
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <form action="">
                                <div class="select-option">
                                    <select name="sort_by" class="sorting" onchange="this.form.submit();" >
                                        <option {{ request('sort_by') == 'bth' ? 'selected' : '' }} value="bth">Sắp xếp </option>
                                        <option {{ request('sort_by') == 'price-up' ? 'selected' : '' }} value="price-up">Giá tăng dần</option>
                                        <option {{ request('sort_by') == 'price-down' ? 'selected' : '' }} value="price-down">Giá giảm dần</option>
                                    </select>
                                    <select name="show" class="p-show" onchange="this.form.submit();">
                                        <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Show 9 sản phẩm</option>
                                        <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Show 3 sản phẩm</option>
                                        <option {{ request('show') == '6' ? 'selected' : '' }} value="6">Show 6 sản phẩm</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach ($products as $product)                   
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img  src="front/img/products/{{ $product->productImages[0]->path }}" alt="">
                                        @if($product->discount != null)
                                            <div class="sale pp-sale">Sale</div>
                                        @endif
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a onclick="AddCart({{$product->id}})" href="javascript:"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="{{ route('productDetail', $product->id) }}">+Xem chi tiết</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{ $product->tag }}</div>
                                        <a href="{{ route('productDetail', $product->id) }}">
                                            <h5>{{ $product->name }}</h5>
                                        </a>
                                        <div class="product-price">
                                            @if ($product->discount!=null)
                                                {{ number_format($product->discount) }}
                                                <span>{{ number_format($product->price) }}</span>
                                            @else
                                                {{number_format($product->price) }}
                                            @endif
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
               {{$products->links()}}
            </div>
        </div>
       </div>
    </section>
    <!-- product shop section end -->

@endsection
