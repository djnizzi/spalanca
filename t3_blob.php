<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");

$allteams="";
$result2=MYSQL_QUERY("SELECT tc_tid FROM t3_teams ORDER BY tc_tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
$allteams=$allteams . "<option value='" . $myrow["tc_tid"] . "'>". $myrow["tc_tid"] . "</option>";
} while  ($myrow = mysql_fetch_array($result2)); }
if (isset($sublo)) {
$data = addslashes(fread(fopen($pbindata, "r"), filesize($pbindata)));
$result=MYSQL_QUERY("UPDATE t3_teams SET tc_flag='$data',tc_flagfn='$pbindata_name' WHERE tc_tid='$squadra'");
}

?>
<table><tr><td><form  enctype="multipart/form-data" method=post name=robba action=t3_blob.php><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><select name=squadra><?php echo $allteams; ?></select>
</td></tr>
 <tr><td align=center>l'opera per l'appunto: <input type="file" name="pbindata" size=61 class=buttons></td></tr>
<tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="sublo" VALUE="invia"></td></tr>
</table></form></td></tr></table>