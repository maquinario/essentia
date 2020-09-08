<?php get_header(); ?>

<?php if(have_posts()):while(have_posts()):the_post();
$parent_id = $post->ID; ?>
<?php get_template_part('components/page_banner'); ?>
<?php get_template_part('components/page_headline'); ?>
<?php endwhile; endif; ?>

<?php query_posts('post_type=page&order=menu_order&order=ASC&post_parent='.$parent_id);
if(have_posts()): ?>
  <section class="aboutChildren">
    <div class="container">
      <div class="aboutChildren-items">
        <ul class="aboutChildren-list">
          <?php while(have_posts()):the_post(); ?>
            <li class="aboutCard">
              <figure class="aboutCard-image">
                <?php the_post_thumbnail(); ?>
                <h4 class="aboutCard-title"><?php the_title(); ?></h4>
              </figure>
              <div class="aboutCard-content">
                <?php the_content(); ?>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_template_part('components/contact_form'); ?>
<?php get_footer(); ?>