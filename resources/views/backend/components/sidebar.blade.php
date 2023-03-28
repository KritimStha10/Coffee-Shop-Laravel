  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      <img src="{{ asset('backend/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Goodwill Hotel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->image_icon)
          <img src="{{ asset('uploads/users/'. Auth::user()->image_icon) }}" class="img-circle elevation-2" alt="User Image">
              @else
              <img src="{{ asset('backend/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ route('admin.home') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt fa fa-spin"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">Home</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.about.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                About Us
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="padding-left: 50px;">
                <a href="#" class="nav-link">
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item" style="padding-left: 50px;">
                <a href="#" class="nav-link">
                  <p>Users</p>
                </a>
              </li>
              </ul>
            </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-images"></i>
              <p>
                Media Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="padding-left: 50px;">
                <a href="{{ route('admin.banner.index') }}" class="nav-link">
                  <p>Banner</p>
                </a>
              </li>
              <li class="nav-item" style="padding-left: 50px;">
                <a href="#" class="nav-link">
                  <p>Gallery</p>
                </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
            <a href="{{ route('admin.title.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Title
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.testimonial.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Testimonial
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.count.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Count
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.brand.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Brand
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-images"></i>
              <p>
                Shop
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" style="padding-left: 50px;">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <p>category</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 50px;">
                <a href="{{ route('admin.subcategory.index') }}" class="nav-link">
                  <p>Sub-category</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 50px;">
                <a href="{{ route('admin.productbrand.index') }}" class="nav-link">
                  <p>Product Brand</p>
                </a>
              </li>

              <li class="nav-item" style="padding-left: 50px;">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                  <p>Product </p>
                </a>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>