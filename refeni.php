<?php 
include ("config.php");
$connection = mysql_connect($hostname, $user, $passaworta) or die ("Unable to connect!");
mysql_select_db($database2);
$result=MYSQL_QUERY("SELECT soc, rid FROM refeni GROUP BY soc ORDER BY soc");
if ($myrow = mysql_fetch_array($result)) {print ("function DoHeadQuarter(param) {\n");  
do{

	$resulto=MYSQL_QUERY("SELECT  rid, loc FROM refeni WHERE soc='{$myrow['soc']}' ORDER BY loc");
	if ($myrow2 = mysql_fetch_array($resulto)) {
		printf ("if (param =='%s'){",$myrow["rid"]);	
		$opnum=0;print("document.s.h.options[0] = new Option( 'Seleziona sede','#');\n");
	do{$opnum++;
printf("document.s.h.options[%s] = new Option( '%s','%s');\n",$opnum,$myrow2["loc"],$myrow2["rid"]);
	
} while  ($myrow2 = mysql_fetch_array($resulto));print("}\n");
	} 		
	
}while  ($myrow = mysql_fetch_array($result));print("}\n");}


$result=MYSQL_QUERY("SELECT rid FROM refeni");
if ($myrow = mysql_fetch_array($result)) {print ("function DoReference(param) {\n");  
do{

	$resulto=MYSQL_QUERY("SELECT  rid, ref FROM refeni WHERE rid='{$myrow['rid']}'");
	if ($myrow2 = mysql_fetch_array($resulto)) {
		printf ("if (param =='%s'){",$myrow2["rid"]);	
	do{
printf("document.s.r.options[0] = new Option( '%s','0');\n",$myrow2["ref"]);	
} while  ($myrow2 = mysql_fetch_array($resulto));print("}\n");
	} 		
	
}while  ($myrow = mysql_fetch_array($result));print("}");}

$allstars="<option value='#'>Seleziona società</option>\n";
$result3=MYSQL_QUERY("SELECT rid, soc FROM refeni GROUP BY soc ORDER BY soc");
if ($myrow = mysql_fetch_array($result3)) {
	do{
$allstars=$allstars . "<option value='" . $myrow["rid"] . "'>". $myrow["soc"] . "</option>\n";
} while  ($myrow = mysql_fetch_array($result3));}
print $allstars;
?>
	