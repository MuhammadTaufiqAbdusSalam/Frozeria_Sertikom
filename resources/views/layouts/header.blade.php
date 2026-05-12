<!-- NAVBAR -->
<nav class="main-header navbar navbar-expand-lg navbar-dark modern-navbar shadow-sm">

    <div class="container">

        <!-- LOGO -->
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">

            <div class="logo-icon mr-2">
                <i class="fas fa-snowflake"></i>
            </div>

            <div>
                <span class="brand-title">
                    Frozeria
                </span>

                <small class="brand-subtitle d-block">
                    Stock Management
                </small>
            </div>

        </a>

        <!-- TOGGLE MOBILE -->
        <button class="navbar-toggler border-0"
                type="button"
                data-toggle="collapse"
                data-target="#navbarCollapse">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- LEFT MENU -->
            <ul class="navbar-nav mx-auto">

                <li class="nav-item mx-1">

                    <a href="{{ url('/') }}"
                       class="nav-link custom-nav-link {{ request()->is('/') ? 'active' : '' }}">

                        <i class="fas fa-home mr-1"></i>
                        Dashboard

                    </a>

                </li>

                <li class="nav-item mx-1">

                    <a href="{{ url('/kategori') }}"
                       class="nav-link custom-nav-link {{ request()->is('kategori*') ? 'active' : '' }}">

                        <i class="fas fa-tags mr-1"></i>
                        Kategori

                    </a>

                </li>

                <li class="nav-item mx-1">

                    <a href="{{ url('/bantuan') }}"
                       class="nav-link custom-nav-link {{ request()->is('bantuan*') ? 'active' : '' }}">

                        <i class="fas fa-question-circle mr-1"></i>
                        Bantuan

                    </a>

                </li>

            </ul>

            <!-- RIGHT SIDE -->
            <ul class="navbar-nav align-items-center">

                <!-- USER INFO -->
                <li class="nav-item mr-3 d-none d-lg-block">

                    <div class="user-box">

                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="ml-2">

                            <div class="user-name">
                                Admin
                            </div>

                            <small class="text-muted">
                                Frozeria System
                            </small>

                        </div>

                    </div>

                </li>

                <!-- BUTTON -->
                <li class="nav-item">

                    @if(request()->is('kategori*'))

                        <button class="btn btn-modern"
                                data-toggle="modal"
                                data-target="#modalKategori">

                            <i class="fas fa-plus mr-1"></i>
                            Tambah Kategori

                        </button>

                    @elseif(request()->is('/') || request()->is('dashboard'))

                        <button class="btn btn-modern"
                                data-toggle="modal"
                                data-target="#modalForm">

                            <i class="fas fa-plus mr-1"></i>
                            Tambah Barang

                        </button>

                    @endif

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- STYLE -->
<style>

    .modern-navbar {
        background: linear-gradient(90deg, #111827, #1f2937);
        padding-top: 14px;
        padding-bottom: 14px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }

    .navbar-brand {
        text-decoration: none !important;
    }

    .logo-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #3b82f6, #60a5fa);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        box-shadow: 0 4px 12px rgba(59,130,246,0.3);
    }

    .brand-title {
        font-size: 20px;
        font-weight: 700;
        color: white;
        line-height: 1;
    }

    .brand-subtitle {
        color: rgba(255,255,255,0.6);
        font-size: 11px;
        letter-spacing: 1px;
    }

    .custom-nav-link {
        color: rgba(255,255,255,0.75) !important;
        font-weight: 500;
        padding: 10px 16px !important;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .custom-nav-link:hover {
        background: rgba(255,255,255,0.08);
        color: white !important;
    }

    .custom-nav-link.active {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        color: white !important;
        box-shadow: 0 4px 10px rgba(37,99,235,0.3);
    }

    .btn-modern {
        background: linear-gradient(135deg, #2563eb, #3b82f6);
        border: none;
        color: white;
        padding: 10px 18px;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s ease;
        box-shadow: 0 4px 12px rgba(37,99,235,0.25);
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 18px rgba(37,99,235,0.35);
    }

    .user-box {
        display: flex;
        align-items: center;
        background: rgba(255,255,255,0.06);
        padding: 6px 12px;
        border-radius: 14px;
    }

    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 12px;
        background: linear-gradient(135deg, #10b981, #34d399);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
    }

    .user-name {
        color: white;
        font-weight: 600;
        font-size: 14px;
        line-height: 1;
    }

    @media (max-width: 991px) {

        .navbar-nav {
            margin-top: 15px;
        }

        .btn-modern {
            width: 100%;
            margin-top: 10px;
        }

    }

</style>