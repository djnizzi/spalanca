<?php
include ("config.php");
include ("connect.php");
include ("cookie.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title>|spalanca|dot|com|</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="images/1/tabtastic.css" rel="stylesheet" type="text/css" />
<link href="images/1/spalanca.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="addclasskillclass.js"></script>
<script type="text/javascript" src="attachevent.js"></script>
<script type="text/javascript" src="AddCSS.js"></script>
<script type="text/javascript" src="tabtastic.js"></script>
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script>
<?php include ("login06.php"); 
$strt = time() + microtime();
?> 
</head>
<body onload="MM_preloadImages('images/1/bn1.gif','images/1/bm1.gif')"><div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<table align=center width=824 cellpadding="0" cellspacing="0" border="0"><tr><td id="shadow" rowspan="2"><img src="images/1/leftbk.jpg" /></td><td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="800" height="200" title="HEADER">
    <param name="movie" value="spalancanav.swf" />
    <param name="quality" value="high" />
    <embed src="spalancanav.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="800" height="200"></embed>
  </object></td><td id="shadow"  rowspan="2"><img src="images/1/rightbk.jpg" /></td></tr><tr><td><div id="layer2">
    <div id="layer3"><table cellpadding="0" cellspacing="8" border="0" width=100%><tr>
    
    <! nius>
    
    <td width=252%><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dnius.gif" /></td>
         <?php if (isset($id)){ print "<td width=15><a href=news.php?newnews=1 onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i3','','images/1/bn1.gif',1);return overlib('crea nius', WRAP);\"><img src=images/1/bn0.gif name=i3 width=15 height=20 border=0 id=i3 /></a></td>"; } ?>
          <td width=15><a href="news.php" onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i4','','images/1/bm1.gif',1);return overlib('+ nius', WRAP);"><img src="images/1/bm0.gif"  name="i4" width="15" height="20" border="0" id="i4" /></a></td>
        </tr>
      </table>
      <div class="divcon2"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle,  SUBSTRING_INDEX(ntitle,' ',70) as thredino, SUBSTRING(ntitle FROM 1 FOR 23) as dinini, nimg, count(cid) as commz  FROM news LEFT JOIN comments ON nid=cpid  AND ctype=1 WHERE news.online='Y' GROUP BY nid ORDER BY nposted DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do {
		 if (strpos($myrow["dinini"]," ")==0){$ntitle=$myrow["dinini"]."...";} else if($myrow["ntitle"]==$myrow["thredino"]){$ntitle=$myrow["ntitle"];} else {$ntitle=$myrow["thredino"]."...";}
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $k++;
   printf("<li><a href=news.php?nid=%s onmouseout='return nd();' onmouseover=\"return overlib('<table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>inviata da<br><strong>%s</strong><br><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>commenti: %s</td></tr></table>', WRAP, CAPTION, '%s');\">",$myrow["nid"],$myrow["nuid"],$myrow["nuid"],urlencode($myrow["nuid"]),$postato,$myrow["commz"],addslashes($myrow["ntitle"]));
   if ($myrow["nimg"] == "Y") {
	 printf ("<img src=misc/thumbs/%sq-news.jpg align=left ",$myrow["nid"]);
	} else {print "<img src=images/1/nius.gif align=left ";}
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=ilgiorno>%s</span></a></li>",$ntitle,$myrow["nuid"],$postato);
if ($k<3) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div></div></td>

<! robba>
    
    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/drobbah.gif"/></td>
         <?php if (isset($id)){ print "<td width=15><a href=robba.php onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i1','','images/1/bn1.gif',1);return overlib('stupiscici!', WRAP);\"><img src=images/1/bn0.gif  name=i1 width=15 height=20 border=0 id=i1 /></a></td>"; } ?>
          <td width=15><a href="robbe.php" onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i2','','images/1/bm1.gif',1);return overlib('+ robba', WRAP);"><img src="images/1/bm0.gif" name="i2" width="15" height="20" border="0" id="i2" /></a></td>
        </tr>
      </table>
      <div class="divcon2"><ul>
      
      <?php     
$k=0;
$result = mysql_query("SELECT pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title, SUBSTRING_INDEX(title,' ',70) as thredino, SUBSTRING(title FROM 1 FOR 23) as dinini,tvd,tdd,cat FROM posts,categories WHERE ptid=tid ORDER BY pposted DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do {
	if (strpos($myrow["dinini"]," ")==0){$ntitle=$myrow["dinini"]."...";} else if($myrow["title"]==$myrow["thredino"]){$ntitle=$myrow["title"];} else {$ntitle=$myrow["thredino"]."...";}
	$pid=$myrow["pid"];
	 $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $k++;
   $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
   if ($myrow3 = mysql_fetch_array($result3)) {
	 $commisi=$myrow3["commz"];
	}
	printf("<li><a href=robba.php?pid=%s onmouseout='return nd();' onmouseover=\"return overlib('<table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>creata da<br><strong>%s</strong><br><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table>', WRAP, CAPTION, '%s')\">",$myrow["pid"],$myrow["puid"],$myrow["puid"],urlencode($myrow["puid"]),$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]));
	 printf ("<img src=robba/thumbs/%sq-robba.jpg ",$myrow["pid"]);
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=ilgiorno>%s</span></a></li>", $ntitle,$myrow["puid"],$postato);
if ($k<3) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>   
      </ul></div></div></td>
      
      
      <! pregeria>
    
    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dpreg.gif" /></td></tr>
      </table>
      <div class="divcon2"><ul>
      
      <?php     
$k=0;
$result = mysql_query("SELECT count(*) as commoz, pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title,SUBSTRING_INDEX(title,' ',70) as thredino, SUBSTRING(title FROM 1 FOR 23) as dinini,tvd,tdd,cat,cid FROM posts,categories,comments WHERE ptid=tid AND cpid=pid AND ctype=0 GROUP BY pid ORDER BY voto DESC,commoz DESC, tdd DESC, tvd DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do {	if (strpos($myrow["dinini"]," ")==0){$ntitle=$myrow["dinini"]."...";} else if($myrow["title"]==$myrow["thredino"]){$ntitle=$myrow["title"];} else {$ntitle=$myrow["thredino"]."...";}
		$pid=$myrow["pid"];
	 $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $k++;
   $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
   if ($myrow3 = mysql_fetch_array($result3)) {
	 $commisi=$myrow3["commz"];
	}
	printf("<li><a href=robba.php?pid=%s  onmouseout='return nd();' onmouseover=\"return overlib('<table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>creata da<br><strong>%s</strong><br><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table>', WRAP, CAPTION, '%s')\">",$myrow["pid"],$myrow["puid"],$myrow["puid"],urlencode($myrow["puid"]),$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]));
	 printf ("<img src=robba/thumbs/%sq-robba.jpg align=left ",$myrow["pid"]);
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=ilgiorno>%s</span></a></li>",$ntitle,$myrow["puid"],$postato);
if ($k<3) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>   
      </ul></div></div></td></tr><tr>
    
    <! cbambu>
