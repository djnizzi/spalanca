<?php
$result00 = mysql_query ("SELECT count(*) as didtwo FROM tc_16teams WHERE tc_16pid='$zid' AND tc_16w='Q'");	
if (@MYSQL_RESULT($result00,0,"didtwo")==0){
$result=MYSQL_QUERY("SELECT tc_mid FROM tc_match WHERE tc_mid>96 AND tc_mid<145");
if ($myrow = mysql_fetch_array($result)) {
do {	
$matchid=$myrow["tc_mid"];
$result2 = mysql_query("INSERT INTO tc_res (tc_rmid, tc_rpid, tc_g1, tc_g2, tc_1x2) VALUES ('$matchid', '$id', '{$tc_g1[$matchid]}', '{$tc_g2[$matchid]}', '{$tc_1x2[$matchid]}')");
} while ($myrow = mysql_fetch_array($result));	}
for ($i=0; $i < count($select2); $i++){
	$teamins=$select2[$i];
$result2 = mysql_query("INSERT INTO tc_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', 'Q')");
	}
} else {
$result=MYSQL_QUERY("SELECT tc_mid FROM tc_match  WHERE tc_mid>96 AND tc_mid<145");
if ($myrow = mysql_fetch_array($result)) {
do {	
$matchid=$myrow["tc_mid"];
$result2 = mysql_query("UPDATE tc_res SET tc_g1='{$tc_g1[$matchid]}', tc_g2='{$tc_g2[$matchid]}', tc_1x2='{$tc_1x2[$matchid]}' WHERE tc_rmid=$matchid AND tc_rpid='$id'");
} while ($myrow = mysql_fetch_array($result));	}	
$result2 = mysql_query("DELETE FROM tc_16teams WHERE tc_16pid='$id' AND tc_16w='Q'");	
for ($i=0; $i < count($select2); $i++){
	$teamins=$select2[$i] ;
$result2 = mysql_query("INSERT INTO tc_16teams (tc_16pid, tc_16tid, tc_16w) VALUES ('$id', '$teamins', 'Q')");
	}	
	}
?>