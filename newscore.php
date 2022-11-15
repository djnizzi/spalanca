<?php
if (isset($subnews) && isset($save) && isset($nid))
{$result=MYSQL_QUERY("UPDATE news SET nposted=nposted, ncontent='$ncontent',ntitle='$ntitle' WHERE nid='$nid'");
if($pbindata_name=="" || $pbindata_size>65535 || ($pbindata_type!="image/pjpeg" && $pbindata_type!="image/jpeg")){
@unlink(	"misc/$nid-news.jpg");
@unlink(	"misc/thumbs/$nid"."q-news.jpg");
$result=MYSQL_QUERY("UPDATE news SET nposted=nposted, nimg='N' WHERE nid='$nid'");
} else {
$result=MYSQL_QUERY("UPDATE news SET nposted=nposted, nimg='Y' WHERE nid='$nid'");

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
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>La news è stata cancellata con successo | <a href=<?php echo $mynameis; ?>?admin=1>vara altre news</a></td>
                      </tr>
</table>

<?php
}
if (isset($arcthis) && isset($nid))  {
$result=MYSQL_QUERY("UPDATE news SET online='A' WHERE nid='$nid'");
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>La news è stata archiviata con successo | <a href=<?php echo $mynameis; ?>?admin=1>vara altre news</a></td>
                      </tr>
</table>

<?php
}

else if (!isset($newnews)) {
if(isset($subcom)) {
$result=MYSQL_QUERY("INSERT INTO comments (content,cuid,cpid,ctype) ".
        "VALUES ('$content','$id','$nid',1)");}
if(isset($putiton) && isset($nid)) {
$result=MYSQL_QUERY("UPDATE news SET nposted=nposted, online='Y' WHERE nid='$nid'");
print ("<script>window.location='$mynameis?nid=$nid';</script>");
}
if (isset($nid) && !isset($edit))
{ ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><a href=news.php><img src=images/onenews.jpg border=0 width=338 height=20></a></td>
                      </tr>
<?php
$result = mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle,nimg, ncontent FROM news WHERE nid='$nid'");
$title= @MYSQL_RESULT($result,0,"ntitle");
$puid= @MYSQL_RESULT($result,0,"nuid");
$pcontent= @MYSQL_RESULT($result,0,"ncontent");
$postato= date("d/m/Y H:i", @MYSQL_RESULT($result,0,"postato"));
   print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
   printf("%s</span><br>scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td>", $title,urlencode($puid),$puid,$postato);
   printf("<td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td></tr><tr><td colspan=2 class=mascont2>", urlencode($puid),urlencode($puid));
if (@MYSQL_RESULT($result,0,"nimg") == "Y") {
	 printf ("<img src=misc/%s-news.jpg align=left>",$nid);
	}
	   printf("%s </td></tr></table></td></tr></table>",modernize($pcontent));


$result = mysql_query("SELECT content, cuid, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM comments WHERE cpid='$nid' AND ctype=1 ORDER BY cposted");
if ($myrow = mysql_fetch_array($result)) {
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/comm.jpg width=338 height=20></td>
                      </tr>
<?php

do {
   $cpostato= date("d/m/Y H:i",$myrow["cpostato"]);
print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td $spaltb4>");
printf("scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td>$spaltb2<td valign=top align=center rowspan=2 $spaltb3><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td></tr>",urlencode($myrow["cuid"]),$myrow["cuid"],$cpostato,urlencode($myrow["cuid"]),urlencode($myrow["cuid"]));
printf("<tr><td class=mascont2 colspan=2 valign=top>%s", modernize($myrow["content"]));
print("</td></tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
print("</table>");
}
}
else if (isset($nid) && isset($edit)) {
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><a href=news.php><img src=images/onenews.jpg border=0 width=338 height=20></a></td>
                      </tr>
<?php
$result = mysql_query("SELECT nid,ntitle, ncontent FROM news WHERE nid='$nid'");
$title= @MYSQL_RESULT($result,0,"ntitle");
$ncontent= @MYSQL_RESULT($result,0,"ncontent");

?>
 <tr><td><form enctype="multipart/form-data" method=post name=news action=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&save=1  onSubmit="return verNews(document.news);disBut(document.news.subnews)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>oggetto: <INPUT TYPE=text  class=buttons size=90 NAME="ntitle" value="<?php echo $title; ?>"></td></tr><tr><td align=center><textarea class=mascont name="ncontent" rows="5" cols="100"><?php echo $ncontent; ?></textarea></td></tr><tr><td align=center>immagine a corredo (facoltativa): <input type="file" name="pbindata" size=61 class=buttons></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subnews" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php

}
else if (!isset($subnews))
{$start=(!isset($start))?0:$start;
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
<?php
$siono=(isset($admin))?"N":"Y";
$result = mysql_query("SELECT COUNT(*) AS contejo FROM news WHERE online='$siono'");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-6;
$nextious = $start+6;
$prev=($start==0)?"&nbsp;":"&nbsp;<a href=$mynameis?start=$previous>vai indietro</a>";
$next=($contejo<=$nextious)?"&nbsp;":"<a href=$mynameis?start=$nextious>vai avanti</a>&nbsp;";
?>
<td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center"><img src="images/oldnews.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php
$amministra=(isset($admin))?"&vara=1":"";
$result=mysql_query("SELECT nid,nuid,UNIX_TIMESTAMP(DATE_ADD(nposted, INTERVAL $fuso HOUR)) AS postato,ntitle, nimg, SUBSTRING_INDEX(ncontent,' ',100) AS contenido,  count(cid) as commz  FROM news LEFT JOIN comments ON nid=cpid  AND ctype=1 WHERE news.online='$siono' GROUP BY nid ORDER BY nposted DESC LIMIT $start,6");

if ($myrow = mysql_fetch_array($result)) {
do {
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
   printf("<a href=news.php?nid=%s$amministra>%s</a></span><br>scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s<br>commenti: %s</td>", $myrow["nid"],$myrow["ntitle"],urlencode($myrow["nuid"]),$myrow["nuid"],$postato,$myrow["commz"]);
   printf("<td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td></tr><tr><td colspan=2 class=mascont2>", urlencode($myrow["nuid"]), urlencode($myrow["nuid"]));
if ($myrow["nimg"] == "Y") {
	 printf ("<img src=misc/%s-news.jpg align=left>",$myrow["nid"]);
	}
 printf("%s <a href=news.php?nid=%s>...&gt;</a>", $myrow["contenido"],$myrow["nid"])	;
   print("</td></tr></table></td></tr>");
   } while ($myrow = mysql_fetch_array($result));  } ?>
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

$result=MYSQL_QUERY("UPDATE news SET  nposted=nposted, nimg='Y' WHERE nid='$nid'");
@copy($pbindata, "misc/$nid-news.jpg"); 
$data1=imagecreatefromjpeg ($pbindata);
$qsize=46;
if (ImageSY($data1)<ImageSX($data1)){$sWidth=round(ImageSY($data1)*0.8);}else{$sWidth=round(ImageSX($data1)*0.8);}
if (ImageSY($data1)<ImageSX($data1)){$sY=round(ImageSY($data1)/10);$sX=rand($sY,round(ImageSX($data1)-$sWidth));}else{$sX=round(ImageSY($data1)/10);$sY=rand($sX,round(ImageSY($data1)-$sWidth));}
$qthing=ImageCreateTrueColor($qsize,$qsize);
imagecopyresampled($qthing,$data1,0,0,$sX,$sY,$qsize,$qsize,$sWidth,$sWidth);
imagejpeg($qthing,"misc/thumbs/$nid"."q-news.jpg");

}else{print ("<center>non possiamo accettare l'immagine: file troppo grosso (max 64K) o file di tipo errato (solo jpeg)");}}



print ("<script>window.location='$mynameis?nid=$nid&mustwait=1';</script>");}
else if (isset($nid) && !isset($mustwait) && !isset($vara))
{
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/andu.jpg width=338 height=20></td>
                      </tr>
 <tr><td><form method=post name=commenti action=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><textarea class=mascont name="content" rows="5" cols="100"></textarea></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subcom" VALUE="invia"></td></tr>
 </table></form></td></tr></table>

<?php

}
else if (isset($mustwait)) {
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>La tua news è stata inviata ed è in attesa dell'approvazione degli amministratori del sito | <a href=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&edit=1>modifica</a></td>
                      </tr>
</table>

<?php
}
else if (isset($vara) && isset($nid)) {
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><a href=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&putiton=1>approva</a> | <a href=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&edit=1>modifica</a> | <a href=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&delthis=1>cancella</a> | <a href=<?php echo $mynameis; ?>?nid=<?php echo $nid; ?>&arcthis=1>archivia</a></td>
                      </tr>
</table>

<?php
}
else
{ ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/andun.jpg width=338 height=20></td>
                      </tr>
                                            <tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td class=mascont><?php
include ("abouthow3.php");
 ?></td></tr></table></td></tr>
 <tr><td><form enctype="multipart/form-data"  method=post name=news action=<?php echo $mynameis; ?>  onSubmit="return verNews(document.news);disBut(document.news.subnews)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>oggetto: <INPUT TYPE=text  class=buttons size=90 NAME="ntitle"></td></tr><tr><td align=center><textarea class=mascont name="ncontent" rows="5" cols="100"></textarea></td></tr><tr><td align=center>immagine a corredo (facoltativa): <input type="file" name="pbindata" size=61 class=buttons></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subnews" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php }
}