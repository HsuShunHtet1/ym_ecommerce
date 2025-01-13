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
                <div class="col-md-4 offset-4">
                    <div class="card">
                        <div class="card-header">Login to Admin</div>
                        <div class="card-body">
                            <form action="{{ url('/admin/login') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label for="">Enter Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Password</label>
                                    <input type="text" class="form-control" name="password">
                                </div>
                                <input type="submit" value="Login" class="btn btn-primary">
                            </form>
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
