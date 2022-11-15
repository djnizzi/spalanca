<?php
if (time() < mktime (9,0,0,6,11,2010)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("m3_scsubmit.php");}
if ($id==$zid) {
include ("m3_sc2.php");
} else { 
include ("m3_sc3.php");}   include ("m3_copy.php"); }
	} else
{?><script>parent.location='m3_noid.php'</script><?php }} else {if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("sm_structure.php");
include ("m3_sc3.php");
 include ("m3_copy.php");} }
?>