<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):

    the_post();
    $parent_id = $post->ID;
    ?>
<?php get_template_part('components/page_banner'); ?>
<?php get_template_part('components/page_headline'); ?>
<?php
  endwhile;
endif; ?>

<?php get_template_part('components/contact_form'); ?>
<?php get_footer(); ?>
