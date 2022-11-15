<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("structure1.php");
include ("login.php");
$strt = time() + microtime();
$randban=rand(0,1);
if($randban==1){include ("spcbanner.php");}else{include ("t6_link.php");}
include ("structure2.php");
include ("newshome.php");
include ("structure3.php");
include ("cotdhome.php");
include ("structure3.php");
include ("robbahome.php");
include ("structure3.php");
include ("forumhome.php");
include ("structure4.php");
include ("altra.php");
include ("counter.php");
include ("amispace.php");
$end = time() + microtime();
$tot = number_format(((round(($end - $strt)*1000))/1000),3,',','.');
echo "<center>pagina generata in <b>$tot</b> secondi";
?>