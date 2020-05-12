<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>

<div class="container">
    <h1><?php the_title(); ?></h1>

    <?php get_template_part("includes/section","blogcontent");?>
</div>


<?php get_footer(); ?>
