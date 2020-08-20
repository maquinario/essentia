<?php get_header(); ?>

<?php if(have_posts()):while(have_posts()):the_post(); ?>

<section class="page">
  <div class="container">
    <div class="page-content">
      <h2 class="page-title"><?php the_title(); ?></h2>
      <div class="page-text">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

<?php endwhile; endif; ?>