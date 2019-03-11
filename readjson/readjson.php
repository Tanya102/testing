<?php
$str=file_get_contents("sample.json");
$array=json_decode($str,true);
echo"<pre>";
print_r($array);
return;
?>