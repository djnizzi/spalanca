<?php
mysql_select_db($database2);
$datazza=mktime (0,0,0,12,12,2007);
if (isset($subma) && isset($mid)){
	 $result = mysql_query("SELECT tc_team1, tc_team2 FROM t7_match WHERE tc_mid=$mid");	
	
 $team1=@MYSQL_RESULT($result,0,"tc_team1");
 $team2=@MYSQL_RESULT($result,0,"tc_team2");
 $result = mysql_query("SELECT tc_group FROM t7_teams WHERE tc_tid='$team1'");
 $sm_group=@MYSQL_RESULT($result,0,"tc_group");
 if ($g1<$g2) {$sign="2";$team1pz=0;$team2pz=3; } else if ($g1>$g2) {$sign="1";$team1pz=3;$team2pz=0; } else {$sign="X";$team1pz=1;$team2pz=1; }
	$result = mysql_query("UPDATE t7_match SET tc_g1=$g1, tc_g2=$g2, tc_1x2='$sign', tc_play='Y'  WHERE tc_mid=$mid");
if (isset($select2)) {	for ($i=0; $i < count($select2); $i++){
	$elgoleador=$select2[$i];
	$result = mysql_query("INSERT INTO t7_goal (tc_gsid,tc_gmid) VALUES ($elgoleador,$mid)");
	$result = mysql_query("SELECT tc_gpid FROM t7_goleadors WHERE tc_gsid=$elgoleador");
	if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["tc_gpid"];
	$result2 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+3 WHERE tc_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));
}}}
	if (isset($select3)) {for ($i=0; $i < count($select3); $i++){
			$elcabron=$select3[$i];
		$result = mysql_query("INSERT INTO t7_sentoff (tc_ssid,tc_smid) VALUES ($elcabron,$mid)");
		$result = mysql_query("SELECT tc_fpid FROM t7_final WHERE tc_fsid=$elcabron and tc_off='N'");
			if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["tc_fpid"];
	$result0 = mysql_query("UPDATE t7_final SET tc_off='Y' WHERE tc_fpid='$thaplaya'");
	$result2 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+20 WHERE tc_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));	}	}
	
		}

if ($whatmatch=="gironi") {
		$result = mysql_query("SELECT tc_rpid FROM t7_res WHERE tc_rmid=$mid AND tc_g1=$g1 AND tc_g2=$g2");
if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["tc_rpid"];
	$result2 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+3 WHERE tc_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));
}	
		$result = mysql_query("SELECT tc_rpid FROM t7_res WHERE tc_rmid=$mid AND tc_1x2='$sign'");
if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["tc_rpid"];
	$result2 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+1 WHERE tc_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));
}

$result = mysql_query("UPDATE t7_teams SET tc_points=tc_points+$team1pz, tc_gf=tc_gf+$g1,tc_ga=tc_ga+$g2,tc_gp=tc_gp+1 WHERE tc_tid='$team1'");	
$result = mysql_query("UPDATE t7_teams SET tc_points=tc_points+$team2pz, tc_gf=tc_gf+$g2,tc_ga=tc_ga+$g1,tc_gp=tc_gp+1 WHERE tc_tid='$team2'");					
$result00 = mysql_query ("SELECT count(*) as allplayed FROM t7_teams WHERE tc_gp='6' AND tc_group='$sm_group'");
if  (@MYSQL_RESULT($result00,0,"allplayed")==4) {
$result0 = mysql_query("SELECT tc_tid, (tc_gf-tc_ga) as dr FROM t7_teams WHERE tc_gp='6' AND tc_group='$sm_group'  ORDER BY tc_points DESC, dr DESC, tc_gf DESC LIMIT 2");
if ($myrow = mysql_fetch_array($result0)) {
do {	
	$tc_tid=$myrow["tc_tid"];
	$result2 = mysql_query("UPDATE t7_teams SET tc_iter='8' WHERE tc_tid='$tc_tid'");
	$result  = mysql_query("SELECT tc_16pid FROM t7_16teams WHERE tc_16tid='$tc_tid' AND tc_16w='8'");
if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["tc_16pid"];
	$result3 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+10 WHERE tc_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}	
} while ($myrow = mysql_fetch_array($result0));
}}}


