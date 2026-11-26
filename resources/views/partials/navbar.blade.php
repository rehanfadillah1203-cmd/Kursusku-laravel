<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            KursusKu <span class="text-warning">Pisang Pride</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('courses.index') }}">
                        Kursus
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('enrollments.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('dashboard') }}">
                            Profil Saya
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm fw-semibold">
                                Logout ({{ auth()->user()->name }})
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm fw-semibold {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>