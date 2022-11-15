<?php

if($pid) {

include ("config.php");
include ("connect.php");
$query = "SELECT pbindata FROM posts WHERE pid='$pid'";
$result = @MYSQL_QUERY($query);
$data = @MYSQL_RESULT($result,0,"pbindata");
$data1=imagecreatefromstring ($data);
imagejpeg($data1,"revs/mastika.jpg",80);
};
?>