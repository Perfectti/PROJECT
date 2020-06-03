<div class="col-12 comments">

  <?php

  global $current_user;
  wp_get_current_user();

  $commargs = array(
    'label_submit' => 'Enviar',
    'comment_field' => '<p class="comment-form-comment"><textarea id="comm" name="comment" placeholder="Escribe aquí tu comentario..."></textarea></p>',
    'id_submit' => 'commsub',
    'class_submit' => 'btn btn-primary rounded-pill',
    'logged_in_as' => '<p class="loggedas">Conectado como '.$current_user->user_login.'</p>'

  );

  comment_form($commargs); ?>

  <?php if (have_comments()):?>

    <h2 class="comtitulo">
      <?php
        $numcom = get_comments_number();
        echo "Hay ". $numcom ." comentario/s";
       ?>
    </h2>

    <hr>

    <ul class="comlista">
        <?php
          wp_list_comments(array(
            'style' => 'ul',
            'avatar_size' => 35,
          ));
         ?>
    </ul>

    <?php //if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>

      <!-- <nav class="navigation comment-navigation" role="navigation">
        <h3 class="screen-reader-text section-heading"><?php //_e( 'Comment navigation', 'twentythirteen' ); ?></h3>
        <div class="nav-previous"><?php //previous_comments_link( __( '&amp;larr; Older Comments', 'twentythirteen' ) ); ?></div>
        <div class="nav-next"><?php //next_comments_link( __( 'Newer Comments &amp;rarr;', 'twentythirteen' ) ); ?></div>
      </nav> -->

    <?php //endif; ?>

    <div class="paginacion">
      <?php paginate_comments_links(); ?>
    </div>

  <?php endif; ?>
</div>
