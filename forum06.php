<link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script>
<body onload="MM_preloadImages('images/1/bl1.gif','images/1/bm1.gif','images/1/bf1.gif','images/1/bu1.gif','images/1/bb1.gif','images/1/bp1.gif')">
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
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
$start=(!isset($start))?0:$start;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM forum WHERE reply='$fid'");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-10;
$nextious = $start+10;
$thelast = $contejo-10;
$prev=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid&start=$previous
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/bl1.gif',1);return overlib('messaggi pi� recenti', WRAP);\"><img src=images/1/bl0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a>";
$next=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid&start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bm1.gif',1);return overlib('messaggi pi� vecchi', WRAP);\"><img src=images/1/bm0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a>";
	$prev2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid&start=$previous
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/bl1.gif',1);return overlib('messaggi pi� recenti', WRAP);\"><img src=images/1/bl0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a>";
$next2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid&start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bm1.gif',1);return overlib('messaggi pi� vecchi', WRAP);\"><img src=images/1/bm0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a>";
$thef=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f5','','images/1/bf1.gif',1);return overlib('ultimi messaggi', WRAP);\"><img src=images/1/bf0.gif  name=f5 width=15 height=20 border=0 id=f5 /></a>";
$thel=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid&start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f6','','images/1/bu1.gif',1);return overlib('primi messaggi', WRAP);\"><img src=images/1/bu0.gif  name=f6 width=15 height=20 border=0 id=f6 /></a>";
	$thef2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f7','','images/1/bf1.gif',1);return overlib('ultimi messaggi', WRAP);\"><img src=images/1/bf0.gif  name=f7 width=15 height=20 border=0 id=f7 /></a>";
$thel2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?fid=$fid&start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f8','','images/1/bu1.gif',1);return overlib('primi messaggi', WRAP);\"><img src=images/1/bu0.gif  name=f8 width=15 height=20 border=0 id=f8 /></a>";
$hist="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
$urale="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u1','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u1 width=15 height=20 border=0 id=u1 /></a>";

$urale2="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u2','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u2 width=15 height=20 border=0 id=u2 /></a>";

?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=90%><a href=<?php echo $mynameis; ?>><img src=images/1/dforum.gif border=0></a></td><td width=15><?php echo $urale; ?></td><td width=15><?php echo $hist; ?></td><td width=15><?php echo $thef; ?></td><td width=15><?php echo $prev; ?></td><td width=15><?php echo $next; ?></td><td width=15><?php echo $thel; ?></td><td width=15><img src=images/spacer.gif width=15></td></tr>
<?php
$result = mysql_query("SELECT fcontent, thread, fuid, UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum WHERE reply='$fid' ORDER BY fposted DESC LIMIT $start,10");
if ($myrow = mysql_fetch_array($result)) {
	printf("<tr><td class=titu colspan=8>%s</td></tr>",$myrow["thread"]);
	print("<tr><td colspan=8><table width=100% cellpadding=0 cellspacing=0>");
do {
$postato= date("d/m/Y H:i", $myrow["postato"]);
$thisuid = $myrow["fuid"];
include ("getavatar.php"); 
printf("<tr><td class=ava rowspan=2 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span></td></tr><tr><td><div class=ute>%s</div></td></tr>",urlencode($myrow["fuid"]),$avatarurl,urlencode($myrow["fuid"]),$myrow["fuid"],$postato,modernize($myrow["fcontent"]));
print("<tr><td colspan=2 class=tabsep></td></tr>");
} while  ($myrow = mysql_fetch_array($result));  }
print ("</table></td></tr><tr><td class=tabhead width=90%>");
if (isset($id)) {
print ("<img src=images/1/dpat.gif width=132 height=20>"); } ?>
</td><td  class=tabhead width=15><?php echo $urale2; ?></td><td class=tabhead width=15><?php echo $hist2; ?></td><td class=tabhead width=15><?php echo $thef2; ?></td><td class=tabhead width=15><?php echo $prev2; ?></td><td class=tabhead width=15><?php echo $next2; ?></td><td class=tabhead width=15><?php echo $thel2; ?></td><td class=tabhead width=15><img src=images/spacer.gif width=15></td></tr>
<?php

