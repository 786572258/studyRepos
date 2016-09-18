<?php
function xrange($start, $end, $step = 1) {
  for ($i = $start; $i <= $end; $i += $step) {
    yield $i;
  }
}

/*$x = xrange(1, 1000000);
pirnt_r($x);
exit;*/
foreach (xrange(1, 1000000) as $num) {
  echo $num, "\n";
}