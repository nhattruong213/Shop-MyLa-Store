<form action="{{ (request()->segment(2)== 'product' ? 'shop' : '' ) }}">
    <div class="filter-widget">
       <h4 class="fw-title">Danh mục</h4>
       <ul class="filter-catagories">
           @foreach ($categories as $category)
                <li><a href="{{ route('shop.category', $category->id) }}">{{ $category->name }}</a></li>
           @endforeach
       </ul> 
    </div>
    <div class="filter-widget">
       <h4 class="fw-title">Thương hiệu</h4>
       <div class="fw-brand-check">
           @foreach ($brands as $brand)
                <div class="bc-item">
                <label for="bc-{{ $brand->id }}">
                    {{ $brand->name }}
                    <input type="checkbox" {{ (request("brand")[$brand->id] ?? '') == 'on' ? 'checked' : '' }} 
                     id="bc-{{ $brand->id }}" name="brand[{{ $brand->id }}]" onchange = "this.form.submit();">
                    <span class="checkmark"></span>
                </label>
                </div>                          
           @endforeach
       </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a >Giày</a>
            <a>Áo khoác</a>
            <a>Mũ nam</a>
            <a>Túi xách</a>
            <a>Quần zin</a>
            <a>Váy</a>
        </div>
    </div>
</form>