<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            KursusKu <span class="text-warning">Pisang Pride</span>
        </a>

        <!-- Tombol Toggler untuk Tampilan Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi (Disejajarkan ke kanan dengan ms-auto dan align-items-center) -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <!-- Menu Beranda -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <!-- Menu Kursus (Terhubung Langsung ke Database via CourseController) -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('courses.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('courses.index') }}">
                        Kursus
                    </a>
                </li>

                <!-- Menu Pendaftaran -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('enrollments.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>