<?php
if (isset($id)) {
	$result = mysql_query("SELECT cotd  FROM users WHERE id='$id'");
	$pubcotd=(@MYSQL_RESULT($result,0,"cotd")=='Y')?" | <a href=cotd.php?newcotd=1>pubblica</a>":"";
} else {$pubcotd="";}

?><table width="100%" border="0" cellspacing="2" cellpadding="0">                      <tr>
                        <td class="masall" align="center" colspan=2>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width=33% class="greek" align="center">&nbsp;</td>
                              <td class="greek" align="center"><img src="images/chick.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><a href="cotd.php">ancora chicks</a><?php echo $pubcotd; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr><tr><td><table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php
$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn,  count(cid) as commz  FROM cotd LEFT JOIN comments ON cotdid=cpid  AND ctype=2 GROUP BY cotdid ORDER BY cotdposted DESC LIMIT 0,1");
if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
   printf("<a href=cotd.php?cotdid=%s>%s</a></span><br>ritoccata da <a href=scheda.php?zid=%s>%s</a> - inviato %s<br>commenti: %s</td>", $myrow["cotdid"],$myrow["cotdalt"],urlencode($myrow["cotduid"]),$myrow["cotduid"],$postato,$myrow["commz"]);
   printf("<td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td></tr><tr><td colspan=2 class=mascont2><center><a href=cotd.php?cotdid=%s><img border=0 src=getcotd.php?cotdfn=%s&xsize=450 alt=\"%s\"></a>", urlencode($myrow["cotduid"]), urlencode($myrow["cotduid"]),$myrow["cotdid"], urlencode($myrow["cotdfn"]),$myrow["cotdalt"]);
   print("</td></tr></table></td></tr>");
   } while ($myrow = mysql_fetch_array($result));  }

?>
</table></td><td>

<table width=100% border=0 cellspacing=1 cellpadding=0>
                      <tr>
                        <td class=masall align=center>LE MEGLIO CHICKS</td>
   </tr>

<?php
$result = mysql_query("SELECT cotdid, cotduid,cotdd,cotdalt FROM cotd ORDER BY cotdd DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top>");
printf("<a href=cotd.php?cotdid=%s>%s</a><br>ritoccata da <a href=scheda.php?zid=%s>%s</a><br>%s download</td>",$myrow["cotdid"],$myrow["cotdalt"],urlencode($myrow["cotduid"]),$myrow["cotduid"],$myrow["cotdd"]);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
 ?>
 </table></td></tr></table>

<?php
?>