<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){
	?><script>parent.location='m4_home.php'</script><?php
	}
else{
?>
<script>parent.location='m4_noid.php'</script><?php
}
?>