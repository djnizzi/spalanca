<?php  if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t11_nav.php");
mysql_select_db($database2);
$gole="";
$xpu=""; ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center" colspan=4><img src="images/sm_res.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic" align=center colspan=4><table border="0" cellpadding="1" cellspacing=1 align=center>

  <?php
$result=MYSQL_QUERY("SELECT  tc_mid, tc_team1, tc_team2, tc_g1, tc_g2, UNIX_TIMESTAMP(tc_date) as ladata, tc_group FROM t11_match, t11_teams WHERE tc_tid=tc_team1 AND tc_play='Y' ORDER BY tc_date");
if ($myrow = mysql_fetch_array($result)) {
	do{$gole="";
$xpu=""; $matchid=$myrow["tc_mid"];$sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	$result2=MYSQL_QUERY("SELECT  tc_name1 FROM t11_goal, t11_stars WHERE tc_gmid=$matchid AND tc_sid=tc_gsid ORDER BY tc_name1");
	if ($myrow2 = mysql_fetch_array($result2)) {$gole="<td class=mascont2 width=1 valign=top><img src=images/sm_g.gif></td><td class=mastoxic>";
		do{$gole=$gole . $myrow2["tc_name1"] . ", "; } while  ($myrow2 = mysql_fetch_array($result2));
	$gole=substr($gole,0,-2) . "</td>";} 
	$result2=MYSQL_QUERY("SELECT  tc_name1 FROM t11_sentoff, t11_stars WHERE tc_smid=$matchid AND tc_sid=tc_ssid ORDER BY tc_name1");
	if ($myrow2 = mysql_fetch_array($result2)) {$xpu="<td class=mascont2 width=1 valign=top><img src=images/sm_x.gif></td><td class=mastoxic>";
		do{$xpu=$xpu . $myrow2["tc_name1"] . ", "; } while  ($myrow2 = mysql_fetch_array($result2));
	$xpu=substr($xpu,0,-2) . "</td>";}
	if ($myrow["ladata"]<mktime (0,0,0,12,8,2011)) {$whatmatch="Fase I - Gruppo " . $myrow["tc_group"];} else 
	if ($myrow["ladata"]<mktime (0,0,0,3,15,2012)){$whatmatch="1/8 finale"  . $myrow["tc_group2"];} else
	if ($myrow["ladata"]<mktime (0,0,0,4,5,2012)){$whatmatch="1/4 finale";}else 
	if ($myrow["ladata"]<mktime (0,0,0,4,26,2012)){$whatmatch="semifinale";}else {$whatmatch="finale";}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>%s</td>", $sijuega,$whatmatch);
$tim1 = $myrow["tc_team1"];
$tim2 = $myrow["tc_team2"];
    $query1res = @MYSQL_QUERY("SELECT tc_flagfn FROM t11_teams WHERE tc_tid='$tim1'");
    $query2res = @MYSQL_QUERY("SELECT tc_flagfn FROM t11_teams WHERE tc_tid='$tim2'");
    $flag1 = "tc/" .  @MYSQL_RESULT($query1res,0,"tc_flagfn");
    $flag2 = "tc/" . @MYSQL_RESULT($query2res,0,"tc_flagfn");
	printf ("<td align=right class=mastoxic><img src=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=%s></td>",$flag1,$myrow["tc_team1"],$myrow["tc_team2"],$flag2);
	printf ("<td nowrap class=mascont align=center>%s - %s</td></tr>", $myrow["tc_g1"],$myrow["tc_g2"]);
	print("<tr><td colspan=8 class=mascont><table border=0 cellpadding=1 cellspacing=1 width=100%><tr>$gole$xpu</tr></table></td></tr>");

} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td></tr>

      <tr>
    <td class="mastoxic" align=center colspan=4><table border="0" cellpadding="1" cellspacing=1 align=center>

  <?php
$result=MYSQL_QUERY("SELECT  tc_team1, tc_team2, UNIX_TIMESTAMP(tc_date) as ladata, tc_group FROM t11_match, t11_teams WHERE tc_tid=tc_team1 AND tc_play='N' ORDER BY tc_date");
if ($myrow = mysql_fetch_array($result)) {
	do{$sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	if ($myrow["ladata"]<mktime (0,0,0,12,8,2011)) {$whatmatch="Fase I - Gruppo " . $myrow["tc_group"];} else 
	if ($myrow["ladata"]<mktime (0,0,0,3,15,2012)){$whatmatch="1/8 finale"  . $myrow["tc_group2"];} else
	if ($myrow["ladata"]<mktime (0,0,0,4,5,2012)){$whatmatch="1/4 finale";}else 
	if ($myrow["ladata"]<mktime (0,0,0,4,26,2012)){$whatmatch="semifinale";}else {$whatmatch="finale";}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>%s</td>", $sijuega,$whatmatch);
	$tim1 = $myrow["tc_team1"];
$tim2 = $myrow["tc_team2"];
    $query1res = @MYSQL_QUERY("SELECT tc_flagfn FROM t11_teams WHERE tc_tid='$tim1'");
    $query2res = @MYSQL_QUERY("SELECT tc_flagfn FROM t11_teams WHERE tc_tid='$tim2'");
    $flag1 = "tc/" .  @MYSQL_RESULT($query1res,0,"tc_flagfn");
    $flag2 = "tc/" . @MYSQL_RESULT($query2res,0,"tc_flagfn");
	printf ("<td align=right class=mastoxic><img src=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=%s></td></tr>",$flag1,$myrow["tc_team1"],$myrow["tc_team2"],$flag2);

} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td></tr> <tr>
    <td class="masblack" align="center" colspan=4><img src="images/tc_c1.jpg"></td>
  </tr><tr>    <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo A</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid, tc_flagfn, tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='A' ORDER BY tc_points DESC, dr DESC, tc_gf DESC,  tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo B</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid,  tc_flagfn,tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='B' ORDER BY tc_points DESC, dr DESC, tc_gf DESC,  tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo C</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid,  tc_flagfn,tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='C' ORDER BY tc_points DESC, dr DESC, tc_gf DESC, tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo D</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid, tc_flagfn, tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='D' ORDER BY tc_points DESC, dr DESC, tc_gf DESC, tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
</tr>	
<tr>    <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo E</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid,  tc_flagfn,tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='E' ORDER BY tc_points DESC, dr DESC, tc_gf DESC,   tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo F</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid,  tc_flagfn,tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='F' ORDER BY tc_points DESC, dr DESC, tc_gf DESC,   tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo G</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid,  tc_flagfn,tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='G' ORDER BY tc_points DESC, dr DESC, tc_gf DESC,   tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
 <td class="mastoxic" align=center>
	<table width=90% border="0" cellpadding="1" cellspacing=1 align=center><tr><td class=masblack>Gruppo H</td><td  class=masblack align=center>PG</td><td class=masblack align=center>DR</td><td class=masblack align=center>P</td></tr>
<?php
$result=MYSQL_QUERY("SELECT  tc_tid, tc_flagfn, tc_gf, tc_ga, tc_gp, tc_points, (tc_gf-tc_ga) as dr FROM t11_teams WHERE tc_group='H' ORDER BY tc_points DESC, dr DESC, tc_gf DESC,   tc_tid");
if ($myrow = mysql_fetch_array($result)) { do {	
	printf ("<tr><td class=mastoxic><img src=tc/%s></td><td class=mascont align=center>%s</td><td class=mascont  align=center>%s - %s</td><td class=mascont  align=center><b>%s</td></tr>", $myrow["tc_flagfn"], $myrow["tc_gp"],$myrow["tc_gf"],$myrow["tc_ga"],$myrow["tc_points"]);

} while  ($myrow = mysql_fetch_array($result));} ?></table></td>
</tr>	
</table>	
	
<?php } else { ?><script>parent.location='t11_noid.php'</script><?php }  include ("sm_copy.php");?>
   
