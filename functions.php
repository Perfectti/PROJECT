<?php

// Opciones del tema

add_theme_support('menus');
add_theme_support('post-thumbnails');

// Añade JQuery, Bootstrap.js/css/min.css y mi archivo de style propio

function agrega_bjs(){
  wp_enqueue_script('jquery');
  wp_register_script('bootstrapjs', get_template_directory_uri()."/lib/bootstrap/js/bootstrap.min.js", 'jquery');
  wp_enqueue_script('bootstrapjs');
}
add_action('wp_enqueue_scripts', 'agrega_jq');
add_action('wp_enqueue_scripts', 'agrega_bjs');

function agrega_bs(){
  wp_register_style('bootstrap', get_template_directory_uri()."/lib/bootstrap/css/bootstrap.css");
  wp_enqueue_style('bootstrap');
}
add_action('wp_enqueue_scripts', 'agrega_bs');

function agrega_bsmin(){
  wp_register_style('bootstrapmin', get_template_directory_uri()."/lib/bootstrap/css/bootstrap.min.css");
  wp_enqueue_style('bootstrapmin');
}
add_action('wp_enqueue_scripts', 'agrega_bsmin');

function agrega_css(){
  wp_register_style('style', get_template_directory_uri()."/style.css");
  wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'agrega_css');

function agrega_js(){
  wp_register_script('js', get_template_directory_uri()."/js/script.js");
  wp_enqueue_script('js');
}
add_action('wp_enqueue_scripts', 'agrega_js');

// Añade un fichero para usar bootstrap con la siguiente función de abajo

require_once('wp-bootstrap-navwalker.php');

// Habilita una zona para que el usuario cree un menu

register_nav_menus(

  array(
    'navmenu' => 'Barra de Navegación',
  )

);

// Logo personalizado

function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 60,
 'width'       => 60,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// Esto es una mierda
// function nextpage_style($nextplink){
//   $nextplink = '<a class="linkbutton">'.$nextplink.'</a>';
//   return $nextplink;
// }
// add_filter('get_next_posts_link','nextpage_style');



// function limitar_tags($terms){
//   return array_slice($terms,0,3,true);
// }
// add_filter('term_links-post_tag','limitar_tags');


//Imagenes
add_image_size('blog-grande', 1280, 960, false);
add_image_size('blog-pequeño', 300, 200, true);

 ?>
