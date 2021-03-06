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
            <h1>Listado de Eventos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los eventos en esta seccion</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitados</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      try{
                        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_invitado, apellido_invitado ";
                        $sql .= "FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                        $sql .= "INNER JOIN invitados on eventos.id_inv=invitados.invitado_id ";
                        $sql .= "ORDER BY evento_id";
                        $resultado = $con->query($sql);
                      }catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }
                      
                      while($eventos = $resultado->fetch_assoc()): ?>
                        <tr> 
                          <td><?= utf8_encode($eventos['nombre_evento']) ?></td>
                          <td><?= $eventos['fecha_evento'] ?></td>
                          <td><?= $eventos['hora_evento'] ?></td>
                          <td><?= $eventos['cat_evento'] ?></td>
                          <td><?= $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado'] ?></td>
                          <td>
                            <a href="editar-evento.php?id=<?= $eventos['evento_id'] ?>" class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a data-id="<?= $eventos['evento_id'] ?>" data-tipo="evento" class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fa fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitados</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php' ?>


