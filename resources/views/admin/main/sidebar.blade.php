  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }} " class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
              </div>
          </div>

          <!-- Sidebar Search Form -->
          {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  {{-- theme --}}
                  <li class="nav-item menu-open">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>


                  {{-- <li class="nav-item ">
                      <a href="{{ route('users.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Users
                          </p>
                      </a>
                  </li>

                  <li class="nav-item ">
                      <a href="{{ route('topic.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-comments"></i>
                          <p>
                              Topics
                          </p>
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="{{ route('subtopic.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-comments"></i>
                          <p>
                              Sub Topics
                          </p>
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="{{ route('knowledge.create') }}" class="nav-link">
                          <i class="nav-icon fas fa-comments"></i>
                          <p>
                              knowledge create
                          </p>
                      </a>
                  </li> --}}
                  @auth
                      {{-- Users menu: needs 'user.read' permission --}}
                      @if (auth()->user()->hasPermission('user.read'))
                          <li class="nav-item">
                              <a href="{{ route('users.index') }}" class="nav-link">
                                  <i class="nav-icon fas fa-users"></i>
                                  <p>Users</p>
                              </a>
                          </li>
                      @endif

                      {{-- Topics menu: needs 'topic.read' permission --}}
                      @if (auth()->user()->hasPermission('topic.read'))
                          <li class="nav-item">
                              <a href="{{ route('topic.index') }}" class="nav-link">
                                  <i class="nav-icon fas fa-comments"></i>
                                  <p>Topics</p>
                              </a>
                          </li>
                      @endif

                      {{-- Subtopics menu: needs 'subtopic.read' permission --}}
                      @if (auth()->user()->hasPermission('subtopic.read'))
                          <li class="nav-item">
                              <a href="{{ route('subtopic.index') }}" class="nav-link">
                                  <i class="nav-icon fas fa-comments"></i>
                                  <p>Sub Topics</p>
                              </a>
                          </li>
                      @endif

                      {{-- Knowledge create menu: let's assume 'content.create.any' or 'content.create.own' permission --}}
                      @if (auth()->user()->hasPermission('content.create.any') || auth()->user()->hasPermission('content.create.own'))
                          <li class="nav-item">
                              <a href="{{ route('knowledge.create') }}" class="nav-link">
                                  <i class="nav-icon fas fa-comments"></i>
                                  <p>Knowledge Create</p>
                              </a>
                          </li>
                      @endif
                  @endauth

              </ul>
          </nav>

          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
