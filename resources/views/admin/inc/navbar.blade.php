<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Homepage</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/newadmin" class="nav-link">New Admin</a>
      </li>
     {{--  <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{Auth::user()->name}}
          <i class="fa fa-sort-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="/admin/profile" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                Profile
                </h3>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                Logout
                </h3>
              </div>
            </div>
          </a>
        </div>
      </li>
    </ul>
  </nav>