<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("structure1.php");
include ("structure2.php");
	 $result = mysql_query("SELECT tc_team1, tc_team2, tc_mid FROM t5_match WHERE tc_play='N'");	
	 	if ($myrow = mysql_fetch_array($result)) {
do {	
printf("<a href=t5_match.php?mid=%s>%s - %s</a><br>",$myrow["tc_mid"],$myrow["tc_team1"],$myrow["tc_team2"]);

} while ($myrow = mysql_fetch_array($result));}
include ("structure4.php");
?>