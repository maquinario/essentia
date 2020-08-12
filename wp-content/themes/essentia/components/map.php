<?php
require_once __DIR__.'/../helpers/CategoryParse.php';

query_posts('post_type=projetos');
if(have_posts()): ?>

  <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css' rel='stylesheet' />
<section class="map">
  <div class="container">
    <h2 class="map-title">Onde já estamos</h2>
    <div class="map-wrapper">
      <div class="map-container" id='map'></div>
      <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2NvZGVsZXIiLCJhIjoiY2oxM2xreTg3MDFpMzJxbWtwZ3NxZ283ZiJ9.RIJfFLm_d-8CGMxKZlUT9A';
        const map = new mapboxgl.Map({
        container: 'map',
        zoom: 4,
        center: [-52.973120, -8.810450],
        localse: 'pt-BR',
        style: 'mapbox://styles/scodeler/ckdrei5qy0w6b19o318hejfwv'
        });
      </script>
      <div class="map-projects">
        <ul class="map-list">
          <?php while(have_posts()):the_post();
          $category_parse = new CategoryParse(get_the_category($post->ID)); ?>
            <li
              data-coords="<?php the_field('coordinates'); ?>"
              class="map-item <?= $category_parse->createClassFromCategories(); ?>">
              <i class="map-icon"></i>
              <div class="map-contentWrap">
                <h3 class="map-itemTitle"><?php the_title(); ?></h3>
                <div class="map-itemLocation">
                  <?php the_field('location'); ?>
                </div>
              </div>
            </li>
            <?php $coords = get_field('coordinates'); ?>
            <script>
              const marker<?= $post->ID; ?> = new mapboxgl.Marker({
                scale: 1.2,
                color: '#56C5D0',
              })
              marker<?= $post->ID; ?>.setLngLat([<?= $coords['longitude'] ?>, <?= $coords['latitude'] ?>])
              marker<?= $post->ID; ?>.addTo(map);
              console.log(marker<?= $post->ID; ?>.getElement())
            </script>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; wp_reset_query(); ?>