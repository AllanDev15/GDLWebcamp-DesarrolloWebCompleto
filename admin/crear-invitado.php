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
          <h1>Crear Invitados</h1>
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
            <h3 class="card-title">Crear Invitados</h3>
          </div>
          <div class="card-body">
            Llena el formulario para Añadir una invitados
            <form role="form" name="guardar-registro-archivo" id="guardar-registro-archivo" method="post"
              action="modelo-invitado.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_invitado">Nombre</label>
                  <input type="text" class="form-control" name="nombre_invitado" id="nombre_invitado"
                    placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="apellido_invitado">Apellido</label>
                  <input type="text" class="form-control" name="apellido_invitado" id="apellido_invitado"
                    placeholder="Apellido">
                </div>
                <div class="form-group">
                  <label for="biografia_invitado">Biografia</label>
                  <textarea class="form-control" name="biografia_invitado" id="biografia_invitado" rows="8"
                    placeholder="Biografia"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagen:</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                      <label class="custom-file-label" for="imagen_invitado">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
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