<?php
if (time() < mktime (12,0,0,6,9,2006)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("m2_scsubmit.php");}
if ($id==$zid) {
include ("m2_sc2.php");
} else { 
include ("m2_sc3.php");}   include ("m2_copy.php"); }
	} else
{?><script>parent.location='m2_noid.php'</script><?php }} else {if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("m2_sc3.php");
 include ("m2_copy.php");} }
?>