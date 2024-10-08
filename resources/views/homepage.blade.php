<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/homepage.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/productCard.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    @include('includes.header')

  <div class="awe-section-1">
    <div class="section-slider relative">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../images/slider_1.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/slider_2.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/slider_3.webp" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <div class="container">
    <section class="section-title">
      <div class="row">
        <div class="col-md-8 col-md-push-4">
          <img src="../images/service_about_1.webp" alt="">
        </div>
        <div class="col-md-4 col-md-pull-8">
          <div class="row">
            <div class="col-md-12 col-sm-6 img">
              <img src="../images/service_about_2.webp" alt="">
            </div>
            <div class="col-md-12 col-sm-6 text">
              <h2>Đeo trang sức là một cách thể hiện bản thân mà không cần lời nói.</h2>
              <div class="text-section">
                Cuộc đời đó có dửng dưng bao lâu, hãy đeo trang sức như chưa từng đeo.
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="container">
    <section class="about">
      <div class="underlined"></div>
    </section>
    <section class="section-title">
      <div class="section-text">
        <h2>Trang Sức Bạc được thành lập vào năm 2012</h2>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-pull-8">
          <div class="row">
            <div class="col-md-12 col-sm-6 img-section">
              <img src="../images/service_about3_2.webp" alt="">
            </div>
            <div class="col-md-12 col-sm-6">
              <img src="../images/service_about3_3.webp" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-8 col-md-push-4">
          <img src="../images/service_about3_1.webp" alt="">
        </div>
      </div>
    </section>
  </div>

  <div class="container">
    <section class="about">
      <div class="underlined"></div>
    </section>
    <section class="product" id="product">
      <div class="heading">
        <h2>Sản phẩm bán chạy</h2>
      </div>
      <div class="container">
        <div class="row">
          @foreach($prod->take(6) as $product)
          <div class="col-3-productCard col-md-4">
            <div class="card">
              <div class="card-img">
                <a href="/product/{{ $product->product_id }}">
                  <img class="imgProductCard" src="{{ url($product->img1) }}" >
                </a>
              </div>
              <div class="card-body" style="z-index: 99;">
                <h5 class="card-title">{{ $product->name }}</h5>
                <div class="productPrice text-center">
                  <span class="fw-bold pe-1">{{ number_format($product->price) }}đ</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </div>
  </div>
  </div>
  </section>
  </div>

  <div class="container">
    <section class="about">
      <div class="underlined"></div>
    </section>
    <section class="about" id="about">
      <div class="about-img">
        <img src="../images/imgbody1.jpg" alt="">
      </div>
      <div class="about-text">
        <h2>Lịch sử về chúng tôi</h2>
        <p>Năm 2012, chính thức ra đời và xác định chiến lược phát triển trở thành nhà sản xuất kinh doanh trang sức chuyên nghiệp. Tại thời điểm này, KaT còn được góp vốn với tỷ lệ vốn góp 40%.
        </p>
        <p>Năm 2022, KaT tiếp tục kiên định với các định hướng đến giai đoạn tăng trưởng mới: Tăng trưởng vững chắc với trọng tâm duy trì vị thế số một tại thị trường; Không ngừng phát triển đồng bộ năng lực sản xuất, quản trị chuỗi cung ứng, quản trị chiến lược, marketing,.. </p>
        <a href="{{ route('/aboutus') }}" class="btn">Về chúng tôi</a>
      </div>
    </section>
  </div>

  <div class="container">
    <section class="about">
      <div class="underlined"></div>
    </section>
    <section class="text-slogan">
      <div class="row">
        <div class="col-md-12">
          <div class="slogan">
            “Wearing jewelry is the way to express who you are... without saying a word."
          </div>
        </div>
      </div>
    </section>
  </div>

  @include('includes.footer')
</body>
<script src=" {{ url('js/homepage.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>