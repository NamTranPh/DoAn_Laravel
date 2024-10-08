<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/header.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/footer.css') }} ">
  <link rel="stylesheet" type="text/css" href=" {{ url('/css/profile_user.css') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    @include('includes.header')

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="user-detail-container" style="margin-top:160px; margin-bottom:80px">
            <div class="row">
                <div class="account">
                </div>
                <div class="user-detail-content">
                    <div class="user-info">
                        <h3>THÔNG TIN TÀI KHOẢN</h3>
                    </div>
                    <div class="user-detail-info">
                        <p>Họ và tên: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Số điện thoại: {{ $user->phone }}</p>
                        <a href="{{ route('/viewchange') }}">
                            <button class="btn-edit">Sửa thông tin</button>
                        </a>
                        <form action="{{ route('/logout') }}" method="post">
                            @csrf
                            <button type="submit" id="logout" class="log-out">Thoát</button>
                        </form>
                    </div>
                    <div class="list-order-user">
                        <h3>Lịch sử mua hàng</h3>
                        <table id="myTable" class="table-history-order">
                            <thead>
                                <tr>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 10%">Ảnh</th>
                                    <th style="width: 20%">Tên sản phẩm</th>
                                    <th style="width: 15%">Đơn giá</th>
                                    <th style="width: 15%">Số lượng mua</th>
                                    <th style="width: 15%">Thành tiền</th>
                                    <th style="width: 15%">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->detail_id }}</td>
                                    <td><img src="{{ url($row->img1) }}" alt=""></td>
                                    <td>{{ $row->detailname }}</td>
                                    <td>{{ number_format($row->price) }}</td>
                                    <td>{{ $row->quantity }}</td>
                                    <td>{{ number_format($row->prodprice) }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            <p style="color: green">Đang giao</p>
                                        @else
                                            <p style="color: red">Đang đợi phản hồi</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
</body>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,
                "pageLength": 5,
                "lengthMenu": [5, 10, 15],

                "searching": true,
                "searchDelay": 500,
                
                "ordering": true,
                "order": [[1, 'desc']],

                "lengthChange": true,
                "info": true,
                "pagingType": "full_numbers",

                "language": {
                    "lengthMenu": "Hiển thị _MENU_ hàng trên trang",
                    "search": "Tìm kiếm:",
                    "info": "",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": "Tiếp",
                        "previous": "Trước"
                    }
                }
            });
        });
</script>
<script src=" {{ url('js/homepage.js') }} "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>

    