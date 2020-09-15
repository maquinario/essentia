<?php $banner = get_field('banner', $post->ID);
if ($banner): ?>
<section class="pageBanner">
  <div class="container">
    <div class="pageBanner-content">
      <h2 class="pageBanner-title"><?= $banner['title'] ?></h2>
      <div class="pageBanner-text">
        <?= $banner['text'] ?>
      </div>
    </div>
    <figure class="pageBanner-image">
      <?php $image = $banner['image']; ?>
      <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
    </figure>
  </div>
</section>
<?php endif; ?>
