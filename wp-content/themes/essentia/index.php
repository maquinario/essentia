<?php get_header();
require_once __DIR__.'/helpers/CategoryParse.php'; ?>

<?php query_posts('pagename=home'); 
if(have_posts()):while(have_posts()):the_post(); ?>

<?php $banner = get_field('banner'); ?>
<section class="bannerHome">
  <figure class="bannerHome-image">
    <?php $image = $banner['image'];
    if($image): ?><img src="<?= $image['url']  ?>" alt="<?= $image['title'] ?>"><?php endif; ?>
  </figure>
  <div class="bannerHome-content">
    <h2 class="bannerHome-title"><?= $banner['title'];?></h2>
  </div>
</section>

<?php $sustainability = get_field('sustainability');
if($sustainability): ?>
<section class="sustainabilityHome">
  <div class="container">
    <div class="sustainabilityHome-content">
      <h2 class="sustainabilityHome-title"><?= $sustainability['title']; ?></h2>
      <div class="sustainabilityHome-text">
        <?= $sustainability['text']; ?>
      </div>
    </div>
    <?php $sustainability_image = $sustainability['image']; 
    if($sustainability_image): ?>
      <figure class="sustainability-image">
        <img
          src="<?= $sustainability_image['url']  ?>"
          alt="<?= $sustainability_image['title'] ?>"
        >
      </figure>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>

<?php if(have_rows('statistics')): ?>
<section class="statistics">
  <div class="container">
    <div class="statistics-container">
      <ul class="statistics-list">
        <?php while(have_rows('statistics')):the_row() ?>
          <li class="statistic">
            <i class="statistic-icon">
              <img 
                src="<?php the_sub_field('icon'); ?>" 
                alt="Ícone"
              >
            </i>
            <strong class="statistic-title">
              <?php the_sub_field('title'); ?>
            </strong>
            <p class="statistic-description">
              <?php the_sub_field('description'); ?>
            </p>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endwhile; endif; ?>

<?php get_template_part('components/map'); ?>


<?php get_footer() ?>