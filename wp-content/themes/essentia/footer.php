<footer>
  <div class="container">
    <h2 class="footer-logo"><?php bloginfo('name'); ?></h2>
    <nav class="footer-menu">
      <a href="<?= site_url(); ?>/etica-e-integridade">Ética e Integridade</a>
    </nav>
    <ul class="footer-contact">
      <li class="footer-contactInfo contact-phone">
        <i class="contactIcon-phone"></i>
        <p><?php the_field('phone', 'option'); ?></p>
      </li>
      <li class="footer-contactInfo contact-email">
        <i class="contactIcon-email"></i>
        <p><?php the_field('email', 'option'); ?></p>
      </li>
      <li class="footer-contactInfo contact-address">
        <i class="contactIcon-address"></i>
        <?php $address = get_field('address', 'option'); ?>
        <p><?= $address['street']; ?><br>
        <?= $address['address_detail']; ?><br>
        <?= $address['neighborhood']; ?>, <?= $address['city']; ?> - <?= $address['state']; ?><br>
        CEP <?= $address['zipcode']; ?></p>
      </li>
    </ul>

    <div class="patria">
      <img src="<?php bloginfo('template_url'); ?>/img/patria-blackstone.png" alt="Pátria - in partnership with Blackstone">
    </div>

    <div class="copyright">
      <p>Essentia Energia &copy; 2020.  Todos os direitos reservados</p>
    </div>
    <div class="signature">
      <a href="https://estudiomaquinario.com.br" target="_blank">Desenvolvido por Maquinário</a>
    </div>

  </div>
</footer>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-30834803-39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-30834803-39');
</script>
<?php wp_footer(); ?>  
</body>
</html>