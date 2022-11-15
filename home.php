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
<meta name="viewport" content="width=device-width, initial-scale=1.2" />
<title>( spalanca )</title>
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
$random1to3 = rand(1, 3);
$strt = time() + microtime();
if (isset($topage)) {$oltp=";spalanca('$topage')";} else {$oltp="";}
?> 
</head>
<body onload="MM_preloadImages('images/1/bc1.gif','images/1/bn1.gif','images/1/bm1.gif','images/1/bb1.gif')<?php echo $oltp; ?>"><div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<div name=thediv id=thediv style="left: 60px;top: 248px;width:750px; height:585px; background-image:url('images/wb.gif');filter:alpha(Opacity=25);-moz-opacity:.25;opacity:.25;position:absolute;display:none;z-index:186"></div>
<div name=thediv2 id=thediv2 style="background-image: url(images/1/divbg.gif);left: 50px;top: 238px;width:750px; height:585px;position:absolute;display:none;z-index:187"><iframe style="background-image: url(images/1/divbg.gif); border: 1px solid #303030; left: 40px;top: 238px;width:750px; height:585px;z-index:187;" name=theif id=theif src=javascript:;></iframe></div>
<div name=thediv3 id=thediv3 style="left: 0px;top: 239px;width:10px; height:10px;position:absolute;display:none;z-index:188"><table cellpadding=0 cellspacing=0 border=0><tr><!td width=15><!a href="javascript:frames['theif'].location.href=window.history.go(-1);" onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('ib','','images/1/bb1.gif',1);return overlib('indietro', WRAP);"><!img src=images/1/bb0.gif name=ib id=ib border=0><!/a><!/td><td><a href="javascript:chiudi();" onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('ix','','images/1/bc1.gif',1);return overlib('chiudi', WRAP);"><img style="margin-left:5px" src=images/1/bc0.gif name=ix id=ix border=0></a></td></tr></table></div>
<table align=center width=824 cellpadding="0" cellspacing="0" border="0"><tr><td id="shadow" rowspan="2"><img src="images/1/leftbk.jpg" /></td><td>
<center><div class="video-wrapper-header"><video playsinline autoplay muted loop poster="images/video/hmovie<?php echo $random1to3; ?>.jpg">
    <source src="images/video/hmovie<?php echo $random1to3; ?>.webm" type="video/webm">
    <source src="images/video/hmovie<?php echo $random1to3; ?>.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
<div class="hbuttonsontop"><form class="nomargin" action=results.php method=post name=ftf onSubmit="return cercaCosa(document.forms[0].fts)">
  <input type="text" name="fts" class="hinput"> <button type="submit" name="ftsub" class="hbutton">cerca</button></form>
<button class="hbutton" onClick="javascript:spalanca('about06.php')">cosa siamo</button><br>
<?php include ("login22.php"); ?>
</div>
</div>
</td><td id="shadow"  rowspan="2"><img src="images/1/rightbk.jpg" /></td></tr><tr><td><div id="layer2">
    <div id="layer3"><table cellpadding="0" cellspacing="8" border="0" width=100%><tr>
    
<! robba>
    
    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/drobbah.gif"/></td>
         <?php if (isset($id)){ print "<td width=15><a href=# onClick=javascript:spalanca('robba06.php') onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i1','','images/1/bn1.gif',1);return overlib('stupiscici!', WRAP);\"><img src=images/1/bn0.gif  name=i1 width=15 height=20 border=0 id=i1 /></a></td>"; } ?>
          <td width=15><a href=# onClick=javascript:spalanca('robbe06.php') onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i2','','images/1/bm1.gif',1);return overlib('+ robba', WRAP);"><img src="images/1/bm0.gif" name="i2" width="15" height="20" border="0" id="i2" /></a></td>
        </tr>
      </table>
      <div class="divcon2"><ul>
      
      <?php     
