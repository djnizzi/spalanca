<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
if (isset($id)){
	?><script>parent.location='t3_home.php'</script><?php
	}
else{
?>
<script>parent.location='t3_noid.php'</script><?php
}
?>