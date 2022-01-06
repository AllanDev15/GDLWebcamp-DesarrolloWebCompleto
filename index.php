<?php include_once './includes/templates/header.php'; ?>

<main>
  <div class="titulo-seccion seccion">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat aliquid minus sit delectus magnam, iste
      eveniet ex mollitia sed, unde, a laborum culpa maiores omnis quaerat voluptates vitae accusantium aut.</p>
  </div>

  <div class="programa">
    <div class="contenedor-video">
      <video autoplay loop>
        <!-- poster="img/bg-talleres.jpg" -->
        <source src="video/video.mp4" type="video/mp4">
      </video>
      <source src="video/video.webm" type="video/webm"></video>
      <source src="video/video.ogv" type="video/ogv"></video>
    </div>


    <div class="contenido-programa" style="max-height: 1000px;">
      <div class="titulo-seccion">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>
          <?php
          try {
            require_once('./includes/funciones/bd_conexion.php');
            $sql = "SELECT * FROM categoria_evento";
            $resultado = $con->query($sql);
          } catch (Exception $e) {
            $error = $e->getMessage();
          }
          ?>
          <nav class="menu-programa">
            <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) : ?>
              <?php $categoria = $cat['cat_evento']; ?>
              <a href="#<?= strtolower($categoria) ?>"><i class="<?= $cat['icono'] ?>"></i> <?= $categoria ?></a>
            <?php endwhile; ?>
          </nav>

          <?php
          try {
            // require_once('./includes/funciones/bd_conexion.php');

            // Este codigo primero consulta cuantas categorias hay
            $sql = 'SELECT id_categoria FROM categoria_evento';
            $ids = $con->query($sql);

            $sql = " ";
            while ($idCategoria = $ids->fetch_assoc()['id_categoria']) {
              // Aqui creamos varias consultar separadas por ';' para cada tipo de categoria existente y/o creada
              $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado
                FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria
                INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = $idCategoria ORDER BY evento_id LIMIT 2; ";
            }

            // Este codigo solo consultaba para 3 categorias pero no funcionaba si agregabamos mas categorias desde GDLWebcamp Admin

            /*$sql = 'SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ';
              $sql .= ' FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria';
              $sql .= ' INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = 1  ORDER BY evento_id LIMIT 2;';

              $sql .= ' SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado ';
              $sql .= ' FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria';
              $sql .= ' INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = 2 ORDER BY evento_id LIMIT 2;';

              $sql .= ' SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado ';
              $sql .= ' FROM eventos INNER JOIN categoria_evento ON eventos.id_cat_evento = categoria_evento.id_categoria';
              $sql .= ' INNER JOIN invitados ON eventos.id_inv = invitados.invitado_id AND eventos.id_cat_evento = 3 ORDER BY evento_id LIMIT 2;';*/
            // $res = $con->query($sql);
          } catch (Exception $e) {
            echo $e->getMessage();
          }
          ?>

          <?php $con->multi_query($sql);
          ?>

        </div>
      </div>
    </div>
  </div>

  <?php include_once './includes/templates/invitados.php'; ?>

  <div class="contador parallax">
    <ul class="resumen-evento">
      <li>
        <p class="numero"></p> Invitados
      </li>
      <li>
        <p class="numero"></p> Talleres
      </li>
      <li>
        <p class="numero"></p> Dias
      </li>
      <li>
        <p class="numero"></p> Conferencias
      </li>
    </ul>
  </div>

  <section class="contenedor titulo-seccion">
    <h2>Precios</h2>
    <div class="contenedor-precios">

      <div class="tarjeta-precio">
        <h3>Pase por dia</h3>
        <p class="numero">$30</p>
        <ul>
          <li>Bocadillos Gratis</li>
          <li>Todas las Conferencias</li>
          <li>Todos los Talleres</li>
        </ul>
        <a href="registro.php" class="button hollow">Comprar</a>
      </div>

      <div class="tarjeta-precio">
        <h3>Todos los dias</h3>
        <p class="numero">$50</p>
        <ul>
          <li>Bocadillos Gratis</li>
          <li>Todas las Conferencias</li>
          <li>Todos los Talleres</li>
        </ul>
        <a href="registro.php" class="button">Comprar</a>
      </div>

      <div class="tarjeta-precio">
        <h3>Pase por 2 dias</h3>
        <p class="numero">$45</p>
        <ul>
          <li>Bocadillos Gratis</li>
          <li>Todas las Conferencias</li>
          <li>Todos los Talleres</li>
        </ul>
        <a href="registro.php" class="button hollow">Comprar</a>
      </div>

    </div>
  </section>


  <div id="mapa" class="mapa"></div>

  <section class="titulo-seccion">
    <h2>Testimoniales</h2>
    <div class="contenedor-testimoniales">

      <div class="testimonial">
        <blockquote>
          <p>Ut auctor, est non finibus gravida, nisi eros ullamcorper metus, tincidunt malesuada odio orci id
            neque.
            Nunc sollicitudin id orci nec ornare Orci varius natoque penatibus et magnis dis parturient montes,
            nascetur ridiculus mus. Etiam semper id nisi ut suscipit.</p>
          <footer class="info-testimonial">
            <img src="img/testimonial.jpg" alt="Imagen Testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>

      <div class="testimonial">
        <blockquote>
          <p>Ut auctor, est non finibus gravida, nisi eros ullamcorper metus, tincidunt malesuada odio orci id
            neque.
            Nunc sollicitudin id orci nec ornare Orci varius natoque penatibus et magnis dis parturient montes,
            nascetur ridiculus mus. Etiam semper id nisi ut suscipit.</p>
          <footer class="info-testimonial">
            <img src="img/testimonial.jpg" alt="Imagen Testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>

      <div class="testimonial">
        <blockquote>
          <p>Ut auctor, est non finibus gravida, nisi eros ullamcorper metus, tincidunt malesuada odio orci id
            neque.
            Nunc sollicitudin id orci nec ornare Orci varius natoque penatibus et magnis dis parturient montes,
            nascetur ridiculus mus. Etiam semper id nisi ut suscipit.</p>
          <footer class="info-testimonial">
            <img src="img/testimonial.jpg" alt="Imagen Testimonial">
            <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
          </footer>
        </blockquote>
      </div>
    </div>

  </section>

  <div class="newsletter parallax">
    <div class="contenido-newsletter">
      <p>Registrate al Newsletter</p>
      <h3>GDLWEBCAMP</h3>
      <a href="#" class="button transparent">Registro</a>
    </div>
  </div>

  <div class="contenedor-cuenta-regresiva titulo-seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva">
      <ul class="contenido-cuenta-regresiva">
        <li>
          <p id="dias" class="numero"></p> dias
        </li>
        <li>
          <p id="horas" class="numero"></p> horas
        </li>
        <li>
          <p id="minutos" class="numero"></p> minutos
        </li>
        <li>
          <p id="segundos" class="numero"></p> segundos
        </li>
      </ul>
    </div>
  </div>

</main>
<?php include_once './includes/templates/footer.php'; ?>