$k=0;
$result = mysql_query("SELECT pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title, SUBSTRING_INDEX(title,' ',70) as thredino, SUBSTRING(title FROM 1 FOR 23) as dinini,tvd,tdd,cat FROM posts,categories WHERE ptid=tid ORDER BY RAND() DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do {
	if (strpos($myrow["dinini"]," ")==0){$ntitle=$myrow["dinini"]."...";} else if($myrow["title"]==$myrow["thredino"]){$ntitle=$myrow["title"];} else {$ntitle=$myrow["thredino"]."...";}
	$pid=$myrow["pid"];
	 $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $thisuid = $myrow["puid"];
   include ("getavatar.php"); 
   $k++;
   $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
   if ($myrow3 = mysql_fetch_array($result3)) {
	 $commisi=$myrow3["commz"];
	}
	printf("<li><a href=# onClick=javascript:spalanca('robba06.php?pid=%s') onmouseout='return nd();' onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>creata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table></div>', WRAP, CAPTION, '%s')\">",$myrow["pid"],$myrow["puid"],$myrow["puid"],$avatarurl,$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]));
	 printf ("<img class=robbathumb src=robba/thumbs/%st-robba.jpg ",$myrow["pid"]);
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=ilgiorno>%s</span></a></li>", $ntitle,$myrow["puid"],$postato);
if ($k<3) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>   
      </ul></div></div></td>
      <! nius>
    
    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dnius.gif" /></td>
         <?php if (isset($id)){ print "<td width=15><a href=# onClick=javascript:spalanca('news06.php?newnews=1') onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i3','','images/1/bn1.gif',1);return overlib('crea nius', WRAP);\"><img src=images/1/bn0.gif name=i3 width=15 height=20 border=0 id=i3 /></a></td>"; } ?>
          <td width=15><a href=# onClick=javascript:spalanca('news06.php') onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i4','','images/1/bm1.gif',1);return overlib('+ nius', WRAP);"><img src="images/1/bm0.gif"  name="i4" width="15" height="20" border="0" id="i4" /></a></td>
        </tr>
      </table>
      <div class="divcon2"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle,   SUBSTRING(ntitle FROM 1 FOR 23) as dinini, nimg, count(cid) as commz  FROM news LEFT JOIN comments ON nid=cpid  AND ctype=1 WHERE news.online='Y' GROUP BY nid ORDER BY RAND() DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do { 

		 if (strpos($myrow["dinini"]," ")==0 && strlen($myrow["dinini"])>22){$ntitle=$myrow["dinini"]."...";} else 
	if(strlen($myrow["ntitle"])>50){
		$safethre=strpos($myrow["ntitle"]," ",50);
	if ($safethre==0 || $safethre>70) {$thredino=substr($myrow["ntitle"],0,50);}else
	{$thredino=substr($myrow["ntitle"],0,$safethre-1);}
		$ntitle=$thredino."...";}else{$ntitle=$myrow["ntitle"];}
    $thisuid = $myrow["nuid"];
    include ("getavatar.php"); 
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $k++;
  printf("<li><a  href=# onClick=javascript:spalanca('news06.php?nid=%s') onmouseout='return nd();' onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>inviata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>commenti: %s</td></tr></table></div>', WRAP, CAPTION, '%s');\">",$myrow["nid"],$myrow["nuid"],$myrow["nuid"],$avatarurl,$postato,$myrow["commz"],addslashes($myrow["ntitle"]));
   if ($myrow["nimg"] == "Y") {
	 printf ("<img src=misc/thumbs/%sq-news.jpg align=left ",$myrow["nid"]);
	} else {print "<img src=images/1/nius.gif align=left ";}
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=ilgiorno>%s</span></a></li>",$ntitle,$myrow["nuid"],$postato);
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
$result = mysql_query("SELECT count(*) as commoz, pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,voto,title,SUBSTRING_INDEX(title,' ',70) as thredino, SUBSTRING(title FROM 1 FOR 23) as dinini,tvd,tdd,cat,cid FROM posts,categories,comments WHERE ptid=tid AND cpid=pid AND ctype=0 AND voto>4.2 GROUP BY pid ORDER BY RAND() DESC LIMIT 0,3");
if ($myrow = mysql_fetch_array($result)) {
do {	if (strpos($myrow["dinini"]," ")==0){$ntitle=$myrow["dinini"]."...";} else if($myrow["title"]==$myrow["thredino"]){$ntitle=$myrow["title"];} else {$ntitle=$myrow["thredino"]."...";}
		$pid=$myrow["pid"];
	 $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $thisuid = $myrow["puid"];
   include ("getavatar.php"); 
   $k++;
   $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
   if ($myrow3 = mysql_fetch_array($result3)) {
	 $commisi=$myrow3["commz"];
	}
printf("<li><a href=# onClick=javascript:spalanca('robba06.php?pid=%s')   onmouseout='return nd();' onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>creata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table></div>', WRAP, CAPTION, '%s')\">",$myrow["pid"],$myrow["puid"],$myrow["puid"],$avatarurl,$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]));
	 printf ("<img class=robbathumb src=robba/thumbs/%st-robba.jpg align=left ",$myrow["pid"]);
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=ilgiorno>%s</span></a></li>",$ntitle,$myrow["puid"],$postato);
if ($k<3) {
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  }} while ($myrow = mysql_fetch_array($result));  } ?>   
      </ul></div></div></td></tr><tr>
    
    <! cbambu>
