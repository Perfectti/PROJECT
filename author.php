<?php
get_header();

$nomaut = get_the_author_meta("first_name");
$apaut = get_the_author_meta("last_name");

$idaut = get_the_author_meta("ID");

?>

<body>

  <header>
    <?php get_template_part("nav"); ?>
  </header>

  <div class="container mt-3">
    <div class="row align-items-center">
      <div class="col-12 col-md-3 border-right boder-dark text-center">
        <!-- Cambiar -->
        <img src="../../wp-content/themes/PROJECT/img/ibaiprueba.jpg" style="width:250px; height:250px;">
      </div>
      <div class="col-12 col-md-9">
        <h1 class="text-center mt-2 h1nomaut">
          <?php echo $nomaut; ?> <?php echo $apaut; ?>
        </h1>
      </div>
    </div>
      <div class="row">
        <p class="col-12 overflow-hidden text-justify mt-3">
          <?php echo get_the_author_meta("description"); ?>
        </p>
      </div>
      <hr id="separadoraut">
    </div>

    <div class="container mt-5 ">
      <?php

        $args = array(
          "author" => $idaut
        );


        $sql = new WP_Query($args);


        if($sql->have_posts()):
          while($sql->have_posts()):
            $sql->the_post();?>

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
      <?php
          endwhile;

        else:

          echo "no hay posts";


        endif;
       ?>
    </div>



<?php get_footer(); ?>
