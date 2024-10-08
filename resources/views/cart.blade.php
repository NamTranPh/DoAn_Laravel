<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/homepage.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ url('/css/cart.css') }} ">

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

    <!-- <div class="img-head">
        <img src="../images/breadcrump.webp" alt="">
    </div> -->

    @if (session('cart'))
        <div class="container cart-page" style="margin-top: 180px">
            <table> 
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng mua</th>
                    <th>Tổng giá</th>
                    <th>Xóa</th>
                </tr>
                @foreach(session('cart') as $product)
                    <tr>
                        <td><img src="{{  url($product['image']) }}"></td>
                        <td >
                            <a class="text-decoration-none" href="/product/{{$product['product_id']}}">{{ $product['name'] }}</a>
                        </td>
                    <form method="POST" action="{{route('cart.update', $product['product_id'])}}">
                        @csrf
                        <td>
                            <!-- <input type="number" name="quantity" value="{{ $product['quantity'] }}" min="1"> -->
                            
                            <button type="submit" name="action" value="drop">
                                <span class="minus">-</span>
                            </button>
                            <input type="text" class="input-amount" value="{{ $product['quantity'] }}" readonly>
                            <button type="submit" name="action" value="add">
                                <span class="add">+</span>
                            </button>
                        </td>
                        <td>{{ number_format($product['price'] * $product['quantity']) }}đ</td>
                    </form>
                        <td>
                           <div class="d-flex justify-content-around">
                                <form method="POST" action="{{route('cart.delete', $product['product_id'])}}">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Xóa</button>
                                </form>
                           </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="container mb-5">
            <div class="total-price">
                <table>
                    <tr>
                        <td>Tổng phụ</td>
                        <td>{{number_format(session('total_price'))}}đ</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td>Miễn phí</td>
                    </tr>
                    <tr>
                        <td>Tổng thanh toán</td>
                        <td>{{number_format(session('total_price'))}}đ</td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('/payments') }}"><input type="button" value="Thanh toán" class="btn-pay"></a></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    @else
    <div class="container cart-page" style="margin-top: 180px">
       <h4 class="text-center">
        Không có sản phẩm nào trong giỏ hàng!!!
       </h4>
    </div>
    @endif
    <!-- Footer -->
    @include('includes.footer')

   


</body>
<script src=" {{ url('js/homepage.js') }} "></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>