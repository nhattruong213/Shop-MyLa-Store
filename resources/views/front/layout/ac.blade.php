@auth
<div class="login-panel">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->last_name}}
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ</a></li>
          <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Đăng xuất</button>
            </form>
          </li>
        </ul>
      </div>
</div>

@endauth

@guest
<a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
@endguest