<?php

if(isset($conid) && isset($entid)){
include ("conconfig.php");
include ("../connect.php");
include ("../cookie.php");
$result=mysql_query("select style from contest WHERE id='$conid'");
$condir=@MYSQL_RESULT($result,0,"style");
?>
<html>
<head>
<title>|contest|dot|spalanca|dot|com|</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo $condir; ?>/contest.css" rel="stylesheet" type="text/css">
<?php
print ("<table border=0 cellpadding=0 cellspacing=0><tr><td><img src=$condir/spacer.gif  width=21 height=21></td><td></td></tr><tr><td></td><td><img src=$conid/$entid-entry.jpg></td></tr></table>");
} ?>


