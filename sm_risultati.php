<?php  if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("sm_nav.php");
$gole="";
$xpu=""; ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center" colspan=4><img src="images/sm_res.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic" align=center colspan=4><table border="0" cellpadding="1" cellspacing=1 align=center>

  <?php
$result=MYSQL_QUERY("SELECT  sm_mid, sm_team1, sm_team2,  sm_g1, sm_g2, UNIX_TIMESTAMP(DATE_ADD(sm_date, INTERVAL -7 HOUR)) as ladata, sm_group FROM sm_match, sm_teams WHERE sm_tid=sm_team1 AND sm_play='Y' ORDER BY sm_date");
if ($myrow = mysql_fetch_array($result)) {
	do{$gole="";
$xpu=""; $matchid=$myrow["sm_mid"];$sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	$result2=MYSQL_QUERY("SELECT  sm_name1 FROM sm_goal, sm_stars WHERE sm_gmid=$matchid AND sm_sid=sm_gsid ORDER BY sm_name1");
	if ($myrow2 = mysql_fetch_array($result2)) {$gole="<td class=mascont2 width=1 valign=top><img src=images/sm_g.gif></td><td class=mastoxic>";
		do{$gole=$gole . $myrow2["sm_name1"] . ", "; } while  ($myrow2 = mysql_fetch_array($result2));
	$gole=substr($gole,0,-2) . "</td>";} 
	$result2=MYSQL_QUERY("SELECT  sm_name1 FROM sm_sentoff, sm_stars WHERE sm_smid=$matchid AND sm_sid=sm_ssid ORDER BY sm_name1");
	if ($myrow2 = mysql_fetch_array($result2)) {$xpu="<td class=mascont2 width=1 valign=top><img src=images/sm_x.gif></td><td class=mastoxic>";
		do{$xpu=$xpu . $myrow2["sm_name1"] . ", "; } while  ($myrow2 = mysql_fetch_array($result2));
	$xpu=substr($xpu,0,-2) . "</td>";}
	if ($myrow["ladata"]<mktime (0,0,0,6,15,2002)) {$whatmatch="Gruppo " . $myrow["sm_group"];} else 
	if ($myrow["ladata"]<mktime (0,0,0,6,20,2002)){$whatmatch="1/8 finale";} else
	if ($myrow["ladata"]<mktime (0,0,0,6,24,2002)){$whatmatch="1/4 finale";}else 
	if ($myrow["ladata"]<mktime (0,0,0,6,28,2002)){$whatmatch="semifinale";}else {$whatmatch="finale";}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>%s</td>", $sijuega,$whatmatch);
	printf ("<td align=right class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=sm_getdata.php?tid=%s></td>",urlencode($myrow["sm_team1"]),$myrow["sm_team1"],$myrow["sm_team2"],urlencode($myrow["sm_team2"]));
	printf ("<td nowrap class=mascont align=center>%s - %s</td></tr>", $myrow["sm_g1"],$myrow["sm_g2"]);
	print("<tr><td colspan=8 class=mascont><table border=0 cellpadding=1 cellspacing=1 width=100%><tr>$gole$xpu</tr></table></td></tr>");

} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td></tr>

      <tr>
    <td class="mastoxic" align=center colspan=4><table border="0" cellpadding="1" cellspacing=1 align=center>

  <?php
$result=MYSQL_QUERY("SELECT  sm_team1, sm_team2, UNIX_TIMESTAMP(DATE_ADD(sm_date, INTERVAL -7 HOUR)) as ladata, sm_group FROM sm_match, sm_teams WHERE sm_tid=sm_team1 AND sm_play='N' ORDER BY sm_date");
if ($myrow = mysql_fetch_array($result)) {
	do{$sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	if ($myrow["ladata"]<mktime (0,0,0,6,15,2002)) {$whatmatch="Gruppo " . $myrow["sm_group"];} else 
	if ($myrow["ladata"]<mktime (0,0,0,6,20,2002)){$whatmatch="1/8 finale";} else
	if ($myrow["ladata"]<mktime (0,0,0,6,24,2002)){$whatmatch="1/4 finale";}else 
	if ($myrow["ladata"]<mktime (0,0,0,6,28,2002)){$whatmatch="semifinale";}else {$whatmatch="finale";}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>%s</td>", $sijuega,$whatmatch);
	printf ("<td align=right class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=sm_getdata.php?tid=%s></td></tr>",urlencode($myrow["sm_team1"]),$myrow["sm_team1"],$myrow["sm_team2"],urlencode($myrow["sm_team2"]));

} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td></tr><tr>    <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo A</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='A' ORDER BY sm_points DESC, dr DESC, sm_gf DESC,  sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo B</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='B' ORDER BY sm_points DESC, dr DESC, sm_gf DESC,  sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo C</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='C' ORDER BY sm_points DESC, dr DESC, sm_gf DESC, sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo D</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='D' ORDER BY sm_points DESC, dr DESC, sm_gf DESC, sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
</tr>	
<tr>    <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo E</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='E' ORDER BY sm_points DESC, dr DESC, sm_gf DESC,   sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo F</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='F' ORDER BY sm_points DESC, dr DESC, sm_gf DESC,   sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo G</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='G' ORDER BY sm_points DESC, dr DESC, sm_gf DESC,   sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo H</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  sm_tid, sm_gf, sm_ga, sm_gp, sm_points, (sm_gf-sm_ga) as dr FROM sm_teams WHERE sm_group='H' ORDER BY sm_points DESC, dr DESC, sm_gf DESC,   sm_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=sm_getdata.php?tid=%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", urlencode($myrow["sm_tid"]), $myrow["sm_gp"],$myrow["sm_gf"],$myrow["sm_ga"],$myrow["sm_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
</tr>			
</table>	
	
<?php } else { ?><script>parent.location='sm_noid.php'</script><?php }  include ("sm_copy.php");?>
   
