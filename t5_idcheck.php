<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){
	?><script>parent.location='t5_home.php'</script><?php
	}
else{
?>
<script>parent.location='t5_noid.php'</script><?php
}
?>