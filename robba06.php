<link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script>
<body onload="MM_preloadImages('images/1/bb1.gif','images/1/be1.gif','images/1/bt1.gif','images/1/bp1.gif')">
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
include ("space.php");
$hist="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
$hist3="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('g0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=g0 width=15 height=20 border=0 id=g0 /></a>";
$urale="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u1','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u1 width=15 height=20 border=0 id=u1 /></a>";

$urale2="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u2','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u2 width=15 height=20 border=0 id=u2 /></a>";
$urale3="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"    onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u3','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u3 width=15 height=20 border=0 id=u3 /></a>";
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

print ("<script>self.location='$mynameis?pid=$pid';</script>");
} else {print ("<script>self.location='$mynameis?pid=$pid&ediro=2';</script>");
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

                      
                        <script>alert("La robba � stata cancellata con successo");self.location='<?php echo $mynameis; ?>';</script>
                     
<?php
}else { ?>
<script>alert("cazzo fai cerchi di cancellare robba altrui");</script>
<?php
}
}
if (isset($ediro)) {
	$result=MYSQL_QUERY("SELECT puid FROM posts WHERE pid='$pid'");
if (@MYSQL_RESULT($result,0,"puid")==$id) {
if ($ediro==2) {print("<script>alert('non possiamo accettare il tuo materiale: non � stato allegato nessun file, file troppo grosso (max 64K) o file di tipo errato (solo jpeg)')</script>");}
?>
<table width=100% cellpadding=0 cellspacing=0><tr><td class=tabhead><img src=images/1/didr.gif height=20></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<?php
$result = mysql_query("SELECT title, pcontent,ptid FROM posts WHERE pid='$pid'");
$title= @MYSQL_RESULT($result,0,"title");
$pcontent= @MYSQL_RESULT($result,0,"pcontent");
$ptid=@MYSQL_RESULT($result,0,"ptid");
?>
<tr colspan=4><td align=center><div class=con><form  enctype="multipart/form-data" method=post name=robba action=<?php echo $mynameis; ?>?pid=<?php echo $pid; ?>&save=1 onSubmit="return verRobba(document.robba);disBut(document.robba.subro)"><span class=con>titolo dell'opera:</span> <INPUT TYPE=text   value="<?php echo $title; ?>" class=inputs size=48 NAME="title"> <span class=con>categoria:</span> <select name="ptid" class=inputs>
    <option selected>scegline una</option>
<?php
$result = mysql_query("SELECT * FROM categories ORDER BY cat");
if ($myrow = mysql_fetch_array($result)) {
do {printf("<option value=%s>%s</option>\n", $myrow["tid"], $myrow["cat"]);
} while ($myrow = mysql_fetch_array($result));
}
?></select><br><span class=con>l'opera per l'appunto:</span> <input type="file" name="pbindata" size=61 class=inputs><br><span class=con>presentazione/descrizione dell'opera ecc.</span><br><textarea class=fields name="pcontent" rows="5" cols="80"><?php echo $pcontent; ?></textarea><br><INPUT TYPE=SUBMIT  class=buttons NAME="subro" VALUE="invia"></form></td></tr>
</table><SCRIPT>redux(document.forms['robba'].ptid,'<?php echo $ptid; ?>');</script>
<?php
}else{
?>
<script>alert("cazzo fai cerchi di scombinare robba altrui");</script><?php
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
	 } else {print ("<script>alert('non possiamo accettare il tuo materiale: non � stato allegato nessun file, file troppo grosso (max 64K) o file di tipo errato (solo jpeg)')</script>");} }
	

        
        
        
