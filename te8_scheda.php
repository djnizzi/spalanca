<?php
if (time() < mktime (11,0,0,6,7,2008)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("te8_scsubmit.php");}
if ($id==$zid) {
include ("te8_sc2.php");
} else { 
include ("te8_sc3.php");}   include ("te8_copy.php"); }
	} else
{?><script>parent.location='te8_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("te8_sc3.php");
include ("te8_copy.php");} }
?>