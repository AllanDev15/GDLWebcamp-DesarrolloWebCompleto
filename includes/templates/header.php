<?php
// Definir un nombre para cachear
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);
//Linux
setlocale(LC_ALL, 'es_ES');
//Windows
// setlocale(LC_TIME, 'spanish');

// Definir archivo para cachear (puede ser .php también)
$archivoCache = 'cache/' . $pagina . '.html';
// Cuanto tiempo deberá estar este archivo almacenado
$tiempo = 18000;
// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
  include($archivoCache);
  exit;
}
// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
ob_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/ed62067c9a.js" crossorigin="anonymous"></script>
  <!-- Normalize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
  <?php
  $archivo = basename($_SERVER['PHP_SELF']);
  $pagina = str_replace(".php", "", $archivo);

  if ($pagina == 'invitados' || $pagina == 'index') {
    // Colorbox
    echo '<link rel="stylesheet" href="css/colorbox.css">';
  } else if ($pagina == 'conferencia') {
    // LightBox
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />';
  }

  ?>
  <!-- Leaflet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?= $pagina ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="contenedor-header">
    <div class="contenido-header">
      <div class="social-media">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-pinterest-p"></i>
        <i class="fab fa-youtube"></i>
        <i class="fab fa-instagram"></i>
      </div>

      <div class="info-evento">
        <div class="fecha">
          <i class="far fa-calendar-alt"></i>
          <p> 10-12 DIC</p>
        </div>
        <div class="ubicacion">
          <i class="fas fa-map-marker-alt"></i>
          <p> Guadalajara, MX</p>
        </div>
      </div>

      <h1 class="nombre-sitio">GDLWEBCAMP</h1>
      <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
    </div>
  </header>

  <div class="barra">
    <div class="contenido-barra">

      <div class="logo">
        <a href="index.php">
          <img src="img/logo.svg" alt="logo gdlwebcamp">
        </a>
      </div>

      <div class="menu-mobile">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div>
  </div>