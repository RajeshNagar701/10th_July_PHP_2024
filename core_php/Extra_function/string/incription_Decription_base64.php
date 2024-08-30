<?php

// encription & decription function


$text="abc";
echo $encpass=base64_encode($text);
echo "<br>";
echo $decpass=base64_decode($encpass);
echo "<br>";

echo $md5enc=md5($text);

echo "<br>";

echo $sha1enc=sha1($text);
?>  