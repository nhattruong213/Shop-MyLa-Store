@extends('dashboard.layout.admin_layout')
@section('body')
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">
            Tất cả danh mục sản phẩm
        </div>
        <div class="col-lg-6">
             {{-- show message --}}
            @if(Session::has('success'))
            <p class="text-success">{{ Session::get('success') }}</p>
            @endif

            @if(Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
            @endif
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
            <div class="input-group">
                <form action="{{ route('searchCategoryAdmin') }}">
                    <input type="text" name="name" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                    </span>
                </form>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                            <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên danh mục</th>
                        <th>Hiển thị</th>
                        <th>Ngày tạo</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $category->name }}</td>
                            <td><span class="text-ellipsis">{{ $category->status == 1 ? 'Hiển' : 'Ẩn'}}</span></td>
                            <td><span class="text-ellipsis">{{ $category->created_at !=Null ? $category->created_at : '(Null)'  }}</span></td>
                            <td>
                                <a href="" class="active" ui-toggle-class=""><i onclick=" confirm('Bạn có chắc chắn xóa?') === true ? window.location='{{ route('deleteAdminCategory', $category->id) }}' : '' " class="fa fa-times text-danger text"></i></a>
                                <a href="{{route('editAdminCategory', $category->id) }}"><i  class="fa fa-pencil-square-o text-success text-active"></i></a>
                            </td>
                        </tr>
                    @endforeach   
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
                {{ $categories->links() }}
            </div>
        </footer>
        </div>
    </div>
@endsection