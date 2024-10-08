<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/homepage.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/contact.css') }} ">

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

    <div class="img-head" style="margin-top: 75px">
        <img src="../images/breadcrump.webp" alt="">
    </div>
    <div class="container mt-3">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-12">
                <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7449.4635905654295!2d105.81372639200943!3d21.00338557255837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8109765ba5%3A0xd84740ece05680ee!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBUaOG7p3kgbOG7o2k!5e0!3m2!1svi!2s!4v1689089772911!5m2!1svi!2s"
                width="1300" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-12 mt-4" >
                <div class="form-comment">
                    <div class="row">
                        <div class="col">
                            <p class="title">Nhận xét</p>
                            <div class="form-cmt">
                                <form method="Post" action="{{route('/feedback')}}">
                                    @csrf
                                    <div class="textCmtBox">
                                        <p>Phản hồi của bạn(*):</p>
                                        <textarea name="feedback" class="form-control" rows="4" required></textarea>
                                    </div>
                                    <button type="submit" class="btn-send"> Gửi yêu cầu </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    @include('includes.footer')

   


</body>
<script src=" {{ url('js/homepage.js') }} "></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>