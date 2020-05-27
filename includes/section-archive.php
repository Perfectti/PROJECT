<!-- Loop para visualizar los posts. Si hay post, y mientras que haya post los muestra,
poniendo el título y un breve resumen del mismo -->

      <div class="card mb-3">
        <div class="card-header">
          <h3><a href="<?php the_permalink();?>" class="titlelink"><?php the_title();?></a></h3>
        </div>
        <div class="card-body col-sm-8">
          <div class="">

          </div>
          <?php if(has_post_thumbnail()): ?>

              <img src="<?php the_post_thumbnail_url('blog-pequeño');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail">

          <?php endif; ?>
          <?php the_excerpt(); ?>
        </div>
      </div>
