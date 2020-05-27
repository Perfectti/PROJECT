<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>

  <div class="container-fluid h-auto containerdest">

    <div class="row">
      <div class="col-md-2 bg-light rounded-bottom tdest">
        <p class="pdest">Destacados</p>
      </div>
    </div>

    <div class="row h-100 align-items-center">

        <?php

        $args = array(
          'posts_per_page' => 3,
          'cat' => get_cat_ID('Destacados'));

        $query = new WP_Query($args);

        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();

         ?>
         <div class="col-sm-12 col-md-4 mt-5 mb-5">
            <!-- <div class="degradado"> -->
              <a href="<?php the_permalink();?>" class="titlelink">
                <div class="postdest">
                  <img src="<?php the_post_thumbnail_url('blog-grande');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail imgdest">
                  <div class="content-fluid degradado"></div>
                  <div class="titlpost"><h3><?php the_title();?></h3></div>
                </div>
              </a>
            <!-- </div> -->
        </div>

      <?php
        endwhile;
        endif;
      ?>
    </div>
</div>

<div class="container-fluid h-50">
  <div class="row align-items-center">

      <div class="categorias">
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


        $categories = get_categories( array(
          'orderby' => 'name',
          'order' => 'DESC',
          'hide_empty' => 0));



          foreach ($categories as $categoria):
            $categoria_link = sprintf(
            '<a href="%1$s" alt="%2$s">%3$s</a>',
            esc_url( get_category_link( $categoria->term_id ) ),
            esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $categoria->name ) ),
            esc_html( $categoria->name )
          );

          echo '<div class="col-md-4 col-sm-12">' . sprintf( esc_html__( 'Category: %s', 'textdomain' ), $categoria_link ) . '</div> ';




          endforeach;

         ?>
       </div>
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


  <div class="container-fluid h-100">
    <?php
      $argsaut =  array(
        'show_fullname' => 1,
        'feed_image' => 1
      );

      $autores = wp_list_authors($argsaut);

      foreach ($autores as $autor):
        echo '<div class="col-md-4 col-sm-12">' . sprintf($autor) . '</div>';
      endforeach;
     ?>
  </div>


  <div class="container-fluid h-auto contcontact">
      <div class="row align-items-center h-100 transblack">
        <!-- <div class="h-100 w-100 align-items-center transblack"> -->
          <div class="col-12 text-center align-middle mt-5 mb-5 divcont">
            <p id="sugerencia">¿Alguna sugerencia? ¡Contacta con nosotros!</p>
            <a href="<?php echo get_page_link(get_page_by_title('Contacto')-> ID); ?>" class="btn tocontact">Contacto &rarr;</a>
          </div>
        </div>
    <!-- </div> -->
  </div>

<?php get_footer(); ?>
