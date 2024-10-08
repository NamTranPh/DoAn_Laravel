<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/aboutUs.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ url('/css/header.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ url('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/homepage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
<body>

<!-- Headder -->
@include('includes.header')

<!-- Img slide -->
    <div class="img-head">
        <img src="../images/breadcrump.webp" alt="">
    </div>

<!-- About Us -->
    <div class="container-fluid">
        <div class="container container-about-us">
            <div class="row">
                <div class="aboutUs-right">
                    <div class="title-aboutUs">
                        <h1>Về chúng tôi</h1>
                    </div>
                    <div class="content-aboutUs">
                        <p class="color-text fs-text-content">
                            KaT Jewely, shop trang sức bạc be bé của cô gái nhỏ yêu cái đẹp và sự hoài cổ.
                        </p>
                        <p class="color-text fs-text-content">
                            Thành lập vào tháng 8/2012 , KaT khởi đầu với những sản phẩm về wire art. Sự tình cờ đã đưa KaT đến với thế giới trang sức, từ đó giấc mơ của KaT Jewelry ngày một được vun đắp để đem nhiều sản phẩm chất lượng và độc đáo nhất đến tay của khách hàng Việt Nam và quốc tế.
                        </p>
                        <p class="color-text fs-text-content">
                            Đến với KaT Jewelry, bạn sẽ cảm nhận được sự tỉ mỉ trên những sản phẩm tạo ra bởi bàn tay tài hoa từ những người thợ kim hoàn của KaT Jewelry. Từng thiết kế, từng đường nét được lấy từ cảm hứng, từ đam mê, hoài bão mà KaT đã và đang chắt chiu từng ngày trên con đường phát triển.
                        </p>
                        <img class="img-aboutUs" src="../images/imgbody1.jpg" alt="">
                        <p class="color-text fs-text-content fw-bolder mt-2">
                            Số giấy phép kinh doanh: 41C8020417 <br>
                            Do UBND Quận 3 cấp GCN ĐKHKD ngày: 28/04/2017
                        </p>
                    </div>
                </div>
            </div>
    
            <!-- Content Link -->
            <div class="row social">
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
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
<!-- link js boxicon -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>