if ($whatmatch=="ottavi") {

$result00 = mysql_query ("SELECT tc_g1, tc_g2 FROM t7_match WHERE tc_team1='$team2' AND tc_team2='$team1' AND tc_play='Y' AND UNIX_TIMESTAMP(tc_date)>$datazza");
if  (@MYSQL_RESULT($result00,0,"tc_g1")!=null) {
	if ($g1+@MYSQL_RESULT($result00,0,"tc_g2")<$g2+@MYSQL_RESULT($result00,0,"tc_g1")){$team2pz=$team2;}
	else if ($g1+@MYSQL_RESULT($result00,0,"tc_g2")>$g2+@MYSQL_RESULT($result00,0,"tc_g1")){$team2pz=$team1;}
	else if ($g2>@MYSQL_RESULT($result00,0,"tc_g2")){$team2pz=$team2;}else{$team2pz=$team1;}

	$result2 = mysql_query("UPDATE t7_teams SET tc_iter='4' WHERE tc_tid='$team2pz'");
	$result  = mysql_query("SELECT tc_16pid FROM t7_16teams WHERE tc_16tid='$team2pz' AND tc_16w='4'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["tc_16pid"];
	$result3 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+20 WHERE tc_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	}
}

	if ($whatmatch=="quarti") {
	
$result00 = mysql_query ("SELECT tc_g1, tc_g2 FROM t7_match WHERE tc_team1='$team2' AND tc_team2='$team1' AND tc_play='Y' AND UNIX_TIMESTAMP(tc_date)>$datazza");
if  (@MYSQL_RESULT($result00,0,"tc_g1")!=null) {
	if ($g1+@MYSQL_RESULT($result00,0,"tc_g2")<$g2+@MYSQL_RESULT($result00,0,"tc_g1")){$team2pz=$team2;}
	else if ($g1+@MYSQL_RESULT($result00,0,"tc_g2")>$g2+@MYSQL_RESULT($result00,0,"tc_g1")){$team2pz=$team1;}
	else if ($g2>@MYSQL_RESULT($result00,0,"tc_g2")){$team2pz=$team2;}else{$team2pz=$team1;}

	$result2 = mysql_query("UPDATE t7_teams SET tc_iter='2' WHERE tc_tid='$team2pz'");
	$result  = mysql_query("SELECT tc_16pid FROM t7_16teams WHERE tc_16tid='$team2pz' AND tc_16w='2'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["tc_16pid"];
	$result3 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+30 WHERE tc_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	}
}
	if ($whatmatch=="semifinale") {
	
$result00 = mysql_query ("SELECT tc_g1, tc_g2 FROM t7_match WHERE tc_team1='$team2' AND tc_team2='$team1' AND tc_play='Y' AND UNIX_TIMESTAMP(tc_date)>$datazza");
if  (@MYSQL_RESULT($result00,0,"tc_g1")!=null) {
	if ($g1+@MYSQL_RESULT($result00,0,"tc_g2")<$g2+@MYSQL_RESULT($result00,0,"tc_g1")){$team2pz=$team2;}
	else if ($g1+@MYSQL_RESULT($result00,0,"tc_g2")>$g2+@MYSQL_RESULT($result00,0,"tc_g1")){$team2pz=$team1;}
	else if ($g2>@MYSQL_RESULT($result00,0,"tc_g2")){$team2pz=$team2;}else{$team2pz=$team1;}

	$result2 = mysql_query("UPDATE t7_teams SET tc_iter='F' WHERE tc_tid='$team2pz'");
	$result  = mysql_query("SELECT tc_16pid FROM t7_16teams WHERE tc_16tid='$team2pz' AND tc_16w='F'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["tc_16pid"];
	$result3 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+40 WHERE tc_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	}
}
	if ($whatmatch=="finale") {	
	$team2pz=($g1<$g2)?$team2:$team1;
	$result2 = mysql_query("UPDATE t7_teams SET tc_iter='W' WHERE tc_tid='$team2pz'");
	$result  = mysql_query("SELECT tc_16pid FROM t7_16teams WHERE tc_16tid='$team2pz' AND tc_16w='W'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["tc_16pid"];
	$result3 = mysql_query("UPDATE t7_playaz SET tc_points=tc_points+60 WHERE tc_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	}

}else{
if (isset ($mid) && !isset($subma)) { $result = mysql_query("SELECT tc_team1, tc_team2 FROM t7_match WHERE tc_mid=$mid");	
 $team1=@MYSQL_RESULT($result,0,"tc_team1");
 $team2=@MYSQL_RESULT($result,0,"tc_team2");
?>
<script>whattatit("risultato partita!")</script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/andus.jpg width=338 height=20></td>
                      </tr>
                                            <tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
</table></td></tr>
 <tr><td><form method=post name=result action=<?php echo $mynameis; ?>?mid=<?php echo $mid; ?>>
 <table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><?php echo $team1; ?> - <?php echo $team2; ?></td></tr>
 <tr><td align=center><INPUT TYPE=text  class=buttons size=2 NAME="g1"> - <INPUT TYPE=text  class=buttons size=2 NAME="g2"></td></tr>
<tr><td align=center><table><tr><td>  <select name="select1" size="10" multiple>
 <?php   
 $result = mysql_query("SELECT tc_sid, tc_name1 FROM t7_stars WHERE tc_stid='$team1' OR tc_stid='$team2'  ORDER BY tc_name1");
if ($myrow = mysql_fetch_array($result)) {
do {printf("<option value=%s>%s</option>\n", $myrow["tc_sid"], $myrow["tc_name1"]);
} while ($myrow = mysql_fetch_array($result));
}

  ?></select></td><td align=center><input type="button" class=buttons
              value="aggiungi"
              onClick="return addstuff(document.all.select2, this.form.select1)"><br><br><input
              type="button" class=buttons value="rimuovi"
              onClick="return removestuff(document.all.select2, this.form.select1)"></td><td><select name="select2[]" id=select2 size="10" multiple></select></td></tr></table></td></tr>

<tr><td> &nbsp;</td><td align=center><input type="button" class=buttons
              value="aggiungi"
              onClick="return addstuff(document.all.select3, this.form.select1)"><br><br><input
              type="button" class=buttons value="rimuovi"
              onClick="return removestuff(document.all.select3, this.form.select1)"></td><td><select name="select3[]" id=select3 size="10" multiple></select></td></tr></table></td></tr>

<tr><td align=center><select name=whatmatch><option value=gironi>gironi</option><option>ottavi</option><option>quarti</option><option>semifinale</option><option>finale</option></select></td></tr>
<tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subma" VALUE="salva"></td></tr>
</table></form></td></tr></table><br>
<?php
}}
?><a href=t7_matches.php>matches</a>