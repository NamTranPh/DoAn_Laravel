<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Css -->
    <!-- Css Prodcut Detail -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/productdetail.css') }}">
    <!-- Css header -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/productCard.css') }}">
    <!-- Css footer -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/footer.css') }}">

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link Boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <!-- Headder -->
    @include('includes.header')

    <!-- Img slide -->
    <div class="img-head">
        <img src="../images/breadcrump.webp" alt="">
    </div>

    <!-- Product Detail -->
    <div class="container-fluid product-detail color-text">
        <div class="container">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!--  -->
            <form method="POST" action="{{ route('cart.add', $product) }}">
                @csrf
                <div class="row">
                    <div class="productDetail col-md-12">
                        <div class="sliderImg col-md-6">
                            <div class="slider-img">
                                <div class="preview">
                                    <img src="{{ url($image->img1) }}" alt="" id="imgBox">
                                </div>
                                <div class="products-img">
                                    <img src="{{ url($image->img1) }}" alt="" onclick="clickme(this)">
                                    <img class="img-mtop" src="{{ url($image->img2) }}" alt=""
                                        onclick="clickme(this)">    
                                    <img class="img-mtop" src="{{ url($image->img3) }}" alt=""
                                        onclick="clickme(this)">
                                    <img class="img-mtop" src="{{ url($image->img4) }}" alt=""
                                        onclick="clickme(this)">
                                </div>
                            </div>
                        </div>
        
                        <div class="detail-right col-md-6">
                            <div class="content">
                                <h2 class="title-head">{{ $product->name }}</h2>
                                <p class="describe">{{ $product->description }}</p>
                                <div class="price">
                                    <span class="priceNow">{{ number_format($product->price) }}đ</span>
                                </div>
                                <div class="select">
                                    <div class="amount">
                                        <span class="text">Số lượng: </span>
                                        <span><input class="text-center" name="quantity" type="number" value="1" min="0"></span>
                                    </div>
                                </div>
                                <button class="button" type="submit">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!--  -->
            <hr class="line">

            <!--  -->
            <div class="review">
                <h5>Đánh giá từ khách hàng</h5>
                <div class="row">
                    <div>
                        @foreach($comments as $rv)
                        <div class="col">
                            <div class="img-review col-md-1">
                                <img src="/images/user1.jpg"
                                    alt="">
                            </div>
                            <div class="content-review col-md-11">
                                <p>{{ $rv->name }}</p>
                                <p>{{ $rv->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--  -->
            <div class="form-comment">
                <div class="row">
                    <div class="col">
                        <p class="title">Đánh giá</p>
                        <div class="form-cmt">
                            <form action="{{ route('/add_review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="textCmtBox">
                                    <p>Nhận xét của bạn (*):</p>
                                    <textarea name="message"></textarea>
                                    @error('message')
                                        <p style="color: red;">{{ $errors->first('message') }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <button class="button-submit" type="submit">Gửi yêu cầu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <!--  -->
        <hr class="line">

        <!--  -->
        <div class="related">
            <h2 class="text-center mb-5">Một số sản phẩm khác</h2>
            <div class="row">
                @foreach($prod->take(4) as $product)
                <div class="col-4-productCard col-md-3">
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

    <!-- Footer -->
    @include('includes.footer')

    <!-- Link Js -->
    <script src="{{ url('js/homepage.js') }}"></script>
    <script src="{{ url('js/product_detail.js') }}"></script>

</body>

<!-- Js Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!-- link js boxicon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"
    integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>