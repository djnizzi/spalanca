<?php
include ("config.php");
include ("connect.php");
$query = "SELECT pbindata,pfiletype FROM posts WHERE pid='$pid'";
    $result = @MYSQL_QUERY($query);
    $data = @MYSQL_RESULT($result,0,"pbindata");
    $type = @MYSQL_RESULT($result,0,"pfiletype");

    Header( "Content-type: $type");
    echo $data;
?>