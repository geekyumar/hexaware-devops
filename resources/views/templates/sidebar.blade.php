    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a href="/logout" class="p-10" >Logout</a>
      </li>
    </ul>

  </nav>
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">Smart Recruiting Platform</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 d-flex">
        <div class="info">
          <h4 class="text-white">{{ auth()->user()->name }}</h4>
          <p class="text-white">{{ auth()->user()->email }}</p>
          <p class="text-white">{{ auth()->user()->role }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Job Posting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/jobs/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Creation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/jobs/list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Drafts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/jobs/list?status=published') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Published Jobs</p>
                </a>
              </li>
            </ul>
          </li>
          <!--<li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Job Categories
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/job-categories') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Catogories Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/job-categories/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Job Creation</p>
                </a>
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Application Forms
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/application-forms') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Application Forms Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/application-forms/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Creation</p>
                </a>
              </li>
              <li class="nav-item">
                
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Application Tracking
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/applications') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/applications/list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Applications Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/applications/notifications') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notification</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Interview Scheduling
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/interview') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scheduled Interview</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/interview/schedule') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule New Interview</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Realtime Metrics
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/recruitment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Overview</p>
                </a>
              </li>
              <li class="nav-item">
                
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Custom Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/custom-reports') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/custom-reports/create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Report</p>
                </a>
              </li>
             
        </ul>
        <li class="nav-item">
            <a href="{{ url('/profile') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
  </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
