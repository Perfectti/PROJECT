<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarsing">
  <span class="navbar-toggler-icon"></span>
</button> -->
<div class="sidewrap" id="sidebarsing">
  <div class="mb-3 stickdside">
    <h4><strong><u>Featured</u></strong></h4>
    <table>
      <?php echo do_shortcode( '[destside]' ); ?>
    </table>
  </div>

  <hr class="sidehr">

  <div class="mt-3 searchformside">
    <?php
    add_filter('get_search_form', 'extra_search');
    get_search_form('extra_search');
    remove_filter('get_search_form', 'extra_search');
    ?>
  </div>
</div>
