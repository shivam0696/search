

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
      <img src="{{ asset('backend/assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Commerce</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('backend/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Dashboard -->
              <li class="nav-item has-treeview">
                  <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                  </a>
              </li>

              <!-- Manage Categories -->
              <li class="nav-item has-treeview {{ request()->is('category', 'addcategory', 'editcategory') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('category', 'addcategory', 'editcategory') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-list-alt"></i>
                      <p>
                          Manage Categories
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/category') }}" class="nav-link {{ request()->is('category', 'editcategory') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Show Categories</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/addcategory') }}" class="nav-link {{ request()->is('addcategory') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Category</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Manage Products -->
              <li class="nav-item has-treeview {{ request()->is('product', 'addproduct', 'editProduct', 'proreview') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('product', 'addproduct', 'proreview', 'editProduct') ? 'active' : '' }}">
                      <i class="nav-icon far fa-circle"></i>
                      <p>
                          Manage Products
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/product') }}" class="nav-link {{ request()->is('product') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Show Products</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/addproduct') }}" class="nav-link {{ request()->is('addproduct') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Product</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/proreview') }}" class="nav-link {{ request()->is('proreview') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Products Review</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Manage Orders -->
              <li class="nav-item">
                  <a href="{{ url('/order') }}" class="nav-link {{ request()->is('order', 'Vieworder') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>Manage Orders</p>
                  </a>
              </li>

              <!-- Manage Front -->
              <li class="nav-item has-treeview {{ request()->is('page', 'addpage', 'editPage', 'website', 'editwebsite', 'banner', 'editbanner', 'addbanner') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('page', 'addpage', 'editPage', 'website', 'editwebsite', 'banner', 'editbanner', 'addbanner') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                          Manage Front
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/page') }}" class="nav-link {{ request()->is('page', 'addpage', 'editPage') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Pages</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/website') }}" class="nav-link {{ request()->is('website', 'editwebsite') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Website</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/banner') }}" class="nav-link {{ request()->is('banner', 'editbanner', 'addbanner') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Banner</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <!-- Manage User -->
              <li class="nav-item has-treeview {{ request()->is('user', 'backendcontact') ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ request()->is('user', 'backendcontact') ? 'active' : '' }}">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                          Manage User
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ url('/user') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Users</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ url('/backendcontact') }}" class="nav-link {{ request()->is('backendcontact') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Enquiry</p>
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





