<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>


<div class="container-fluid post-cards">
  <div class="row">
    <div class="col-12 col-md-6 offset-md-2">

  <?php
  if (have_posts()):
    while (have_posts()):
      the_post();?>

        <div class="card mb-3">
          <div class="card-header">
            <h3><a href="<?php the_permalink();?>" class="titlelinkindex"><?php the_title();?></a></h3>
          </div>
          <div class="card-body d-flex align-items-md-center flex-wrap">
              <?php if(has_post_thumbnail()): ?>
                  <img src="<?php the_post_thumbnail_url('index');?>" alt="<?php the_title();?>"
                  class="img-fluid img-thumbnail">
              <?php endif; ?>
              <div class="col-12 col-md-7"><?php the_excerpt(); ?></div>
          </div>
        </div>
    <?php endwhile; else: endif; ?>

      <?php previous_posts_link(); ?>
      <?php next_posts_link(); ?>
    </div>
    <!-- <div class="col-3 offset-1"> -->
      <?php //get_sidebar(); ?>
    <!-- </div> -->
  </div>
</div>
<?php get_footer(); ?>
