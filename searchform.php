<form name="formbusc" action="<?php echo get_home_url(); ?>" method="get" onsubmit="return validarform()" id="buscform">
  <label for="s">¿Buscas algo?</label>
  <br>
  <input type="text" placeholder="Buscar..." name="s" id="busctext" value="<?php the_search_query();?>">
  <br>
  <br>
  <button type="submit" name="buscbutton" class="btn" id="botonbusc">Buscar</button>
</form>
