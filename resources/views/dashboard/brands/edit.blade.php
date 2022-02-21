@extends('dashboard.layout.admin_layout')
@section('body')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa danh mục
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
                        <form action="{{ route('UpdateBrand', $brand->id) }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục(*)</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{ $brand->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea style="resize: none" rows="10"  class="form-control" name="description" placeholder="Mô tả danh mục"> </textarea>
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
                            <button type="submit" class="btn btn-info">Chỉnh sửa</button>
                         </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection