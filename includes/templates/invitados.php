<section class="titulo-seccion contenedor">
  <?php 
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = 'SELECT * FROM invitados';
                    $res = $con->query($sql);
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            ?>

  <section class="contenedor-invitados titulo-seccion">
    <h2>Nuestros Invitados</h2>
    <ul class="lista-invitados">
      <?php while($invitados = $res->fetch_assoc()): ?>

      <li class="invitado">
        <a class="invitado_info" href="#invitado<?= $invitados['invitado_id']; ?>">
          <img src="img/invitados/<?= $invitados['url_imagen'] ?>" alt="<?= $invitados['nombre_invitado']?>">
          <p><?= $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></p>
        </a>
      </li>

      <div style="display:none">
        <div id="invitado<?= $invitados['invitado_id'] ?>" class="cbox">
          <h2><?= $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'] ?></h2>
          <img src="img/invitados/<?= $invitados['url_imagen'] ?>" alt="<?= $invitados['url_imagen'] ?>">
          <p><?= $invitados['descripcion'] ?></p>
        </div>
      </div>

      <?php endwhile; ?>
    </ul>
  </section>

  <?php $con->close(); ?>
</section>