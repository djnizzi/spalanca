<link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script>
<body onload="MM_preloadImages('images/1/bl1.gif','images/1/bm1.gif','images/1/bf1.gif','images/1/bu1.gif','images/1/bb1.gif','images/1/be1.gif','images/1/bt1.gif','images/1/by1.gif','images/1/ba1.gif','images/1/bp1.gif')">
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
$hist="<a href=javascript:self.history.back() onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
$hist3="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('fx','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=fx width=15 height=20 border=0 id=fx /></a>";
$urale="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u1','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u1 width=15 height=20 border=0 id=u1 /></a>";

$urale2="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u2','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u2 width=15 height=20 border=0 id=u2 /></a>";
$urale3="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"    onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u3','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u3 width=15 height=20 border=0 id=u3 /></a>";


if (isset($subnews) && isset($save) && isset($nid))
{$result=MYSQL_QUERY("UPDATE news SET  ncontent='$ncontent',ntitle='$ntitle' WHERE nid='$nid'");
if($pbindata_name=="" || $pbindata_size>65535 || ($pbindata_type!="image/pjpeg" && $pbindata_type!="image/jpeg")){
@unlink(	"misc/$nid-news.jpg");
@unlink(	"misc/thumbs/$nid"."q-news.jpg");
$result=MYSQL_QUERY("UPDATE news SET  nimg='N' WHERE nid='$nid'");
print("<script>alert('non possiamo allegare un\'immagine alla nius e nel caso la nius avesse avuto gi� un\'immagine essa non � pi� valida: non � stato allegato nessun file, file troppo grosso (max 64K) o file di tipo errato (solo jpeg)')</script>");
} else {
$result=MYSQL_QUERY("UPDATE news SET nimg='Y' WHERE nid='$nid'");

@copy($pbindata, "misc/$nid-news.jpg"); 
$data1=imagecreatefromjpeg ($pbindata);
$qsize=46;
if (ImageSY($data1)<ImageSX($data1)){$sWidth=round(ImageSY($data1)*0.8);}else{$sWidth=round(ImageSX($data1)*0.8);}
if (ImageSY($data1)<ImageSX($data1)){$sY=round(ImageSY($data1)/10);$sX=rand($sY,round(ImageSX($data1)-$sWidth));}else{$sX=round(ImageSY($data1)/10);$sY=rand($sX,round(ImageSY($data1)-$sWidth));}
$qthing=ImageCreateTrueColor($qsize,$qsize);
imagecopyresampled($qthing,$data1,0,0,$sX,$sY,$qsize,$qsize,$sWidth,$sWidth);
imagejpeg($qthing,"misc/thumbs/$nid"."q-news.jpg");

}

print ("<script>window.location='$mynameis?nid=$nid&mustwait=1';</script>");
}
if (isset($delthis) && isset($nid))  {
$result=MYSQL_QUERY("DELETE FROM news WHERE nid='$nid'");
@unlink(	"misc/$nid-news.jpg");
@unlink(	"misc/thumbs/$nid"."q-news.jpg");
 ?>
<script>alert('La news � stata cancellata con successo');
window.location='<?php echo $mynameis; ?>';
</script>

<?php
}
if (isset($arcthis) && isset($nid))  {
$result=MYSQL_QUERY("UPDATE news SET online='A' WHERE nid='$nid'");
 ?>
<script>alert('La news � stata archiviata con successo');
window.location='<?php echo $mynameis; ?>?admin=1';
</script>

<?php
}

