<?php
get_header();

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
print_r($curauth);

// $nomaut = get_the_author_meta("first_name");
// $apaut = get_the_author_meta("last_name");
//
// $idaut = get_the_author_meta("ID");

?>

<body>

  <header>
    <?php get_template_part("nav"); ?>
  </header>

  <div class="container mt-3">
    <div class="row align-items-center">
      <div class="col-12 col-md-3 border-right boder-dark text-center">
        <?php
        //Si la funcion del avatar no es "null" entonces se pone el enlace de ese avatar, si no se pone el de por defecto de Wordpress
        if (!get_the_author_meta('avatar', $curauth->ID)) :?>
          <img src="<?php echo get_avatar_url($curauth->ID);?>" class="rounded-circle m-3 imagenaut">
        <?php else: ?>
          <img src="<?php echo get_the_author_meta('avatar', $curauth->ID);?>" class="rounded-circle m-3 imagenaut">
        <?php endif; ?>
      </div>
      <div class="col-12 col-md-9">
        <h1 class="text-center mt-2 h1nomaut">
          <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?>
        </h1>
      </div>
    </div>
      <div class="row">
        <p class="col-12 overflow-hidden text-justify mt-3">
          <?php echo get_the_author_meta("description", $curauth->ID); ?>
        </p>
      </div>
      <hr id="separadoraut">
    </div>

    <div class="container h-auto mt-5 ">
      <div class="row text-center">
      <?php

        // $args = array(
        //   "author" => $idaut
        // );


        // $sql = new WP_Query($args);


        if(have_posts()):
          while(have_posts()):
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

      <?php
          endwhile;

        else:?>
          <h2 class="h2aut">Aún no hay posts de este autor.</h3>

<?php
        endif;
       ?>
       </div>
    </div>



<?php get_footer(); ?>
