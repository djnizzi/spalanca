<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
include ("cookie.php");
?>
<head>
<title>|spalanca|dot|com|</title>
<link rel="stylesheet" href="mashiro.css" type="text/css">
<script type='text/javascript' src='mashiro.js'></script>
</head>
<?php
$result = mysql_query("SELECT cotduid FROM cotd WHERE cotdfn='$cotdfn'");
if (isset($id) && $id==@MYSQL_RESULT($result,0,"cotduid")) {
 ?>
 <!- ->
 <?php  }
 else {
$result = mysql_query("UPDATE cotd SET cotdposted=cotdposted,cotdd=cotdd+1 WHERE cotdfn='$cotdfn'");
}
print ("<img src=cotd/$cotdfn class=masall>");
?>