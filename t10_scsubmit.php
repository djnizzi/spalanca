<?php
mysql_select_db($database2);
$result=MYSQL_QUERY("SELECT tc_pid FROM t10_playaz WHERE tc_pid='$id'");

if (@MYSQL_RESULT($result,0,"tc_pid")==null){
$result=MYSQL_QUERY("INSERT INTO t10_playaz (tc_pid) VALUES ('$id')");
$result=MYSQL_QUERY("SELECT tc_mid FROM t10_match");
if ($myrow = mysql_fetch_array($result)) {
do {	
$matchid=$myrow["tc_mid"];
$result2 = mysql_query("INSERT INTO t10_res (tc_rmid, tc_rpid, tc_g1, tc_g2, tc_1x2) VALUES ('$matchid', '$id', '{$tc_g1[$matchid]}', '{$tc_g2[$matchid]}', '{$tc_1x2[$matchid]}')");
} while ($myrow = mysql_fetch_array($result));	}
for ($i=0; $i < count($select2); $i++){
	$teamins=$select2[$i];
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', '8')");
	}
	for ($i=0; $i < count($select3); $i++){
	$teamins=$select3[$i];
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', '4')");
	}
	for ($i=0; $i < count($select4); $i++){
	$teamins=$select4[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', '2')");
	}
	for ($i=0; $i < count($select5); $i++){
	$teamins=$select5[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', 'F')");
	}
	for ($i=0; $i < count($select6); $i++){
	$teamins=$select6[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', 'W')");
	}	
		for ($i=0; $i < count($select7); $i++){
	$teamins=$select7[$i] ;
$result2 = mysql_query("INSERT INTO t10_goleadors (tc_gpid, tc_gsid) VALUES ('$id', '$teamins')");
	}		for ($i=0; $i < count($select8); $i++){
		$teamins=$select8[$i] ;
$result2 = mysql_query("INSERT INTO t10_final (tc_fpid, tc_fsid) VALUES ('$id', '$teamins')");
	}
} else {
$result=MYSQL_QUERY("SELECT tc_mid FROM t10_match");
if ($myrow = mysql_fetch_array($result)) {
do {	
$matchid=$myrow["tc_mid"];
$result2 = mysql_query("UPDATE t10_res SET tc_g1='{$tc_g1[$matchid]}', tc_g2='{$tc_g2[$matchid]}', tc_1x2='{$tc_1x2[$matchid]}' WHERE tc_rmid=$matchid AND tc_rpid='$id'");
} while ($myrow = mysql_fetch_array($result));	}	
$result2 = mysql_query("DELETE FROM t10_16teams WHERE tc_16pid='$id' AND tc_16w='8'");	
for ($i=0; $i < count($select2); $i++){
	$teamins=$select2[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', '8')");
	}	
$result2 = mysql_query("DELETE FROM t10_16teams WHERE tc_16pid='$id' AND tc_16w='4'");
for ($i=0; $i < count($select3); $i++){
	$teamins=$select3[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', '4')");
	}	
$result2 = mysql_query("DELETE FROM t10_16teams WHERE tc_16pid='$id' AND tc_16w='2'");
for ($i=0; $i < count($select4); $i++){
	$teamins=$select4[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', '2')");
	}	
$result2 = mysql_query("DELETE FROM t10_16teams WHERE tc_16pid='$id' AND tc_16w='F'");
for ($i=0; $i < count($select5); $i++){
	$teamins=$select5[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', 'F')");
	}	
$result2 = mysql_query("DELETE FROM t10_16teams WHERE tc_16pid='$id' AND tc_16w='W'");
for ($i=0; $i < count($select6); $i++){
	$teamins=$select6[$i] ;
$result2 = mysql_query("INSERT INTO t10_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', 'W')");
	}
$result2 = mysql_query("DELETE FROM t10_goleadors WHERE tc_gpid='$id'");			
for ($i=0; $i < count($select7); $i++){
	$teamins=$select7[$i] ;
$result2 = mysql_query("INSERT INTO t10_goleadors (tc_gpid, tc_gsid) VALUES ('$id', '$teamins')");
	}		
$result2 = mysql_query("DELETE FROM t10_final WHERE tc_fpid='$id'");
for ($i=0; $i < count($select8); $i++){
		$teamins=$select8[$i] ;
$result2 = mysql_query("INSERT INTO t10_final (tc_fpid, tc_fsid) VALUES ('$id', '$teamins')");
	}		
	}
?>