<?php  if (isset($id)) {
	$result = mysql_query("SELECT cotd  FROM users WHERE id='$id'");
	$pubcotd=(@MYSQL_RESULT($result,0,"cotd")=='Y')?"<td width=15><a href=cotd.php?newcotd=1
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i5','','images/1/bn1.gif',1);return overlib('crea bambulia', WRAP);\"><img src=images/1/bn0.gif  name=i5 width=15 height=20 border=0 id=i5 /></a></td>":"";
} else {$pubcotd="";}  ?>
    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dcbam.gif" /></td>
         <?php echo $pubcotd; ?>
          <td width=15><a href="cotd.php" onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i6','','images/1/bm1.gif',1);return overlib('+ bambulie', WRAP);"><img src="images/1/bm0.gif" name="i6" width="15" height="20" border="0" id="i6" /></a></td>
        </tr>
      </table>
      <div class="divcon3"><table cellpadding="0" cellspacing="0" border="0" width=100%><tr><td><img src=images/spacer.gif width=1 height=198></td><td valign=middle>
<?php   
$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn,cotdd,  count(cid) as commz  FROM cotd LEFT JOIN comments ON cotdid=cpid  AND ctype=2 GROUP BY cotdid ORDER BY cotdposted DESC LIMIT 0,1");
if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
  printf("<a href=cotd.php?cotdid=%s onmouseover=\"return overlib('<table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>ritoccata da<br><strong>%s</strong><br><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>download: %s<br>commenti: %s</td></tr></table>', WRAP, CAPTION, '%s')\" onmouseout='return nd();'><img class=specr src=getcotd.php?cotdfn=%s&xsize=180></a>",$myrow["cotdid"],$myrow["cotduid"],$myrow["cotduid"],urlencode($myrow["cotduid"]),$postato,$myrow["cotdd"],$myrow["commz"],addslashes($myrow["cotdalt"]),$myrow["cotdfn"]);
} while ($myrow = mysql_fetch_array($result));  } ?>
</td><td><img src=images/spacer.gif width=1 height=198></td></tr></table></div></div></td>      

    <! arrandom>

    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/darra.gif" /></td>
        </tr>
      </table>
      <div class="divcon3"><table cellpadding="0" cellspacing="0" border="0" width=100%><tr><td><img src=images/spacer.gif width=1 height=198></td><td valign=middle>
