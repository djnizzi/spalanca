<?php
if (time() < mktime (14,0,0,9,16,2008)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("t8_scsubmit.php");}
if ($id==$zid) {
include ("t8_sc2.php");
} else { 
include ("t8_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='t8_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t8_sc3.php");
include ("sm_copy.php");} }
?>