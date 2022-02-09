    @extends('front.layout.master')
    @section('title', 'HomePage')
    @section('body')
    <!-- here section begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Myla'Store</span>
                            <h1>Tưng bừng khai trương</h1>
                            <p>Mừng ngày khai trương, Myla'store có nhiều chương trình giảm giá hấp dẫn lên đến 50% cho tất cả mặt hàng khi mua tại cửa hàng đến hết ngày 11-04-2022.</p>
                            <a href="#" class="primary-btn">Nhanh tay mua sắm nào</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Myla'Store</span>
                             <h1>Black friday</h1>
                            <p>Chương trình giảm giá hấp dẫn lên đến 50% cho tất cả mặt hàng khi mua tại cửa hàng đến hết ngày 11-04-2022.</p>
                            <a href="#" class="primary-btn">Nhanh tay mua sắm nào</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>40%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- here section end -->


    <!-- banner section begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Đồ nam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Đồ nữ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Đồ trẻ em</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner section end -->

    <!-- women section begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                        <h2>Đồ nữ</h2>
                        <a href="{{ route('shop.category', 2) }}">Xem chi tiết hơn</a>
                    </div>
                </div>               
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Sản phẩm mới nhất</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">

                        @foreach ($womenProducts as $womenProduct)                           
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="front/img/products/{{$womenProduct->productImages[0]->path}}" alt="">

                                @if ($womenProduct->discount !=null)
                                <div class="sale">Sale</div>
                                @endif
                               
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a onclick="AddCart({{$womenProduct->id}})" href="javascript:"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="{{ route('productDetail',$womenProduct->id ) }}">Xem chi tiết</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $womenProduct->tag }}</div>
                                <a href="">
                                    <h5>{{ $womenProduct->name }}</h5>
                                </a>
                                <div class="product-price">
                                    @if ($womenProduct->discount !=null)
                                        {{ $womenProduct->discount }}K
                                        <span>{{ $womenProduct->price }}K</span>     
                                    @else
                                         {{ $womenProduct->price }}K                                                                     
                                    @endif

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- women section end -->


    <!-- deal of the week section begin -->
    <section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal hot của tuần</h2>
                    <p>Giảm 10% cho tất đơn hàng có tổng giá trị trên 10%</p>
                    <div class="product-price">
                        350k
                        <span>/ Túi xách</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Ngày</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Giờ</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Phút</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Giây</p>
                    </div>
                </div>
                <a href="" class="primary-btn">Mua sắm ngay</a>
                
            </div>
        </div>
    </section>
    <!-- deal of the week section end -->



    <!-- man section begin -->
      <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Sản phẩm mới nhất</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        
                        @foreach ($menProducts as $menProduct)                           
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="front/img/products/{{$menProduct->productImages[0]->path}}" alt="">

                                @if ($menProduct->discount !=null)
                                <div class="sale">Sale</div>
                                @endif
                               
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a onclick="AddCart({{$menProduct->id}})" href="javascript:"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="{{ route('productDetail',$menProduct->id ) }}">Xem chi tiết</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $menProduct->tag }}</div>
                                <a href="">
                                    <h5>{{ $menProduct->name }}</h5>
                                </a>
                                <div class="product-price">
                                    @if ($menProduct->discount !=null)
                                        {{ $menProduct->discount }}K
                                        <span>{{ $menProduct->price }}K</span>     
                                    @else
                                         {{ $menProduct->price }}K                                                                     
                                    @endif

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
                        <h2>Đồ nam</h2>
                        <a href="{{ route('shop.category', 1) }}">Xem chi tiết hơn</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- man section end -->


    <!-- intagram section begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/nhattruong213/">Myla'store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/nhattruong213/">Myla'store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/nhattruong213/">Myla'store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/nhattruong213/">Myla'store</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/nhattruong213/">Myla'store</a></h5>
            </div>
        </div>
          <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="https://www.instagram.com/nhattruong213/">Myla'store</a></h5>
            </div>
        </div>
    </div>
    <!-- intagram section end -->



    <!-- latest blog section begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)

                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="front/img/blog/{{ $blog->image }}" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{ $blog->create_at }}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    {{ count($blog->blogComments) }}
                                </div>
                            </div>
                            <a href="">
                                <h4>{{ $blog->title }}</h4>
                            </a>
                            <p>{{ $blog->subtitle }}</p>
                        </div>
                    </div>
                </div>
                                    
                @endforeach

            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free ship</h6>
                                <p>Cho tất cả đơn hàng từ 199k</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Hỗ trợ 24/7</h6>
                                <p>Nếu có vấn đề gì liên hệ với với chúng tôi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Bảo mật</h6>
                                <p>Bảo đảm thông tin cho khách hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog section end -->
    @endsection
    