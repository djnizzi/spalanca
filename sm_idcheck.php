<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){
	?><script>parent.location='sm_home.php'</script><?php
	}
else{
?>
<script>parent.location='sm_noid.php'</script><?php
}
?>