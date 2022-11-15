<?php
if (time() < mktime (16,0,0,6,12,2014)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("m4_scsubmit.php");}
if ($id==$zid) {
include ("m4_sc2.php");
} else { 
include ("m4_sc3.php");}   include ("m4_copy.php"); }
	} else
{?><script>parent.location='m4_noid.php'</script><?php }} else {if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("sm_structure.php");
include ("m4_sc3.php");
 include ("m4_copy.php");} }
?>