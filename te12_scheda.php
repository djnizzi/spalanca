<?php
if (time() < mktime (11,0,0,6,8,2012)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("te12_scsubmit.php");}
if ($id==$zid) {
include ("te12_sc2.php");
} else { 
include ("te12_sc3.php");}   include ("te12_copy.php"); }
	} else
{?><script>parent.location='te12_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("te12_sc3.php");
include ("te12_copy.php");} }
?>