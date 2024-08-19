<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <img src="/img/logo.png" alt="">
            <span class="d-none d-lg-block">Admin Panel</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->


</header>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pendaftaran Mobil Baru</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/mobil') }}">
                <i class="bi bi-car-front-fill"></i>
                <span>Daftar Mobil</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/user') }}">
                <i class="bi bi-people"></i>
                <span>Daftar Users</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/alat-berat') }}">
                <i class="bi bi-box-seam"></i>
                <span>Daftar Alat Berat</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link collapsed">
                    <i class="bi bi-box-arrow-in-left"></i>
                    <span>Logout</span>
                </button>
                </a>
            </form>
        </li>
        <!-- End Login Page Nav -->
    </ul>
</aside><!-- End Sidebar-->