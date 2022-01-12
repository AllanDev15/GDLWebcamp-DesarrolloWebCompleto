<?php 
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)):
  die("Error");
else:
?>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-8">  
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Editar Evento</h3>
          </div>
          <div class="card-body">
          <?php 
          $sql = "SELECT * FROM eventos WHERE evento_id = $id";
          $resultado = $con->query($sql);
          $evento = $resultado->fetch_assoc();
          ?>
            Llena el formulario para editar un evento
            <form role="form" name="guardar-registro" id="guardar-registro-evento" method="post" action="modelo-evento.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="usuario">Editar Evento</label>
                  <input type="text" class="form-control" name="titulo_evento" id="titulo_evento" placeholder="Titulo del Evento" value="<?= $evento['nombre_evento'] ?>">
                </div>
                <div class="form-group">
                  <label for="nombre">Categoria</label>
                  <select name="categoria_evento" id="categoria_evento" class="form-control select2">
                    <option value="0" selected disabled>- Seleccione -</option>
                    <?php 
                    try { 
                      $categoria_actual = $evento['id_cat_evento'];
                      $sql = "SELECT * FROM categoria_evento";
                      $resultado = $con->query($sql);
                      while($cat_evento = $resultado->fetch_assoc()): 
                        if($cat_evento['id_categoria'] == $categoria_actual): ?>
                          <option value="<?= $cat_evento['id_categoria']?>" selected>
                          <?= $cat_evento['cat_evento'] ?>
                          </option>
                        <?php else: ?>
                          <option value="<?= $cat_evento['id_categoria']?>">
                          <?= $cat_evento['cat_evento'] ?>
                          </option>
                        <?php endif;
                      endwhile;
                    } catch (Exception $e) {
                      
                    }
                    
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Fecha Evento</label>
                  <?php 
                    $fecha = $evento['fecha_evento'];
                    $fecha_formato = date('m/d/Y', strtotime($fecha));
                  ?>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="fecha_evento" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $fecha_formato ?>"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>Hora</label>
                  <?php 
                    $hora = $evento['hora_evento'];
                    $hora_formato = date('h:i a', strtotime($hora));
                  ?>
                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                    <input type="text" name="hora_evento" class="form-control datetimepicker-input" data-target="#timepicker" value="<?= $hora_formato  ?>"/>
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
                      $invitado_actual = $evento['id_inv'];
                      $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados";
                      $resultado = $con->query($sql);
                      while($invitados = $resultado->fetch_assoc()):
                        if($invitados['invitado_id'] == $invitado_actual): ?>
                          <option value="<?= $invitados['invitado_id']?>" selected>
                          <?= $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?>
                          </option>
                        <?php else: ?>
                          <option value="<?= $invitados['invitado_id']?>">
                          <?= $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?>
                          </option>
                        <?php endif;
                      endwhile;
                    } catch (Exception $e) {
                      
                    }
                    
                    ?>
                  </select>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
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


  <?php 
  include_once 'templates/footer.php';
  endif;
  ?>

