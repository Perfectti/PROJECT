<?php

// Añade JQuery, Bootstrap.js/css/min.css y mi archivo de style propio

// function agrega_jq(){
//   wp_enqueue_script('jquery');
// }

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

// Añade un fichero para usar bootstrap con la siguiente función de abajo

require_once('wp-bootstrap-navwalker.php');

// Habilita una zona para que el usuario cree un menu

add_theme_support('menus');

register_nav_menus(

  array(
    'navmenu' => 'Barra de Navegación',
  )

);

// function register_my_menu() {
// register_nav_menu('menuprincipal',__( 'Menu Principal' ));
// }
// add_action( 'init', 'register_my_menu' );

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

 ?>
