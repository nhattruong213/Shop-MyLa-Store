@extends('front.layout.master')
@section('title', 'Blog')
@section('body')
    <!-- breadcrumb section begin -->
    <div class="breadcrumb-section">
        <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="breadcrumb-text">
                         <a href="./home.html"><i class="fa fa-home"></i>Trang chủ</a>
                         <span>Blog</span>
                     </div>
                 </div>
             </div>
        </div>
    </div>
    <!-- breadcrumb section end --> 

    <!-- blog section begin -->
    <section class="blog-section spad"> 
        <div class="container">
            <div class="row">
                 <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                     <div class="blog-sidebar">
                         <div class="search-form">
                             <h4>Tìm kiếm</h4>
                             <form action="{{route('blog')}}">
                                 <input type="text" name="search" value="{{request('search')}}" placeholder="Tìm kiếm...">
                                 <button type="submit"><i class="fa fa-search"></i></button>
                             </form>
                         </div>
                         <div class="recent-post">
                               <h4>Bài viết mới nhất</h4>
                                <div class="recent-blog">
                                    @foreach ($newblogs as $newblog)
                                        <a href="{{ route('blogDetail', $newblog->id) }}" class="rb-item">
                                            <div class="rb-pic">
                                                <img src="front/img/blog/{{$newblog->image}}" alt="">
                                            </div>
                                            <div class="rb-text">
                                                <h6>{{ $newblog->title}}</h6>
                                                <p>{{$newblog->category}} <span>2022</span></p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-9 order-1 order-lg-2">
                     <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-sm-6">
                                <div class="blog-item">
                                    <div class="bi-pic">
                                        <img src="front/img/blog/{{$blog->image}}" alt="">
                                    </div>
                                    <div class="bi-text">
                                        <a href="{{ route('blogDetail', $blog->id) }}">
                                            <h4>{{$blog->title}}</h4>
                                        </a>
                                        <p> {{$blog->category}}  <span>2/2022</span></p>
                                    </div>
                                </div>
                            </div> 
                        @endforeach             
                     </div>
                 </div>
            </div>
        </div>
    </section> 
    <!-- blog section end -->
@endsection
