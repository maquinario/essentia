<?php $headline = get_field('headline');
if($headline): ?>
<section class="pageHeadline">
  <div class="container">
    <h4 class="pageHeadline-text"><?= $headline ?></h4>
  </div>
</section>
<?php endif; ?>