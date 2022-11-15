<?php

if (isset($subfor)) {
if (isset($fid))
{
$result=MYSQL_QUERY("SELECT thread from forum WHERE fid='$fid'");
$thread=addslashes(@MYSQL_RESULT($result,0,"thread"));
$result=MYSQL_QUERY("INSERT INTO forum (thread,fcontent,reply,fuid) ".
        "VALUES ('$thread','$fcontent','$fid','$id')");
}
else
{
$result=MYSQL_QUERY("INSERT INTO forum (thread,fcontent,fuid) ".
        "VALUES ('$thread','$fcontent','$id')");
$fid = mysql_insert_id();
$result = mysql_query("UPDATE forum SET reply='$fid' WHERE fid='$fid'");
}
}
if (isset($fid))
{
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center"><img src="images/allforum.jpg" width="338" height="20"></td>
                      </tr>
<?php
$result = mysql_query("SELECT fcontent, thread, fuid, UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum WHERE reply='$fid' ORDER BY fposted");
if ($myrow = mysql_fetch_array($result)) {
print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top><span class=mastika>");
printf("%s</span></td></tr></table></td></tr>",$myrow["thread"]);
do {
  $thisuid = $myrow["fuid"];
  include ("getavatar.php");
$postato= date("d/m/Y H:i", $myrow["postato"]);
print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td $spaltb4>");
printf("scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td>$spaltb2<td valign=top $spaltb3 align=center rowspan=2><a href=scheda.php?zid=%s>%s</a></td></tr>",urlencode($myrow["fuid"]),$myrow["fuid"],$postato,urlencode($myrow["fuid"]),$avatarurl);
printf("<tr><td class=mascont2 colspan=2 valign=top>%s", modernize($myrow["fcontent"]));
print("</td></tr></table></td></tr>");
} while  ($myrow = mysql_fetch_array($result));  }
print ("</table>");
if (isset($id))
{
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/anduf.jpg width=338 height=20></td>
                      </tr>
 <tr><td><form method=post name=forum action=<?php echo $mynameis; ?>?fid=<?php echo $fid; ?>  onSubmit="return verForumEd(document.forum);disBut(document.forum.subfor)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><textarea class=mascont name="fcontent" rows="5" cols="100"></textarea></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subfor" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php
}
} else 
{
if (!isset($newforum)) {
$start=(!isset($start))?0:$start;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM forum WHERE fid=reply");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-10;
$nextious = $start+10;
$prev=($start==0)?"&nbsp;":"&nbsp;<a href=$mynameis?start=$previous>vai indietro</a>";
$next=($contejo<=$nextious)?"&nbsp;":"<a href=$mynameis?start=$nextious>vai avanti</a>&nbsp;";
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
<td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center"><img src="images/allforum.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
$result = mysql_query("SELECT reply, thread,max(fid) as conto , fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum GROUP BY reply ORDER BY conto DESC LIMIT $start,10");
if ($myrow = mysql_fetch_array($result)) {
do {
$reply= $myrow["reply"];
$conto= $myrow["conto"];
$result2 = mysql_query("SELECT COUNT(*) AS msgs FROM forum WHERE reply='$reply'");
$result3 = mysql_query("SELECT fuid, UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato2 FROM forum WHERE fid='$conto'");
$postato= date("d/m/Y H:i", @MYSQL_RESULT($result3,0,"postato2"));
$pluro=(@MYSQL_RESULT($result2,0,"msgs")==1)?"o":"";
$highlander=@MYSQL_RESULT($result3,0,"fuid");
$thisuid = $highlander;
include ("getavatar.php");
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
printf("<a href=forum.php?fid=%s>%s</a></span><br>ultimo messaggio di <a href=scheda.php?zid=%s>%s</a> - %s - %s messaggi%s</td><td align=right $spaltb1><a href=scheda.php?zid=%s>%s</a></td>",$myrow["reply"],$myrow["thread"],urlencode($highlander),$highlander,$postato,@MYSQL_RESULT($result2,0,"msgs"),$pluro,urlencode($highlander),$avatarurl);
print ("</tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
}
 ?>
      <tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                            <td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center">&nbsp;</td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr></table>
   <?php }
if (isset($id))
{
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/newforum.jpg width=338 height=20></td>
                      </tr>
 <tr><td><form method=post name=forum action=<?php echo $mynameis; ?> onSubmit="return verForum(document.forum);disBut(document.forum.subfor)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>forum: <INPUT TYPE=text  class=buttons size=92 NAME="thread"></td></tr><tr><td align=center><textarea class=mascont name="fcontent" rows="5" cols="100"></textarea></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subfor" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php
}
}