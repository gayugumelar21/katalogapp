<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/produk*')) ? 'active' : '' }}" href="{{ route('produk.index') }}">
              <span data-feather="file"></span>
              Kelola Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/akun*')) ? 'active' : '' }}" href="{{ route('akun.index') }}">
              <span data-feather="users"></span>
              Kelola Akun
            </a>
          </li>
        </ul>
    </div>
</nav>