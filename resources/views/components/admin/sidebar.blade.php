<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }}</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @hasanyrole('takmir|admin|ketua')
                    <a class="collapse-item {{ request()->routeIs('admin_agenda') ? 'bg-gray-300 rounded' : '' }}"
                        href="{{ route('admin_agenda') }}">Agenda</a>
                    <a class="collapse-item {{ request()->routeIs('admin_news') ? 'bg-gray-300 rounded' : '' }}"
                        href="{{ route('admin_news') }}">News</a>
                @endhasanyrole
                {{-- @hasanyrole('takmir|admin|ketua')
                @endhasanyrole --}}
                @hasanyrole('takmir|admin')
                    <a class="collapse-item {{ request()->routeIs('admin_galeri') ? 'bg-gray-300 rounded' : '' }}"
                        href="{{ route('admin_galeri') }}">Gallery</a>
                @endhasanyrole
                @hasanyrole('bendahara|admin|ketua')
                    <a class="collapse-item {{ request()->routeIs('laporan_zis') ? 'bg-gray-300 rounded' : '' }}"
                        href="{{ route('laporan_zis') }}">Laporan ZIS</a>
                @endhasanyrole
                @hasrole('admin')
                    <a class="collapse-item {{ request()->routeIs('kelola_user') ? 'bg-gray-300 rounded' : '' }}"
                        href="{{ route('kelola_user') }}">Kelola User</a>
                @endhasrole
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Go To Home</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
