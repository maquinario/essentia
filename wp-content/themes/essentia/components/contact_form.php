<?php query_posts('pagename=contato'); if(have_posts()): while(have_posts()):the_post(); ?>
<section class="contactForm">
  <div class="container">
    <h2 class="contactForm-title"><?php the_title(); ?></h2>
    <div class="contactForm-content">
      <?php the_content(); ?>
    </div>
  </div>
</section>
<?php endwhile; endif; wp_reset_query(); ?>