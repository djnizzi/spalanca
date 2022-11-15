<?php ?>
<table width=100% border=0 cellspacing=2 cellpadding=0>
                      <tr>
                        <td class=masall align=center><img src=images/allforum.jpg width=338 height=20></td>
                      </tr>
<tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign=top width=33%>
<table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>FORUM RECENTI</td>
   </tr>

<?php
$result = mysql_query("SELECT reply, thread, fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum WHERE fid=reply ORDER BY fposted DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
$reply= $myrow["reply"];
$result2 = mysql_query("SELECT COUNT(*) AS msgs FROM forum WHERE reply='$reply'");
$postato= date("d/m/Y H:i",$myrow["postato"]);
$pluro=(@MYSQL_RESULT($result2,0,"msgs")==1)?"o":"";
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("<a href=forum.php?fid=%s>%s</a><br>aperto da <a href=scheda.php?zid=%s>%s</a> - %s<br>%s messaggi%s</td>",$myrow["reply"],$myrow["thread"],urlencode($myrow["fuid"]),$myrow["fuid"],$postato,@MYSQL_RESULT($result2,0,"msgs"),$pluro);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
 ?>
 </table></td><td valign=top width=33%>
 <table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>MESSAGGI RECENTI</td>
                      </tr>
<?php
$result = mysql_query("SELECT thread, reply, fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum ORDER BY fposted DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
$reply= $myrow["reply"];
$postato= date("d/m/Y H:i",$myrow["postato"]);
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("<a href=scheda.php?zid=%s>%s</a> in<br><a href=forum.php?fid=%s>%s</a><br>inviato %s</td>",urlencode($myrow["fuid"]),$myrow["fuid"],$reply,$myrow["thread"],$postato);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
?>
 </table></td><td valign=top width=33%>
 <table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>FORUM PIÙ SEGUITI</td>
                      </tr>
<?php
$result = mysql_query("SELECT count(*) as contado, thread, reply, UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum GROUP BY reply ORDER BY contado DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("<a href=forum.php?fid=%s>%s</a><br>%s messaggi<br>&nbsp;</td>",$myrow["reply"],$myrow["thread"],$myrow["contado"]);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
 ?>
 </table></td></tr></table></td></tr></table>
 <?php ?>