<?php   
$result = mysql_query("SELECT pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title,tvd,tdd,cat FROM posts,categories WHERE ptid=tid ORDER BY RAND() LIMIT 1");
if ($myrow = mysql_fetch_array($result)) {
do {	 $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
          $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
 if ($myrow3 = mysql_fetch_array($result3)) {
	 $commisi=$myrow3["commz"];
	}

   printf("<a href=robba.php?pid=%s onmouseover=\"return overlib('<table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>creata da<br><strong>%s</strong><br><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table>', WRAP, CAPTION, '%s')\" onmouseout='return nd();'><img class=specr src=thumb.php?pid=%s&xsize=180></a>", $myrow["pid"],$myrow["puid"],$myrow["puid"],urlencode($myrow["puid"]),$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]),$myrow["pid"]);
} while ($myrow = mysql_fetch_array($result));  } ?>
<td><img src=images/spacer.gif width=1 height=198></td></tr></table></div></div></td>  

    <! sondaggio>

    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=250>
        <tr>
          <td><img src="images/1/dsonda.gif" /></td>
        </tr>
      </table>
<iframe name="sonda" src="poll.php" width=250 height=200 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=auto></iframe></div></td></tr><tr><td colspan=2 width=512>
      
  <! forum>
      <div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dforum.gif" /></td>
         <?php if (isset($id)){ print "<td width=15><a href=forum06.php?newforum=1 onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i7','','images/1/bn1.gif',1);return overlib('crea forum', WRAP);\"><img src=images/1/bn0.gif name=i7 width=15 height=20 border=0 id=i7 /></a></td>"; } ?>
          <td width=15><a href="forum.php" onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i8','','images/1/bm1.gif',1);return overlib('+ forum', WRAP);"><img src="images/1/bm0.gif" name="i8" width="15" height="20" border="0" id="i8" /></a></td>
        </tr>
      </table>
 <ul class="tabset_tabs"><li><a href="#tab1" class="active">ultimi post</a></li><li><a href="#tab2">ultimi forum</a></li><li><a href="#tab3">+ seguiti</a></li></ul>
<div id="tab1" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT thread, SUBSTRING_INDEX(thread,' ',67) as thredino, SUBSTRING(thread FROM 1 FOR 69) as dinini, reply, fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum ORDER BY fposted DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   if($myrow["thread"]==$myrow["dinini"]){$thread=$myrow["thread"];} else if (strlen($myrow["dinini"])>strlen($myrow["thredino"])){$thread=$myrow["thredino"]."...";} else {$thread=$myrow["dinini"]."...";}
   $k++;
   printf("<li><a href=# onClick=javascript:spalanca('forum06.php?fid=%s')><span class=ilgiorno>%s</span><span class=desc> <strong>%s</strong></span><span class=desc> in</span><br />%s</a>",$myrow["reply"],$postato,$myrow["fuid"],$thread);
if ($k<5) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div>
<div id="tab2" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT reply, thread, SUBSTRING_INDEX(thread,' ',67) as thredino, SUBSTRING(thread FROM 1 FOR 69) as dinini, fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum WHERE fid=reply ORDER BY fposted DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
	   if($myrow["thread"]==$myrow["dinini"]){$thread=$myrow["thread"];} else if (strlen($myrow["dinini"])>strlen($myrow["thredino"])){$thread=$myrow["thredino"]."...";} else {$thread=$myrow["dinini"]."...";}
	$reply= $myrow["reply"];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $result2 = mysql_query("SELECT COUNT(*) AS msgs FROM forum WHERE reply='$reply'");
$pluro=(@MYSQL_RESULT($result2,0,"msgs")==1)?"o":"";
   $k++;
   printf("<li><a href=forum.php?fid=%s>%s<br /><span class=desc>creato da <strong>%s</strong> </span><span class=ilgiorno>%s</span><span class=desc> - %s messaggi%s</span></a>",$myrow["reply"],$thread,$myrow["fuid"],$postato,@MYSQL_RESULT($result2,0,"msgs"),$pluro);
