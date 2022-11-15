<?php
if (isset($subma) && isset($mid)){
	 $result = mysql_query("SELECT sm_team1, sm_team2 FROM te_match WHERE sm_mid=$mid");	
	
 $team1=@MYSQL_RESULT($result,0,"sm_team1");
 $team2=@MYSQL_RESULT($result,0,"sm_team2");
 $result = mysql_query("SELECT sm_group FROM te_teams WHERE sm_tid='$team1'");
 $sm_group=@MYSQL_RESULT($result,0,"sm_group");
 if ($g1<$g2) {$sign="2";$team1pz=0;$team2pz=3; } else if ($g1>$g2) {$sign="1";$team1pz=3;$team2pz=0; } else {$sign="X";$team1pz=1;$team2pz=1; }
	$result = mysql_query("UPDATE te_match SET sm_g1=$g1, sm_g2=$g2, sm_1x2='$sign', sm_play='Y'  WHERE sm_mid=$mid");
if (isset($select2)) {	for ($i=0; $i < count($select2); $i++){
	$elgoleador=$select2[$i];
	$result = mysql_query("INSERT INTO te_goal (sm_gsid,sm_gmid) VALUES ($elgoleador,$mid)");
	$result = mysql_query("SELECT sm_gpid FROM te_goleadors WHERE sm_gsid=$elgoleador");
	if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["sm_gpid"];
	$result2 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+3 WHERE sm_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));
}}}
	if (isset($select3)) {for ($i=0; $i < count($select3); $i++){
			$elcabron=$select3[$i];
		$result = mysql_query("INSERT INTO te_sentoff (sm_ssid,sm_smid) VALUES ($elcabron,$mid)");
		$result = mysql_query("SELECT sm_fpid FROM te_final WHERE sm_fsid=$elcabron and sm_off='N'");
			if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["sm_fpid"];
	$result0 = mysql_query("UPDATE te_final SET sm_off='Y' WHERE sm_fpid='$thaplaya'");
	$result2 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+20 WHERE sm_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));	}	}
	
		}

if ($whatmatch=="gironi") {
		$result = mysql_query("SELECT sm_rpid FROM te_res WHERE sm_rmid=$mid AND sm_g1=$g1 AND sm_g2=$g2");
if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["sm_rpid"];
	$result2 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+3 WHERE sm_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));
}	
		$result = mysql_query("SELECT sm_rpid FROM te_res WHERE sm_rmid=$mid AND sm_1x2='$sign'");
if ($myrow = mysql_fetch_array($result)) {
do {	
	$thaplaya=$myrow["sm_rpid"];
	$result2 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+1 WHERE sm_pid='$thaplaya'");
} while ($myrow = mysql_fetch_array($result));
}

$result = mysql_query("UPDATE te_teams SET sm_points=sm_points+$team1pz, sm_gf=sm_gf+$g1,sm_ga=sm_ga+$g2,sm_gp=sm_gp+1 WHERE sm_tid='$team1'");	
$result = mysql_query("UPDATE te_teams SET sm_points=sm_points+$team2pz, sm_gf=sm_gf+$g2,sm_ga=sm_ga+$g1,sm_gp=sm_gp+1 WHERE sm_tid='$team2'");					
$result00 = mysql_query ("SELECT count(*) as allplayed FROM te_teams WHERE sm_gp='3' AND sm_group='$sm_group'");
if  (@MYSQL_RESULT($result00,0,"allplayed")==4) {
$result0 = mysql_query("SELECT sm_tid, (sm_gf-sm_ga) as dr FROM te_teams WHERE sm_gp='3' AND sm_group='$sm_group'  ORDER BY sm_points DESC, dr DESC, sm_gf DESC LIMIT 2");
if ($myrow = mysql_fetch_array($result0)) {
do {	
	$sm_tid=$myrow["sm_tid"];
	$result2 = mysql_query("UPDATE te_teams SET sm_iter='4' WHERE sm_tid='$sm_tid'");
	$result  = mysql_query("SELECT sm_16pid FROM te_16teams WHERE sm_16tid='$sm_tid' AND sm_16w='4'");
if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["sm_16pid"];
	$result3 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+20 WHERE sm_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}	
} while ($myrow = mysql_fetch_array($result0));
}}}



	if ($whatmatch=="quarti") {
	
	$team2pz=($g1<$g2)?$team2:$team1;

	$result2 = mysql_query("UPDATE te_teams SET sm_iter='2' WHERE sm_tid='$team2pz'");
	$result  = mysql_query("SELECT sm_16pid FROM te_16teams WHERE sm_16tid='$team2pz' AND sm_16w='2'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["sm_16pid"];
	$result3 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+30 WHERE sm_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	
}
	if ($whatmatch=="semifinale") {
	
	$team2pz=($g1<$g2)?$team2:$team1;
	$result2 = mysql_query("UPDATE te_teams SET sm_iter='F' WHERE sm_tid='$team2pz'");
	$result  = mysql_query("SELECT sm_16pid FROM te_16teams WHERE sm_16tid='$team2pz' AND sm_16w='F'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["sm_16pid"];
	$result3 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+40 WHERE sm_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	
}
	if ($whatmatch=="finale") {	
	$team2pz=($g1<$g2)?$team2:$team1;
	$result2 = mysql_query("UPDATE te_teams SET sm_iter='W' WHERE sm_tid='$team2pz'");
	$result  = mysql_query("SELECT sm_16pid FROM te_16teams WHERE sm_16tid='$team2pz' AND sm_16w='W'");	
	if ($myrow = mysql_fetch_array($result)) {
do {
	$thaplaya=$myrow["sm_16pid"];
	$result3 = mysql_query("UPDATE te_playaz SET sm_points=sm_points+60 WHERE sm_pid='$thaplaya'");
	} while ($myrow = mysql_fetch_array($result));
	}
	}

}else{
if (isset ($mid) && !isset($subma)) { $result = mysql_query("SELECT sm_team1, sm_team2 FROM te_match WHERE sm_mid=$mid");	
 $team1=@MYSQL_RESULT($result,0,"sm_team1");
 $team2=@MYSQL_RESULT($result,0,"sm_team2");
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
 $result = mysql_query("SELECT sm_sid, sm_name1 FROM te_stars WHERE sm_stid='$team1' OR sm_stid='$team2'  ORDER BY sm_name1");
if ($myrow = mysql_fetch_array($result)) {
do {printf("<option value=%s>%s</option>\n", $myrow["sm_sid"], $myrow["sm_name1"]);
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

<tr><td align=center><select name=whatmatch><option value=gironi>gironi</option><option>quarti</option><option>semifinale</option><option>finale</option></select></td></tr>
<tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subma" VALUE="salva"></td></tr>
</table></form></td></tr></table><br>
<?php
}}
?><a href=te_matches.php>matches</a>