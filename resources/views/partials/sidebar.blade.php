<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo d-flex align-middle">
                    <a href="index.html"><img src="assets/images/logo/logo_kodiklat.webp" alt="Logo" srcset="">
                    </a>
                    <span>Kodiklat</span>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  {{ request()->routeIs('/') ? 'active' : '' }}">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Surat Keluar</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('type*') ? 'active' : '' }}">
                    <a href="/type" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Jenis</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('unit*') ? 'active' : '' }}">
                    <a href="/unit" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Unit Staff</span>
                    </a>
                </li>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
