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

     <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>
</head>

<body>
 
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
     <header class="header-section">
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
                    <div class="col-lg-8 col-md-8">
                        <form action="{{route('SearchView')}}" method="post">
                            @csrf
                            <div class="advanced-search">
                                <button type="button" class="category-btn">Đơn Hàng</button>
                                <div class="input-group">
                                    <input name="search" type="text" value="{{ request('search') }}" placeholder="Nhập mã đơn hàng?">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>    
                        </form>
                    </div>
                </div>
             </div>
        </div>  
     </header>
    <!-- header section end -->
    <div class="checkout-section spad">
        <div class="container">
            <div class="checkout-form">
                <div class="row">
                    @if (empty($orderDetail))
                        <div class="col-lg-12"><h4 style="text-align: center">Vui lòng nhập mã đơn hàng</h4></div>
                    @else
                        <div class="col-lg-12"><h4 style="text-align: center">Đơn hàng của bạn</h4></div>
                        <div class="col-lg-6">
                            <div class="place-order">
                                
                                <div class="order-total">
                                    <ul class="order-table">
                                        @foreach ($order as $item)
                                            <li class="fw-normal">Khách hàng <span>{{ $item->first_name.'  '.$item->last_name }}</span></li>
                                            <li class="fw-normal">Địa chỉ <span>{{ $item->street_address }}</span></li>
                                            <li class="fw-normal">Điện thoại <span>{{ $item->phone }}</span></li>
                                            <li class="fw-normal">Email <span>{{ $item->email }}</span></li>
                                            <li class="fw-normal">Trạng thái: <span>{{ ($item->status == 0 ? 'Chờ duyệt' : $item->status == 1 ) ? 'Đang vận chuyển' : 'Hoàn thành'}}</span></li>
                                            <li class="total-price">Tổng thanh toán <span>{{ number_format($item->subtotal) }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="place-order">
                            
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Sản phẩm <span>Tổng</span></li>
                                        @foreach ($orderDetail as $item)
                                            <li class="fw-normal">{{$item->product->name }} × {{ $item->qty }} <span>{{ number_format($item->amount) }}</span></li>
                                        @endforeach 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <form action="{{ route('Payment_online') }}" method="POST">
            @csrf
            <button type="submit" name="redirect">Online </button>
        </form> --}}
    </div>

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
</body>

</html>