if (isset($pid)  && !isset($delro) && !isset($ediro) && !isset($save)){
	$result = mysql_query("SELECT puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,title,tvd,tdd,cat,pcontent FROM posts,categories WHERE pid=$pid && ptid=tid");
if (isset($id) && $id==@MYSQL_RESULT($result,0,"puid")) {
$cola="6";
$edi="<td  class=tabhead width=15><a href=$mynameis?pid=$pid&ediro=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/be1.gif',1);return overlib('modifica la tua robba', WRAP);\"><img src=images/1/be0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a></td>";
$dele="<td  class=tabhead width=15><a href=$mynameis?pid=$pid&delro=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bt1.gif',1);return overlib('cancella la tua robba', WRAP);\"><img src=images/1/bt0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a></td>";
$edi2="<td  class=tabhead width=15><a href=$mynameis?pid=$pid&ediro=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/be1.gif',1);return overlib('modifica la tua robba', WRAP);\"><img src=images/1/be0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a></td>";
$dele2="<td  class=tabhead width=15><a href=$mynameis?pid=$pid&delro=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bt1.gif',1);return overlib('cancella la tua robba', WRAP);\"><img src=images/1/bt0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a></td>";
$edi3="<td  class=tabhead width=15><a href=$mynameis?pid=$pid&ediro=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('g1','','images/1/be1.gif',1);return overlib('modifica la tua robba', WRAP);\"><img src=images/1/be0.gif  name=g1 width=15 height=20 border=0 id=g1 /></a></td>";
$dele3="<td  class=tabhead width=15><a href=$mynameis?pid=$pid&delro=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('g2','','images/1/bt1.gif',1);return overlib('cancella la tua robba', WRAP);\"><img src=images/1/bt0.gif  name=g2 width=15 height=20 border=0 id=g2 /></a></td>";
 }else{
$cola="4";
$edi="";
$dele="";
$edi2="";
$dele2="";
$edi3="";
$dele3="";
  } ?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=95%><a href=robbe06.php><img src=images/1/drobbah.gif border=0></a></td><td  class=tabhead width=15><?php echo $urale; ?></td><td  class=tabhead width=15><?php echo $hist; ?></td><?php echo $edi; ?><?php echo $dele; ?><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>

<?php
$result = mysql_query("SELECT puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,title,tvd,tdd,cat,pcontent FROM posts,categories WHERE pid=$pid && ptid=tid");
$postato= date("d/m/Y H:i",@MYSQL_RESULT($result,0,"postato"));
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
            $thisuid = @MYSQL_RESULT($result,0,"puid");
            include ("getavatar.php"); 
}
printf("<tr><td class=titu colspan=%s>%s</td></tr>",$cola,@MYSQL_RESULT($result,0,"title"));
print("<tr><td colspan=$cola><table width=100% cellpadding=0 cellspacing=0>");
include ("imagexy.php");
printf("<tr><td class=ava rowspan=4 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi colspan=3><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span></td></tr>",urlencode(@MYSQL_RESULT($result,0,"puid")),$avatarurl,urlencode(@MYSQL_RESULT($result,0,"puid")), @MYSQL_RESULT($result,0,"puid"),$postato);
printf("<tr><td rowspan=3 class=robb><a href=javascript:dlrobba('dlrobba06.php?pid=%s',%s)><img src=thumb.php?pid=%s&xsize=300 border=0></a></td><td class=tabsepv rowspan=3></td><td><div class=ute>%s</div></td></tr><tr><td class=tabsep></td></tr><tr><td><div class=ute>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)</div></td></tr></table></td></tr>",$pid,$featuring,$pid, modernize(@MYSQL_RESULT($result,0,"pcontent")),@MYSQL_RESULT($result,0,"cat"), @MYSQL_RESULT($result,0,"tvd"),@MYSQL_RESULT($result,0,"tdd"),$finalvote,$qfv);
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
     <tr class=tabhead>
<td  class=tabhead width=95%><img src=images/1/dcom.gif border=0></td><td  class=tabhead width=15><?php echo $urale2; ?></td><td  class=tabhead width=15><?php echo $hist2; ?></td><?php echo $edi2; ?><?php echo $dele2; ?><td width=15 class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=<?php echo $cola; ?>><table width=100% cellpadding=0 cellspacing=0>

<?php
do {
	$postato= date("d/m/Y H:i", $myrow["cpostato"]);
        $thisuid = $myrow["cuid"];
        include ("getavatar.php"); 
printf("<tr><td class=ava rowspan=2 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span> voto: <strong>%s</td></tr><tr><td><div class=ute>%s</div></td></tr>",urlencode($myrow["cuid"]),$avatarurl,urlencode($myrow["cuid"]),$myrow["cuid"],$postato,$voto[$myrow["vote"]],modernize($myrow["content"]));
print("<tr><td colspan=2 class=tabsep></td></tr>");
} while ($myrow = mysql_fetch_array($result));
print ("</table></td></tr>");
}
}

if (isset($id) && !isset($delro) && !isset($ediro) && isset($pid)){
?>
<tr class=tabhead>
<td  width=95%><img src=images/1/detcnp.gif border=0></td><td  class=tabhead width=15><?php echo $urale3; ?></td><td  class=tabhead width=15><?php echo $hist3; ?></td><?php echo $edi3; ?><?php echo $dele3; ?><td  class=tabhead width=15><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=<?php echo $cola; ?> align="center">
	  <form id="commenti" name="commenti" method="post" action=<?php echo $mynameis; ?>?pid=<?php echo $pid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)">
	    <textarea name="content" cols="80" rows="5" class="fields"></textarea>
	    <br /><span class=con>dacci un voto a quest'opera</span> <select class=inputs name="vote">
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
</select> 
	    
	    <input type="submit" class=buttons name="subco" value="invia" />

	  </form>
	  </td></tr>

<?php

}
if (isset($pid)) {print("</table>");}
if (isset($id) && !isset($pid)){
?>
<table width=100% cellpadding=0 cellspacing=0><tr><td class=tabhead><img src=images/1/didr.gif height=20></td></tr>
<tr><td><div class=con>
<?php
include ("abouthow2.php");
 ?></td></tr><tr><td class=tabsep></td></tr>
 <tr><td align=center><div class=con><form  enctype="multipart/form-data" method=post name=robba action=<?php echo $mynameis; ?> onSubmit="return verRobba(document.robba);disBut(document.robba.subro)"><span class=con>titolo dell'opera:</span> <INPUT TYPE=text  class=inputs size=48 NAME="title"> <span class=con>categoria:</span> <select name="ptid" class=inputs>
    <option selected>scegline una</option>
<?php
$result = mysql_query("SELECT * FROM categories ORDER BY cat");
if ($myrow = mysql_fetch_array($result)) {
do {printf("<option value=%s>%s</option>\n", $myrow["tid"], $myrow["cat"]);
} while ($myrow = mysql_fetch_array($result));
}
?></select><br><span class=con>l'opera per l'appunto:</span> <input type="file" name="pbindata" size=61 class=inputs><br><span class=con>presentazione/descrizione dell'opera ecc.</span><br><textarea class=fields name="pcontent" rows="5" cols="80"></textarea><br><INPUT TYPE=SUBMIT  class=buttons NAME="subro" VALUE="invia"></form></td></tr>
</table>
<?php
}
?>