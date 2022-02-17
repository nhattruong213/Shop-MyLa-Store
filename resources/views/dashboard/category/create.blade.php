@extends('dashboard.layout.admin_layout')
@section('body')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mới danh mục
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form action="{{ route('AddCategory') }}" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục(*)</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên danh mục">
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
                            </div>
                            <button type="submit" class="btn btn-info">Thêm mới</button>
                                                        {{-- show message --}}
                            @if(Session::has('success'))
                            <p class="text-success">{{ Session::get('success') }}</p>
                            @endif
                         </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection