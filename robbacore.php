<?php
$qfv="0.00";
$finalvote=$voto["$qfv"];
if (isset($subro) && isset($save) && isset($pid))
{if($pbindata_name!="" && $pbindata_size<65535 && ($pbindata_type=="image/pjpeg" || $pbindata_type=="image/jpeg")){
@unlink(	"robba/$pid-robba.jpg");
@unlink(	"robba/thumbs/$pid"."t-robba.jpg");



$result=MYSQL_QUERY("UPDATE posts SET pcontent='$pcontent',pposted=pposted,title='$title',ptid='$ptid' WHERE pid='$pid'");

@copy($pbindata, "robba/$pid-robba.jpg"); 
$data1=imagecreatefromjpeg ($pbindata);
$qsize=46;
if (ImageSY($data1)<ImageSX($data1)){$sWidth=round(ImageSY($data1)*0.8);}else{$sWidth=round(ImageSX($data1)*0.8);}
if (ImageSY($data1)<ImageSX($data1)){$sY=round(ImageSY($data1)/10);$sX=rand($sY,round(ImageSX($data1)-$sWidth));}else{$sX=round(ImageSY($data1)/10);$sY=rand($sX,round(ImageSY($data1)-$sWidth));}
$qthing=ImageCreateTrueColor($qsize,$qsize);
imagecopyresampled($qthing,$data1,0,0,$sX,$sY,$qsize,$qsize,$sWidth,$sWidth);
imagejpeg($qthing,"robba/thumbs/$pid"."q-robba.jpg");
$xsize=150;
if (ImageSY($data1)<ImageSX($data1)){$newthing=ImageCreateTrueColor($xsize,(ImageSY($data1)/ImageSX($data1))*$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,$xsize,(ImageSY($data1)/ImageSX($data1))*$xsize,ImageSX($data1),ImageSY($data1));
} else {$newthing=ImageCreateTrueColor((ImageSX($data1)/ImageSY($data1))*$xsize,$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,(ImageSX($data1)/ImageSY($data1))*$xsize,$xsize,ImageSX($data1),ImageSY($data1));}

imagejpeg($newthing,"robba/thumbs/$pid"."t-robba.jpg");

print ("<script>window.location='$mynameis?pid=$pid';</script>");
} else {print ("<script>window.location='$mynameis?pid=$pid&ediro=2';</script>");
}
}
if (isset($subco)) {
	$result0=MYSQL_QUERY("SELECT count(*) as coniglio from comments WHERE cpid='$pid' AND ctype=0 AND cuid='$id' AND vote<>'0'");
	$result00=MYSQL_QUERY("SELECT puid from posts WHERE pid='$pid'");
	if (@MYSQL_RESULT($result0,0,"coniglio")>0 || MYSQL_RESULT($result00,0,"puid")==$id){
$result=MYSQL_QUERY("INSERT INTO comments (content,cuid,cpid,vote) ".
        "VALUES ('$content','$id','$pid','0')");		
		}else{
	
$result=MYSQL_QUERY("INSERT INTO comments (content,cuid,cpid,vote) ".
        "VALUES ('$content','$id','$pid','$vote')");}

}
if (isset($delro) && isset($pid)) {
$result=MYSQL_QUERY("SELECT puid FROM posts WHERE pid='$pid'");
if (@MYSQL_RESULT($result,0,"puid")==$id) {	
$result=MYSQL_QUERY("DELETE FROM posts WHERE pid='$pid'");
@unlink(	"robba/$pid-robba.jpg");
@unlink(	"robba/thumbs/$pid"."t-robba.jpg");
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>La robba � stata cancellata con successo</td>
                      </tr>
</table><?php
}else { ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>cazzo fai cerchi di cancellare robba altrui</td>
                      </tr>
</table><?php
}
}
if (isset($ediro)) {
	$result=MYSQL_QUERY("SELECT puid FROM posts WHERE pid='$pid'");
if (@MYSQL_RESULT($result,0,"puid")==$id) {
if ($ediro==2) {print("<center>non possiamo accettare il tuo materiale: non � stato allegato nessun file, file troppo grosso (max 64K) o file di tipo errato (solo jpeg)");}
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/newrobba.jpg width=338 height=20></td>
                      </tr>
<?php
$result = mysql_query("SELECT title, pcontent,ptid FROM posts WHERE pid='$pid'");
$title= @MYSQL_RESULT($result,0,"title");
$pcontent= @MYSQL_RESULT($result,0,"pcontent");
$ptid=@MYSQL_RESULT($result,0,"ptid");
?>
<tr><td><form  enctype="multipart/form-data" method=post name=robba action=<?php echo $mynameis; ?>?pid=<?php echo $pid; ?>&save=1  onSubmit="return verRobba(document.robba);disBut(document.robba.subro)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>titolo dell'opera: <INPUT TYPE=text  value="<?php echo $title; ?>" class=buttons size=48 NAME="title"> categoria: <select name="ptid" class=buttons>
    <option selected>scegline una</option>
<?php
$result = mysql_query("SELECT * FROM categories ORDER BY cat");
if ($myrow = mysql_fetch_array($result)) {
do {printf("<option value=%s>%s</option>\n", $myrow["tid"], $myrow["cat"]);
} while ($myrow = mysql_fetch_array($result));
}
?></select></td></tr>
 <tr><td align=center>l'opera per l'appunto: <input type="file" name="pbindata" size=61 class=buttons></td></tr>
 <tr><td align=center>presentazione/descrizione dell'opera ecc.<br><textarea class=mascont name="pcontent" rows="5" cols="100"><?php echo $pcontent; ?></textarea></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subro" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<SCRIPT>redux(document.forms['robba'].ptid,'<?php echo $ptid; ?>');</script>
<?php
}else{
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>cazzo fai cerchi di scombinare robba altrui</td>
                      </tr>
</table><?php
}
}
if (isset($subro) && !isset($save)) {
	
	
	if($pbindata_name!="" && $pbindata_size<65535 && ($pbindata_type=="image/pjpeg" || $pbindata_type=="image/jpeg")){
		$result=MYSQL_QUERY("INSERT INTO posts (title,pcontent,puid,ptid)  ".
"VALUES ('$title','$pcontent','$id','$ptid')");
	$pid=mysql_insert_id();
@copy($pbindata, "robba/$pid-robba.jpg"); 
$data1=imagecreatefromjpeg ($pbindata);
$qsize=46;
if (ImageSY($data1)<ImageSX($data1)){$sWidth=round(ImageSY($data1)*0.8);}else{$sWidth=round(ImageSX($data1)*0.8);}
if (ImageSY($data1)<ImageSX($data1)){$sY=round(ImageSY($data1)/10);$sX=rand($sY,round(ImageSX($data1)-$sWidth));}else{$sX=round(ImageSY($data1)/10);$sY=rand($sX,round(ImageSY($data1)-$sWidth));}
$qthing=ImageCreateTrueColor($qsize,$qsize);
imagecopyresampled($qthing,$data1,0,0,$sX,$sY,$qsize,$qsize,$sWidth,$sWidth);
imagejpeg($qthing,"robba/thumbs/$pid"."q-robba.jpg");
$xsize=150;
if (ImageSY($data1)<ImageSX($data1)){$newthing=ImageCreateTrueColor($xsize,(ImageSY($data1)/ImageSX($data1))*$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,$xsize,(ImageSY($data1)/ImageSX($data1))*$xsize,ImageSX($data1),ImageSY($data1));
} else {$newthing=ImageCreateTrueColor((ImageSX($data1)/ImageSY($data1))*$xsize,$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,(ImageSX($data1)/ImageSY($data1))*$xsize,$xsize,ImageSX($data1),ImageSY($data1));}

imagejpeg($newthing,"robba/thumbs/$pid"."t-robba.jpg");
	 } else {print ("<center>non possiamo accettare il tuo materiale: non � stato allegato nessun file, file troppo grosso (max 64K) o file di tipo errato (solo jpeg)");} }
	

        
        
        
