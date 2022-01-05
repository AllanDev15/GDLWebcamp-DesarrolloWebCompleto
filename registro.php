<?php include_once 'includes/templates/header.php'; ?>

<section class="titulo-seccion contenedor">
  <h2>Registro de Usuarios</h2>

  <form id="registro" class="registro" action="validar_registro.php" method="POST">

    <div id="datos_usuario" class="registro caja">
      <div>
        <div class="campo nombre">
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" />
          <p>*</p>
        </div>

        <div class="campo apellido">
          <label for="apellido">Apellido:</label>
          <input type="text" name="apellido" id="apellido" placeholder="Tu Apellido" />
          <p>*</p>
        </div>

        <div class="campo email">
          <label for="email">E-mail:</label>
          <input type="text" name="email" id="email" placeholder="Tu Email" />
          <p>*</p>
        </div>
      </div>

      <div id="error"> </div>
    </div>

    <div id="paquetes" class="paquetes">
      <h3>Elige el numero de boletos</h3>
      <div class="contenedor-precios">

        <div class="tarjeta-precio">
          <h3>Pase por dia (viernes)</h3>
          <p class="numero">$30</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las Conferencias</li>
            <li>Todos los Talleres</li>
          </ul>
          <div class="orden">
            <label for="pase_dia">Boletos deseados:</label>
            <input type="number" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
            <input type="hidden" value="30" name="boletos[un_dia][precio]">
          </div>
        </div>

        <div class="tarjeta-precio">
          <h3>Todos los dias</h3>
          <p class="numero">$50</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las Conferencias</li>
            <li>Todos los Talleres</li>
          </ul>
          <div class="orden">
            <label for="pase_completo">Boletos deseados:</label>
            <input type="number" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
            <input type="hidden" value="50" name="boletos[completo][precio]">
          </div>
        </div>

        <div class="tarjeta-precio">
          <h3>Pase por 2 dias (viernes y sabado)</h3>
          <p class="numero">$45</p>
          <ul>
            <li>Bocadillos Gratis</li>
            <li>Todas las Conferencias</li>
            <li>Todos los Talleres</li>
          </ul>
          <div class="orden">
            <label for="pase_dosdias">Boletos deseados:</label>
            <input type="number" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
            <input type="hidden" value="45" name="boletos[2dias][precio]">
          </div>
        </div>

      </div>
    </div>


    <div id="eventos" class="eventos">
      <h3>Elige tus talleres</h3>
      <div class="caja">

        <?php
        try {
          require_once 'includes/funciones/bd_conexion.php';
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
        <?php foreach ($eventos_dias as $dia => $eventos) : ?>
          <div id="<?= str_replace('á', 'a', $dia) ?>" class="contenido-dia">
            <h4><?= $dia ?></h4>
            <div class="tipo-evento">
              <?php foreach ($eventos['eventos'] as $tipo => $evento_dia) : ?>
                <div>
                  <p><?= $tipo ?>:</p>
                  <?php foreach ($evento_dia as $evento) : ?>
                    <label>
                      <input type="checkbox" name="registro[]" id="<?= $evento['id'] ?>" value="<?= $evento['id'] ?>">
                      <time><?= $evento['hora'] ?></time>
                      <?= $evento['nombre_evento'] ?> <br>
                      <span class="autor">Autor: <?= $evento['nombre_invitado'] . " " . $evento['apellido_invitado'] ?></span>
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

    <div id="resumen" class="resumen">
      <h3>Pago y Extras</h3>
      <div class="caja">
        <div class="extras">
          <div class="orden">
            <label for="camisa_evento">Camisa del Evento</label><small> (promocion 7% dto.)</small>
            <input type="number" id="camisa_evento" name="pedido_extra[camisas][cantidad]" min="0" size="3" placeholder="0">
            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
          </div>

          <div class="orden">
            <label for="etiquetas">Paquete de 10 etiquetas $2</label><small> (HTML, CSS3, JavaScript,
              Chrome)</small>
            <input type="number" id="etiquetas" name="pedido_extra[etiquetas][cantidad]" min="0" size="3" placeholder="0">
            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
          </div>

          <div class="orden">
            <label for="regalo">Seleccione un regalo</label>
            <select id="regalo" name="regalo" required>
              <option value="">-Seleccione un regalo-</option>
              <option value="2">Etiquetas</option>
              <option value="1">Pulsera</option>
              <option value="3">Plumas</option>
            </select>
          </div>
          <input type="button" id="calcular" class="button" value="Calcular">

        </div>

        <div class="total">
          <p>Resumen</p>
          <div id="lista_productos">

          </div>
          <p>Total:</p>
          <div id="suma_total">

          </div>
          <input type="hidden" name="total_pedido" id="total_pedido">
          <div id="paypal-button-container"></div>
          <!-- <input type="button" value="Probar" id="prueba"> -->
        </div>
      </div>
    </div>
    <div class="contenedor pay-example-info">
      <div class="caja">
        <p>El pago, es ficticio puedes probarlo con la siguiente cuenta de ejemplo: </p>
        <p>Email: <span>sb-fnudu2734329@personal.example.com</span></p>
        <p>Contraseña: <span>CrI77R@w</span> </p>
      </div>
    </div>
  </form>

</section>

<script src="https://www.paypal.com/sdk/js?client-id=AYw0iXuWjy78KVY0_ttEXIIYgVIjrxDgXcVkKdFIlo4NmdTsBTFD3698ddiiVz7IkXH-guae0xuzWE8w&currency=MXN">
</script>


<?php include_once 'includes/templates/footer.php'; ?>