<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>

<div class="mt-5 container-fluid">

      <div class="row">
        <div class="col-md-6 offset-md-2">
            <?php if(has_post_thumbnail()): ?>

                <img src="<?php the_post_thumbnail_url('blog-grande');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">

            <?php endif; ?>

            <?php if (have_posts()): while (have_posts()): the_post();?>

                <h1 class="singleh1"><strong><?php the_title(); ?></strong></h1>
                <p><?php echo get_the_date("d/m/Y h:i"); ?></p>
                <hr id="separadorsing">

                <p><?php the_content(); ?></p>


            <hr id="separadorsingaut">
          </div>
          <div class="col-md-3 offset-1 pagewrapside">
            <?php get_sidebar(); ?>
          </div>
        </div>

          <div class="row">
            <div class="col-md-6 offset-md-2 mb-3">
              <div class="float-left">


              <!-- Autor -->

              <?php
              $nombre = get_the_author_meta('first_name');
              $apellido = get_the_author_meta('last_name');
              ?>

              <p class="float-left mr-2 pr-2 border-right border-dark singlep">
                Autor:
                  <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php echo $nombre; ?> <?php echo $apellido; ?>
                  </a>
              </p>

            </div>

              <!-- Categorias (quitar) -->

              <div class="float-left pr-2 border-right border-dark">


                  <p class="mr-1 float-left">Categorias:</p>

                      <?php
                        $categoria = get_the_category();
                        foreach ($categoria as $cat):?>
                          <a href="<?php echo get_category_link($cat->term_id) ?>" class="badge badge-dark">
                            <?php echo $cat->name; ?>
                          </a>
                        <?php endforeach; ?>

                </div>
              <!-- <br> -->

              <!-- Tags -->

              <div class="float-left ml-1">



                <?php
                  $tags = get_the_tags('',' ');
                  if (!$tags):

                  else:
                  ?>
                  <p class="singlep">Tags:</p>
                  <?php
                  foreach ($tags as $tag):?>

                    <a href="<?php echo get_tag_link($tag->term_id);?>" class="badge badge-success">
                      <?php echo $tag->name;?>
                    </a>
                <?php endforeach; endif;?>

                </div>
              </div>
          </div>

        <!-- Comentarios -->
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <?php
               comments_template();
               // comment_form();
            ?>
            </div>
        </div>

      </div>

          <!-- <br><br> -->

      <?php endwhile; else: endif; ?>

      <?php wp_link_pages(); ?>

  </div>



<?php get_footer(); ?>
