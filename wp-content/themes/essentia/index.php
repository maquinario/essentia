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
    <h2 class="bannerHome-title"><?php echo $banner['title']; ?></h2>
  </div>
</section>

<?php endwhile; endif; ?>


<?php get_footer() ?>