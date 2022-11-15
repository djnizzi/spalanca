<?php
if (time() < mktime (23,0,0,5,30,2002)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("sm_scsubmit.php");}
if ($id==$zid) {
include ("sm_sc2.php");
} else { 
include ("sm_sc3.php");}   include ("sm_copy.php"); }
	} else
{?><script>parent.location='sm_noid.php'</script><?php }} else {if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("sm_sc3.php");
 include ("sm_copy.php");} }
?>