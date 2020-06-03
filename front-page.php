<?php
get_header();
?>

<body>

  <header>
      <?php get_template_part("nav"); ?>
  </header>

  <div class="container-fluid h-auto containerdest">

    <div class="row">
      <div class="col-md-2 bg-light rounded-bottom tfp">
        <p class="pfp">Destacados</p>
      </div>
    </div>

    <div class="row h-100 align-items-center">

        <?php

        // the_post_thumbnail_url('blog-grande');

        echo do_shortcode( '[dest]' );

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

<div class="container-fluid h-auto">

  <div class="row">
    <div class="col-md-2 rounded-bottom tfp">
      <p class="pfp">Categorias</p>
    </div>
  </div>

  <div class="row mt-3 align-items-center">

        <!-- <p>Aqui van las categorias</p> -->

        <?php

          // $categorias = get_categories(array(
          //   'hide_empty' => false,
          //   'exclude' => array(Destacados, Posts)
          // ));
          // print_r($categorias);
          // foreach ($categorias as $categoria) {
          //   echo "<div class="col-md-4"><a href="'. get_category_link($category->term_id).'">' . $categoria->name . '</a></div>';";
          // }


        $excat = excluir_cat( 'category', [], ['sin-categoria, destacados'] );
        // $excat2 = excluir_cat( 'category', [], ['destacados'] );


        $categories = get_categories( array(
          'orderby' => 'name',
          'order' => 'DESC',
          'exclude' => $excat,
          'hide_empty' => 0));


        // print_r($excat);
        // print_r($categories);
        foreach ($categories as $categoria):

          $categoria_link = sprintf(
          '<a href="%1$s" alt="%2$s">%3$s</a>',
          esc_url( get_category_link( $categoria->term_id ) ),
          esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $categoria->name ) ),
          esc_html( $categoria->name )
        );

        // echo '<div class="col-md-4 col-sm-12">' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $categoria_link ) . '</div> ';
        ?>
        <div class="col-12 col-md-4 categorias">
          <img src="http://localhost/wordpress/wp-content/themes/PROJECT/img/cat.jpg"
          class="img-fluid mb-3 img-thumbnail">
          <p><?php echo $categoria->name; ?></p>
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

  <div class="container-fluid h-auto sform">
      <div class="row align-items-center h-100">
        <div class="col-12 text-center align-middle mt-5 mb-5">
          <?php
            get_search_form();
          ?>
        </div>
      </div>
    </div>


  <div class="container-fluid h-auto">
    <div class="row">
      <div class="col-md-2 rounded-bottom tfp">
        <p class="pfp">Autores</p>
      </div>
    </div>
    <div class="row align-items-center">

      <?php

        $usuarios = get_users();

        //CAMBIAR ENLACES A LAS CARDS

        // print_r($usuarios);
        foreach ($usuarios as $usuario):?>
        <?php //echo get_author_posts_url($usuario->ID); ?>
          <a href="<?php echo esc_url( get_author_posts_url($usuario->ID)); ?>" class='card col-12 col-md-3 mx-auto text-center align-middle m-5 autcard'>
            <div class='card-body'>
              <h4 class='card-title'><strong><?php echo $usuario->display_name; ?></strong> </h4>
              <hr class="titaut">
              <img src="http://localhost/wordpress/wp-content/themes/PROJECT/img/ibaiprueba.jpg" class="rounded-circle m-3 imagenaut">
              <p class="col-12 overflow-hidden text-justify mt-3">
                <?php echo get_the_author_meta("description", "$usuario->ID"); ?>
              </p>
              <hr class="titaut2">
              <p class="mt-3"><?php

              echo $usuario->roles[0];

              // if ($usuario->roles[0]=="author"):
              //
              //   echo __($usuario->roles[0], "Autor");
              //
              // else:
              //
              //
              //
              // endif;

              // echo $usuario->roles[0];


              ?></p>
            </div>
          </a>

        <?php
        endforeach;
        ?>
    </div>
    <?php
    $contaruser = new WP_User_Query( array( 'role' => 'author' ) );
    $totaluser = $contaruser->get_total();
    $joder = '3';

    if ($totaluser > $joder):
      echo 'So much authors: ' . $totaluser;
       ?>




    <?php
  endif;
  ?>
  </div>


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
