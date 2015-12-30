<?php
function makeTooltip($title,$data){
  echo '<a tabindex="0" class="btn btn-link" role="button" data-toggle="popover" placement="bottom" data-trigger="focus"';
  echo 'title="'.$title.'"';
  echo 'data-content="'.$data.'">';
  echo '<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>';
  echo '</a>';
}
?>
