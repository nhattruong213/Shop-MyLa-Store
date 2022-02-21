@extends('dashboard.layout.admin_layout')
@section('body')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mới sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                         {{-- show message --}}
                         @if(Session::has('success'))
                         <p class="text-success">{{ Session::get('success') }}</p>
                         @endif

                         @if(Session::has('error'))
                         <p class="text-danger">{{ Session::get('error') }}</p>
                         @endif
                        <form action="{{ route('AddProduct') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên sản phẩm(*)</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_category_id">Danh mục(*)</label>
                                <select class="form-control m-bot15" name="product_category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Thương hiệu(*)</label>
                                <select class="form-control m-bot15" name="brand_id">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái(*)</label>
                                <select class="form-control m-bot15" name="status">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                                @error('status')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="path">File input</label>
                                <input type="file" id="exampleInputFile" name="path">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea style="resize: none" rows="3"  class="form-control" name="description" placeholder="Mô tả danh mục"> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea style="resize: none" rows="3"  class="form-control" name="content" placeholder="Nội dung"> </textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="price">Giá(*)</label>
                                <input type="text" class="form-control" name="price" placeholder="Giá">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="discount">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="discount" placeholder="Giá khuyến mãi">
                                @error('discount')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="qty">Số lượng(*)</label>
                                <input type="number" class="form-control" name="qty" placeholder="Số lượng">
                                @error('qty')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="featured">Sản phẩm nổi bật(*)</label>
                                <select class="form-control m-bot15" name="featured">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
                                </select>
                                @error('product_category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button  type="submit" class="btn btn-info">Thêm mới</button>
                         </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection