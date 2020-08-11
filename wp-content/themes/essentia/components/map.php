<?php
require_once __DIR__.'/../helpers/CategoryParse.php';

query_posts('post_type=projetos');
if(have_posts()): ?>
<section class="map">
  <div class="container">
    <div class="map-wrapper">
      <div class="map-projects">
        <ul class="map-list">
          <?php while(have_posts()):the_post();
          $category_parse = new CategoryParse(get_the_category($post->ID)); ?>
            <li
              data-coords="<?php the_field('coordinates'); ?>"
              class="map-item <?= $category_parse->createClassFromCategories(); ?>">
              <h3 class="map-itemTitle"><?php the_title(); ?></h3>
              <div class="map-itemLocation">
                <?php the_field('location'); ?>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; wp_reset_query(); ?>