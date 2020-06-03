<?php
/*Template Name: Contacto*/
?>

<?php
get_header();
?>

<body>
  <header>
    <?php get_template_part("nav"); ?>
  </header>
  <div class="container-fluid h-auto">
    <div class="row h-100 align-items-center">
      <div class="col-12 col-md-6">
        <form class="formcont" action="index.html" method="post">
          <div><label for="nUsu">Nombre</label><input type="text" name="nUsu"></div>
          <div><label for="aUsu">Apellidos</label><input type="text" name="aUsu"></div>
          <div><label for="eUsu">Email</label><input type="email" name="eUsu"></div>
        </form>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
