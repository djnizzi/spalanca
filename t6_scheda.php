<?php
if (time() < mktime (14,0,0,9,12,2006)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("t6_scsubmit.php");}
if ($id==$zid) {
include ("t6_sc2.php");
} else { 
include ("t6_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='t6_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t6_sc3.php");
include ("sm_copy.php");} }
?>