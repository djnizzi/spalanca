<?php

$result=MYSQL_QUERY("SELECT sm_pid FROM te_playaz WHERE sm_pid='$id'");

if (@MYSQL_RESULT($result,0,"sm_pid")==null){
$result=MYSQL_QUERY("INSERT INTO te_playaz (sm_pid) VALUES ('$id')");
$result=MYSQL_QUERY("SELECT sm_mid FROM te_match");
if ($myrow = mysql_fetch_array($result)) {
do {	
$matchid=$myrow["sm_mid"];
$result2 = mysql_query("INSERT INTO te_res (sm_rmid, sm_rpid, sm_g1, sm_g2, sm_1x2) VALUES ('$matchid', '$id', '{$tc_g1[$matchid]}', '{$tc_g2[$matchid]}', '{$tc_1x2[$matchid]}')");
} while ($myrow = mysql_fetch_array($result));	}
for ($i=0; $i < count($select3); $i++){
	$teamins=$select3[$i];
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', '4')");
	}
	for ($i=0; $i < count($select4); $i++){
	$teamins=$select4[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', '2')");
	}
	for ($i=0; $i < count($select5); $i++){
	$teamins=$select5[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', 'F')");
	}
	for ($i=0; $i < count($select6); $i++){
	$teamins=$select6[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', 'W')");
	}	
		for ($i=0; $i < count($select7); $i++){
	$teamins=$select7[$i] ;
$result2 = mysql_query("INSERT INTO te_goleadors (sm_gpid, sm_gsid) VALUES ('$id', '$teamins')");
	}		for ($i=0; $i < count($select8); $i++){
		$teamins=$select8[$i] ;
$result2 = mysql_query("INSERT INTO te_final (sm_fpid, sm_fsid) VALUES ('$id', '$teamins')");
	}
} else {
$result=MYSQL_QUERY("SELECT sm_mid FROM te_match");
if ($myrow = mysql_fetch_array($result)) {
do {	
$matchid=$myrow["sm_mid"];
$result2 = mysql_query("UPDATE te_res SET sm_g1='{$tc_g1[$matchid]}', sm_g2='{$tc_g2[$matchid]}', sm_1x2='{$tc_1x2[$matchid]}' WHERE sm_rmid=$matchid AND sm_rpid='$id'");
} while ($myrow = mysql_fetch_array($result));	}	
$result2 = mysql_query("DELETE FROM te_16teams WHERE sm_16pid='$id' AND sm_16w='4'");
for ($i=0; $i < count($select3); $i++){
	$teamins=$select3[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', '4')");
	}	
$result2 = mysql_query("DELETE FROM te_16teams WHERE sm_16pid='$id' AND sm_16w='2'");
for ($i=0; $i < count($select4); $i++){
	$teamins=$select4[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', '2')");
	}	
$result2 = mysql_query("DELETE FROM te_16teams WHERE sm_16pid='$id' AND sm_16w='F'");
for ($i=0; $i < count($select5); $i++){
	$teamins=$select5[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', 'F')");
	}	
$result2 = mysql_query("DELETE FROM te_16teams WHERE sm_16pid='$id' AND sm_16w='W'");
for ($i=0; $i < count($select6); $i++){
	$teamins=$select6[$i] ;
$result2 = mysql_query("INSERT INTO te_16teams (sm_16pid, sm_16tid, sm_16w) VALUES ('$id', '$teamins', 'W')");
	}
$result2 = mysql_query("DELETE FROM te_goleadors WHERE sm_gpid='$id'");			
for ($i=0; $i < count($select7); $i++){
	$teamins=$select7[$i] ;
$result2 = mysql_query("INSERT INTO te_goleadors (sm_gpid, sm_gsid) VALUES ('$id', '$teamins')");
	}		
$result2 = mysql_query("DELETE FROM te_final WHERE sm_fpid='$id'");
for ($i=0; $i < count($select8); $i++){
		$teamins=$select8[$i] ;
$result2 = mysql_query("INSERT INTO te_final (sm_fpid, sm_fsid) VALUES ('$id', '$teamins')");
	}		
	}
?>