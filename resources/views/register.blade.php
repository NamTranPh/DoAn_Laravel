<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/homepage.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/register.css') }} ">

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
                    <div class="signup-form">
                        <div class="title">Đăng ký</div>
                            <form action="{{ route('/userregister') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-boxes">
                                    <div class="input-box">
                                        <i class="fas fa-user"></i>
                                        <input type="text" class="input @error('name') error @enderror"  id="name" name="fullname" placeholder="Tên của bạn" required>
                                    </div>
                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <div class="input-box">
                                        <i class="fas fa-user"></i>
                                        <input type="text" class="input @error('username') error @enderror"  id="username" name="username" placeholder="Tài khoản" required>
                                    </div>
                                    @error('username')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <div class="input-box">
                                        <i class="fas fa-envelope"></i>
                                        <input type="text" class="input @error('email') error @enderror"  id="Email" name="email" placeholder="Email" required>
                                    </div>
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <div class="input-box">
                                        <i class="fa-solid fa-phone"></i>
                                        <input type="text" class="input @error('phone') error @enderror"  id="phone" name="phone" placeholder="Số điện thoại" required>
                                    </div>
                                    @error('phone')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <div class="input-box">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" class="input @error('password') error @enderror"  id="pass" name="password" placeholder="Mật khẩu" required>
                                    </div>
                                    @error('password')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <div class="input-box">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" class="input @error('confirm') error @enderror"  id="confirm" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                                    </div>
                                    @error('confirm')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    <a href="{{ route('/viewlogin') }}" class="text sign-up-text">Bạn đã có tài khoản? Đăng nhập ngay bây giờ</a>    
                                    <div class="button input-box">
                                        <input type="submit" class="submit" value="Đăng ký">
                                    </div>
                                </div>
                            </form>
                        </div>
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