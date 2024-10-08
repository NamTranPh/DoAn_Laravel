<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Css -->
        <!-- Css About Us -->
            <link rel="stylesheet" type="text/css" href="{{ url('/css/payments.css') }}" >
        
        <!-- Css header -->
            <link rel="stylesheet" type="text/css" href="{{ url('/css/header.css') }}" >
            
        <!-- Css footer -->
            <link rel="stylesheet" type="text/css" href="{{ url('/css/footer.css') }}">

        <!-- Link Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <!-- Link fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Link Boxicon -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<!-- Headder -->
@include('includes.header')
<!-- Payment -->
<div class="container-fluid color-text" style="margin-top: 100px">
    <div class="container payments">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="fonm-payments col-md-12">
                <h3 class="">Form Payments</h3>
                <form action="{{route('checkout')}}" method="POST">
                    @csrf
                    <div class="form-payment">
                        <div class="col-md-6">
                            <h5 class="title">Billing Address</h5>
                            <h5>Tổng tiền: {{number_format(session('total_price'))}}đ</h5>
                            <div class="inputBox">
                                <span>Họ và tên :</span>
                                <input type="text" name="name" required>
                            </div>
                            <div class="inputBox">
                                <span>Email :</span>
                                <input type="email" name="email" required>
                            </div>
                            <div class="inputBox">
                                <span>Số điện thoại :</span>
                                <input type="number" name="phone" required>
                            </div>
                            <div class="inputBox">
                                <span>Địa chỉ :</span>
                                <input type="text" name="address" required>
                            </div>
                            <div class="buttom-payment">
                                <button class="payments-success" type="submit">Submit</button>
                            </div>
                        </div>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
@include('includes.footer')
</body>
<!-- Link Css -->
<script src=" {{ url('js/homepage.js') }} "></script>
<!-- Js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>