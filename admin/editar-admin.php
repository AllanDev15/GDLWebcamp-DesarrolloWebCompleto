<?php include_once 'funciones/sesiones.php' ?>
<?php include_once 'funciones/funciones.php' ?>
<?php include_once 'templates/header.php' ?>
<?php 
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)) {
  die("Error!");
  // header("Location:lista-admin.php");
}
?>
  
<?php include_once 'templates/barra.php' ?>

  <!-- Main Sidebar Container -->
  <?php include_once 'templates/navegacion.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Administrador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-8">  
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Editar Admin</h3>
          </div>
          <div class="card-body">
          <?php 
          $sql = "SELECT * FROM admins WHERE id_admin = $id";
          $resultado = $con->query($sql);
          $admin = $resultado->fetch_assoc();
          ?>
            Puedes editar los datos del administrador aqui
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Usuario</label>
                  <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="<?= $admin['usuario'] ?>">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Tu Nombre" value="<?= $admin['nombre'] ?>">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary" >Guardar</button>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </section>
      </div>
    </div>

    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php' ?>


