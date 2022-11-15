<?php
if($tid) {

include ("config.php");
include ("connect.php");

    $query = "SELECT sm_flag FROM te_teams WHERE sm_tid='$tid'";
    $result = @MYSQL_QUERY($query);
    $data = @MYSQL_RESULT($result,0,"sm_flag");
    $type = "image/gif";
          Header( "Content-type: $type");
    echo $data;


};
?>