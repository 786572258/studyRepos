<?php
//²âÊÔ SplObjectStorageÓÃ·¨
function debug($d) {
	echo '<pre>';
	print_r($d);
}
// As an object set
$s = new SplObjectStorage();
$o1 = new StdClass;
$o2 = new StdClass;
$o3 = new StdClass;

$s->attach($o1);
$s->attach($o2);

$s->rewind();
while($s->valid()) {
	debug($s->key());
	$s->next();
}


exit;
echo $s->count();
debug();
exit;
var_dump($s->contains($o1));
exit;
var_dump($s->contains($o2));
var_dump($s->contains($o3));

$s->detach($o2);

var_dump($s->contains($o1));
var_dump($s->contains($o2));
var_dump($s->contains($o3));



?>