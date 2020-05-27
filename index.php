<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>


<div class="container col-7 post-cards">

  <?php
  if (have_posts()):
    while (have_posts()):
      the_post();?>

      <div class="card mb-3">
        <div class="card-header">
          <h3><a href="<?php the_permalink();?>" class="titlelinkindex"><?php the_title();?></a></h3>
        </div>
        <div class="card-body d-flex justify-content-center align-items-center col-sm-12">
            <?php if(has_post_thumbnail()): ?>
                <img src="<?php the_post_thumbnail_url('blog-pequeño');?>" alt="<?php the_title();?>"
                class="img-fluid mb-3 img-thumbnail mr-4">
            <?php endif; ?>
            <?php the_excerpt(); ?>
        </div>
      </div>
  <?php endwhile; else: endif; ?>

    <?php previous_posts_link(); ?>
    <?php next_posts_link(); ?>

</div>
<?php get_footer(); ?>
