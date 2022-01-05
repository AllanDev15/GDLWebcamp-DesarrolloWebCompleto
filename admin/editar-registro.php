<?php 
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)) {
  die("Error");
}

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
          <h1>Editar Registro de Asistentes Manualmente</h1>
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
            <h3 class="card-title">Editar Registro</h3>
          </div>
          <div class="card-body">
            <?php           
            $sql = "SELECT * FROM registrados WHERE id_registrado = $id";
            $resultado = $con->query($sql);
            $registrado = $resultado->fetch_assoc();
            ?>
            Llena el formulario para editar asistentes manualmente
            <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-registrado.php"
              class="formulario-editar">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre_registrado">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                    value="<?= $registrado['nombre_registrado']?>">
                </div>
                <div class="form-group">
                  <label for="apellido">Apellido</label>
                  <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido"
                    value="<?= $registrado['apellido_registrado'] ?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                    value="<?= $registrado['email_registrado'] ?>">
                </div>
                <hr>
                <?php 
                  $pedido = $registrado['pases_articulos'];
                  $boletos = json_decode($pedido, true);
                  // echo '<pre>';
                  // var_dump($boletos);
                  // echo '</pre>';
                ?>
                <div class="form-group">
                  <div id="paquetes" class="paquetes">
                    <h3>Elige el numero de boletos</h3>
                    <div class="row align-items-center">

                      <div class="col-md-4 tarjeta-precio text-center">
                        <h3>Pase por dia (viernes)</h3>
                        <p class="numero">$30</p>
                        <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las Conferencias</li>
                          <li>Todos los Talleres</li>
                        </ul>
                        <div class="orden">
                          <label for="pase_dia">Boletos deseados:</label>
                          <input type="number" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0"
                            class="form-control" value="<?= $boletos['un_dia'] ?>">
                          <input type="hidden" value="30" name="boletos[un_dia][precio]">
                        </div>
                      </div>

                      <div class="col-md-4 tarjeta-precio text-center">
                        <h3>Todos los dias</h3>
                        <p class="numero">$50</p>
                        <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las Conferencias</li>
                          <li>Todos los Talleres</li>
                        </ul>
                        <div class="orden">
                          <label for="pase_completo">Boletos deseados:</label>
                          <input type="number" id="pase_completo" size="3" name="boletos[completo][cantidad]"
                            placeholder="0" class="form-control" value="<?= $boletos['pase_completo'] ?>">
                          <input type="hidden" value="50" name="boletos[completo][precio]">
                        </div>
                      </div>

                      <div class="col-md-4 tarjeta-precio text-center">
                        <h3>Pase por 2 dias (viernes y sabado)</h3>
                        <p class="numero">$45</p>
                        <ul>
                          <li>Bocadillos Gratis</li>
                          <li>Todas las Conferencias</li>
                          <li>Todos los Talleres</li>
                        </ul>
                        <div class="orden">
                          <label for="pase_dosdias">Boletos deseados:</label>
                          <input type="number" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]"
                            placeholder="0" class="form-control" value="<?= $boletos['pase_2dias'] ?>">
                          <input type="hidden" value="45" name="boletos[2dias][precio]">
                        </div>
                      </div>

                    </div>
                  </div> <!-- Paquetes -->
                </div> <!-- FormGroup -->
                <hr>
                <div class="form-group">
                  <div id="eventos" class="eventos">
                    <h3>Elige tus talleres</h3>
                    <?php 
                      $eventos = $registrado['talleres_registrados'];
                      $id_eventos_registrados = json_decode($eventos, true);
                      // echo '<pre>';
                      // var_dump($id_eventos_registrados);
                      // echo '</pre>';
                    ?>
                    <div class="caja">
                      <?php
                      try {
                          $sql = "SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado
                          FROM eventos
                          JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria
                          JOIN invitados ON eventos.id_inv = invitados.invitado_id
                          ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento";

                          $resultado = $con->query($sql);
                          $eventos_dias = array();
                          while ($eventos = $resultado->fetch_assoc()) {
                            $fecha = $eventos['fecha_evento'];
                            setlocale(LC_ALL, 'es-MX');
                            $dia_semana = strftime("%A", strtotime($fecha));
                            $dia_semana = utf8_encode($dia_semana);

                            $categoria = $eventos['cat_evento'];
                            $dia = array(
                                'nombre_evento' => $eventos['nombre_evento'],
                                'hora' => $eventos['hora_evento'],
                                'id' => $eventos['clave'],
                                'nombre_invitado' => $eventos['nombre_invitado'],
                                'apellido_invitado' => $eventos['apellido_invitado'],
                            );
                            $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;
                          }
                          // echo "<pre>";
                          // var_dump($eventos_dias);
                          // echo "</pre>";

                      } catch (Exception $e) {
                          echo $e->getMessage();
                      }
                      ?>
                      <?php foreach($eventos_dias as $dia => $eventos): ?>
                      <div id="<?= str_replace('á', 'a', $dia) ?>" class="contenido-dia">
                        <h4 class="text-center nombre-dia"><?= $dia ?></h4>
                        <div class="tipo-evento row">
                          <?php foreach($eventos['eventos'] as $tipo => $evento_dia): ?>
                          <div class="col-md-4">
                            <p><?= $tipo ?>:</p>
                            <?php foreach($evento_dia as $evento): ?>
                            <label>
                              <input
                                <?= (in_array($evento['id'], $id_eventos_registrados['evento'])) ? 'checked' : '' ?>
                                type="checkbox" name="registro_evento[]" id="<?= $evento['id'] ?>"
                                value="<?= $evento['id'] ?>">
                              <time><?= $evento['hora'] ?></time>
                              <?= $evento['nombre_evento'] ?> <br>
                              <span class="autor">Autor:
                                <?= $evento['nombre_invitado'] . " " . $evento['apellido_invitado'] ?></span>
                            </label>
                            <?php endforeach; ?>
                          </div>
                          <?php endforeach; ?>
                        </div>
                      </div>
                      <!--#dia-->
                      <?php endforeach; ?>
                    </div>
                    <!--.caja-->
                  </div>
                  <!--#eventos-->
                </div>
                <!-- FormGroup -->
                <div class="form-group">
                  <div id="resumen" class="resumen">
                    <h3>Pago y Extras</h3>
                    <div class="caja row">
                      <div class="extras col-md-6">
                        <div class="orden">
                          <label for="camisa_evento">Camisa del Evento</label><small> (promocion 7% dto.)</small>
                          <input type="number" id="camisa_evento" name="pedido_extra[camisas][cantidad]" min="0"
                            size="3" placeholder="0" class="form-control" value="<?= $boletos['camisas'] ?>">
                          <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                        </div>

                        <div class="orden">
                          <label for="etiquetas">Paquete de 10 etiquetas $2</label><small> (HTML, CSS3, JavaScript,
                            Chrome)</small>
                          <input type="number" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" min="0" size="3"
                            placeholder="0" class="form-control" value="<?= $boletos['etiquetas'] ?>">
                          <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                        </div>

                        <div class="orden">
                          <label for="regalo">Seleccione un regalo</label>
                          <select id="regalo" name="regalo" required class="form-control select2">
                            <option value="">-Seleccione un regalo-</option>
                            <option value="2" <?= ($registrado['regalo'] == 2) ? 'selected' : '' ?>>Etiquetas</option>
                            <option value="1" <?= ($registrado['regalo'] == 1) ? 'selected' : '' ?>>Pulsera</option>
                            <option value="3" <?= ($registrado['regalo'] == 3) ? 'selected' : '' ?>>Plumas</option>
                          </select>
                        </div>
                        <br>
                        <input type="button" id="calcular" class="btn btn-success" value="Calcular">

                      </div>

                      <div class="total col-md-6">
                        <p>Resumen</p>
                        <div id="lista_productos">
                        </div>
                        <p>Total Ya Pagado: <?= $registrado['total_pagado'] ?></p>
                        <p>Total:</p>
                        <div id="suma_total">

                        </div>
                        <input type="hidden" name="total_pedido" id="total_pedido">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?= $registrado['id_registrado'] ?>">
                <input type="hidden" name="fecha_registro" value="<?= $registrado['fecha_registro'] ?>">
                <button type="submit" class="btn btn-primary" id="crear_registro">Actualizar</button>
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