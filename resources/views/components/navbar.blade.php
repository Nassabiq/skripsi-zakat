<!-- Navbar Start -->
<nav class="navbar nav-underline navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a href="/" alt="logo">
            <img src="{{ asset('img/Logo MMJ.png') }}" style="width: 60px; filter: brightness(50)" />
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-center justify-content-center col-12">
                <a class="nav-link ms-md-5 {{ request()->is('/') ? 'nav-link-active' : '' }}"
                    href="{{ route('home') }}">Home</a>
                <a class="nav-link ms-md-5 {{ request()->is('profile') ? 'nav-link-active' : '' }}"
                    href="{{ route('profile') }}">Profil</a>
                <a class="nav-link ms-md-5 {{ request()->is('news') ? 'nav-link-active' : '' }}"
                    href="{{ route('news') }}">News</a>
                <a class="nav-link ms-md-5 {{ request()->is('agenda') ? 'nav-link-active' : '' }}"
                    href="{{ route('agenda') }}">Agenda</a>
                <a class="nav-link ms-md-5 {{ request()->is('zis/*') ? 'nav-link-active' : '' }}"
                    href="{{ route('zis') }}">ZIS</a>
                <a class="nav-link ms-md-5 {{ request()->is('contact') ? 'nav-link-active' : '' }}"
                    href="{{ route('contact') }}">Contact</a>
                <span class="nav-link" style="margin-left: 100px; border-bottom: none"></span>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link ms-md-5" href="#" style="border-bottom: none; text-decoration: none"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"
                                style="font-size: 25px; position: absolute; margin-top: -10px"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @hasanyrole('ketua|bendahara|admin|takmir')
                                <li>
                                    <a class="dropdown-item" href="admin/agenda">Admin Page</a>
                                </li>
                            @endhasanyrole
                            <li>
                                <a class="dropdown-item" href="{{ route('data_muzakki') }}">Status ZIS</a>
                            </li>
                            <li>
                                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="dropdown-item">Logout</button>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item mx-2">
                        <div class="btn btn-secondary btn-login px-3">
                            <a class="green" href="login">Login</a>
                        </div>
                    </li>
                    <li class="nav-item mx-2">
                        <div class="btn btn-secondary btn-regis px-3">
                            <a class="green" href="register">Register</a>
                        </div>
                    </li>
                @endguest
            </div>
        </div>
    </div>
</nav>
