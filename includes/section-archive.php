<!-- Loop para visualizar los posts. Si hay post, y mientras que haya post los muestra, poniendo el título y un breve resumen del mismo -->

<?php if (have_posts()): while (have_posts()): the_post();?>
  <div class="card mb-3">
    <div class="card-header">
      <h3><a href="<?php the_permalink();?>" class="titlelink"><?php the_title();?></a></h3>
    </div>
    <div class="card-body col-sm-8">
      <?php the_excerpt(); ?>
    </div>
  </div>
<?php endwhile; else: endif; ?>
