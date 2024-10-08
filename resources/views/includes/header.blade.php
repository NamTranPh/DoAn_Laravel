<header>
    <a href="{{ route('/homepage') }}" class="logo"><img src="../images/1.webp" alt=""></a>

    <div class="nav-text">
        <ul class="navmenu">
            <li><a href="{{ route('/homepage') }}">Trang chủ</a></li>
            <li><a href="{{ route('/allproduct') }}">Sản phẩm</a></li>
            <li><a href="{{ route('/collection') }}">Bộ sưu tập</a></li>
            <li><a href="{{ route('/aboutus') }}">Về chúng tôi</a></li>
            <li><a href="{{ route('/contact') }}">Liên hệ</a></li>
        </ul>
    </div>

    <div class="nav-icon">
      

      <div class="dropdown-search">
        <a href="#"><i class='bx bx-search'></i></a>
        <div class="form">
          <form action="{{ route('/search') }}" class="form-search">
            @csrf
              <input class="input-search" type="text" name="search" placeholder="Tìm kiếm">
              <button class="btn-btn button-search" type="submit">
                <i class='bx bx-search' aria-hidden="true"></i>
              </button>
          </form>
        </div>
      </div>

      <div class="dropdown-user">
        <a href="{{ route('/profile-user') }}"><i class='bx bx-user'></i></a>
      </div>
      <a href="{{ route('cart') }}"><i class='bx bx-cart'></i></a>

      <div class="bx bx-menu" id="menu-icon"></div>
    </div>
  </header>