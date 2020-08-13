<?php get_header();
require_once __DIR__.'/helpers/CategoryParse.php'; ?>


<div class="home">
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
      <?php $sustainability_bg = $sustainability['bg_image'];
      if($sustainability_bg): ?>
        <figure class="sustainability-bg">
          <img src="<?= $sustainability_bg; ?>">
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
</div>

<?php get_template_part('components/map'); ?>

<?php $projects = get_posts(array(
  'post_type' => 'projetos' 
)); ?>

<?php query_posts('pagename=projetos'); if(have_posts()): ?>
<section class="projectsHome">
  <div class="container">
    <?php while(have_posts()):the_post(); ?>
      <div class="projectsHome-content">
        <h2 class="projectsHome-title"><?php the_title(); ?></h2>
        <div class="projectsHome-text">
          <?php the_field('home_text'); ?>
        </div>
      </div>
    <?php endwhile; ?>
    <div class="projectsHome-featuredProjects">
      <div class="projectsHome-featuredWrap">
        <?php foreach($projects as $project):
          $projectCategories = new CategoryParse(get_the_category($project->ID));  ?>
          <div class="projectHome-item">
            <div class="projectHome-content">
              <span class="projectHome-label"><?= $projectCategories->returnCategoriesAsText(); ?></span>
              <h3 class="projectHome-title"><?= get_the_title($project->ID); ?></h3>
              <span class="projectHome-location"><?= get_field('location', $project->ID); ?></span>
            </div>
            <figure class="projectHome-thumb">
              <img src="<?= get_the_post_thumbnail_url($project->ID); ?>" alt="">
            </figure>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; wp_reset_query(); ?>

<?php get_template_part('components/contact_form'); ?>


<?php get_footer() ?>