<?php  if (isset($id)) {
	$result = mysql_query("SELECT cotd  FROM users WHERE id='$id'");
	$pubcotd=(@MYSQL_RESULT($result,0,"cotd")=='Y')?"<td width=15><a href=# onClick=javascript:spalanca('cotd06.php?newcotd=1')
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i5','','images/1/bn1.gif',1);return overlib('crea bambulia', WRAP);\"><img src=images/1/bn0.gif  name=i5 width=15 height=20 border=0 id=i5 /></a></td>":"";
} else {$pubcotd="";}  ?>
    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dcbam.gif" /></td>
         <?php echo $pubcotd; ?>
          <td width=15><a  href=# onClick=javascript:spalanca('cotd06.php') onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i6','','images/1/bm1.gif',1);return overlib('+ bambulie', WRAP);"><img src="images/1/bm0.gif" name="i6" width="15" height="20" border="0" id="i6" /></a></td>
        </tr>
      </table>
      <div class="divcon3"><table cellpadding="0" cellspacing="0" border="0" width=100%><tr><td><img src=images/spacer.gif width=1 height=198></td><td valign=middle>
<?php   
$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn,cotdd,  count(cid) as commz  FROM cotd LEFT JOIN comments ON cotdid=cpid  AND ctype=2 GROUP BY cotdid ORDER BY RAND() DESC LIMIT 0,1");
if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $thisuid = $myrow["cotduid"];
   include ("getavatar.php"); 
  printf("<a href=# onClick=javascript:spalanca('cotd06.php?cotdid=%s') onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>ritoccata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>download: %s<br>commenti: %s</td></tr></table></div>', WRAP, CAPTION, '%s')\" onmouseout='return nd();'><img class=specr src=getcotd.php?cotdfn=%s&xsize=232 class=robbathumb-arrandom></a>",$myrow["cotdid"],$myrow["cotduid"],$myrow["cotduid"],$avatarurl,$postato,$myrow["cotdd"],$myrow["commz"],addslashes($myrow["cotdalt"]),$myrow["cotdfn"]);
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
$pid=$myrow["pid"];
$thisuid = $myrow["puid"];
include ("getavatar.php"); 
$finalvote=$voto[number_format(round($qfv),2)];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
          $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
 if ($myrow3 = mysql_fetch_array($result3)) {
	 $commisi=$myrow3["commz"];
	}

  printf("<a href=# onClick=javascript:spalanca('robba06.php?pid=%s') onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top>creata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table></div>', WRAP, CAPTION, '%s')\" onmouseout='return nd();'><img class='specr robbathumb-arrandom' src=thumb.php?pid=%s&xsize=232></a>", $myrow["pid"],$myrow["puid"],$myrow["puid"],$avatarurl,$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]),$myrow["pid"]);
} while ($myrow = mysql_fetch_array($result));  } ?>
<td><img src=images/spacer.gif width=1 height=198></td></tr></table></div></div></td>  

    <! sondaggio>

    <td width=252><div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=250>
        <tr>
          <td><img src="images/1/dsonda.gif" /></td>
        </tr>
      </table>
