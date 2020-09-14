<?php get_header();
require_once __DIR__ . '/helpers/CategoryParse.php';
?>

<?php
if (have_posts()):
  while (have_posts()):

    the_post();
    $parent_id = $post->ID;
    ?>
<?php get_template_part('components/page_banner'); ?>
<?php
get_template_part('components/page_headline');
$projects = get_posts(['post_type' => 'projetos']);
?>

<section class="projects">
  <div class="container">
    <div class="projects-featuredProjects">
      <div class="projects-featuredWrap">
        <?php foreach ($projects as $project):
          $projectCategories = new CategoryParse(
            get_the_category($project->ID)
          ); ?>
          <div class="cardProject">
            <div class="cardProject-content">
              <span class="cardProject-label"><?= $projectCategories->returnCategoriesAsText() ?></span>
              <h3 class="cardProject-title"><?= get_the_title(
                $project->ID
              ) ?></h3>
              <span class="cardProject-location"><?= get_field(
                'location',
                $project->ID
              ) ?></span>
            </div>
            <figure class="cardProject-thumb">
              <img src="<?= get_the_post_thumbnail_url($project->ID) ?>" alt="">
            </figure>
          </div>
        <?php
        endforeach; ?>
      </div>
    </div>
  </div>
</section>
      <?php
  endwhile;
endif;
wp_reset_query();
?>


<?php get_template_part('components/contact_form'); ?>
<?php get_footer(); ?>
