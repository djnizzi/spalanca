<?php
if($tid) {

include ("config.php");
include ("connect.php");

    $query = "SELECT tc_flag FROM t4_teams WHERE tc_tid='$tid'";
    $result = @MYSQL_QUERY($query);
    $data = @MYSQL_RESULT($result,0,"tc_flag");
    $type = "image/gif";
          Header( "Content-type: $type");
    echo $data;


};
?>