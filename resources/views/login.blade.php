<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel - Login</title>
    <link rel="stylesheet" href="../app/admin_assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../app/admin_assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../app/admin_assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../app/admin_assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../app/admin_assets/css/style.css">
    <link rel="shortcut icon" href="../app/admin_assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-start mb-3">Login</h3>
                            <form action="{{ route('login_post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username *</label>
                                    <input name="username" type="text" class="form-control p_input" value="admin">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input name="password" type="password" class="form-control p_input" value="11111111">
                                </div>
                                <div class="text-center d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../app/admin_assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../app/admin_assets/js/off-canvas.js"></script>
    <script src="../app/admin_assets/js/misc.js"></script>
    <script src="../app/admin_assets/js/settings.js"></script>
    <script src="../app/admin_assets/js/todolist.js"></script>
</body>

</html>
