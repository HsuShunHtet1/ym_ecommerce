<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>YM E-commerce</title>
        <link rel="icon" href="{{ asset('image/ecommerce_logo.png') }}">
        <link rel="stylesheet"
                href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/nucleo/css/nucleo.css">
        <link rel="stylesheet"
                href="https://demos.creative-tim.com/argon-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/css/argon-design-system.min.css">

</head>

<body>

        <div class="container">
                <div class="row">
                        <div class="col-md-4">
                                <div class="card">
                                        <div class="card-body">
                                                <ul class="list-group">
                                                        <a>
                                                                <li class="list-group-item bg-primary text-white">
                                                                        Admin Management
                                                                </li>
                                                        </a>
                                                        <a href="{{ url('/admin') }}">
                                                            <li class="list-group-item">
                                                                    Dashboard
                                                            </li>
                                                        </a>
                                                        <a href="{{route('admin.category.index')}}">
                                                                <li class="list-group-item">
                                                                        Category
                                                                </li>
                                                        </a>
                                                        <a href="{{route('admin.product.index')}}">
                                                                <li class="list-group-item">
                                                                        Product
                                                                </li>
                                                        </a>
                                                        <a href="{{ url('admin/order/pending') }}">
                                                                <li class="list-group-item">
                                                                        Pending Order
                                                                </li>
                                                        </a>
                                                        <a href="{{ url('admin/order/complete') }}">
                                                            <li class="list-group-item">
                                                                    Complete Order
                                                            </li>
                                                        </a>
                                                        <a href="{{ url('admin/user') }}">
                                                            <li class="list-group-item">
                                                                User List
                                                            </li>
                                                        </a>
                                                        <a href="{{ url('admin/logout') }}">
                                                            <li class="list-group-item">
                                                                Logout
                                                            </li>
                                                        </a>
                                                </ul>
                                        </div>
                                </div>
                        </div>
                        <div class="col-md-8">
                                <div class="card">
                                        <div class="card-body">
                                                @include('inc.error')
                                                @yield('content')
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <script src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
        <script
                src="https://demos.creative-tim.com/argon-dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://demos.creative-tim.com/argon-dashboard/assets/js/argon.min.js?v=1.2.0"></script>
</body>

</html>
