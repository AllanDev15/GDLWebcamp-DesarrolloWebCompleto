<footer class="site-footer">

  <div class="contenido-footer">
    <div class="footer-informacion">
      <h3>Sobre <span>gdlwebcamp</span></h3>
      <p>Aliquam aliquet luctus lacus eget aliquam. Nullam rutrum justo varius nulla eleifend, et venenatis quam
        imperdiet. Nullam elit risus, aliquet non mattis vel, pharetra vitae ligula. Proin tincidunt viverra lectus, a
        euismod ipsum feugiat vitae. Nam faucibus urna eget mauris gravida, vel interdum ante consequat. Etiam
        condimentum risus vitae ipsum fermentum luctus et eleifend sem. Nulla laoreet sed elit ut pharetra. In hac
        habitasse platea dictumst. Fusce ac bibendum nisl, in consectetur leo</p>
    </div>

    <div class="ultimos-tweets">
      <h3>Ultimos <span>Tweets</span></h3>
      <a class="twitter-timeline" data-height="400" href="https://twitter.com/FL_Allan?ref_src=twsrc%5Etfw">Tweets by
        FL_Allan</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>

    <div class="footer-menu">
      <h3>Redes <span>Sociales</span></h3>
      <div class="social-media">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-pinterest-p"></i>
        <i class="fab fa-youtube"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </div>
  </div>

  <div class="copyright">
    <p></p>
  </div>

</footer>



<!-- <script src="js/vendor/modernizr-3.8.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write(
    "<script src= 'https: //code.jquery.com/jquery-3.4.1.min.js' integrity = 'sha256 - CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=' crossorigin = 'anonymous' > <\/script>"
  )
</script>
<script src="js/plugins.js"></script>
<!-- Leaflet -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="anonymous"></script>
<!-- AnimateNumber -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha512-WY7Piz2TwYjkLlgxw9DONwf5ixUOBnL3Go+FSdqRxhKlOqx9F+ee/JsablX84YBPLQzUPJsZvV88s8YOJ4S/UA==" crossorigin="anonymous"></script>
<!-- CountDown -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous"></script>
<!-- Lettering -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js" integrity="sha512-9ex1Kp3S7uKHVZmQ44o5qPV6PnP8/kYp8IpUHLDJ+GZ/qpKAqGgEEH7rhYlM4pTOSs/WyHtPubN2UePKTnTSww==" crossorigin="anonymous"></script>

<?php
$archivo = basename($_SERVER['PHP_SELF']);
$pagina = str_replace(".php", "", $archivo);

if ($pagina == 'invitados' || $pagina == 'index') {
  /* ColorBox */
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js" integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A==" crossorigin="anonymous"></script>';
} else if ($pagina == 'conferencia') {
  /* LightBox */
  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>';
}
?>

<script src="js/main.js"></script>
<script src="js/cotizar.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
  window.ga = function() {
    ga.q.push(arguments)
  };
  ga.q = [];
  ga.l = +new Date;
  ga('create', 'UA-XXXXX-Y', 'auto');
  ga('set', 'transport', 'beacon');
  ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>

<?php
// Guarda todo el contenido a un archivo
$fp = fopen($archivoCache, 'w');
fwrite($fp, ob_get_contents());
fclose($fp);
// Enviar al navegador
ob_end_flush();
?>

</body>

</html>