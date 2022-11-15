<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){
	?><script>parent.location='tc_home.php'</script><?php
	}
else{
?>
<script>parent.location='tc_noid.php'</script><?php
}
?>