<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (!isset($id)){ 
	?><head><title>|spalanca|dot|com| presents TotoFuﬂballWeltmeisterschaft 2006</title></head><frameset rows=51,* frameborder=NO border=0 framespacing=0>
    <frame name="head" noresize  src="m2_header.php" frameborder="NO" marginwidth="0" marginheight="0" scrolling=no>
    <frame name="main" noresize  src="m2_rulez.php" frameborder="NO" marginwidth="10" marginheight="10">
</frameset><?php
}
else{ 
?>
<script>parent.location='m2_home.php'</script><?php
}
?>
