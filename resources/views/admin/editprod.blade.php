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
                            <div class="title">Sửa Sản Phẩm</div>
                            <div class="content">
                                <form action="/update/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details">Tên sản phẩm</span>
                                            <input type="text" name="name" value="{{ $edit->name }}">
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Loại sản phẩm</span>
                                            <select name="category_id" class="cate-op" required>
                                                <option value="0">Loại sản phẩm</option>
                                                @foreach($category as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        <div class="input-box">
                                            <span class="details">Đơn giá</span>
                                            <input type="text" name="price" value="{{ $edit->price }}">
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Số lượng</span>
                                            <input type="number" name="quantity" value="{{ $edit->quantity }}">
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Mô tả</span>
                                            <input type="text" name="description" value="{{ $edit->description }}">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"></span>
                                            <input type="hidden">
                                        </div>
                                        <div class="input-box">
                                            <span class="details">Ảnh minh họa</span>
                                            <input type="file" name="img1">
                                            <input type="file" name="img2" style="margin-top: 5px">
                                        </div>

                                        <div class="input-box img-link">
                                            <input type="file" name="img3">
                                            <input type="file" name="img4" style="margin-top: 5px">
                                        </div>
            
                                    </div>
                                    <div class="button">
                                        <input type="submit" value="Sửa Sản Phẩm">
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