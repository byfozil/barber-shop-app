<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin panel - Prices</title>
    <link rel="stylesheet" href="../../../app/admin_assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../app/admin_assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../app/admin_assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../../app/admin_assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../app/admin_assets/css/style.css">
</head>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="{{ route('panel') }}">Admin Panel</a>
                <a class="sidebar-brand brand-logo-mini" href="{{ route('panel') }}">AP</a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-category">
                    <span class="nav-link">Pages</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../../barbers">
                        <span class="menu-icon">
                            <i class="mdi mdi-scissors-cutting"></i>
                        </span>
                        <span class="menu-title">Barbers</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items active">
                    <a class="nav-link" href="../../prices">
                        <span class="menu-icon">
                            <i class="mdi mdi-cash-multiple"></i>
                        </span>
                        <span class="menu-title">Prices</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../../testimonials">
                        <span class="menu-icon">
                            <i class="mdi mdi-comment-multiple-outline"></i>
                        </span>
                        <span class="menu-title">Testimonials</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../../clients">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-group-outline"></i>
                        </span>
                        <span class="menu-title">Clients</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="https://yuldoshew.uz" target="_blank">
                        <span class="menu-icon">
                            <i class="mdi mdi-code-tags"></i>
                        </span>
                        <span class="menu-title">Developer</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="{{ route('panel') }}">AP</a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex justify-content-end align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="../../../app/admin_assets/images/person.jpg"
                                        alt="">
                                    <p class="mb-0 d-sm-block navbar-profile-name">{{ $user->username }}</p>
                                    <i class="mdi mdi-menu-down d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">{{ $user->username }}</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="{{ route('logout') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Prices</h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Price</h4>
                                    <form class="forms-sample" action="{{ route('price_edit_put') }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ old('id') ? old('id') : $price->id }}">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name"
                                                value="{{ old('name') ? old('name') : $price->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control" id="price" name="price"
                                                placeholder="Price"
                                                value="{{ old('price') ? old('price') : $price->price }}">
                                        </div>
                                        @if ($errors->any())
                                            <div class="form-group">
                                                <p class="text-danger">{{ $errors->first() }}</p>
                                            </div>
                                        @endif
                                        <button type="submit" class="btn btn-primary me-2">Edit Price</button>
                                        <a href="../../prices" class="btn btn-dark">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Developer: <a
                                href="https://yuldoshew.uz" target="_blank">Fozilbek Yuldoshev</a></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="../../../app/admin_assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../../app/admin_assets/js/off-canvas.js"></script>
    <script src="../../../app/admin_assets/js/misc.js"></script>
    <script src="../../../app/admin_assets/js/settings.js"></script>
    <script src="../../../app/admin_assets/js/todolist.js"></script>
</body>

</html>
