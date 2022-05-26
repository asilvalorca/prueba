 <!-- Brand Logo -->
 <a href="index3.html" class="brand-link">
      <!--<img src="dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
           <i class="fas fa-gas-pump"></i>
      <span class="brand-text font-weight-light">Combustible</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session('combustible_usuario')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('inicio')}}" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Listado Equipos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('cerrar_sesion')}}" class="nav-link">
              <i class="nav-icon fas fa-user-times"></i>
              <p>
               Cerrar Sesión
              </p>
            </a>
          </li>
          
          
          <!--<li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon fas fa-gas-pump"></i>
              <p>
                Carguío
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>
                Gráficos
              </p>
            </a>
          </li>-->       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->