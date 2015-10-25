<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accarda
 */

?>


<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <img src="<?php echo esc_url( home_url() ); ?> /assets/images/holding-hands.svg" class="decoration-holding-hands">
        <p class="motto">Together for our future</p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-push-6">
        <ul class="list-inline social-links">
          <li><div class="social-link-label">Folgt uns:</div></li>
          <li><a href="" class="social-link"><span class="icon-linkedin2"></span></a></li>
          <li><a href="" class="social-link"><span class="icon-ico-arrow"></span></a></li>
          <li><a href="" class="social-link"><span class="icon-ico-a"></span></a></li>
        </ul>
      </div>

      <div class="col-xs-12 col-sm-6 col-sm-pull-6">
        <ul class="list-inline footer-links">
          <li class="footer-link"><a href="">Staertseite</a></li>
          <li class="footer-link"><a href="">Mitmachen</a></li>
          <li class="footer-link"><a href="">Redaktion</a></li>
          <li class="footer-link"><a href="">Kontakt</a></li>
          <li class="footer-link"><a href="">Impressum</a></li>
        </ul>
        <p class="copyright">&copy; 2015 Accarda AG, Alle Rechte vorbehalten </p>
      </div>
    </div>
  </div>


</footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo esc_url( home_url() ); ?> /assets/javascripts/vendors/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="<?php echo esc_url( home_url() ); ?> /assets/javascripts/vendors/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( home_url() ); ?> /assets/javascripts/site.min.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>



