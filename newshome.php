<?php
$pubnews=(isset($id))?" | <a href=news.php?newnews=1>pubblica</a>":"";
?><table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width=33% class="greek" align="center">&nbsp;</td>
                              <td class="greek" align="center"><img src="images/news.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><a href="news.php">ancora news</a><?php echo $pubnews; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
$result = mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle, nimg, SUBSTRING_INDEX(ncontent,' ',100) AS contenido,  count(cid) as commz  FROM news LEFT JOIN comments ON nid=cpid  AND ctype=1 WHERE news.online='Y' GROUP BY nid ORDER BY nposted DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
   printf("<a href=news.php?nid=%s>%s</a></span><br>scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s<br>commenti: %s</td>", $myrow["nid"],$myrow["ntitle"],urlencode($myrow["nuid"]),$myrow["nuid"],$postato,$myrow["commz"]);
   printf("<td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td></tr><tr><td colspan=2 class=mascont2>", urlencode($myrow["nuid"]), urlencode($myrow["nuid"]));
if ($myrow["nimg"] == "Y") {
	 printf ("<img src=misc/%s-news.jpg align=left>",$myrow["nid"]);
	}
   printf ("%s <a href=news.php?nid=%s>...&gt;</a>",modernize($myrow["contenido"]),$myrow["nid"]);
   print("</td></tr></table></td></tr>");
   } while ($myrow = mysql_fetch_array($result));  }

?>
</table>
<?php
?>