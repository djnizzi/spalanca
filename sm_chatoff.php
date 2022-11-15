<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)) {

	$result=MYSQL_QUERY("UPDATE users SET logged='N' WHERE id='$id'");
 ?>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
</head>
<script>
window.innerWidth = 100;
window.innerHeight = 100;
window.screenX = screen.width;
window.screenY = screen.height;
alwaysLowered = true;
</script>
<table width="100%" border="0" cellspacing="1" cellpadding="1" height=100%>
 <tr>
    <td class="mascont" align="center">sciao belo/a!</td>
  </tr>
</table>
<script>self.close();</script>
<?php } ?>
