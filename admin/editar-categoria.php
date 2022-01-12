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
            <h1>Editar Categorias de Eventos</h1>
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
            <h3 class="card-title">Editar Categoria</h3>
          </div>
          <div class="card-body">
            Llena el formulario para editar una categoria
            <?php 
              $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id";
              $resultado = $con->query($sql);
              $categoria = $resultado->fetch_assoc();
            ?>
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Usuario</label>
                  <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" placeholder="Categoria" value="<?= $categoria['cat_evento'] ?>">
                </div>
                <div class="form-group">
                  <label for="">Icono</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text input-group-addon">
                        <i class="fa fa-anchor"></i>
                      </span>
                    </div>
                    <input type="text" name="icono" id="icono" class="form-control pull-right" placeholder="fa-icon" value="<?= $categoria['icono'] ?>">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary" id="crear_registro" >Añadir</button>
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


