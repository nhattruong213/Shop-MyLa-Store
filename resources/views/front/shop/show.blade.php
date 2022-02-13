    @extends('front.layout.master')
    @section('title', 'Chi tiết sản phẩm')
    @section('body')
    <!-- breadcrumb section begin -->
    <div class="breadcrumb-section">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i>Trang chủ</a>
                        <a href="shop.html">Shop</a>
                         <span>Chi Tiết</span>
                     </div>
                 </div>
             </div>
        </div>
    </div>
    <!-- breadcrumb section end -->


    <!-- product shop section begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.shop.components.sibar')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="front/img/products/{{ $product->productImages[0]->path }}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @foreach ($product->productImages as $productImage)
                                    <div class="pt active" data-imgbigurl="front/img/{{ $productImage->path }}">
                                        <img src="front/img/products/{{ $productImage->path }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->tag }}</span>
                                    <h3>{{ $product->name }}</h3>
                                    <a href="#" class="hear-icon"><i class="icon_hear_alt
                                        "></i></a>
                                </div>
                                <div class="pd-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if($i <= $avgRating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor                                 
                                    <span>({{ count($product->productComments) }})</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{ $product->description }}</p>
                                    @if($product->discount!= null)
                                         <h4>{{ $product->discount }}K <span>{{ $product->price }}K</span></h4>
                                    @else
                                        <h4>{{ $product->price }}K</h4>
                                    @endif
                                </div>
                                {{-- <div class="pd-color">
                                    <h6>Màu</h6>
                                    <div class="pd-color-choose">
                                        @foreach (array_unique(array_column($product->productDetails->toArray(),'color')) as $productColor)
                                            <div class="cc-item">
                                                <input type="radio" id="cc-{{$productColor}}">
                                                <label for="cc-black" class="cc-{{$productColor}}"></label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pd-size-choose">                      
                                    @foreach (array_unique(array_column($product->productDetails->toArray(),'size')) as $productSize)
                                        <div class="sc-item">
                                            <input type="radio" id="sm-{{$productSize}}">
                                            <label for="sm-{{$productSize}}">{{$productSize}}</label>
                                        </div>
                                    @endforeach
                                </div> --}}
                                <div class="quantity">
                                    <form action="{{route('AddCart-Many', $product->id)}}" method="POST">
                                        @csrf
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input name ="quanty" type="number" required min="1" max="10" value="1">
                                            </div>
                                            {{-- <a href="{{ route('AddCart', $product->id) }}" class="primary-btn pd-cart">Thêm vào giỏ </a> --}}
                                            <button type="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                                        </div>
                                     </form>
                                </div>
                                <ul class="pd-tags"> 
                                    <li><span>Danh mục</span>: {{ $product->productCategory->name }}</li>
                                    <li><span>Tag</span>:{{ $product->tag }}</li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : {{$product->sku}}</div>
                                    <div class="pd-social">
                                        <a href="https://www.facebook.com/diem.xuavanay.5/"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li><a class="active" href="#tab-1" data-toggle="tab" role="tab">Mô tả</a></li>
                                <li><a href="#tab-2" data-toggle="tab" role="tab">Thông số</a></li>
                                <li><a href="#tab-3" data-toggle="tab" role="tab">Review</a></li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Giới thiệu</h5>
                                                <p>{{ $product->description }}</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="front/img/product-single/tab-desc.jpg" alt=""> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Đánh giá khách hàng</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if($i <= $avgRating)
                                                                <i class="fa fa-star"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor                                 
                                                        <span>({{ count($product->productComments) }})</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Giá</td>
                                                <td>
                                                    <div class="p-price">
                                                        {{$product->price}}K
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Thêm vào giỏ hàng</td>
                                                <td>
                                                    <div class="cart-add">+Thêm vào giỏ hàng</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Tồn kho</td>
                                                <td class="p-stock">{{$product->qty}} Sản phẩm</td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Trọng lượng</td>
                                                <td>
                                                    <div class="p-weight">{{$product->weight}}kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach (array_unique(array_column($product->productDetails->toArray(),'size')) as $productSize)
                                                            {{$productSize}}
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Màu</td>
                                                <td>
                                                    @foreach (array_unique(array_column($product->productDetails->toArray(),'color')) as $productColor)
                                                         {{$productColor}}
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{ $product->sku }}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                   <div class="customer-review-option">
                                        <h4>{{count($product->productComments)}} Bình luận</h4>
                                        <div class="comment-option">
                                            @foreach ($product->productComments as $productComment)                                                
                                                <div class="co-item">
                                                    <div class="avatar-pic">
                                                        <img src="front/img/product-single/{{ $productComment->user->avatar ?? 'ac.jpg' }}" alt="">
                                                    </div>
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if($i <= $productComment->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor                                                         
                                                        </div>
                                                        <h5>{{$productComment->name}} <span>{{ date('M d,Y', strtotime($productComment->created_at)) }}</span></h5>
                                                        <div class="at-reply">{{$productComment->messages}}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Để lại bình luận</h4>
                                            <form action="{{ route('postComment', $product->id) }}" method="POST" class="comment-form">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                       <input type="text" placeholder="Tên" name='name'> 
                                                       @error('name')
                                                       <div class="text-danger">{{ $message }}</div>
                                                       @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name='email'>
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Nội dung" name='messages'></textarea>
                                                        @error('messages')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="personal-rating">
                                                            <h6>Đánh giá của bạn</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                            @error('rating')
                                                            <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="site-btn">Gửi</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product shop section end -->

    <!-- related products section begin -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($relateProducts as $relateProduct)          
                <div class="col-lg-4 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="front/img/products/{{$relateProduct->productImages[0]->path}}" alt="">
                            @if($relateProduct->discount != null)
                                <div class="sale pp-sale">Sale</div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="{{ route('AddCart', $relateProduct->id) }}"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="{{route('productDetail',$relateProduct->id)}}">+Xem chi tiết</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $relateProduct->tag }}</div>
                            <a href="#">
                                <h5>{{ $relateProduct->name }}</h5>
                            </a>
                            <div class="product-price">
                                @if ($relateProduct->discount !=null)
                                    {{ $relateProduct->discount }}K
                                    <span>{{ $relateProduct->price }}K</span>     
                                @else
                                    {{ $relateProduct->price }}K                                                                     
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- related products section end -->
@endsection