<iframe name="sonda" src="poll.php?nc=<?php echo time(); ?>" width=250 height=200 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=auto></iframe></div></td></tr><tr><td colspan=2 width=512>
      
  <! forum>
      <div class="divcon">
      <table class="tabhead" cellpadding="0" cellspacing="0" border="0" width=100%>
        <tr>
          <td><img src="images/1/dforum.gif" /></td>
         <?php if (isset($id)){ print "<td width=15><a href=# onClick=javascript:spalanca('forum06.php?newforum=1') onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('i7','','images/1/bn1.gif',1);return overlib('crea forum', WRAP);\"><img src=images/1/bn0.gif name=i7 width=15 height=20 border=0 id=i7 /></a></td>"; } ?>
          <td width=15><a href=# onClick=javascript:spalanca('forum06.php')  onmouseout='MM_swapImgRestore();return nd();' onmouseover="MM_swapImage('i8','','images/1/bm1.gif',1);return overlib('+ forum', WRAP);"><img src="images/1/bm0.gif" name="i8" width="15" height="20" border="0" id="i8" /></a></td>
        </tr>
      </table>
 <ul class="tabset_tabs"><li><a href="#tab3" class="active">+ seguiti</a></li><li><a href="#tab1">post arrandom</a></li><li><a href="#tab2">forum arrandom</a></li></ul>
