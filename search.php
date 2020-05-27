<?php
get_header();
?>

<body>
  <header>
      <?php get_template_part("nav"); ?>
  </header>


  <div class="container col-6 post-cards">
    <div id="wraptitulo">
      <h2 id="result">Resultados para "<?php echo get_search_query();?>"</h2>
      <hr id="separadorsearch">
    </div>

     <?php
        if(have_posts()):
            while (have_posts()):
              the_post();
      ?>


      <?php get_template_part("includes/section","archive"); ?>

      <?php endwhile; else: endif; ?>

    <?php previous_posts_link(); ?>
    <?php next_posts_link(); ?>

    <div class="wrapcontador">

    <?php

    // Funcion para que salgan el numero de post buscados

    $postenc = $wp_the_query->post_count;

    switch ($postenc) {
      case '0':
        echo "No se han encontrado resultados";
        break;

      case '1':
        echo "Un resultado encontrado";
        break;

      default:
        echo "$postenc posts encontrados";
        break;
      }
      ?>

      </div>

  </div>



<?php get_footer(); ?>
