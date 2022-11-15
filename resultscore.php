<?php
if (isset($ftsub) || isset($_POST['fts']))  {
	if (isset($_POST['fts'])) {
	$fts=htmlspecialchars(stripslashes(utf8_decode(trim($_POST['fts']))),ENT_QUOTES);


		}
?>
<script>whattatit("risultati ricerca per '<?php echo addslashes($fts); ?>'")</script>
 <table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class=massim align="center"><b>risultati ricerca per '<?php echo $fts; ?>'</td>
                            </tr>
                          </table>
                        </td>
                      </tr></table>
<?php

$risultati=0;
$result = mysql_query("SELECT pid,title,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR))  as postato,cat FROM posts,categories WHERE MATCH (title,pcontent) AGAINST ('$fts') AND ptid=tid");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="greek" align="center"><img src="images/allrobba.jpg" width="338" height="20"></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
      print ("<tr><td class=mascont><table width=100% border=0 cellspacing=0 cellpadding=0 class=massim><tr><td valign=top>");
        printf("<a href=robba.php?pid=%s>%s</a> creato da <a href=scheda.php?zid=%s>%s</a> - inviato %s - categoria %s</td>", $myrow["pid"], $myrow["title"],urlencode($myrow["puid"]), $myrow["puid"],$postato, $myrow["cat"]);
        print ("</tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
print("</table>");
}
$result = mysql_query("SELECT nid,ntitle,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR))  as postato FROM news WHERE MATCH (ntitle,ncontent) AGAINST ('$fts') AND online='Y'");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="greek" align="center"><img src="images/onenews.jpg" width="338" height="20"></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
      print ("<tr><td class=mascont><table width=100% border=0 cellspacing=0 cellpadding=0 class=massim><tr><td valign=top>");
        printf("<a href=news.php?nid=%s>%s</a> scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td>", $myrow["nid"], $myrow["ntitle"],urlencode($myrow["nuid"]), $myrow["nuid"],$postato);
        print ("</tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
print("</table>");
}
$result = mysql_query("SELECT thread,reply,fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR))   as postato  FROM forum WHERE MATCH (thread,fcontent) AGAINST ('$fts')");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="greek" align="center"><img src="images/allforum.jpg" width="338" height="20"></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
      print ("<tr><td class=mascont><table width=100% border=0 cellspacing=0 cellpadding=0 class=massim><tr><td valign=top>");
        printf("<a href=scheda.php?zid=%s>%s</a> in <a href=forum.php?fid=%s>%s</a> - inviato %s</td>", urlencode($myrow["fuid"]), $myrow["fuid"],$myrow["reply"], $myrow["thread"],$postato);
        print ("</tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
print("</table>");
}

$result = mysql_query("SELECT cuid,UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR))  as postato,title, pid FROM comments,posts WHERE MATCH (content) AGAINST ('$fts') AND cpid=pid AND ctype=0");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="greek" align="center"><img src="images/comm.jpg" width="338" height="20"></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
      print ("<tr><td class=mascont><table width=100% border=0 cellspacing=0 cellpadding=0 class=massim><tr><td valign=top>");
        printf("<a href=scheda.php?zid=%s>%s</a> su <a href=robba.php?pid=%s>%s</a> - inviato %s</td>", urlencode($myrow["cuid"]), $myrow["cuid"],$myrow["pid"], $myrow["title"],$postato);
        print ("</tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
print("</table>");
}
$result = mysql_query("SELECT cotdalt,cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR))  as postato  FROM cotd WHERE MATCH (cotdalt) AGAINST ('$fts')");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="greek" align="center"><img src="images/chick.jpg" width="338" height="20"></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
      print ("<tr><td class=mascont><table width=100% border=0 cellspacing=0 cellpadding=0 class=massim><tr><td valign=top>");
        printf("<a href=cotd.php?cotdid=%s>%s</a> ritoccata da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td>", $myrow["cotdid"], $myrow["cotdalt"],urlencode($myrow["cotduid"]), $myrow["cotduid"],$postato);
        print ("</tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
print("</table>");
}

if ($risultati==0) {        print ("<center>la ricerca non ha prodotto risultati");  }
}
?>