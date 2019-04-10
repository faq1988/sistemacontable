  <?php
    if(count($css_to_load)>0){
      foreach ($css_to_load as  $css) {
        echo "<link href='{$css}' rel='stylesheet'>";
      }
    }
   ?>

  <?php
    if(count($js_to_load)>0){
      foreach ($js_to_load as  $js) {
        echo    "<script src='{$js}'></script>";
      }
    }
   ?>
~       
