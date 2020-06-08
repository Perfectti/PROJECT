<?php
get_header();
?>

<body>

  <header>
      <?php get_template_part("nav"); ?>
  </header>

<!-- DESTACADOS -->

  <div class="container-fluid h-auto containerdest">

    <div class="row">
      <div class="col-md-2 rounded-bottom border-bottom border-right tfp">
        <p class="pfp">Destacados</p>
      </div>
    </div>

    <div class="row h-100 align-items-center">

        <?php

        echo do_shortcode( '[dest]' );

        //Para poner los sticky post como una categoría mas
        //
        // $args = array(
        //   'posts_per_page' => 3,
        //   'cat' => get_cat_ID('Destacados'));
        //
        // $query = new WP_Query($args);
        //
        // if ($query->have_posts()):
        //   while ($query->have_posts()):
        //     $query->the_post();

         ?>
         <!-- <div class="col-sm-12 col-md-4 mt-5 mb-5">
              <a href="<?php //the_permalink();?>" class="titlelink">
                <div class="postdest">
                  <img src=" //the_post_thumbnail_url('blog-grande');?>" alt="<?php //the_title();?>"
                  class="img-fluid mb-3 img-thumbnail imgdest">
                  <div class="titlpost"><h3><?php //the_title();?></h3></div>
                </div>
              </a>
        </div> -->

      <?php
        // endwhile;
        // endif;
      ?>
    </div>
</div>

<!-- CATEGORIAS -->

<div class="container-fluid h-auto">

  <div class="row">
    <div class="col-md-2 rounded-bottom border-bottom border-right tfp">
      <p class="pfp">Categorias</p>
    </div>
  </div>

  <div class="row mt-3 align-items-center">

        <?php

        $excat = excluir_cat( 'category', [], ['sin-categoria, destacados'] );

        $categories = get_categories( array(
          'orderby' => 'name',
          'order' => 'DESC',
          'exclude' => $excat,
          'hide_empty' => 0));


        // print_r($excat);
        // print_r($categories);
        foreach ($categories as $categoria):

          $imgcat = get_term_meta($categoria->cat_ID, '_pagetitle', true);
          $link = get_category_link($categoria->cat_ID);

        ?>
        <div class="col-12 col-md-4 categorias">
          <div class="imgwrap">
          <?php echo '<a href="'.esc_url( $link ).'" class="catlink">'; ?>

              <?php if (!$imgcat): ?>
                <img src="http://localhost/wordpress/wp-content/themes/PROJECT/img/default.jpg"
                class="img-fluid mb-3 img-thumbnail imgcate">
              <?php else: ?>
                <img src="<?php echo $imgcat; ?>"
                class="img-fluid mb-3 img-thumbnail imgcate">
              <?php endif; ?>
                <div class="negrocat">
                </div>
          <?php echo '</a>'; ?>
          </div>
              <div class="inscat">
                <p class="catname"><strong><?php echo $categoria->name; ?></strong></p>
              </div>

        </div>

        <?php
        endforeach;

       ?>
</div>

    <?php
      // endwhile;
      // endif;
    ?>
  </div>

<!-- BUSCAR -->

  <div class="container-fluid h-auto sform">
      <div class="row align-items-center h-100">
        <div class="col-12 text-center align-middle mt-5 mb-5">
          <?php
          get_search_form('main_search');
          ?>
        </div>
      </div>
    </div>

<!-- AUTORES -->


  <div class="container-fluid h-auto">
    <div class="row">
      <div class="col-md-2 rounded-bottom border-bottom border-right tfp">
        <p class="pfp">Autores</p>
      </div>
    </div>
    <div class="row align-items-center">

      <?php

        $usuarios = get_users(array(
          'orderby' => 'rand',
        ));

        foreach ($usuarios as $usuario):?>
          <a href="<?php echo esc_url( get_author_posts_url($usuario->ID)); ?>" class='card col-12 col-md-3 mx-auto text-center align-middle m-5 autcard'>
            <div class='card-body'>
              <h4 class='card-title'><strong><?php echo $usuario->display_name; ?></strong> </h4>
              <hr class="titaut">
              <?php
              //Si la funcion del avatar no es "null" entonces se pone el enlace de ese avatar, si no se pone el de por defecto de Wordpress
              if (!get_the_author_meta('avatar', $usuario->ID)) :?>
                <img src="<?php echo get_avatar_url($usuario->ID);?>" class="rounded-circle m-3 imagenaut">
              <?php else: ?>
                <img src="<?php echo get_the_author_meta('avatar', $usuario->ID);?>" class="rounded-circle m-3 imagenaut">
              <?php endif; ?>
              <p class="col-12 overflow-hidden text-justify mt-3">
                <?php echo get_the_author_meta("description", "$usuario->ID"); ?>
              </p>
              <hr class="titaut2">
              <p class="mt-3"><?php

              //Comprueba que rol es y lo traduce
              if ($usuario->roles[0]=="author"):
                echo str_replace("author", "Autor", $usuario->roles[0]);
              elseif ($usuario->roles[0]=="administrator"):
                echo str_replace("administrator", "Administrador", $usuario->roles[0]);
              endif;

              ?></p>
            </div>
          </a>

        <?php
        endforeach;
        ?>
    </div>
    <?php
    // $contaruser = new WP_User_Query( array( 'role' => 'author' ) );
    // $totaluser = $contaruser->get_total();
    // $joder = '3';
    //
    // if ($totaluser > $joder):
    //   echo 'So much authors: ' . $totaluser;
       ?>

    <?php
  // endif;
  ?>
  </div>

<!-- CONTACTO -->

  <div class="container-fluid h-auto contcontact">
      <div class="row align-items-center h-100 transblack">
          <div class="col-12 text-center align-middle mt-5 mb-5 divcont">
            <p id="sugerencia">¿Alguna sugerencia? ¡Contacta con nosotros!</p>
            <a href="<?php echo get_page_link(get_page_by_title('Contacto')-> ID); ?>"
              class="btn tocontact">Contacto &rarr;</a>
          </div>
        </div>
  </div>

<?php get_footer(); ?>
