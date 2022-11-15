<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){
	?><script>parent.location='te8_home.php'</script><?php
	}
else{
?>
<script>parent.location='te8_noid.php'</script><?php
}
?>