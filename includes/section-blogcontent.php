<?php if (have_posts()): while (have_posts()): the_post();?>

    <p><?php echo get_the_date("d/m/Y h:i"); ?></p>

    <?php the_content(); ?>

    <?php
    $nombre = get_the_author_meta('first_name');
    $apellido = get_the_author_meta('first_name');
    ?>

    <p>Autor: </p> <?php echo $nombre; ?> <?php echo $apellido; ?>

    <?php
    $tags = get_the_tags();

    foreach ($tags as $tag):?>

      <a href="<?php echo get_tag_link($tag->term_id);?>">
        <?php echo $tag->name;?>
      </a>
<?php endwhile; else: endif; ?>
