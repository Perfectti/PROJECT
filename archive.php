<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>
  <div class="container post-cards">
    <?php get_template_part("includes/section","archive"); ?>


    <?php previous_posts_link(); ?>
    <?php next_posts_link(); ?>
  </div>



<?php get_footer(); ?>
