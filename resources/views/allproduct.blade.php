<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link Css -->
    <!-- Css Prodcut Detail -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/allproduct.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/productCard.css') }}">

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

    <!-- Products -->
    <div class="products container-fluid color-text">
        <div class="container">
            <!-- Select Products -->
            <button class="bx bx-menu" id="menu-drop" onclick="toggleButtons()"></button>
            <div id="buttons" class="select-products">
                <div class="buttons-list">
                    <a href="{{ route('/allproduct', ['category' => 'all']) }}">
                        <button class="button-value" onclick="filterProduct('all')">all</button>
                    </a>
                    <a href="{{ route('/allproduct', ['category' => 1]) }}">
                        <button class="button-value" onclick="filterProduct('nhẫn bạc')">nhẫn bạc</button>
                    </a>
                    <a href="{{ route('/allproduct', ['category' => 2]) }}">
                        <button class="button-value" onclick="filterProduct('dây chuyền')">dây chuyền</button>
                    </a>
                    <a href="{{ route('/allproduct', ['category' => 3]) }}">
                        <button class="button-value" onclick="filterProduct('bông tai')">bông tai</button>
                    </a>
                    <a href="{{ route('/allproduct', ['category' => 4]) }}">
                        <button class="button-value" onclick="filterProduct('lắc bạc')">lắc bạc</button>
                    </a>
                    <a href="{{ route('/allproduct', ['category' => 5]) }}">
                        <button class="button-value" onclick="filterProduct('khuyên mũi')">mặt dây</button>
                    </a>      
                </div>
            </div>

            <!-- List-Product -->
            <div class="related">
                <div class="row">
                    @foreach($data as $row)
                        @if ($category === null || $row->category_id == $category->id)
                            <div class="col-3-productCard col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <a href="/product/{{ $row->product_id }}">
                                            <img class="imgProductCard" src="{{ url($row->img1) }}" >
                                        </a>
                                    </div>
                                    <div class="card-body" style="z-index: 99;">
                                        <h5 class="card-title">{{ $row->prod_name }}</h5>
                                        <div class="productPrice text-center">
                                            <span class="fw-bold">{{ number_format($row->price) }}đ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    <!-- Link Js -->
    <script src="{{ asset('/js/homepage.js') }}"></script>
    <script src="{{ asset('/js/products.js') }}"></script>
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