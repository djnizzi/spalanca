<?php
if (time() < mktime (15,00,0,9,16,2003)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("t3_scsubmit.php");}
if ($id==$zid) {
include ("t3_sc2.php");
} else { 
include ("t3_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='t3_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t3_sc3.php");
include ("sm_copy.php");} }
?>