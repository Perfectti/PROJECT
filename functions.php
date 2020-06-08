<?php

// Opciones del tema

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

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
add_image_size('index', 300, 200, true);
add_image_size('blog-pequeño', 120, 75, false);


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
                        class="img-fluid imgdest">
                        <div class="negro">
                          <div class="titlpost text-md-left text-center"><h3 class="titulounderline">' .get_the_title(). '</h3></div>
                        </div>
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

//Igual que la función de arriba pero para el sidebar (diferente HTML/CSS)

function destacadosside(){

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
      $imagen = wp_get_attachment_image_src( get_post_thumbnail_id($src), 'blog-pequeño' );



      $return .= '<tr class="destrow">
                    <td><a href="' .get_permalink(). '" class="linkdestside"><img src="' .$imagen[0]. '" alt="' .get_the_title(). '"></a></td>
                    <td><a href="' .get_permalink(). '" class="linkdestside"><p class="titlside">' .get_the_title(). '</p></a></td>
                  </tr>';


    }
}else{
  echo "No hay post que mostrar";
}

wp_reset_postdata();

return $return;
}
add_shortcode('destside', 'destacadosside');


//Añade un campo en el perfil de un usuario para cambiar el avatar localmente

function cambiarAvatar($user){ ?>
  <h3>Información Extra</h3>

  <table class="table">
    <tr>
      <th><label for="avatar">User Avatar URL</label></th>
      <td>
        <input type="text" name="avatar" id="avatar"
        value="<?php echo esc_attr(get_the_author_meta('avatar', $user->ID)); ?>"
        class="regular-text"><br>
        <span class="description">Pon la url de tu avatar</span>
      </td>
    </tr>
  </table>
<?php }
add_action('show_user_profile', 'cambiarAvatar');
add_action('edit_user_profile', 'cambiarAvatar');

function editar($user_id){
  if (!current_user_can('edit_user', $user_id)) {
    return_false;
  }else {
    update_user_meta($user_id, 'avatar', $_POST['avatar']);
  }
}
add_action('personal_options_update', 'editar');
add_action('edit_user_profile_update', 'editar');



function sidebars(){
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>'
  ));
}
add_action('widgets_init', 'sidebars');

function main_search( $form ) {
    $form = '<form name="formbusc" action="'. home_url('/') .'" method="get" id="buscform">';
    $form .= '<label for="s">¿Buscas algo?</label>';
    $form .= '<br>';
    $form .= '<input type="text" placeholder="Buscar..." name="s" id="busctext" value="'. the_search_query() .'">';
    $form .= '<br>';
    $form .= '<br>';
    $form .= '<button type="submit" name="buscbutton" class="btn" id="botonbusc">Buscar</button>';
    $form .= '</form>';
    return $form;
}
add_filter('get_search_form', 'main_search');

function extra_search( $formside ) {
    $formside = '<form name="formbuscside" action="'. home_url('/') .'" method="get" id="buscformside">';
    $formside .= '<label for="s">Buscar posts</label>';
    $formside .= '<br>';
    $formside .= '<input type="text" placeholder="Buscar..." name="s" id="busctextside" value="'. the_search_query() .'">';
    $formside .= '<br>';
    $formside .= '<br>';
    $formside .= '<button type="submit" name="buscbutton" class="btn" id="botonbuscside">Buscar</button>';
    $formside .= '</form>';
    return $formside;
}


function addTitleFieldToCat(){
    $catimage = get_term_meta($_POST['tag_ID'], '_pagetitle', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="cat_page_title"><?php echo 'URL Imagen'; ?></label></th>
        <td>
        <input type="text" name="cat_title" id="cat_title" value="<?php echo $catimage ?>"><br />
            <span class="description"><?php echo 'URL de la imagen para la categoria'; ?></span>
        </td>
    </tr>
    <?php

}
add_action ( 'edit_category_form_fields', 'addTitleFieldToCat');

function saveCategoryFields() {
    if ( isset( $_POST['cat_title'] ) ) {
        update_term_meta($_POST['tag_ID'], '_pagetitle', $_POST['cat_title']);
    }
}
add_action ( 'edited_category', 'saveCategoryFields');

 ?>
