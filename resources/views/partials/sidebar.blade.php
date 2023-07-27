<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/dashboard">
                        <img src="/assets/images/logo/logo_kodiklat.webp" alt="Logo" style="height: 3.2rem">
                        <small>Kodiklat AD</small>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('surat*') && request('status') == 'Surat Masuk' ? 'active' : '' }}">
                    <a href="/surat?status=Surat Masuk" class='sidebar-link'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
                          </svg>
                        <span>Surat Masuk</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('surat*') && request('status') == 'Surat Keluar' ? 'active' : '' }}">
                    <a href="/surat?status=Surat Keluar" class='sidebar-link'>
                        <i class="bi bi-envelope-open"></i>
                        <span>Surat Keluar</span>
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('users*') ? 'active' : '' }}">
                    <a href="/users" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('type*') ? 'active' : '' }}">
                    <a href="/type" class='sidebar-link'>
                        <i class="bi bi-sliders"></i>
                        <span>Jenis</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('unit*') ? 'active' : '' }}">
                    <a href="/unit" class='sidebar-link'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                            <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                            <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                        </svg>
                        <span>Unit Staff</span>
                    </a>
                </li>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
