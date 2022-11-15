<?php
if (time() < mktime (14,0,0,9,14,2010)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("t10_scsubmit.php");}
if ($id==$zid) {
include ("t10_sc2.php");
} else { 
include ("t10_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='t10_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t10_sc3.php");
include ("sm_copy.php");} }
?>