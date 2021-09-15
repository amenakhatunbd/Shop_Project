


<div class="container mt-5">
<aside class="main-sidebar sidebar-dark-primary elevation-12">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    

      <!-- SidebarSearch Form -->
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/customers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/suppliers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Suppliers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/categorys')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorys</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/purchases')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchases</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/saless')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Saless</p>
                </a>
              </li>

                 <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        
                   
                    @if(Auth::check())
                    {{Auth::user()->name}}

                    @endif

                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>

          </li>        
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
</div>