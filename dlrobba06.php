<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
?>
<head>
<title>|spalanca|dot|com|</title>
<link rel="stylesheet" href="images/1/dlrobba.css" type="text/css">
<script type='text/javascript' src='mashiro.js'></script>
</head>
<?php
$result = mysql_query("SELECT puid FROM posts WHERE pid=$pid");
if (isset($id) && $id==@MYSQL_RESULT($result,0,"puid")) {
 ?>
 <!- ->
 <?php  }
 else {
$result = mysql_query("UPDATE posts SET pposted=pposted,tdd=tdd+1 WHERE pid='$pid'");
}
print ("<img src=robba/$pid-robba.jpg class=masall>");
?>