if (isset($id))
{
?><tr><td colspan=8 align="center">
	  <form id="form1" name="forum" method="post" action=<?php echo $mynameis; ?>?fid=<?php echo $fid; ?>  onSubmit="return verForumEd(document.forum);disBut(document.forum.subfor)">
	    <textarea name="fcontent" cols="80" rows="5" class="fields"></textarea>
	    <br />
	    
	    <input type="submit" class=buttons name="subfor" value="invia" />

	  </form>
	  </td></tr>
</table>

<?php
} ?></table><?php
} else 
{
if (!isset($newforum)) {
	
$start=(!isset($start))?0:$start;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM forum WHERE fid=reply");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-10;
$nextious = $start+10;
$thelast = $contejo-10;
$prev=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/bl1.gif',1);return overlib('forum con messaggi pi� recenti', WRAP);\"><img src=images/1/bl0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a>";
$next=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bm1.gif',1);return overlib('forum con messaggi pi� vecchi', WRAP);\"><img src=images/1/bm0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a>";
	$prev2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/bl1.gif',1);return overlib('forum con messaggi pi� recenti', WRAP);\"><img src=images/1/bl0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a>";
$next2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bm1.gif',1);return overlib('forum con messaggi pi� vecchi', WRAP);\"><img src=images/1/bm0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a>";	
$thef=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f5','','images/1/bf1.gif',1);return overlib('forum con i messaggi pi� recenti', WRAP);\"><img src=images/1/bf0.gif  name=f5 width=15 height=20 border=0 id=f5 /></a>";
$thel=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f6','','images/1/bu1.gif',1);return overlib('forum con i messaggi pi� vecchi', WRAP);\"><img src=images/1/bu0.gif  name=f6 width=15 height=20 border=0 id=f6 /></a>";
	$thef2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f7','','images/1/bf1.gif',1);return overlib('forum con i messaggi pi� recenti', WRAP);\"><img src=images/1/bf0.gif  name=f7 width=15 height=20 border=0 id=f7 /></a>";
$thel2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f8','','images/1/bu1.gif',1);return overlib('forum con i messaggi pi� vecchi', WRAP);\"><img src=images/1/bu0.gif  name=f8 width=15 height=20 border=0 id=f8 /></a>";	
$hist="<a href=javascript:self.history.back() onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr>
<td class=tabhead width=90%><img src=images/1/dforum.gif border=0></td><td class=tabhead width=15><?php echo $hist; ?></td><td class=tabhead width=15><?php echo $thef; ?></td><td class=tabhead width=15><?php echo $prev; ?></td><td class=tabhead width=15><?php echo $next; ?></td><td class=tabhead width=15><?php echo $thel; ?></td><td class=tabhead width=15><img src=images/spacer.gif width=15></td></tr><tr><td colspan=7><div class=forumlist><ul>
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
printf("<li><a href=forum06.php?fid=%s>",$myrow["reply"]);
printf ("%s%s<br /><span class=desc><strong>%s</strong> messaggi%s</span><br><span class=desc>ultimo messaggio di <strong>%s</strong></span><br><span class=nota>%s</span></a></li>",$avatarurl,$myrow["thread"],@MYSQL_RESULT($result2,0,"msgs"),$pluro,$highlander,$postato);
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
} while ($myrow = mysql_fetch_array($result));
}
 ?></ul></div></td></tr>
   <?php }
 
if (isset($id))
{
if (isset ($newforum)){?><table width=100% cellpadding=0 cellspacing=0><?php } ?><tr><td class=tabhead width=90%><img src=images/1/dcnf.gif height=20></td><td class=tabhead width=15><?php echo $hist2; ?></td><td class=tabhead width=15><?php echo $thef2; ?></td><td class=tabhead width=15><?php echo $prev2; ?></td><td class=tabhead width=15><?php echo $next2; ?></td><td class=tabhead width=15><?php echo $thel2; ?></td><td class=tabhead width=15><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=7 align="center">
	  <form id="forum" name="forum" method="post" action=<?php echo $mynameis; ?>  onSubmit="return verForum(document.forum);disBut(document.forum.subfor)">
	    <div class=con>forum: <INPUT TYPE=text  class=inputs size=99 NAME="thread"></div>
	    <textarea name="fcontent" cols="80" rows="5" class="fields"></textarea>
	    <br />
	    
	    <input type="submit" class=buttons name="subfor" value="invia" />

	  </form>
	  </td></tr>
</table>
<?php
} else { ?>  <tr><td class=tabhead width=90%></td><td class=tabhead width=15><?php echo $hist2; ?></td><td class=tabhead width=15><?php echo $thef2; ?></td><td class=tabhead width=15><?php echo $prev2; ?></td><td class=tabhead width=15><?php echo $next2; ?></td><td class=tabhead width=15><?php echo $thel2; ?></td><td class=tabhead width=15><img src=images/spacer.gif width=15></td></tr><?php }
}
