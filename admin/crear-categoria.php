<?php include_once 'funciones/sesiones.php' ?>
<?php include_once 'funciones/funciones.php' ?>
<?php include_once 'templates/header.php' ?>
  
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
            <h1>Crear Categorias de Eventos</h1>
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
            <h3 class="card-title">Crear Categoria</h3>
          </div>
          <div class="card-body">
            Llena el formulario para crear una categoria
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Usuario</label>
                  <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria" placeholder="Categoria">
                </div>
                <div class="form-group">
                  <label for="">Icono</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text input-group-addon">
                        <i class="fa fa-anchor"></i>
                      </span>
                    </div>
                    <input type="text" name="icono" id="icono" class="form-control pull-right" placeholder="fa-icon">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="nuevo">
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


