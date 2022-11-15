<?php
include ("conconfig.php");
include ("../connect.php");
include ("../cookie.php");
$result=MYSQL_QUERY("SELECT id from contest ORDER BY opening DESC LIMIT 1");
print ("<script>window.location='conhome.php?conid=".MYSQL_RESULT($result,0,"id")."'</script>");
?>