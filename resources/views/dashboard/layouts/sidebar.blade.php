<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="/img/OmsaLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
      <span class="brand-text font-weight-light">OMSA Medic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          {{-- <a href="#" class="d-block">Nama Anda</a> --}}
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/posts" class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Kandidat
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('dashboard/workfields*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/workfields*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Bidang Pekerjaan
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right"><?= $userCount->count() ?></span> --}}
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/workfields" class="nav-link {{ Request::is('dashboard/workfields') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/workfields/create" class="nav-link {{ Request::is('dashboard/workfields/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Pekerjaan</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @can('admin') --}}
          <li class="nav-header">ADMINISTRATOR</li>
          <li class="nav-item {{ Request::is('dashboard/users*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Role User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/users" class="nav-link {{ Request::is('dashboard/users') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/users/create" class="nav-link {{ Request::is('dashboard/users/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ Request::is('dashboard/regions*') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('dashboard/regions*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Wilayah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/regions" class="nav-link {{ Request::is('dashboard/regions') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Wilayah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/regions/create" class="nav-link {{ Request::is('dashboard/regions/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Wilayah</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="/dashboard/categories" class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Manajer Menu
              </p>
            </a>
          </li> --}}
          {{-- @endcan --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>