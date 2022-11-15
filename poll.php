<link href="images/1/base.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="mashiro.js"></script><div class=con>
<?php
include ("config.php");
include ("connect.php");
$mynameis="$PHP_SELF";
if (isset($qpid)){
$result=MYSQL_QUERY("SELECT UNIX_TIMESTAMP(deadline) as rdeadline, UNIX_TIMESTAMP(DATE_ADD(deadline, INTERVAL -7 HOUR)) as ladata, pool FROM pools WHERE qpid='$qpid'");
$pool=$qpid;
} else {
$result=MYSQL_QUERY("SELECT qpid, UNIX_TIMESTAMP(deadline) as rdeadline, UNIX_TIMESTAMP(DATE_ADD(deadline, INTERVAL -7 HOUR)) as ladata, pool FROM pools WHERE status='A'");
$pool=@MYSQL_RESULT($result,0,"qpid");
	}
$poolname=@MYSQL_RESULT($result,0,"pool");
$deadline=@MYSQL_RESULT($result,0,"ladata");
$rdeadline=@MYSQL_RESULT($result,0,"rdeadline");
$chek=0;
if (isset($id) && isset($subpool)) {
$result=MYSQL_QUERY("INSERT INTO pool_as (aqpid,paid,pauid) ".
        "VALUES ('$pool','$qs','$id')");
	}
if (isset($id)) {
$result=MYSQL_QUERY("SELECT pauid FROM pool_as WHERE pauid='$id' AND aqpid='$pool'");
if (@MYSQL_RESULT($result,0,"pauid")==null && time() < $deadline) {
$chek=1;
}}
if ($chek==1){
	?>
	<form method=post name=poll action=<?php echo $mynameis; ?> onSubmit="return verSonda(document.poll);">
<?php echo $poolname; ?><br><br><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td class="tabsep"></td></tr></table><br>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<?php
$result=MYSQL_QUERY("SELECT  pqid, q FROM pool_qs WHERE qqpid='$pool' ORDER BY pqid");
if ($myrow = mysql_fetch_array($result)) {
	do{
printf("<tr><td  class=allstuff width=1 valign=top><input name=qs type=radio value=%s /></td><td  class=allstuff>%s</td></tr>",$myrow["pqid"],$myrow["q"]);
		} while  ($myrow = mysql_fetch_array($result));}
?></table><br><center><input class=buttons name="subpool" type="submit" value="Vota!" /> <span class=nota>entro il <?php echo date("d/m/Y",$rdeadline); ?></span></center>
</form>
	
<? } else {
	echo $poolname; ?><br><br><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td class="tabsep"></td></tr></table><br>
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<?php
$result=MYSQL_QUERY("SELECT count(*) as vutari, paid, q, pqid FROM pool_as, pool_qs WHERE paid=pqid AND aqpid='$pool' AND qqpid='$pool'  GROUP BY paid  ORDER BY vutari DESC");
$result2=MYSQL_QUERY("SELECT count(*) as participari FROM pool_as WHERE aqpid='$pool'");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["vutari"]*100)/(@MYSQL_RESULT($result2,0,"participari")));
printf("<tr><td class=allstuff>%s</td><td class=allstuff width=52><img src=images/1/bar.gif  width=%s height=14></td><td align=right class=allstuff>%s%%</td></tr>",$myrow["q"],round(($perc/2),0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table><br><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td class="tabsep"></td></tr></table><br><center>votanti: <?php echo @MYSQL_RESULT($result2,0,"participari");
}
	
	
?></div>