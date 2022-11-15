<?php
if($zid & $wht) {

include ("config.php");
include ("connect.php");

    $query = "SELECT bindata,filetype FROM $wht WHERE id='$zid'";
    $result = @MYSQL_QUERY($query);
    if (@MYSQL_RESULT($result,0,"filetype")==null) {
    $type='image/png';
    $data=imagecreatefrompng ('images/noicon.png');
     imagepng($data);
    } else {
    $data = @MYSQL_RESULT($result,0,"bindata");
    $type = @MYSQL_RESULT($result,0,"filetype");
          Header( "Content-type: $type");
    echo $data;

  }

};
?>