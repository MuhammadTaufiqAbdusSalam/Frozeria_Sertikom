<nav class="main-header navbar navbar-expand-md navbar-dark bg-dark">

  <div class="container">

    <!-- LOGO / BRAND -->
    <a href="{{ url('/') }}" class="navbar-brand">
      <span class="brand-text font-weight-light">Frozeria Stok</span>
    </a>

    <!-- TOGGLE (mobile) -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
            Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/kategori') }}" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
            Kategori
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/bantuan') }}" class="nav-link {{ request()->is('bantuan*') ? 'active' : '' }}">
            Bantuan
          </a>
        </li>

      </ul>

      <!-- RIGHT SIDE BUTTON -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          @if(request()->is('kategori*'))
            <button class="btn btn-secondary btn-sm"
                    data-toggle="modal"
                    data-target="#modalKategori">
              + Tambah Kategori
            </button>
          @else
            <button class="btn btn-secondary btn-sm"
                    data-toggle="modal"
                    data-target="#modalForm">
              + Tambah Barang
            </button>
          @endif
        </li>
      </ul>

    </div>

  </div>

</nav>