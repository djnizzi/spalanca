<?php
if (time() < mktime (14,0,0,9,15,2009)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("t9_scsubmit.php");}
if ($id==$zid) {
include ("t9_sc2.php");
} else { 
include ("t9_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='t9_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t9_sc3.php");
include ("sm_copy.php");} }
?>