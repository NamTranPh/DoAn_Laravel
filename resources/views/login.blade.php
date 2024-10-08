<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/homepage.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/login.css') }} ">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!-- Headder -->
    @include('includes.header')
    <div class="contact-login">
        <div class="container">
            <div class="cover">
                <div class="front">
                    <img src="../images/breadcrump.webp" alt="">
                </div>
            </div>
            <div class="forms">
                <div class="form-content">
                <div class="login-form">
                    <div class="title">Đăng nhập</div>
                <form action="{{ route('/userlogin') }}" method="post">
                    @csrf
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input type="text" id="username" name="username" placeholder="Nhập tài khoản">
                        </div>
                        @error('username')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        @error('password')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <a href="{{ route('/viewregister') }}" class="text sign-up-text">Bạn chưa có tài khoản? Đăng ký ngay bây giờ</a>
                        <div class="button input-box">
                            <input type="submit" value="Đăng nhập">
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        </div>
    </div>
    <!-- Footer -->

    <div class="footer mt-5">
        @include('includes.footer')
    </div>

</body>
<script src=" {{ url('js/homepage.js') }} "></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>