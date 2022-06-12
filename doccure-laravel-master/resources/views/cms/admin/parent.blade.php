<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure Admin - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('doccure/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/bootstrap.min.css')}}"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/plugins/bootstrap-rtl/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/font-awesome.min.css')}}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/feathericon.min.css')}}">

    @yield('style')

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <!--[if lt IE 9]>
			<script src="{{asset('doccure/admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('doccure/admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">
            <!-- Logo -->
            <div class="header-left">
                <a href="{{route('admin.dashboard')}}" class="logo">
                    <img src="{{asset('doccure/admin/assets/img/logo.png')}}" alt="Logo">
                </a>
                <a href="{{route('admin.dashboard')}}" class="logo logo-small">
                    <img src="{{asset('doccure/admin/assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">
                <!-- Notifications -->
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">التنبيهات</span>
                            <a href="javascript:void(0)" class="clear-noti"> مسح الكل </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{asset('doccure/admin/assets/img/doctors/doctor-thumb-01.jpg')}}">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span>
                                                    Schedule <span class="noti-title">her appointment</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media">
                                            <span class="avatar avatar-sm">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{{asset('doccure/admin/assets/img/patients/patient1.jpg')}}">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Charlene Reed</span>
                                                    has
                                                    booked her appointment to <span class="noti-title">Dr. Ruby
                                                        Perrin</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">عرض كل التنبيهات</a>
                        </div>
                    </div>
                </li>
                <!-- /Notifications -->

                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle"
                                src="{{asset('doccure/admin/assets/img/profiles/avatar-01.jpg')}}" width="31"
                                alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{asset('doccure/admin/assets/img/profiles/avatar-01.jpg')}}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{Auth::user('admin')->full_name}}</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('admin.profile')}}">الحساب الشخصي</a>
                        <a class="dropdown-item" href="{{route('admin.settings')}}">الإعدادات</a>
                        <a class="dropdown-item" href="{{route('cms.logout',['admin'])}}">تسجيل الخروج</a>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li class="@if(request()->routeIs('admin.dashboard')) active @endif">
                            <a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>الرئيسية</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-user"></i> <span> مدراء النظام </span> <span
                                    class="menu-arrow"></span></a>
                            <ul
                                style="display: @if(request()->routeIs('admins.index','admins.create')) block; @else none; @endif">
                                <li class="@if(request()->routeIs('admins.index')) active @endif"><a
                                        href="{{route('admins.index')}}"> عرض </a>
                                </li>
                                <li class="@if(request()->routeIs('admins.create')) active @endif"><a
                                        href="{{route('admins.create')}}"> إنشاء
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-location"></i> <span> المدن </span> <span
                                    class="menu-arrow"></span></a>
                            <ul
                                style="display: @if(request()->routeIs('cities.index','cities.create')) block; @else none; @endif">
                                <li class="@if(request()->routeIs('cities.index')) active @endif"><a
                                        href="{{route('cities.index')}}"> عرض </a></li>
                                <li class="@if(request()->routeIs('cities.create')) active @endif"><a
                                        href="{{route('cities.create')}}"> إنشاء </a></li>
                            </ul>
                        </li>
                        <li class="@if(request()->routeIs('admin.appointments')) active @endif">
                            <a href="{{route('admin.appointments')}}"><i class="fe fe-layout"></i>
                                <span>المواعيد</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-users"></i> <span> التخصصات
                                </span> <span class="menu-arrow"></span></a>
                            <ul
                                style="display: @if(request()->routeIs('specialities.index','specialities.create')) block; @else none; @endif">
                                <li class="@if(request()->routeIs('specialities.index')) active @endif"><a
                                        href="{{route('specialities.index')}}"> عرض </a></li>
                                <li class="@if(request()->routeIs('specialities.create')) active @endif"><a
                                        href="{{route('specialities.create')}}">
                                        إنشاء </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-user-plus"></i> <span> الأطباء
                                </span> <span class="menu-arrow"></span></a>
                            <ul
                                style="display: @if(request()->routeIs('doctors.index','doctors.create')) block; @else none; @endif">
                                <li class="@if(request()->routeIs('doctors.index')) active @endif"><a
                                        href="{{route('doctors.index')}}"> عرض </a></li>
                                <li class="@if(request()->routeIs('doctors.create')) active @endif"><a
                                        href="{{route('doctors.create')}}"> إنشاء </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-user"></i> <span> المرضى </span> <span
                                    class="menu-arrow"></span></a>
                            <ul
                                style="display: @if(request()->routeIs('patients.index','patients.create')) block; @else none; @endif">
                                <li class="@if(request()->routeIs('patients.index')) active @endif"><a
                                        href="{{route('patients.index')}}"> عرض </a></li>
                                <li class="@if(request()->routeIs('patients.create')) active @endif"><a
                                        href="{{route('patients.create')}}"> إنشاء </a></li>
                            </ul>
                        </li>
                        <li class="@if(request()->routeIs('admin.reviews')) active @endif">
                            <a href="{{route('admin.reviews')}}"><i class="fe fe-star-o"></i> <span>التقييمات</span></a>
                        </li>
                        <li class="@if(request()->routeIs('admin.transactions')) active @endif">
                            <a href="{{route('admin.transactions')}}"><i class="fe fe-activity"></i>
                                <span>الحركات المالية</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fe fe-document"></i> <span> التقارير</span> <span
                                    class="menu-arrow"></span></a>
                            <ul
                                style="display: @if(request()->routeIs('admin.invoice-report')) block; @else none; @endif">
                                <li class="@if(request()->routeIs('admin.invoice-report')) active @endif"><a
                                        href="{{route('admin.invoice-report')}}">تقارير الفواتير</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>التحكم</span>
                        </li>
                        <li class="@if(request()->routeIs('admin.settings')) active @endif">
                            <a href="{{route('admin.settings')}}"><i class="fe fe-vector"></i>
                                <span>الإعدادات</span></a>
                        </li>
                        <li class="@if(request()->routeIs('admin.profile')) active @endif">
                            <a href="{{route('admin.profile')}}"><i class="fe fe-user-plus"></i>
                                <span>الحساب الشخصي</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">@yield('page-title')</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                                <li class="breadcrumb-item active"> @yield('page-breadcrumb')</li>
                            </ul>
                        </div>
                        @yield('action')
                    </div>
                </div>

                @yield('page-wrapper')
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{asset('doccure/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{asset('doccure/admin/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('doccure/admin/assets/js/bootstrap.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{asset('doccure/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    @yield('scripts')

    <!-- Custom JS -->
    <script src="{{asset('doccure/admin/assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{asset('toastr/toastr.min.js')}}"></script>
    <script src="{{asset('js/crud.js')}}"></script>
</body>

</html>