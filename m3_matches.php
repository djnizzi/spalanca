<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("structure1.php");
include ("structure2.php");
	 $result = mysql_query("SELECT sm_team1, sm_team2, sm_mid FROM m3_match WHERE sm_play='N'");	
	 	if ($myrow = mysql_fetch_array($result)) {
do {	
printf("<a href=m3_match.php?mid=%s>%s - %s</a><br>",$myrow["sm_mid"],$myrow["sm_team1"],$myrow["sm_team2"]);

} while ($myrow = mysql_fetch_array($result));}
include ("structure4.php");
?>