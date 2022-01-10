<?php include_once 'includes/templates/header.php'; ?>

<main>

  <section class="titulo-seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
    try {
      require_once('includes/funciones/bd_conexion.php');
      $sql = 'SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ';
      $sql .= ' FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria';
      $sql .= ' INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id ORDER BY evento_id';
      $res = $con->query($sql);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
    ?>

    <div class="calendario-eventos">
      <?php
      $calendario = array();
      while ($eventos = $res->fetch_assoc()) :

        $fecha = $eventos['fecha_evento'];

        $evento = array(
          'titulo' => $eventos['nombre_evento'],
          'fecha' => $eventos['fecha_evento'],
          'hora' => $eventos['hora_evento'],
          'categoria' => $eventos['cat_evento'],
          'icono' => 'fa' . " " . $eventos['icono'],
          'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
        );
        $calendario[$fecha][] = $evento;

      endwhile; ?>

      <?php //Imprime todos los eventos
      foreach ($calendario as $dia => $lista_eventos) : ?>
        <h3>
          <i class="fa fa-calendar"></i>
          <?php
          $fecha = strftime("%A, %d de %B del %Y", strtotime($dia));
          echo utf8_encode($fecha);
          ?>
        </h3>
        <?php
        foreach ($lista_eventos as $evento) : ?>
          <div class="dia">
            <p class="titulo"><?= utf8_encode($evento['titulo']) ?></p>
            <p class="hora"><i class="fa fa-clock" aria-hidden="true"></i> <?= $evento['fecha'] . " " . $evento['hora'] ?>
            </p>
            <p><i class="<?= $evento['icono'] ?>"></i> <?= $evento['categoria'] ?></p>
            <p><i class="fa fa-user"></i> <?= $evento['invitado'] ?></p>
          </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>

    <?php $con->close(); ?>
  </section>

</main>

<?php include_once 'includes/templates/footer.php'; ?>