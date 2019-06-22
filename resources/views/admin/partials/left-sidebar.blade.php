 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Richard V.Welsh</p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>


           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-order" aria-expanded="false" aria-controls="manage-order">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Manage Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-order">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.orders') }}">Orders</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-product" aria-expanded="false" aria-controls="auth">
             
              <i class="menu-icon fas fa-cogs"> </i>
              <span class="menu-title">Manage Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-product">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  
                  <a class="nav-link" href="{{ route('admin.products') }}"> Products</a>
                   <a class="nav-link" href="{{ route('admin.product.create') }}"> Add New Product</a>
                </li>
              </ul>
            </div>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-category" aria-expanded="false" aria-controls="auth">
             
              <i class="menu-icon fas fa-cogs"> </i>
              <span class="menu-title">Manage Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-category">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  
                  <a class="nav-link" href="{{ route('admin.categories') }}"> Category</a>
                   <a class="nav-link" href="{{ route('admin.category.create') }}"> Add New Category</a>
                </li>
              </ul>
            </div>
          </li>




          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-brand" aria-expanded="false" aria-controls="auth">
             
              <i class="menu-icon fas fa-cogs"> </i>
              <span class="menu-title">Manage Brands</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-brand">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  
                  <a class="nav-link" href="{{ route('admin.brands') }}"> Brands</a>
                   <a class="nav-link" href="{{ route('admin.brand.create') }}"> Add New Brands</a>
                </li>
              </ul>
            </div>
          </li>


           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-divison" aria-expanded="false" aria-controls="auth">
             
              <i class="menu-icon fas fa-cogs"> </i>
              <span class="menu-title">Manage Division</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-divison">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  
                  <a class="nav-link" href="{{ route('admin.divisions') }}"> Divisons</a>
                   <a class="nav-link" href="{{ route('admin.division.create') }}"> Add Divison</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage-district" aria-expanded="false" aria-controls="auth">
             
              <i class="menu-icon fas fa-cogs"> </i>
              <span class="menu-title">Manage Districts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage-district">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  
                  <a class="nav-link" href="{{ route('admin.districts') }}"> Districts</a>
                   <a class="nav-link" href="{{ route('admin.district.create') }}"> Add Districts</a>
                </li>
              </ul>
            </div>
          </li>


         


           <li class="nav-item">

            <a class="nav-link" href="" >
              
            <form  class="form-inline" action="{{ route('admin.logout') }}" method="POST" >
              @csrf
              <button class="btn btn-danger">Logout</button>
            </form>
            </a>
            
          </li>
          


        </ul>
      </nav>


     