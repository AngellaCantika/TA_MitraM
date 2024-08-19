<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/HalamanUser" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">User Panel</span>
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