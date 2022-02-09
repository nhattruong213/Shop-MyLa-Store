@extends('front.layout.master')
@section('title', 'BlogDetail')
@section('body')
<!-- breadcrumb section begin -->
<div class="breadcrumb-section">
    <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb-text">
                    <a href="index.html"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="blog.html">Blog</a>
                     <span>Blog chi tiết</span>
                 </div>
             </div>
         </div>
    </div>
</div>
<!-- breadcrumb section end -->

<!-- blog detail section begin -->
<div class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>{{ $blog->title }}</h2>
                        <p>{{ $blog->category }} <span>12/2022</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="front/img/blog/{{ $blog->image }}"  alt="">
                    </div>
                    <div class="blog-detail-desc">
                        <p>{{$blog->subtitle}}</p>
                    </div>
                    <div class="blog-quote">
                        <p>{{$blog->subtitle}}</p>
                    </div>
                    <div class="blog-more">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="front/img/blog/{{ $blog->image }}" alt="">
                            </div>
                            <div class="col-sm-4">
                                <img src="front/img/blog/{{ $blog->image }}" alt="">
                            </div>
                            <div class="col-sm-4">
                                <img src="front/img/blog/{{ $blog->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tag-share">
                        <div class="details-tag">
                            <ul>
                                <li><i class="fa fa-tags"></i></li>
                                <li>Trường</li>
                                <li>hà cục</li>
                                <li>Mỹ hà</li>
                            </ul>
                        </div>
                        <div class="blog-share">
                            <span>Share:</span>
                            <div class="social-links">
                                <a href="https://www.facebook.com/diem.xuavanay.5/"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.facebook.com/diem.xuavanay.5/"><i class="fa fa-google-plus"></i></a>
                                <a href="https://www.instagram.com/nhattruong213/"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCOTTnT77eFDvNahBu7ssahQ"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="posted-by">
                        <div class="pd-pic">
                            <img src="front/img/blog/post-by.png" alt="">
                        </div>
                        <div class="pd-text">
                            <a href="#">
                                <h5>Nhật trường</h5>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Officia, illum consequatur veritatis possimus ipsam, nemo. Autem magni harum sapiente atque delectus cumque, corrupti totam placeat dignissimos obcaecati deserunt earum ab.</p>
                        </div>
                    </div>
                    <div class="leave-comment">
                        <h4>Bình luận</h4>
                        <form action="#" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Tên">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email   ">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Lời nhắn"></textarea>
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
<!-- blog detail section end -->
@endsection