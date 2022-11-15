<?php
    $query = "SELECT id,filename FROM users WHERE id='$thisuid'";
    $resultuid = @MYSQL_QUERY($query);
    if (@MYSQL_RESULT($resultuid,0,"filename")=='') {
    $avatarurl='<img class=userthumb border=0 src=images/noicon.png>';
    } else {
    $avatarurl='<img class=userthumb border=0 src=avatars/'.rawurlencode(preg_replace("/[^A-Za-z0-9 ]/", '', @MYSQL_RESULT($resultuid,0,"id"))).'-'.rawurlencode(@MYSQL_RESULT($resultuid,0,"filename")).'>';  



  }
?>