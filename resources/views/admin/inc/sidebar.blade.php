<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Poller</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/createpoll" class="nav-link {{ Request::is('admin/createpoll') ? 'active' : '' }}">
              <i class="fa fa-pie-chart" aria-hidden="true"></i>
              <p>
                Νέα Ψηφοφορία
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
              <i class="nav-icon fa fa-group"></i>
              <p>
                Users
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/polls" class="nav-link {{ Request::is('admin/polls') ? 'active' : '' }}">
              <i class="nav-icon  fa fa-pie-chart"></i>
              <p>
                Polls
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/messages" class="nav-link {{ Request::is('admin/messages') ? 'active' : '' }}">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Messages
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
