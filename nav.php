<nav class="navbar navbar-light navbar-expand-md bg-light">
  <div class="navbar-brand border-right boder-dark logowrap">
    <?php
    if (function_exists('the_custom_logo')){
         the_custom_logo();
         }
    ?>
     </div>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcoll">
       <span class="navbar-toggler-icon"></span>
     </button>
    <?php
      wp_nav_menu(
        array(
          'theme_location' => 'navmenu', //Localización del menu, que hemos puesto en functions.php
          'container_class' => 'collapse navbar-collapse', //Class del container, por defecto es un div
          'container_id' => 'navbarcoll', //Id del container, necesario para el boton responsive
          'menu_class' => 'navbar navbar-nav links', //Class de elemento ul de los links
          'fallback_cb' => 'wp_bootstrap_navwalker::fallback', //Fallback añade un enlace para crear un menú si no existe, en este caso lo coge de la librería de abajo
          'walker' => new wp_bootstrap_navwalker() //Libreria externa que sirve para usar bootstrap en este menú
        )
      );
    ?>

    <!-- <div class="buscar">
      <?php
      // get_search_form();
      ?>
    </div> -->

</nav>