<div id="tab1" class="tabset_content"><ul>
<?php 
$k=0;    
$result = mysql_query("SELECT thread, SUBSTRING_INDEX(thread,' ',67) as thredino, SUBSTRING(thread FROM 1 FOR 69) as dinini, reply, fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum ORDER BY RAND() DESC LIMIT 0,5");
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
$result = mysql_query("SELECT reply, thread, SUBSTRING_INDEX(thread,' ',67) as thredino, SUBSTRING(thread FROM 1 FOR 69) as dinini, fuid,UNIX_TIMESTAMP(DATE_ADD(fposted, INTERVAL $fuso HOUR)) AS postato FROM forum WHERE fid=reply ORDER BY RAND() DESC LIMIT 0,5");
if ($myrow = mysql_fetch_array($result)) {
do {
	   if($myrow["thread"]==$myrow["dinini"]){$thread=$myrow["thread"];} else if (strlen($myrow["dinini"])>strlen($myrow["thredino"])){$thread=$myrow["thredino"]."...";} else {$thread=$myrow["dinini"]."...";}
	$reply= $myrow["reply"];
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $result2 = mysql_query("SELECT COUNT(*) AS msgs FROM forum WHERE reply='$reply'");
$pluro=(@MYSQL_RESULT($result2,0,"msgs")==1)?"o":"";
   $k++;
   printf("<li><a href=# onClick=javascript:spalanca('forum06.php?fid=%s')>%s<br /><span class=desc>creato da <strong>%s</strong> </span><span class=ilgiorno>%s</span><span class=desc> - %s messaggi%s</span></a>",$myrow["reply"],$thread,$myrow["fuid"],$postato,@MYSQL_RESULT($result2,0,"msgs"),$pluro);
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
   printf("<li><a href=# onClick=javascript:spalanca('forum06.php?fid=%s')>%s<br /><span class=desc>%s messaggi</span></a>",$myrow["reply"],$thread,$myrow["contado"]);
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
   $thisuid = $myrow["puid"];
   include ("getavatar.php"); 
   printf("<li><a href=scheda.php?zid=%s onmouseout='return nd();' onmouseover=\"return overlib('%s',WRAP)\"><strong>%s</strong><br /><span class=desc>media voti: %s</span></a>",urlencode($myrow["puid"]),$avatarurl,$myrow["puid"],$myrow["robbazza"]);
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
   $thisuid = $myrow["puid"];
   include ("getavatar.php"); 
   printf("<li><a href=scheda.php?zid=%s onmouseout='return nd();' onmouseover=\"return overlib('%s',WRAP)\"><strong>%s</strong><br /><span class=desc>robbe: %s</span></a>",urlencode($myrow["puid"]),$avatarurl,$myrow["puid"],$myrow["robbazza"]);
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
print ("<br />iscritti a spalanca: <strong>" . @MYSQL_RESULT($result,0,"contejo") . "</strong>") ;
$result = mysql_query("SELECT count(*) as contejo FROM posts");
print ("<br />robba pubblicata: <strong>" . @MYSQL_RESULT($result,0,"contejo")) ;
print("<br /><a href=priv_stats/index.html target=stat>statistiche d'utilizzo</a><br /><table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table><br /></strong>");
$end = time() + microtime();
$tot = number_format(((round(($end - $strt)*1000))/1000),3,',','.');
print "pagina generata in <strong>$tot</ strong> secondi</strong><br /><br />a NiZ creation";
?>
</div></td></tr>
</table>
<div class="slider-container">
  <div class="slider">
    <div class="slides">
      <div id="slides__1" class="slide">
            <div class="video-wrapper" onclick="window.open('contest2/conhome.php?conid=spc2','_blank')">
      <video playsinline autoplay muted loop poster="images/video/banner-contest2.jpg">
    <source src="images/video/banner-contest2.webm" type="video/webm">
    <source src="images/video/banner-contest2.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__next" href="#slides__2" title="Next"></a>
      </div>
      <div id="slides__2" class="slide">
      <div class="video-wrapper" onclick="window.open('contest/conhome.php?conid=spc04','_blank')">
<video playsinline autoplay muted loop poster="images/video/banner-contest.jpg">
    <source src="images/video/banner-contest.webm" type="video/webm">
    <source src="images/video/banner-contest.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__1" title="Prev"></a>
        <a class="slide__next" href="#slides__3" title="Next"></a>
      </div>
      <div id="slides__3" class="slide">
      <div class="video-wrapper" onclick="window.open('m4_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-tm4.jpg">
    <source src="images/video/banner-tm4.webm" type="video/webm">
    <source src="images/video/banner-tm4.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__2" title="Prev"></a>
        <a class="slide__next" href="#slides__4" title="Next"></a>
      </div>
      <div id="slides__4" class="slide">
    <div class="video-wrapper" onclick="window.open('m3_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-tm3.jpg">
    <source src="images/video/banner-tm3.webm" type="video/webm">
    <source src="images/video/banner-tm3.mp4" type="video/mp4">Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__3" title="Prev"></a>
        <a class="slide__next" href="#slides__5" title="Next"></a>
      </div>
      <div id="slides__5" class="slide">
      <div class="video-wrapper" onclick="window.open('m2_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-tm2.jpg">
    <source src="images/video/banner-tm2.webm" type="video/webm">
    <source src="images/video/banner-tm2.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__4" title="Prev"></a>
        <a class="slide__next" href="#slides__6" title="Next"></a>
      </div>
      <div id="slides__6" class="slide">
            <div class="video-wrapper" onclick="window.open('sm_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-tm.jpg">
    <source src="images/video/banner-tm.webm" type="video/webm">
    <source src="images/video/banner-tm.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__5" title="Prev"></a>
        <a class="slide__next" href="#slides__7" title="Next"></a>
      </div>
      <div id="slides__7" class="slide">
      <div class="video-wrapper" onclick="window.open('te12_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-te12.jpg">

</video></div>
        <a class="slide__prev" href="#slides__6" title="Prev"></a>
        <a class="slide__next" href="#slides__8" title="Next"></a>
      </div>
      <div id="slides__8" class="slide">
       <div class="video-wrapper" onclick="window.open('te8_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-te8.jpg">
       <source src="images/video/banner-te8.mp4" type="video/mp4">
</video></div>
        <a class="slide__prev" href="#slides__7" title="Prev"></a>
        <a class="slide__next" href="#slides__9" title="Next"></a>
      </div>
      <div id="slides__9" class="slide">
      <div class="video-wrapper" onclick="window.open('te_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-te.jpg">
    <source src="images/video/banner-te.webm" type="video/webm">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__8" title="Prev"></a>
        <a class="slide__next" href="#slides__10" title="Next"></a>
      </div>
      <div id="slides__10" class="slide">
      <div class="video-wrapper" onclick="window.open('t11_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t11.jpg">
</video></div>
        <a class="slide__prev" href="#slides__9" title="Prev"></a>
        <a class="slide__next" href="#slides__11" title="Next"></a>
      </div>
      <div id="slides__11" class="slide">
      <div class="video-wrapper" onclick="window.open('t10_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t10.jpg">
</video></div>
        <a class="slide__prev" href="#slides__10" title="Prev"></a>
        <a class="slide__next" href="#slides__12" title="Next"></a>
      </div>
      <div id="slides__12" class="slide">
     <div class="video-wrapper" onclick="window.open('t9_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t9.jpg">
</video></div>
        <a class="slide__prev" href="#slides__11" title="Prev"></a>
        <a class="slide__next" href="#slides__13" title="Next"></a>
      </div>
      <div id="slides__13" class="slide">
<div class="video-wrapper" onclick="window.open('t8_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t8.jpg">
    <source src="images/video/banner-t8.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__12" title="Prev"></a>
        <a class="slide__next" href="#slides__14" title="Next"></a>
      </div>
      <div id="slides__14" class="slide">
<div class="video-wrapper" onclick="window.open('t7_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t7.jpg">
    <source src="images/video/banner-t7.webm" type="video/webm">
    <source src="images/video/banner-t7.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__13" title="Prev"></a>
        <a class="slide__next" href="#slides__15" title="Next"></a>
      </div>
      <div id="slides__15" class="slide">
<div class="video-wrapper" onclick="window.open('t6_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-tc.jpg">
    <source src="images/video/banner-tc.webm" type="video/webm">
    <source src="images/video/banner-tc.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video></div>
        <a class="slide__prev" href="#slides__14" title="Prev"></a>
        <a class="slide__next" href="#slides__16" title="Next"></a>
      </div>
      <div id="slides__16" class="slide">
<div class="video-wrapper" onclick="window.open('t5_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t5.jpg">

</video></div>
        <a class="slide__prev" href="#slides__15" title="Prev"></a>
        <a class="slide__next" href="#slides__17" title="Next"></a>
      </div>
      <div id="slides__17" class="slide">
<div class="video-wrapper" onclick="window.open('t4_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t4.jpg">

</video></div>
        <a class="slide__prev" href="#slides__16" title="Prev"></a>
        <a class="slide__next" href="#slides__18" title="Next"></a>
      </div>
      <div id="slides__18" class="slide">
<div class="video-wrapper" onclick="window.open('t3_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t3.jpg">

</video></div>
        <a class="slide__prev" href="#slides__17" title="Prev"></a>
        <a class="slide__next" href="#slides__19" title="Next"></a>
      </div>
      <div id="slides__19" class="slide">
<div class="video-wrapper" onclick="window.open('tc_home.php','_blank')"><video playsinline autoplay muted loop poster="images/video/banner-t2.jpg">

</video></div>
        <a class="slide__prev" href="#slides__18" title="Prev"></a>
      </div>
    </div>
  </div>
</div>
</div>
<div class="thetime">    
    <div id="clockContainer_nyc">
        <div id="hour_nyc"></div>
        <div id="minute_nyc"></div>
        <div id="second_nyc"></div>
    </div>
    <div id="clockContainer_ldn">
        <div id="hour_ldn"></div>
        <div id="minute_ldn"></div>
        <div id="second_ldn"></div>
    </div>
    <div id="clockContainer">
        <div id="hour"></div>
        <div id="minute"></div>
        <div id="second"></div>
    </div>
    <div id="clockContainer_mum">
        <div id="hour_mum"></div>
        <div id="minute_mum"></div>
        <div id="second_mum"></div>
    </div>
    <div id="clockContainer_tok">
        <div id="hour_tok"></div>
        <div id="minute_tok"></div>
        <div id="second_tok"></div>
    </div>
</div>


<?php include ("amispace.php");
include ("randomstuff.php"); 
include ("altra.php");
?>
<script type="text/javascript" src="clock.js"></script>
<script type="text/javascript" src="bug-min.js"></script>
<script type='text/javascript'>new SpiderController({'maxBugs':1, 'maxDelay':3000, 'mouseOver':'nothing'
			});</script>
</body>
</html>