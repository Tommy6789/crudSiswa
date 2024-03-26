  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @auth
              <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          @endauth
      </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item 
          {{ Route::is('siswa') || Route::is('siswa.create') || Route::is('siswa.edit') ? 'menu-open' : '' }} 
          {{ Route::is('penulis.index') || Route::is('penulis.create') || Route::is('penulis.edit') ? 'menu-open' : '' }} 
          {{ Route::is('buku.index') || Route::is('buku.create') || Route::is('buku.edit') ? 'menu-open' : '' }}
          {{ Route::is('peminjaman.index') || Route::is('peminjaman.create') || Route::is('peminjaman.edit') ? 'menu-open' : '' }}
          {{ Route::is('profile.index') || Route::is('profile.edit') ? 'menu-open' : '' }}">
            <a href="#=" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ Route('siswa') }} " class="nav-link {{ Route::is('siswa') || Route::is('siswa.create') || Route::is('siswa.edit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{ Route('buku.index') }} " class="nav-link {{ Route::is('buku.index') || Route::is('buku.create') || Route::is('buku.edit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{ Route('penulis.index') }} " class="nav-link {{ Route::is('penulis.index') || Route::is('penulis.create') || Route::is('penulis.edit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penulis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href=" {{ Route('peminjaman.index') }} " class="nav-link {{ Route::is('peminjaman.index') || Route::is('peminjaman.create') || Route::is('peminjaman.edit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>