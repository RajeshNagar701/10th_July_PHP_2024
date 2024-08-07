
<?php
// api work 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");



$json=file_get_contents('https://jsonplaceholder.typicode.com/posts');

$phparr=json_decode($json); // json econvert to arr

print_r($phparr);

?>