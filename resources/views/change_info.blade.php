<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/change_info.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

</head>

<body>
    @include('includes.header')

    <div class="user-detail-container">
        <div class="row" >
            <div class="user-detail-content col-lg-7" style="margin-top: 80px">
                <div class="user-info">
                    <h3>THAY ĐỔI THÔNG TIN</h3>
                </div>
                <div class="change_info">
                    <div class="content">
                        <form action="{{ route('/updateinfo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Tên</span>
                                    <input type="text" value="{{ $user->name }}" name="fullname">
                                    @if($errors->has('name'))
                                        <p style="color: red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="input-box">
                                    <span class="details">Tài khoản</span>
                                    <input type="text" value="{{ $user->username }}" name="username">
                                    @if($errors->has('username'))
                                        <p style="color: red">{{ $errors->first('username') }}</p>
                                    @endif
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="text" value="{{ $user->email }}" name="email">
                                    @if($errors->has('email'))
                                        <p style="color: red">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="input-box">
                                    <span class="details">Điện thoại</span>
                                    <input type="text" value="{{ $user->phone }}" name="phone">
                                    @if($errors->has('phone'))
                                        <p style="color: red">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="input-box">
                                    <span class="details">Mật khẩu</span>
                                    <input type="password" placeholder="Mật khẩu" name="password">
                                    @if($errors->has('password'))
                                        <p style="color: red">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="input-box">
                                    <span class="details">Nhập lại mật khẩu</span>
                                    <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                    @if($errors->has('password_confirmation'))
                                        <p style="color: red">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="button">
                                <input type="submit" value="Cập nhật">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
</body>
<script src=" {{ url('js/homepage.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>

    