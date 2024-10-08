<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('/css/admin/adduser.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>
    <input type="checkbox" name="" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
                <img src="/images/logo.webp" alt="" width="100px">
                <div class="brand-icons">
                    <span class="las la-bell"></span>
                    <span class="las la-user-circle"></span>
                </div>
            </div>
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="/images/user.jpg" alt="">
                <div>
                    <h3>
                        <?php    
                            echo $user->name
                        ?>        
                    </h3>
                    <span style="font-size: 15px">
                        <?php    
                            echo $user->email
                        ?> 
                    </span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('/admin/dashboard') }}">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        Bảng điều khiển
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/user') }}">
                        <i class="fa-solid fa-user"></i>
                        Quản lí nhân viên
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/customer') }}">
                        <i class="fa-solid fa-user"></i>
                        Quản lí người dùng
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/prod') }}">
                        <i class="fa-sharp fa-solid fa-table-list"></i>
                        Quản lí sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/order') }}">
                        <i class="fa-solid fa-list-check"></i>
                        Quản lí đơn hàng
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/review') }}">
                        <i class="fa-solid fa-comment"></i>
                        Đánh giá sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/feedback') }}">
                        <i class="fa-solid fa-message"></i>
                        Nhận xét  
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header-icons">
                <div class="admin-search">
                    <input type="text" name="" id="" class="inp-search" placeholder="Tìm kiếm">
                    <span class="las la-search"></span>
                </div>
                <a href="{{ route('/admin/logout') }}">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </header>
        <main>
            <div class="job-grid">
                <div class="jobs">
                    <div class="table-responsive">
                        <div class="container">
                            <div class="title">Thêm Tài Khoản</div>
                            <div class="content">
                                <form action="/adduser" method="POST">
                                    @csrf
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details">Tên nhân viên</span>
                                            <input type="text" placeholder="Tên nhân viên" name="name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Email</span>
                                            <input type="text" placeholder="Email" name="email" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Cấp độ</span>
                                            <input type="number" name="level" value="0" min="0" max="1" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Vai trò</span>
                                            <input type="text" placeholder="Vai trò" name="role" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Mật khẩu</span>
                                            <input type="password" placeholder="Mật khẩu" name="password" required>
                                        </div>
                                    </div>
                                    <div class="button">
                                        <input type="submit" value="Thêm Tài khoản">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <label for="sidebar-toggle" class="body-label"></label>
</body>

</html>