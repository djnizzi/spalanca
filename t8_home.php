<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){ 
	?><head><title>|spalanca|dot|com| presents TOTOCEMPIONS 08/09</title></head><frameset rows=51,* frameborder=NO border=0 framespacing=0>
    <frame name="head" noresize  src="t8_header.php" frameborder="NO" marginwidth="0" marginheight="0" scrolling=no>
    <frame name="main" noresize  src="t8_class.php" frameborder="NO" marginwidth="10" marginheight="10">
</frameset><?php
}
else{ 
?>
<script>parent.location='t8_noid.php'</script><?php
}
?>
