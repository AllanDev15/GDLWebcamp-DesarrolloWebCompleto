<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.php" class="brand-link">
    <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">GDL Webcamp</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <!-- <div class="image">
          <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
      <div class="info">
        <?php $nombre = $_SESSION['nombre'] ?>
        <a href="#" class="d-block"><?= $nombre ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Eventos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-evento.php" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Ver Todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="crear-evento.php" class="nav-link">
                <i class="fa fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-sitemap"></i>
            <p>
              Categoria Eventos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-categorias.php" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Ver Todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="crear-categoria.php" class="nav-link">
                <i class="fa fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Invitados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-invitados.php" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Ver Todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="crear-invitado.php" class="nav-link">
                <i class="fa fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon far fa-address-card"></i>
            <p>
              Registrados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-registrados.php" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Ver Todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="crear-registro.php" class="nav-link">
                <i class="fa fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <?php if($_SESSION['nivel'] === 1): ?>
        <li class="nav-item has-treeview">
          <a href="../widgets.html" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Administradores
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="lista-admin.php" class="nav-link">
                <i class="fas fa-list nav-icon"></i>
                <p>Ver Todos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="crear-admin.php" class="nav-link">
                <i class="fa fa-plus-circle nav-icon"></i>
                <p>Agregar</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>