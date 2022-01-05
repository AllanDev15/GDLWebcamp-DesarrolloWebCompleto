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
            <h1>Crear Evento</h1>
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
            <h3 class="card-title">Crear Evento</h3>
          </div>
          <div class="card-body">
            Llena el formulario para crear un evento
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Titulo Evento</label>
                  <input type="text" class="form-control" name="titulo_evento" id="titulo_evento" placeholder="Titulo del Evento">
                </div>
                <div class="form-group">
                  <label for="nombre">Categoria</label>
                  <select name="categoria_evento" id="categoria_evento" class="form-control select2">
                    <option value="0" selected disabled>- Seleccione -</option>
                    <?php 
                    try { 
                      $sql = "SELECT * FROM categoria_evento";
                      $resultado = $con->query($sql);
                      while($cat_evento = $resultado->fetch_assoc()): ?>
                        <option value="<?= $cat_evento['id_categoria']?>">
                        <?= $cat_evento['cat_evento'] ?>
                        </option>
                      <?php endwhile;
                    } catch (Exception $e) {
                      
                    }
                    
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Fecha Evento</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="fecha_evento" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>Hora</label>
                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                    <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker"/>
                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                    </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label for="nombre">Invitado o Ponente</label>
                  <select name="invitado" id="invitado" class="form-control select2">
                    <option value="0" selected disabled>- Seleccione -</option>
                    <?php 
                    try { 
                      $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados";
                      $resultado = $con->query($sql);
                      while($invitados = $resultado->fetch_assoc()): ?>
                        <option value="<?= $invitados['invitado_id']?>">
                        <?= $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?>
                        </option>
                      <?php endwhile;
                    } catch (Exception $e) {
                      
                    }
                    
                    ?>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary">Añadir</button>
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


