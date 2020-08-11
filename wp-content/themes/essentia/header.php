<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>
  <link id="page_favicon" href="<?php bloginfo('template_url')?>/favicon.png" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" href="https://use.typekit.net/kav0jnw.css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <?php wp_head(); ?>
</head>
<body>

<header>
  <div class="container">
    <h1 class="logo">
      <a href="<?php site_url(); ?>"><?php bloginfo('name') ?></a>
    </h1>
    <nav class="social">
      <?php $linkedin = get_field('linkedin', 'option'); 
      if($linkedin): ?><a href="<?= $linkedin; ?>" target="_blank" class="icon-linkedin" rel="noreferrer noopener">Linkedin</a><?php endif; ?>
    </nav>
  </div>
</header>