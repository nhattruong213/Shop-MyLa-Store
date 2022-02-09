@extends('front.layout.master')
@section('title', 'Liên hệ')
@section('body')
    <!-- breadcrumb section begin -->
    <div class="breadcrumb-section">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="breadcrumb-text">
                         <a href="./home.html"><i class="fa fa-home"></i>Trang chủ</a>
                         <span>Liên hệ</span>
                     </div>
                 </div>
             </div>
        </div>
    </div>
    <!-- breadcrumb section end --> 

    <!-- map section begin -->
    <div class="map_spad">
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.280673268704!2d108.24124891528861!3d16.050918544190754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421762c06393af%3A0xe359953e30d48811!2zxJDhu5cgQsOhLCBN4bu5IEFuLCBOZ8WpIEjDoG5oIFPGoW4sIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1642065348872!5m2!1svi!2s" height="610" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- map section end -->

    <!-- contact section begin -->
    <section class="contact-section spad"> 
        <section class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-title">
                        <h4>Liên hệ với chúng tôi</h4>
                        <p>Nếu có khiếu nại, góp ý hoặc thắc mắc bất cứ điều gì. Hãy liên hệ ngay với chúng tôi. Myla'Store hân hạnh phục vụ hết mình quý khách hàng!</p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Địa chỉ:</span>
                                <p>k234/21a Đỗ Bá - Mỹ An - Ngũ Hành Sơn - Đà Nẵng</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Điện thoại:</span>
                                <p>0397320011</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p>nguyennhattruong11223344@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!-- contact section end -->
@endsection