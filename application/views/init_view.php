
 
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
 <?php
      if(count($constants)>0){
        echo "<script>";
        foreach ($constants as $k=> $c) {
          if(array_keys($c) !== range(0, count($c) - 1)){//array indexado
            $t = JSON_ENCODE($c);
            echo "var _{$k}={$t};";
          }
          elseif(is_array($c)){//array
            // $temp = array_map('js_str', $c);
            $t = '["' . implode('","', $c) . '"]';
            echo "var _{$k}={$t};";
          }
          else{
            echo "var _{$k}={$c};";
          }
        }
        echo "</script>";
      }
  ?>
