<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('/css/admin/admin_order.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
</head>

<body>
    <input type="checkbox" name="" id="sidebar-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
                <img src="/images/logo.webp" alt="" width="100px">
                <div class="brand-icons">
                    <span class="las la-bell"></span>
                    <span class="las la-user-circle"></span>
                </div>
            </div>
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="/images/user.jpg" alt="">
                <div>
                    <h3>
                        <?php    
                            echo $user->name
                        ?>        
                    </h3>
                    <span style="font-size: 15px">
                        <?php    
                            echo $user->email
                        ?> 
                    </span>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('/admin/dashboard') }}">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        Bảng điều khiển
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/user') }}">
                        <i class="fa-solid fa-user"></i>
                        Quản lí nhân viên
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/customer') }}">
                        <i class="fa-solid fa-user"></i>
                        Quản lí người dùng
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/prod') }}">
                        <i class="fa-sharp fa-solid fa-table-list"></i>
                        Quản lí sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/order') }}">
                        <i class="fa-solid fa-list-check"></i>
                        Quản lí đơn hàng
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/review') }}">
                        <i class="fa-solid fa-comment"></i>
                        Đánh giá sản phẩm
                    </a>
                </li>
                <li>
                    <a href="{{ route('/admin/feedback') }}">
                        <i class="fa-solid fa-message"></i>
                        Nhận xét  
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar-toggle">
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header-icons">
                <div class="admin-search">
                    <input type="text" name="" id="" class="inp-search" placeholder="Tìm kiếm">
                    <span class="las la-search"></span>
                </div>
                <a href="{{ route('/admin/logout') }}">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1>Quản lí Đơn Hàng</h1>
                </div>
            </div>
            <div class="cards">
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Đơn hàng</span>
                                <small>Tổng đơn hàng</small>
                            </div>
                            <h2>{{ $orderCount }}</h2>
                        </div>
                        <div class="card-chart edit">
                            <i class="fa-solid fa-bag-shopping" style="color: #dddfe3;"></i>
                        </div>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Đơn được duyệt</span>
                                <small>Tổng đơn đã duyệt</small>
                            </div>
                            <h2>{{ $yes }}</h2>
                        </div>
                        <div class="card-chart delete">
                            <i class="fa-solid fa-bag-shopping" style="color: #dddfe3;"></i>
                        </div>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Đơn chưa duyệt</span>
                                <small>Tổng đơn chưa duyệt</small>
                            </div>
                            <h2>{{ $no }}</h2>
                        </div>
                        <div class="card-chart yellow">
                            <i class="fa-solid fa-bag-shopping" style="color: #dddfe3;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-grid" style="margin-top: 20px">
                <div class="jobs">
                    <div class="table-responsive">
                        <table id="myTable" class="table-css table-history-order">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Mã đơn hàng</th>
                                    <th style="width: 15%">Tổng thanh toán</th>
                                    <th style="width: 20%">Ngày đặt</th>
                                    <th style="width: 15%">Trạng thái</th>
                                    <th style="width: 20%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $od)
                                <tr>
                                    <td>{{ $od->id }}</td>
                                    <td>{{ number_format($od->total_price) }}đ</td>
                                    <td>{{ $od->created_at }}</td>
                                    <td>
                                        @if ($od->status == 1)
                                            <p style="color: green">Đã duyệt</p>
                                        @else
                                            <p style="color: red">Chưa duyệt</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/detail/{{ $od->id }}">
                                            <button class="btn-edit">Duyệt đơn</button>
                                        </a>
                                        <form action="/admin/order/delete/{{ $od->id }}" method="POST" onsubmit="return ConfirmDelete( this )">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn-delete">Hủy đơn</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <label for="sidebar-toggle" class="body-label"></label>
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
</html>