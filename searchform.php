<form action="<?php echo get_home_url(); ?>" method="get" id="buscform">
  <label for="s">¿Buscas algo?</label>
  <br>
  <input type="text" placeholder="Buscar..." name="s" id="busctext" value="<?php the_search_query();?>" required>
  <br>
  <br>
  <button type="submit" name="buscbutton" class="btn" id="botonbusc">Buscar</button>
</form>
