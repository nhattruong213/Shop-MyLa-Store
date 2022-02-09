<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | MyHaStore</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
 
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
     <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        nguyennhattruong11223344@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        +84 39.73.20.011
                    </div>
                </div>
                <div class="ht-right">
                    <a href="login.html" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width: 300px;">
                            <option value="yt" data-image="front/img/a.jpg"
                            data-imagecss="flag yt" data-title="English">Vietnam</option> 
                             <option value="yu" data-image="front/img/flag-1.jpg"
                            data-imagecss="flag yu" data-title="Bangladesh">English</option> 
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="https://www.facebook.com/diem.xuavanay.5/"><i class="ti-facebook"></i></a>
                        <a href="https://www.instagram.com/nhattruong213/"><i class="ti-instagram"></i></a>
                        <a href="https://myaccount.google.com/?utm_source=OGB&tab=mk&utm_medium=act&gar=1"><i class="fa fa-google-plus"></i></a>
                        <a href="https://www.youtube.com/channel/UCOTTnT77eFDvNahBu7ssahQ"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ route('homepage') }}">
                                <img src="front/img/logo.png" height="25" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="{{route('shop')}}">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">Danh mục</button>
                                <div class="input-group">
                                    <input name="search" type="text" value="{{ request('search') }}" placeholder="Bạn đang cần gì?">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>    
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="{{ route('cart') }}">
                                    <i class="icon_bag_alt"></i>
                                    @if (Session()->has('Cart')!=null)
                                        <span id="total-quanty-show">{{Session()->get('Cart')->totalQuanty}}</span>
                                    @else
                                        <span id="total-quanty-show">0</span>
                                    @endif     
                                </a>
                                <div class="cart-hover">
                                    <div id="change-item-cart">
                                        @if(Session()->has('Cart'))
                                            <div class="select-items">
                                                <table>
                                                    <tbody>
                                                        @foreach (Session()->get('Cart')->products as $item)
                                                        <tr>
                                                            <td class="si-pic"><img src="front/img/products/{{$item['productInfo']->productImages[0]->path}}" width="50px" alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>{{$item['productInfo']->discount != null ? $item['productInfo']->discount : $item['productInfo']->price }}k × {{$item['quanty']}}</p>
                                                                    <h6>{{$item['productInfo']->name}}</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close" data-id="{{ $item['productInfo']->id }}"></i>
                                                            </td>
                                                        </tr>
                                                                        
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="select-total">
                                                <span>Tổng thanh toán:</span>
                                                <h5>{{Session()->get('Cart')->totalPrice}}K</h5>
                                            </div>
                                        @endif  
                                    </div>
                                    <div class="select-button">
                                        <a href="{{ route('cart') }}" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="{{ route('CheckOut') }}" class="primary-btn checkout-btn">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                            <li><p>Giỏ hàng</p></li>
                        </ul>      
                    </div>
                </div>
             </div>
        </div>  
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                   <div class="depart-btn">
                       <i class="ti-menu"></i>
                       <span>Tất cả danh mục</span>
                       <ul class="depart-hover">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('shop.category', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                       </ul>
                   </div> 
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ (request()->segment(1)=='') ? 'active': '' }}"><a href="{{ route('homepage') }}">Trang chủ</a></li>
                        <li class="{{ (request()->segment(1)=='shop') ? 'active': '' }}"><a href="{{ route('shop') }}">Shop</a></li>    
                        <li class="{{ (request()->segment(1)=='blog') ? 'active': '' }}"><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="{{ (request()->segment(1)=='contact') ? 'active': '' }}"><a href="{{route('contact')}}">Liên hệ</a></li>
                        <li><a href="">Page</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('blogDetail', 1) }}">Blog Details</a></li>
                                <li class="{{ (request()->segment(1)=='Cart') ? 'active': '' }}"><a href="{{ route('cart') }}">Giỏ hàng</a></li>
                                <li><a href="{{ route('CheckOut') }}">Thanh toán</a></li>
                                <li><a href="register.html">Đăng kí</a></li>
                                <li><a href="login.html">Đăng nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
     </header>
    <!-- header section end -->

    {{-- body here --}}
    @yield('body')



    <!-- Partner Login section begin -->
     <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                       <img src="front/img/logo-carousel/logo-1.png" alt=""> 
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                       <img src="front/img/logo-carousel/logo-2.png" alt=""> 
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                       <img src="front/img/logo-carousel/logo-3.png" alt=""> 
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                       <img src="front/img/logo-carousel/logo-4.png" alt=""> 
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                       <img src="front/img/logo-carousel/logo-5.png" alt=""> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Login section end -->


    <!-- footer section begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="{{ route('homepage') }}">
                                <img src="front/img/logo.png" height="25" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>K234/21a Đỗ Bá - Ngũ Hành Sơn - Đà Nẵng</li>
                            <li>Phone: 0397320011</li>
                            <li>Email: nguyennhattruong11223344@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/diem.xuavanay.5/"><i class="ti-facebook"></i></a>
                            <a href="https://www.instagram.com/nhattruong213/"><i class="ti-instagram"></i></a>
                            <a href="https://myaccount.google.com/?utm_source=OGB&tab=mk&utm_medium=act&gar=1"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.youtube.com/channel/UCOTTnT77eFDvNahBu7ssahQ"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin</h5>
                        <ul>
                            <li><a href="">Thông tin </a></li>
                            <li><a href="">Thanh toán</a></li>
                            <li><a href="">Liên hệ</a></li>
                            <li><a href="">Dịch vụ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản</h5>
                        <ul>
                            <li><a href="">Tài khoản</a></li>
                            <li><a href="">Liên hệ</a></li>
                            <li><a href="">Giỏ hàng</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                    
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Tham gia mua sắm ngay với chúng tôi</h5>
                        <p>Điền email để được nhận những sản phẩm mới nhất, các chương trình khuyến mãi của shop</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập mail của bạn" name="" id="">
                            <button type="button">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="copyright-text">
                             Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | By <i class="fa fa-heart" aria-hidden="true"></i>  <a href="https://mylastore.com" target="_blank">Nhật Trường Nguyễn</a>
                         </div>
                         <div class="payment-pic">
                             <img src="front/img/payment-method.png" alt="">
                         </div>
                     </div>
                 </div>
             </div>
        </div>
    </footer>
    <!-- footer section end -->



    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/main.js"></script>


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script>
        function AddCart(id) {
            $.ajax({
                url: 'Cart/AddCart/'+id,
                type: 'GET',
            }).done(function(response){
                // console.log(response);
                $('#change-item-cart').empty();
                $('#change-item-cart').html(response);
                $('#total-quanty-show').text($('#total-quanty').val());
                alertify.success('Đã thêm sản phẩm vào giỏ hàng');
            });
        }

        $("#change-item-cart").on("click",".si-close i",function(){
            $.ajax({
                url: 'Cart/DeleteItemCart/'+$(this).data("id"),
                type: 'GET',
            }).done(function(response){
                $('#change-item-cart').empty();
                $('#change-item-cart').html(response);
                $('#total-quanty-show').text($('#total-quanty').val());
                alertify.success('Đã xóa sản phẩm khỏi giỏ hàng');
            });
        });

        function DeleteListCart(id) {
            $.ajax({
                url: 'Cart/DeleteListCart/'+id,
                type: 'GET',
            }).done(function(response){
                // console.log(response);
                $('#list-cart').empty();
                $('#list-cart').html(response);
                alertify.success('Đã xóa sản phẩm khỏi giỏ hàng');

    
            var proQty = $('.pro-qty');
            proQty.prepend('<span class="dec qtybtn">-</span>');
            proQty.append('<span class="inc qtybtn">+</span>');
            proQty.on('click', '.qtybtn', function () {
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                if ($button.hasClass('inc')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find('input').val(newVal);
	        });
            });
        }
    </script>
</body>

</html>