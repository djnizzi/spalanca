<?php
if (time() < mktime (12,0,0,6,12,2004)){
if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
if (isset($zid)){
if (isset($subsc)){
include ("te_scsubmit.php");}
if ($id==$zid) {
include ("te_sc2.php");
} else { 
include ("te_sc3.php");}   include ("te_copy.php"); }
	} else
{?><script>parent.location='te_noid.php'</script><?php }} else 

{if (isset($zid)){include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("te_sc3.php");
include ("te_copy.php");} }
?>