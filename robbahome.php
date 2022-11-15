<?php
$topscore=0
  ?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center"><img src="images/robba.jpg" width="338" height="20"></td>
                      </tr>
<?php
$result = mysql_query("SELECT pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title,tvd,tdd,cat FROM posts,categories WHERE ptid=tid ORDER BY pposted DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
 do {    $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
        $pid= $myrow["pid"];
        $postato= date("d/m/Y H:i",$myrow["postato"]);
  
        $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
        print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
        printf("<a href=robba.php?pid=%s>%s</a></span><br>creato da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td><td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td>", $myrow["pid"], $myrow["title"],urlencode($myrow["puid"]), $myrow["puid"],$postato ,urlencode($myrow["puid"]),urlencode($myrow["puid"]));
        print ("</tr><tr><td colspan=2 class=mascont2><table width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2><tr><td align=center width=50%>");
        printf("<a href=robba.php?pid=%s><img src=robba/thumbs/%st-robba.jpg border=0 class=masall></a></td><td>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)", $myrow["pid"], $myrow["pid"], $myrow["cat"], $myrow["tvd"],$myrow["tdd"],$finalvote,$qfv);
if ($myrow3 = mysql_fetch_array($result3)) {
	 printf("<br>Commenti: %s</td>", $myrow3["commz"]);
	}
        print ("</tr></table></td></tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
}
?>
</table>
 <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center"><img src="images/best.jpg" width="338" height="20"></td>
                      </tr>
<?php
$result = mysql_query("SELECT count(*) as commoz, pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title,tvd,tdd,cat,cid FROM posts,categories,comments WHERE ptid=tid AND cpid=pid AND ctype=0 GROUP BY pid ORDER BY voto DESC,commoz DESC, tdd DESC, tvd DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
 do {    $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
        $pid= $myrow["pid"];
        $postato= date("d/m/Y H:i",$myrow["postato"]);
  	$topscore++;
        $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid'  AND ctype=0");
        print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td><img src=images/$topscore.jpg></td><td valign=top $spaltb4><span class=mastika>");
        printf("<a href=robba.php?pid=%s>%s</a></span><br>creato da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td><td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td>", $myrow["pid"], $myrow["title"],urlencode($myrow["puid"]), $myrow["puid"],$postato ,urlencode($myrow["puid"]),urlencode($myrow["puid"]));
        print ("</tr><tr><td colspan=3 class=mascont2><table width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2><tr><td align=center width=50%>");
        printf("<a href=robba.php?pid=%s><img src=robba/thumbs/%st-robba.jpg border=0 class=masall></a></td><td>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)", $myrow["pid"], $myrow["pid"], $myrow["cat"], $myrow["tvd"],$myrow["tdd"],$finalvote,$qfv);
if ($myrow3 = mysql_fetch_array($result3)) {
	 printf("<br>Commenti: %s</td>", $myrow3["commz"]);
	}
        print ("</tr></table></td></tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
}
?>
</table>
<?php
?>
<table width=100% border=0 cellspacing=2 cellpadding=0>
 <tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign=top width=33%>
<table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>ARTISTI PIÙ ATTIVI</td>
   </tr>

<?php
$result = mysql_query("SELECT puid, count(*) as robbazza FROM posts GROUP BY puid ORDER BY robbazza DESC LIMIT 0,6");
if ($myrow = mysql_fetch_array($result)) {
do {
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("<a href=scheda.php?zid=%s>%s</a></td><td align=right>%s robbe</td>",urlencode($myrow["puid"]),$myrow["puid"],$myrow["robbazza"]);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
 ?>
 </table></td><td valign=top width=33%>
 <table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>ARTISTI PIÙ QUOTATI (con almeno 5 robbe)
                        </td>
                      </tr>
<?php
$ji=0;
$result = mysql_query("SELECT puid, ROUND(AVG(voto),4) as robbazza, count(*) as contazza FROM posts WHERE voto<>0 GROUP BY puid ORDER BY robbazza DESC");
if ($myrow = mysql_fetch_array($result)) {
do {
	if($myrow["contazza"]>4 && $ji<6) {
		$ji++;
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("<a href=scheda.php?zid=%s>%s</a></td><td align=right>media voti: %s</td>",urlencode($myrow["puid"]),$myrow["puid"],$myrow["robbazza"]);
print ("</tr></table></td></tr>");
}} while ($myrow = mysql_fetch_array($result));
}
?>
 </table></td><td valign=top width=33%>
 <table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>ROBBE PER VOTO</td>
                      </tr>
<?php
$result = mysql_query("SELECT count(*) as ro, round(voto) as ri FROM posts GROUP BY ri desc ORDER BY ri desc LIMIT 0,6");

if ($myrow = mysql_fetch_array($result)) {
do {
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("%s robbe</td><td align=right>%s</td>",$myrow["ro"],$voto[number_format(round($myrow["ri"]),2)]);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
 ?>
 </table></td></tr></table></td></tr></table>
 <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center"><img src="images/oldrobba.jpg" width="338" height="20"></td>
                      </tr>
<?php
$result = mysql_query("SELECT pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title,tvd,tdd,cat FROM posts,categories WHERE ptid=tid ORDER BY RAND() LIMIT 1");
if ($myrow = mysql_fetch_array($result)) {
 do {    $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
        $pid= $myrow["pid"];
        $postato= date("d/m/Y H:i",$myrow["postato"]);
  
        $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
        print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
        printf("<a href=robba.php?pid=%s>%s</a></span><br>creato da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td><td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td>", $myrow["pid"], $myrow["title"],urlencode($myrow["puid"]), $myrow["puid"],$postato ,urlencode($myrow["puid"]),urlencode($myrow["puid"]));
        print ("</tr><tr><td colspan=2 class=mascont2><table width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2><tr><td align=center width=50%>");
        printf("<a href=robba.php?pid=%s><img src=robba/thumbs/%st-robba.jpg border=0 class=masall></a></td><td>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)", $myrow["pid"], $myrow["pid"],$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$finalvote,$qfv);
if ($myrow3 = mysql_fetch_array($result3)) {
	 printf("<br>Commenti: %s</td>", $myrow3["commz"]);
	}
        print ("</tr></table></td></tr></table></td></tr></table>");
        } while ($myrow = mysql_fetch_array($result));
}
?>










