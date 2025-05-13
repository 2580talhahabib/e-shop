  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light ">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
<li class="nav-item {{ Route::is('Dashboard') ? 'menu-open' : '' }}">
            <a href="{{ route('Dashboard') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item {{ Route::is('admin.list') ? 'menu-open' : '' }}">
            <a href="{{ route('admin.list') }}" class="nav-link ">
            <i class="fa-solid fa-user-tie ml-2"></i>
              <p class="ml-2">
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{ route('product.list') }}" class="nav-link ">
            <i class="fa-brands fa-product-hunt ml-2"></i>
              <p class="ml-2">
                Products
              </p>
            </a>
          </li>
            <li class="nav-item ">
            <a href="{{ route('category.list') }}" class="nav-link ">
           <i class="fa-solid fa-layer-group ml-2"></i>
              <p class="ml-2">
                Category
              </p>
            </a>
             <li class="nav-item ">
            <a href="{{ route('subcategory.list') }}" class="nav-link ">
           <i class="fa-solid fa-table-list ml-2"></i>
              <p class="ml-2">
                SubCategory
              </p>
            </a>
          </li>
              <li class="nav-item ">
            <a href="{{ route('brand.list') }}" class="nav-link ">
           <i class="fa-solid fa-shuffle ml-2"></i>
              <p class="ml-2">
                Brands
              </p>
            </a>
          </li>
         <li class="nav-item ">
            <a href="{{ route('color.list') }}" class="nav-link ">
          <i class="fa-solid fa-droplet ml-2"></i>
              <p class="ml-2">
                Color
              </p>
            </a>
          </li>
        
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>