else if (!isset($newnews)) {
	
if(isset($subcom)) {
$result=MYSQL_QUERY("INSERT INTO comments (content,cuid,cpid,ctype) ".
        "VALUES ('$content','$id','$nid',1)");}
if(isset($putiton) && isset($nid)) {
$result=MYSQL_QUERY("UPDATE news SET online='Y' WHERE nid='$nid'");
print ("<script>window.location='$mynameis?nid=$nid';</script>");
}
if (isset($nid) && !isset($edit))
{ 
	
if (isset($mustwait) && isset($id)) {
$aler="<script>alert('La tua news � stata inviata ed � in attesa dell\'approvazione degli amministratori del sito');</script>";
$edio1="<td  class=tabhead width=15><a href=$mynameis?nid=$nid&edit=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('k0','','images/1/be1.gif',1);return overlib('modifica', WRAP);\"><img src=images/1/be0.gif  name=k0 width=15 height=20 border=0 id=k0 /></a></td>";
$dele1="<td  class=tabhead width=15><a href=$mynameis?nid=$nid&delthis=1   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('k1','','images/1/bt1.gif',1);return overlib('cancella', WRAP);\"><img src=images/1/bt0.gif  name=k1 width=15 height=20 border=0 id=k1 /></a></td>";
$apro1="";
$arch1="";
$cola=6;
}else if (isset($vara) && isset($nid)) {
$edio1="<td  class=tabhead width=15><a href=$mynameis?nid=$nid&edit=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('k0','','images/1/be1.gif',1);return overlib('modifica', WRAP);\"><img src=images/1/be0.gif  name=k0 width=15 height=20 border=0 id=k0 /></a></td>";
$dele1="<td  class=tabhead width=15><a href=$mynameis?nid=$nid&delthis=1   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('k1','','images/1/bt1.gif',1);return overlib('cancella', WRAP);\"><img src=images/1/bt0.gif  name=k1 width=15 height=20 border=0 id=k1 /></a></td>";
$apro1="<td  class=tabhead width=15><a href=$mynameis?nid=$nid&putiton=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('k2','','images/1/by1.gif',1);return overlib('approva', WRAP);\"><img src=images/1/by0.gif  name=k2 width=15 height=20 border=0 id=k2 /></a></td>";
$arch1="<td  class=tabhead width=15><a href=$mynameis?nid=$nid&arcthis=1   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('k3','','images/1/ba1.gif',1);return overlib('archivia', WRAP);\"><img src=images/1/ba0.gif  name=k3 width=15 height=20 border=0 id=k3 /></a></td>";
$cola=8;
$aler="";
} else {
$edio1="";
$dele1="";
$apro1="";
$arch1="";
$cola=4;
$aler="";
}
		
echo $aler; ?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=95%><a href=<?php echo $mynameis; ?>><img src=images/1/dnius.gif border=0></a></td><td  class=tabhead width=15><?php echo $urale; ?></td><td  class=tabhead width=15><?php echo $hist; ?></td><?php echo $apro1; ?><?php echo $arch1; ?><?php echo $edio1; ?><?php echo $dele1; ?><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<?php
$result = mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle,nimg, ncontent FROM news WHERE nid='$nid'");
$title= @MYSQL_RESULT($result,0,"ntitle");
$puid= @MYSQL_RESULT($result,0,"nuid");
$pcontent= @MYSQL_RESULT($result,0,"ncontent");
$postato= date("d/m/Y H:i", @MYSQL_RESULT($result,0,"postato"));
$thisuid = $puid;
include ("getavatar.php");
printf("<tr><td class=titu colspan=%s>%s</td></tr>",$cola,$title);
print("<tr><td colspan=$cola><table width=100% cellpadding=0 cellspacing=0>");
printf("<tr><td class=ava rowspan=2 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi colspan=3><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span></td></tr><tr><td ><div class=ute>",urlencode(@MYSQL_RESULT($result,0,"nuid")),$avatarurl,urlencode(@MYSQL_RESULT($result,0,"nuid")), @MYSQL_RESULT($result,0,"nuid"),$postato);
if (@MYSQL_RESULT($result,0,"nimg") == "Y") {
	 printf ("<img src=misc/%s-news.jpg align=left>",$nid);
	}
printf("%s</div></td></tr></table></td></tr>", modernize($pcontent));


$result = mysql_query("SELECT content, cuid, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM comments WHERE cpid='$nid' AND ctype=1 ORDER BY cposted");
if ($myrow = mysql_fetch_array($result)) {
     ?>
     <tr class=tabhead>
<td  class=tabhead width=95%><img src=images/1/dcom.gif border=0></td><td  class=tabhead width=15><?php echo $urale2; ?></td><td  class=tabhead width=15><?php echo $hist2; ?></td><td width=15 class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=4><table width=100% cellpadding=0 cellspacing=0>

<?php
do {
	$postato= date("d/m/Y H:i", $myrow["cpostato"]);
	$thisuid = $myrow["cuid"];
include ("getavatar.php");
printf("<tr><td class=ava rowspan=2 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span></td></tr><tr><td><div class=ute>%s</div></td></tr>",urlencode($myrow["cuid"]),$avatarurl,urlencode($myrow["cuid"]),$myrow["cuid"],$postato,modernize($myrow["content"]));
print("<tr><td colspan=2 class=tabsep></td></tr>");
} while ($myrow = mysql_fetch_array($result));
print ("</table></td></tr>");
}
	
	
}	

else if (isset($nid) && isset($edit)) {
 ?>
<table width=100% cellpadding=0 cellspacing=0><tr><td class=tabhead><img src=images/1/dhn.gif height=20></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
 
<?php
$result = mysql_query("SELECT nid,ntitle, ncontent FROM news WHERE nid='$nid'");
$title= @MYSQL_RESULT($result,0,"ntitle");
$ncontent= @MYSQL_RESULT($result,0,"ncontent"); ?>
<tr colspan=3><td align=center><div class=con><form  enctype="multipart/form-data" method=post name=news action=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&save=1 onSubmit="return verNews(document.news);disBut(document.news.subnews)"><span class=con>oggetto:</span> <INPUT TYPE=text   value="<?php echo $title; ?>" class=inputs size=97 NAME="ntitle"><br><textarea class=fields name="ncontent" rows="5" cols="80"><?php echo $ncontent; ?></textarea><br><span class=con>immagine a corredo (facoltativa): </span> <input type="file" name="pbindata" size=61 class=inputs><br><INPUT TYPE=SUBMIT  class=buttons NAME="subnews" VALUE="invia"></form></td></tr>
</table>
<?php

}

else if (!isset($subnews))
{$start=(!isset($start))?0:$start;
$siono=(isset($admin))?"N":"Y";
$varaono=(isset($admin))?"&vara=1":"";
$result = mysql_query("SELECT COUNT(*) AS contejo FROM news WHERE online='$siono'");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-10;
$nextious = $start+10;
$thelast = $contejo-10;
$prev=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/bl1.gif',1);return overlib('nius pi� recenti', WRAP);\"><img src=images/1/bl0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a>";
$next=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bm1.gif',1);return overlib('nius pi� vecchie', WRAP);\"><img src=images/1/bm0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a>";
	$prev2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/bl1.gif',1);return overlib('nius pi� recenti', WRAP);\"><img src=images/1/bl0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a>";
$next2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bm1.gif',1);return overlib('nius pi� vecchie', WRAP);\"><img src=images/1/bm0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a>";	
$thef=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f5','','images/1/bf1.gif',1);return overlib('ultime nius', WRAP);\"><img src=images/1/bf0.gif  name=f5 width=15 height=20 border=0 id=f5 /></a>";
$thel=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f6','','images/1/bu1.gif',1);return overlib('prime nius', WRAP);\"><img src=images/1/bu0.gif  name=f6 width=15 height=20 border=0 id=f6 /></a>";
	$thef2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f7','','images/1/bf1.gif',1);return overlib('ultime nius', WRAP);\"><img src=images/1/bf0.gif  name=f7 width=15 height=20 border=0 id=f7 /></a>";
$thel2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f8','','images/1/bu1.gif',1);return overlib('prime nius', WRAP);\"><img src=images/1/bu0.gif  name=f8 width=15 height=20 border=0 id=f8 /></a>";	
?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr>
<td class=tabhead width=90%><img src=images/1/dnius.gif border=0></td><td class=tabhead width=15><?php echo $hist; ?></td><td class=tabhead width=15><?php echo $thef; ?></td><td class=tabhead width=15><?php echo $prev; ?></td><td class=tabhead width=15><?php echo $next; ?></td><td class=tabhead width=15><?php echo $thel; ?></td><td class=tabhead width=15><img src=images/spacer.gif width=15></td></tr><tr><td colspan=7><div class=forumlist><ul>
<?php

$result = mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle, nimg, count(cid) as commz  FROM news LEFT JOIN comments ON nid=cpid  AND ctype=1 WHERE news.online='$siono' GROUP BY nid ORDER BY nposted DESC LIMIT $start,10");
if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   $thisuid = $myrow["nuid"];
   include ("getavatar.php");
   printf("<li><a href=%s?nid=%s%s onmouseout='return nd();' onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right valign=top class=tttd>inviata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td nowrap valign=top class=tttd><i>%s</i><br>commenti: %s</td></tr></table></div>', WRAP, CAPTION, '%s');\">",$mynameis,$myrow["nid"],$varaono,$myrow["nuid"],$myrow["nuid"],$avatarurl,$postato,$myrow["commz"],addslashes($myrow["ntitle"]));
   if ($myrow["nimg"] == "Y") {
	 printf ("<img src=misc/thumbs/%sq-news.jpg align=left class=niusimg ",$myrow["nid"]);
	} else {print "<img src=images/1/nius.gif align=left class=niusimg ";}
   printf(">%s<br /><span class=desc><strong>%s</strong> </span><span class=nota>%s</span></a></li>",$myrow["ntitle"],$myrow["nuid"],$postato);
  print("<table border=0 cellpadding=0 cellspacing=0 width=100%><tr><td class=tabsep></td></tr></table>");
  } while ($myrow = mysql_fetch_array($result));  }

 ?></ul></div></td></tr>

   <?php
}} 



