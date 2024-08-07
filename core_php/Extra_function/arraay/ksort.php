<?php

$a=array("b"=>"ishita","a"=>"raj","c"=>"nagar"); // key sort accendind order

ksort($a);     // key sort accending order a-z
print_r($a);

echo "<br>";
krsort($a);     // key sort deccending order z-a
print_r($a);

?>