if (isset($pid)  && !isset($delro) && !isset($ediro) && !isset($save)){
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                         <img src="images/allrobba.jpg" width="338" height="20"></td>
                        </td>
                      </tr>
<?php
$result = mysql_query("SELECT puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,title,tvd,tdd,cat,pcontent FROM posts,categories WHERE pid=$pid && ptid=tid");
$postato= date("d/m/Y H:i",@MYSQL_RESULT($result,0,"postato"));
?><script>whattatit("'<?php echo addslashes(@MYSQL_RESULT($result,0,"title")); ?>' by <?php echo addslashes(@MYSQL_RESULT($result,0,"puid")); ?>")</script><?php
$result2 = mysql_query("SELECT vote, COUNT(*) AS votez FROM comments WHERE cpid='$pid'  AND ctype=0 AND vote<>'0' GROUP BY vote");
if ($myrow2 = mysql_fetch_array($result2)) {
            $totalone=0;
            $counem=0;
            do {
            $totalone=$totalone+(($myrow2["votez"]+0)*($myrow2["vote"]+0));
            $counem=$counem+$myrow2["votez"];
            } while ($myrow2 = mysql_fetch_array($result2));
            $qfv=$totalone/$counem;
            $finalvote=$voto[number_format(round($qfv),2)]; 
            $votalo=MYSQL_QUERY("UPDATE posts SET pposted=pposted, voto=$qfv WHERE pid='$pid'");
}
$thisuid = @MYSQL_RESULT($result,0,"puid");
include ("getavatar.php");
print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top width=100%><span class=mastika>");
printf("%s</span><br>creato da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td><td align=right $spaltb1>$fillwith<a href=scheda.php?zid=%s>%s</a></td>", @MYSQL_RESULT($result,0,"title"),urlencode(@MYSQL_RESULT($result,0,"puid")), @MYSQL_RESULT($result,0,"puid"),$postato ,urlencode(@MYSQL_RESULT($result,0,"puid")),$avatarurl);
print ("</tr><tr><td colspan=2 class=mascont2><table width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2><tr><td align=center width=50%>");
include ("imagexy.php");
printf("<a href=javascript:dlrobba('dlrobba.php?pid=%s',%s)><img src=thumb.php?pid=%s&xsize=300 border=0 class=masall></a></td><td colspan=2 class=mascont2 valign=top>%s<br><br>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)</td></tr></table>",$pid,$featuring,$pid, modernize(@MYSQL_RESULT($result,0,"pcontent")),@MYSQL_RESULT($result,0,"cat"), @MYSQL_RESULT($result,0,"tvd"),@MYSQL_RESULT($result,0,"tdd"),$finalvote,$qfv);
print ("</td></tr></table></td></tr>");
if (isset($id) && $id==@MYSQL_RESULT($result,0,"puid")) {
print ("<tr><td class=masall align=center><a href=$mynameis?pid=$pid&ediro=1>modifica</a> | <a href=$mynameis?pid=$pid&delro=1>cancella</a>");
 }
print ("</table>");
if ((isset($id) && $id==@MYSQL_RESULT($result,0,"puid")) || isset($subco)) {
 ?>
 <!- ->
 <?php  }
 else {
$result = mysql_query("UPDATE posts SET pposted=pposted,tvd=tvd+1 WHERE pid='$pid'");
}
$result = mysql_query("SELECT content, cuid, vote, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM comments WHERE cpid='$pid'  AND ctype=0 ORDER BY cposted");
if ($myrow = mysql_fetch_array($result)) {
     ?>
 <table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/comm.jpg width=338 height=20></td>
                      </tr>
<?php
do {
  $thisuid = $myrow["cuid"];
include ("getavatar.php");
print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td $spaltb4>");
printf("scritto da <a href=scheda.php?zid=%s>%s</a> - inviato %s - voto: %s</td>$spaltb2<td valign=top $spaltb3 align=center rowspan=2><a href=scheda.php?zid=%s>%s</a></td></tr>",urlencode($myrow["cuid"]),$myrow["cuid"],date("d/m/Y H:i",$myrow["cpostato"]),$voto[$myrow["vote"]],urlencode($myrow["cuid"]),$avatarurl);
printf("<tr><td class=mascont2 colspan=2 valign=top>%s", modernize($myrow["content"]));
print("</td></tr></table></td></tr>");
} while ($myrow = mysql_fetch_array($result));
print ("</table>");
}
}

