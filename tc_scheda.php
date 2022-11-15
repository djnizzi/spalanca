<?php
if (time() < mktime (14,0,0,9,17,2002)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("tc_scsubmit.php");}
if ($id==$zid) {
include ("tc_sc2.php");
} else { 
include ("tc_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='tc_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("tc_sc3.php");
include ("sm_copy.php");} }
?>