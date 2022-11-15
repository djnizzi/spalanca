<link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script>
<body onload="MM_preloadImages('images/1/bb1.gif')">
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
$hist="<a href=javascript:self.history.back() onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
$hist3="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('fx','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=fx width=15 height=20 border=0 id=fx /></a>";
$hist4="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('fy','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=fy width=15 height=20 border=0 id=fy /></a>";
$hist5="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('fz','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=fz width=15 height=20 border=0 id=fz /></a>";


if (isset($ftsub) || isset($fts))  {
	if (isset($fts)) {
	$fts=htmlspecialchars(stripslashes(utf8_decode(trim($fts))),ENT_QUOTES);


		}
?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=95%><img src=images/1/rdr.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td class=titu colspan=3><?php echo $fts; ?></td></tr>
<?php

$risultati=0;
$result = mysql_query("SELECT pid,title,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR))  as postato,cat FROM posts,categories WHERE MATCH (title,pcontent) AGAINST ('$fts') AND ptid=tid");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>

<tr class=tabhead><td width=95%><img src=images/1/drobbah.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=3><div class=con>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
        printf("<a href=robba06.php?pid=%s>%s</a> creato da <a href=scheda.php?zid=%s>%s</a> -  <span class=nota>%s</span><br>", $myrow["pid"], $myrow["title"],urlencode($myrow["puid"]), $myrow["puid"],$postato);
        } while ($myrow = mysql_fetch_array($result));
print("</div></td></tr>");
}
$result = mysql_query("SELECT nid,ntitle,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR))  as postato FROM news WHERE MATCH (ntitle,ncontent) AGAINST ('$fts') AND online='Y'");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
<tr class=tabhead><td width=95%><img src=images/1/dnius.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=3><div class=con>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
        printf("<a href=news06.php?nid=%s>%s</a> scritto da <a href=scheda.php?zid=%s>%s</a> -  <span class=nota>%s</span><br>", $myrow["nid"], $myrow["ntitle"],urlencode($myrow["nuid"]), $myrow["nuid"],$postato);
        } while ($myrow = mysql_fetch_array($result));
print("</div></td></tr>");
}

$result = mysql_query("SELECT thread,reply,fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR))   as postato  FROM forum WHERE MATCH (thread,fcontent) AGAINST ('$fts')");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
<tr class=tabhead><td width=95%><img src=images/1/dforum.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=3><div class=con>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
        printf("<a href=scheda.php?zid=%s>%s</a> in <a href=forum06.php?fid=%s>%s</a> -  <span class=nota>%s</span><br>", urlencode($myrow["fuid"]), $myrow["fuid"],$myrow["reply"], $myrow["thread"],$postato);
        } while ($myrow = mysql_fetch_array($result));
print("</div></td></tr>");
}


$result = mysql_query("SELECT cuid,UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR))  as postato,title, pid FROM comments,posts WHERE MATCH (content) AGAINST ('$fts') AND cpid=pid AND ctype=0");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
<tr class=tabhead><td width=95%><img src=images/1/dcom.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=3><div class=con>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
        printf("<a href=scheda.php?zid=%s>%s</a> su <a href=robba06.php?pid=%s>%s</a> - <span class=nota>%s</span><br>", urlencode($myrow["cuid"]), $myrow["cuid"],$myrow["pid"], $myrow["title"],$postato);
        } while ($myrow = mysql_fetch_array($result));
print("</div></td></tr>");
}

$result = mysql_query("SELECT cotdalt,cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR))  as postato  FROM cotd WHERE MATCH (cotdalt) AGAINST ('$fts')");
if ($myrow = mysql_fetch_array($result)) {
$risultati=1;

?>
<tr class=tabhead><td width=95%><img src=images/1/dcbam.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=3><div class=con>
<?php
 do { $postato= date("d/m/Y H:i",$myrow["postato"]);
        printf("<a href=cotd06.php?cotdid=%s>%s</a> ritoccata da <a href=scheda.php?zid=%s>%s</a>  - <span class=nota>%s</span><br>", $myrow["cotdid"], $myrow["cotdalt"],urlencode($myrow["cotduid"]), $myrow["cotduid"],$postato);
        } while ($myrow = mysql_fetch_array($result));
print("</div></td></tr>");
}

if ($risultati==0) {        print ("<tr><td colspan=3><div class=con><center>la ricerca non ha prodotto risultati</div></td></tr>");  }
}
?></table>