if (isset($id) && !isset($delthis) && !isset($edit)) {
if (isset($subnews) && !isset ($save))
{
	$result=MYSQL_QUERY("INSERT INTO news (ncontent,nuid,ntitle) ".
        "VALUES ('$ncontent','$id','$ntitle')");
$nid=mysql_insert_id();

if($pbindata_name!=""){
	if ($pbindata_size<65535 && ($pbindata_type=="image/pjpeg" || $pbindata_type=="image/jpeg")){

$result=MYSQL_QUERY("UPDATE news SET  nimg='Y' WHERE nid='$nid'");
@copy($pbindata, "misc/$nid-news.jpg"); 
$data1=imagecreatefromjpeg ($pbindata);
$qsize=46;
if (ImageSY($data1)<ImageSX($data1)){$sWidth=round(ImageSY($data1)*0.8);}else{$sWidth=round(ImageSX($data1)*0.8);}
if (ImageSY($data1)<ImageSX($data1)){$sY=round(ImageSY($data1)/10);$sX=rand($sY,round(ImageSX($data1)-$sWidth));}else{$sX=round(ImageSY($data1)/10);$sY=rand($sX,round(ImageSY($data1)-$sWidth));}
$qthing=ImageCreateTrueColor($qsize,$qsize);
imagecopyresampled($qthing,$data1,0,0,$sX,$sY,$qsize,$qsize,$sWidth,$sWidth);
imagejpeg($qthing,"misc/thumbs/$nid"."q-news.jpg");

}else{print ("<script>alert('non possiamo allegare un\'immagine alla nius: file troppo grosso (max 64K) o file di tipo errato (solo jpeg)')</script>");}}



print ("<script>window.location='$mynameis?nid=$nid&mustwait=1';</script>");}
else if (isset($nid) && !isset($mustwait) && !isset($vara))
{
?>
<tr class=tabhead>
<td  width=95%><img src=images/1/detcnp.gif border=0></td><td  class=tabhead width=15><?php echo $urale3; ?></td><td  class=tabhead width=15><?php echo $hist3; ?></td><td  class=tabhead width=15><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=4 align="center">
	  <form id="commenti" name="commenti" method="post" action=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)">
	    <textarea name="content" cols="80" rows="5" class="fields"></textarea>
	    <br />
	    
	    <input type="submit" class=buttons name="subcom" value="invia" />

	  </form>
	  </td></tr>
</table>

<?php

}

else if (!isset($vara) && !isset($mustwait))
{ ?>
<table width=100% cellpadding=0 cellspacing=0><tr><td class=tabhead><img src=images/1/dhn.gif height=20></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr colspan=3>
<td><div class=con>
<?php
include ("abouthow3.php");
 ?></td></tr><tr colspan=3><td class=tabsep></td></tr><tr colspan=3>
<td align=center><div class=con><form  enctype="multipart/form-data" method=post name=news action=<?php echo $mynameis; ?> onSubmit="return verNews(document.news);disBut(document.news.subnews)"><span class=con>oggetto:</span> <INPUT TYPE=text   value="" class=inputs size=97 NAME="ntitle"><br><textarea class=fields name="ncontent" rows="5" cols="80"></textarea><br><span class=con>immagine a corredo (facoltativa): </span> <input type="file" name="pbindata" size=61 class=inputs><br><INPUT TYPE=SUBMIT  class=buttons NAME="subnews" VALUE="invia"></form></td></tr>
</table>
<?php }}                                                                  