if ($k<5) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div>
<div id="tab3" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT count(*) as contado, thread, SUBSTRING_INDEX(thread,' ',67) as thredino, SUBSTRING(thread FROM 1 FOR 69) as dinini, reply, UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum GROUP BY reply ORDER BY contado DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
	if($myrow["thread"]==$myrow["dinini"]){$thread=$myrow["thread"];} else if (strlen($myrow["dinini"])>strlen($myrow["thredino"])){$thread=$myrow["thredino"]."...";} else {$thread=$myrow["dinini"]."...";}
   $k++;
   printf("<li><a href=forum.php?fid=%s>%s<br /><span class=desc>%s messaggi</span></a>",$myrow["reply"],$thread,$myrow["contado"]);
if ($k<5) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div>
</div></td>

<!numeri>
 <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dnum.gif" /></td>
        </tr>
      </table>
 <ul class="tabset_tabs"><li><a href="#tab4" class="active">+ quotati</a></li><li><a href="#tab5">+ attivi</a></li><li><a href="#tab6">robbe</a></li><li><a href="#tab7">...</a></li></ul>
<div id="tab4" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT puid, ROUND(AVG(voto),4) as robbazza, count(*) as contazza FROM posts WHERE voto<>0 GROUP BY puid ORDER BY robbazza DESC");
if ($myrow = mysql_fetch_array($result)) {
do {	if($myrow["contazza"]>4 && $k<5) {
   $k++;
   printf("<li><a href=scheda.php?zid=%s onmouseout='return nd();' onmouseover=\"return overlib('<img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50>',WRAP)\"><strong>%s</strong><br /><span class=desc>media voti: %s</span></a>",urlencode($myrow["puid"]),urlencode($myrow["puid"]),$myrow["puid"],$myrow["robbazza"]);
if ($k<5) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }}} while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div>
<div id="tab5" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT puid, count(*) as robbazza FROM posts GROUP BY puid ORDER BY robbazza DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {	
   $k++;
   printf("<li><a href=scheda.php?zid=%s onmouseout='return nd();' onmouseover=\"return overlib('<img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50>',WRAP)\"><strong>%s</strong><br /><span class=desc>robbe: %s</span></a>",urlencode($myrow["puid"]),urlencode($myrow["puid"]),$myrow["puid"],$myrow["robbazza"]);
if ($k<5) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");}
  } while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div>
<div id="tab6" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT count(*) as ro, round(voto) as ri FROM posts GROUP BY ri desc ORDER BY ri desc LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {	
   $k++;
   printf("<li><a href=javascript:void(0)>%s<br /><span class=desc>%s robbe</span></a>",$voto[number_format(round($myrow["ri"]),2)],$myrow["ro"]);
if ($k<5) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>
</ul></div>
<div id="tab7" class="tabset_content">
<?php 
if (!isset ($nocount)) {
$result = mysql_query("UPDATE counter SET accessed=accessed+1 WHERE pageid='home.php'");}
$result = mysql_query("SELECT accessed FROM counter WHERE pageid='home.php'");
print ("<center><br />accessi alla homepage: <strong>" . @MYSQL_RESULT($result,0,"accessed") . "</strong>");
$result = mysql_query("SELECT count(*) as contejo FROM users");
print ("<br />iscritti a |spalanca|dot|com|: <strong>" . @MYSQL_RESULT($result,0,"contejo") . "</strong>") ;
$result = mysql_query("SELECT count(*) as contejo FROM posts");
print ("<br />robba pubblicata: <strong>" . @MYSQL_RESULT($result,0,"contejo")) ;
print("<br /><a href=priv_stats/index.html target=stat>statistiche d'utilizzo</a><br /><table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table><br /></strong>");
$end = time() + microtime();
$tot = number_format(((round(($end - $strt)*1000))/1000),3,',','.');
print "pagina generata in <strong>$tot</ strong> secondi</strong><br /><br />a NiZ creation";
?>
</div></td></tr>
<tr><td colspan=3><div align="center"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="550" height="100" id="loadban" align="absmiddle" >
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="loadban.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="loadban.swf" quality="high" bgcolor="#ffffff" width="550" height="100" name="loadban" align="absmiddle"  allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object></div></td></tr><tr><td><img src=images/spacer.gif width=252 height=1></td><td><img src=images/spacer.gif width=252 height=1></td><td><img src=images/spacer.gif width=252 height=1></td></tr></table>
</div></div></td></tr></table>
</div><?php include ("amispace.php");
include ("randomstuff.php"); 
include ("altra.php");
?>
</body>
</html>
