<?php get_header(); ?>

<?php query_posts('pagename=home'); 
if(have_posts()):while(have_posts()):the_post(); ?>

<?php $banner = get_field('banner'); ?>
<section class="bannerHome">
  <figure class="bannerHome-image">
    <?php $image = $banner['image'];
    if($image): ?><img src="<?php echo $image['url']  ?>" alt="<?php echo $image['title'] ?>"><?php endif; ?>
  </figure>
  <div class="bannerHome-content">
    <h2 class="bannerHome-title"><?php echo $banner['title'];?></h2>
  </div>
</section>

<?php $sustainability = get_field('sustainability');
if($sustainability): ?>
<section class="sustainabilityHome">
  <div class="container">
    <div class="sustainabilityHome-content">
      <h2 class="sustainabilityHome-title"><?php echo $sustainability['title']; ?></h2>
      <div class="sustainabilityHome-text">
        <?php echo $sustainability['text']; ?>
      </div>
    </div>
    <?php $sustainability_image = $sustainability['image']; 
    if($sustainability_image): ?>
      <figure class="sustainability-image">
        <img
          src="<?php echo $sustainability_image['url']  ?>"
          alt="<?php echo $sustainability_image['title'] ?>"
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


<?php get_footer() ?>