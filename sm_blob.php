<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");

$allteams="";
$result2=MYSQL_QUERY("SELECT sm_tid FROM sm_teams ORDER BY sm_tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
$allteams=$allteams . "<option value='" . $myrow["sm_tid"] . "'>". $myrow["sm_tid"] . "</option>";
} while  ($myrow = mysql_fetch_array($result2)); }
if (isset($sublo)) {
$data = addslashes(fread(fopen($pbindata, "r"), filesize($pbindata)));
$result=MYSQL_QUERY("UPDATE sm_teams SET sm_flag='$data',sm_flagfn='$pbindata_name' WHERE sm_tid='$squadra'");
}

?>
<table><tr><td><form  enctype="multipart/form-data" method=post name=robba action=sm_blob.php><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><select name=squadra><?php echo $allteams; ?></select>
</td></tr>
 <tr><td align=center>l'opera per l'appunto: <input type="file" name="pbindata" size=61 class=buttons></td></tr>
<tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="sublo" VALUE="invia"></td></tr>
</table></form></td></tr></table>