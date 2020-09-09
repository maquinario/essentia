<?php get_header(); ?>

<?php if(have_posts()):while(have_posts()):the_post();
$parent_id = $post->ID; ?>
<?php get_template_part('components/page_banner'); ?>
<?php get_template_part('components/page_headline'); ?>
<?php endwhile; endif; ?>

<?php if(have_rows('benefits')): ?>
  <section class="benefits">
    <div class="container">
      <div class="benefits-items">
        <ul class="benefits-list">
          <?php while(have_rows('benefits')):the_row(); ?>
            <li class="card">
              <figure class="card-image">
                <img src="<?php the_sub_field('image'); ?>" />
              </figure>
              <div class="card-content">
                <h4 class="card-title"><?php the_sub_field('title'); ?></h4>
                <?php the_sub_field('text'); ?> 
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php $actions = get_field('actions');
if($actions): ?>
<section class="sustainabilityActions">
  <div class="container">
    <h3 class="sustainabilityActions-title"><?= $actions['title']; ?></h3>
    <div class="sustainabilityActions-content">
      <?= $actions['text']; ?>
    </div>
    <div class="sustainabilityActions-list">
      <?= $actions['list']; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if(have_rows('text_blocks')): ?>
  <div class="textBlocks">
    <?php while(have_rows('text_blocks')):the_row(); ?>
      <section class="textBlock">
        <div class="container">
          <h3 class="textBlock-title"><?php the_sub_field('title'); ?></h3>
          <div class="textBlock-content">
            <?php the_sub_field('text'); ?>
          </div>
        </div>
      </section>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

<?php get_template_part('components/contact_form'); ?>
<?php get_footer(); ?>