if (isset($id) && !isset($delro) && !isset($ediro) && isset($pid)){
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/andu.jpg width=338 height=20></td>
                      </tr>
 <tr><td><form method=post name=commenti action=<?php echo $mynameis; ?>?pid=<?php echo $pid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><textarea class=mascont name="content" rows="5" cols="100"></textarea></td></tr><tr><td align=center>dacci un voto a quest'opera <select class=buttons name="vote">
    <option value=0 selected><?php echo $voto['0.00']; ?></option>
         <option value=0.75><?php echo $voto['0.75']; ?></option>
        <option value=1><?php echo $voto['1.00']; ?></option>
                <option value=1.25><?php echo $voto['1.25']; ?></option>
                        <option value=1.5><?php echo $voto['1.50']; ?></option>
                                <option value=1.75><?php echo $voto['1.75']; ?></option>
            <option value=2><?php echo $voto['2.00']; ?></option>
                    <option value=2.25><?php echo $voto['2.25']; ?></option>
                            <option value=2.5><?php echo $voto['2.50']; ?></option>
                                    <option value=2.75><?php echo $voto['2.75']; ?></option>
                <option value=3><?php echo $voto['3.00']; ?></option>
                        <option value=3.25><?php echo $voto['3.25']; ?></option>
                                <option value=3.5><?php echo $voto['3.50']; ?></option>
                                        <option value=3.75><?php echo $voto['3.75']; ?></option>
                <option value=4><?php echo $voto['4.00']; ?></option>
                        <option value=4.25><?php echo $voto['4.25']; ?></option>
                <?php echo $spacevote; ?>
</select></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subco" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php

}
if (isset($id) && !isset($pid)){
?>
<script>whattatit("ora tocca a te <?php echo addslashes($id); ?>, inviaci della robba!")</script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/newrobba.jpg width=338 height=20></td>
                      </tr>
                      <tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td class=mascont><?php
include ("abouthow2.php");
 ?></td></tr></table></td></tr>
 <tr><td><form  enctype="multipart/form-data" method=post name=robba action=<?php echo $mynameis; ?> onSubmit="return verRobba(document.robba);disBut(document.robba.subro)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>titolo dell'opera: <INPUT TYPE=text  class=buttons size=48 NAME="title"> categoria: <select name="ptid" class=buttons>
    <option selected>scegline una</option>
<?php
$result = mysql_query("SELECT * FROM categories ORDER BY cat");
if ($myrow = mysql_fetch_array($result)) {
do {printf("<option value=%s>%s</option>\n", $myrow["tid"], $myrow["cat"]);
} while ($myrow = mysql_fetch_array($result));
}
?></select></td></tr>
 <tr><td align=center>l'opera per l'appunto: <input type="file" name="pbindata" size=61 class=buttons></td></tr>
 <tr><td align=center>presentazione/descrizione dell'opera ecc.<br><textarea class=mascont name="pcontent" rows="5" cols="100"></textarea></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subro" VALUE="invia"></td></tr>
</table></form></td></tr></table>
<?php
}
?>