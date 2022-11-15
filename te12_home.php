<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){ 
	?><head><title>|spalanca|dot|com| presents TOTOIURO12</title></head><frameset rows=51,* frameborder=NO border=0 framespacing=0>
    <frame name="head" noresize  src="te12_header.php" frameborder="NO" marginwidth="0" marginheight="0" scrolling=no>
    <frame name="main" noresize  src="te12_class.php" frameborder="NO" marginwidth="10" marginheight="10">
</frameset><?php
}
else{ 
?>
<script>parent.location='te12_noid.php'</script><?php
}
?>
