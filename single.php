<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>

<div class="mt-5 container">

      <?php if(has_post_thumbnail()): ?>

          <img src="<?php the_post_thumbnail_url('blog-grande');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">

      <?php endif; ?>


      <h1><?php the_title(); ?></h1>

      <?php if (have_posts()): while (have_posts()): the_post();?>

          <p><?php echo get_the_date("d/m/Y h:i"); ?></p>

          <?php the_content(); ?>

          <br>
          <hr id="separadorsing">

          <div class="container">
            <div class="row">
              <div class="float-left">


              <!-- Autor -->

              <?php
              $nombre = get_the_author_meta('first_name');
              $apellido = get_the_author_meta('last_name');
              ?>

              <p class="float-left mr-2 pr-2 border-right border-dark singlep">Autor:
                <?php echo $nombre; ?> <?php echo $apellido; ?>
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

                <p class="singlep">Tags:</p>

                <?php
                  $tags = get_the_tags('',' ');
                  foreach ($tags as $tag):?>

                    <a href="<?php echo get_tag_link($tag->term_id);?>" class="badge badge-light">
                      <?php echo $tag->name;?>
                    </a>
                <?php endforeach; ?>

                </div>
            </div>

            <!-- Comentarios -->
            <div class="float-right">


                <?php
                  // comments_template();
                ?>

            </div>
        </div>
      </div>

          <!-- <br><br> -->

      <?php endwhile; else: endif; ?>

      <?php wp_link_pages(); ?>

  </div>



<?php get_footer(); ?>
