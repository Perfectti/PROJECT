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
  wp_register_script('js', get_template_directory_uri()."/js/script.js", false, 1.1, true);
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


// Funcion para excluir categorias por el slug

function excluir_cat( $taxonomy = 'category', $args = [], $exclude = [] )
{
    if ( empty( $exclude ) || !is_array( $exclude ) )
        return get_terms( $taxonomy, $args );

    foreach ( $exclude as $value ) {

            $term_objects = get_term_by( 'slug', $value, $taxonomy );
            $term_ids[] = (int) $term_objects->term_id;

    }

    $excluded_ids = [
        'exclude' => $term_ids
    ];

    $merged_arguments = array_merge( $args, $excluded_ids );

    $terms = get_terms( $taxonomy, $merged_arguments );

    return $terms;
}

//Coge los post "sticky" (destacados) y con un shortcode podemos ponerlos en el front-page
function destacados(){

  $destacados = get_option('sticky_posts');

  rsort($destacados);

  $destacados = array_slice($destacados, 0, 3);

  $sql = new WP_Query (array(
    'post__in' => $destacados,
    'ignore_sticky_posts' => 1
  ));

  if ($sql->have_posts()){
    while($sql->have_posts()){
      $sql->the_post();

      $src =  get_the_ID();
      $imagen = wp_get_attachment_image_src( get_post_thumbnail_id($src), 'blog-grande' );

      $return .= '<div class="col-sm-12 col-md-4 mt-5 mb-5">
                    <a href="' .get_permalink(). '" class="titlelink">
                      <div class="postdest">
                        <img src="' .$imagen[0]. '" alt="' .get_the_title(). '"
                        class="img-fluid mb-3 img-thumbnail imgdest">
                        <div class="titlpost"><h3>' .get_the_title(). '</h3></div>
                      </div>
                    </a>
                  </div>';
    }
}else{
  echo "No hay post que mostrar";
}
wp_reset_postdata();

return $return;
}
add_shortcode('dest', 'destacados');


 ?>
