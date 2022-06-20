<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown ">
                <a href="/" class="nav-link {{ $title === 'Dashboard' ? 'active' : '' }}"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                {{-- <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul> --}}
            </li>
            <li class="menu-header">Kelola Buku</li>
            <li><a class="nav-link" href="{{ route('kategori') }}"><i class="far fas fa-book-open"></i> <span>Kategori Buku</span></a></li>
            <li><a class="nav-link" href="/buku"><i class="far fas fa-book-open"></i> <span>Data Buku</span></a></li>
            <li><a class="nav-link" href="/buku-pinjam"><i class="far fas fa-book"></i> <span>Data
                        Pinjam</span></a></li>
            <li><a class="nav-link" href="/buku-pengembalian"><i class="far fas fa-bell"></i> <span>Data
                        Pengembalian</span></a></li>


            <li class="menu-header">HISTORY</li>
            <li><a class="nav-link" href="blank.html"><i class="fa fa-history"></i> <span> Pinjaman</span></a></li>
            <li><a class="nav-link" href="blank.html"><i class="fa fa-history"></i> <span>Pengembalian</span></a></li>

            </li>

            <li class="menu-header">Pages</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>


            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>
