<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> @yield('title') - Manajemen Akun Zoom</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('style/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/components.css')}} ">

    </head>

    <body>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{asset('style/assets/js/stisla.js')}} "></script>

    <!-- JS Libraies -->
    <script src="{{asset('style/node_modules/datatables/media/js/jquery.dataTables.min.js')}} "></script>
    <script src="{{asset('style/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('style/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('style/assets/js/scripts.js')}}"></script>
    <script src="{{asset('style/assets/js/custom.js')}} "></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('style/assets/js/page/modules-datatables.js')}} "></script>

    <div id="app">
        <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
            </div>
            </form>
            <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                
            </li>
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('style/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                        
                </div>
            </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">Manajemen Akun Zoom</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">AK</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                @if (auth()->User()->level=="Admin")
                    <li class="nav-item dropdown">
                        <a href="/" class="nav-link"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">MANAJEMEN AKUN ZOOM</li>
                    <li class="nav-item dropdown">
                        <a href="/akun-zoom" class="nav-link has-dropdown "><i class="fas fa-video"></i><span>Akun Zoom</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/akun-zoom">List</a></li>
                            <li><a class="nav-link" href="/akun-zoom/tambah">Tambah Akun</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="/request-pinjam" class="nav-link"><i class="fas fa-exchange-alt"></i><span>Peminjaman</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/request-pinjam">List Peminjaman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="/jadwal" class="nav-link"><i class="fas fa-calendar-day"></i><span>Jadwal</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/jadwal">List Jadwal</a></li>
                        </ul>
                    </li>
                @endif

                @if (auth()->User()->level=="User")
                    <li class="nav-item dropdown">
                        <a href="/dashboard" class="nav-link"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">PEMINJAMAN AKUN</li>
                    <li class="nav-item dropdown">
                        <a href="jadwal" class="nav-link has-dropdown"><i class="fas fa-exchange-alt"></i><span>Peminjaman</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/request-pinjam">List Peminjaman</a></li>
                        </ul>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/request-pinjam/tambah">Request Peminjaman</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="/jadwal" class="nav-link"><i class="fas fa-calendar-day"></i><span>Jadwal</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="/jadwal">List Jadwal</a></li>
                        </ul>
                    </li>
                @endif
                
            </aside>
        </div>

        <!-- Main Content -->
        @yield('breadcrumbs')

        @yield('konten')

</body>
</html>