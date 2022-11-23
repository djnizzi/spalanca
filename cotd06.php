<link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script>
<body onload="MM_preloadImages('images/1/bl1.gif','images/1/bm1.gif','images/1/bf1.gif','images/1/bu1.gif','images/1/bb1.gif','images/1/be1.gif','images/1/bt1.gif','images/1/bp1.gif')">
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");
$hist="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
$hist3="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('g0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=g0 width=15 height=20 border=0 id=g0 /></a>";
$urale="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u1','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u1 width=15 height=20 border=0 id=u1 /></a>";

$urale2="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"   onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u2','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u2 width=15 height=20 border=0 id=u2 /></a>";
$urale3="<a href=javascript:; onClick=\"javascript:prompt('Per linkare questa pagina','http://www.spalanca.com/home.php?topage='+self.location.pathname+self.location.search);\"    onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('u3','','images/1/bp1.gif',1);return overlib('url', WRAP);\"><img src=images/1/bp0.gif  name=u3 width=15 height=20 border=0 id=u3 /></a>";

if (isset($subcotd) && isset($save) && isset($cotdid))
{
if($pbindata_name!="" && $pbindata_size<300000 && ($pbindata_type=="image/pjpeg" || $pbindata_type=="image/jpeg")){
$result=MYSQL_QUERY("SELECT cotdfn from cotd WHERE cotdid='$cotdid'");
$oldfile=(@MYSQL_RESULT($result,0,"cotdfn"));
$newfile=$cotdid . "cotd.jpg";
@unlink(	"cotd/$oldfile");	
@copy($pbindata, "cotd/$newfile"); 
$result=MYSQL_QUERY("UPDATE cotd SET cotdalt='$cotdalt',cotdposted=cotdposted,cotdfn='$newfile' WHERE cotdid='$cotdid'");
print ("<script>self.location='$mynameis?cotdid=$cotdid';</script>");
} else {print ("<script>self.location='$mynameis?cotdid=$cotdid&edico=2';</script>");}
}
if (isset($delthis) && isset($cotdid))  {
$result=MYSQL_QUERY("SELECT cotduid, cotdfn FROM cotd WHERE cotdid='$cotdid'");
$oldfile= (@MYSQL_RESULT($result,0,"cotdfn"));
if (@MYSQL_RESULT($result,0,"cotduid")==$id) {	
$result=MYSQL_QUERY("DELETE FROM cotd WHERE cotdid=$cotdid");

@unlink(	"cotd/$oldfile");
 ?>
<script>alert("La bambulija � stata cancellata con successo");self.location='<?php echo $mynameis; ?>';</script>
<?php
}}

else if (!isset($newcotd)) {
if(isset($subcom)) {
$result=MYSQL_QUERY("INSERT INTO comments (content,cuid,cpid,ctype) ".
        "VALUES ('$content','$id','$cotdid',2)");}
if (isset($cotdid) && !isset($edico))
{ 
	$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn  FROM cotd WHERE cotdid=$cotdid");
$cotdalt= @MYSQL_RESULT($result,0,"cotdalt");
$cotduid= @MYSQL_RESULT($result,0,"cotduid");
$cotdfn= @MYSQL_RESULT($result,0,"cotdfn");
$postato= date("d/m/Y H:i", @MYSQL_RESULT($result,0,"postato"));
if (isset($id) && $id==@MYSQL_RESULT($result,0,"cotduid")) {
$cola="6";
$edi="<td  class=tabhead width=15><a href=$mynameis?cotdid=$cotdid&edico=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/be1.gif',1);return overlib('modifica la bambulija', WRAP);\"><img src=images/1/be0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a></td>";
$dele="<td  class=tabhead width=15><a href=$mynameis?cotdid=$cotdid&delthis=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bt1.gif',1);return overlib('cancella la bambulija', WRAP);\"><img src=images/1/bt0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a></td>";
$edi2="<td  class=tabhead width=15><a href=$mynameis?cotdid=$cotdid&edico=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/be1.gif',1);return overlib('modifica la bambulija', WRAP);\"><img src=images/1/be0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a></td>";
$dele2="<td  class=tabhead width=15><a href=$mynameis?cotdid=$cotdid&delthis=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bt1.gif',1);return overlib('cancella la bambulija', WRAP);\"><img src=images/1/bt0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a></td>";
$edi3="<td  class=tabhead width=15><a href=$mynameis?cotdid=$cotdid&edico=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('g1','','images/1/be1.gif',1);return overlib('modifica la bambulija', WRAP);\"><img src=images/1/be0.gif  name=g1 width=15 height=20 border=0 id=g1 /></a></td>";
$dele3="<td  class=tabhead width=15><a href=$mynameis?cotdid=$cotdid&delthis=1  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('g2','','images/1/bt1.gif',1);return overlib('cancella la bambulija', WRAP);\"><img src=images/1/bt0.gif  name=g2 width=15 height=20 border=0 id=g2 /></a></td>";
 }else{
$cola="4";
$edi="";
$dele="";
$edi2="";
$dele2="";
$edi3="";
$dele3="";
  }	
	?>

<table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=95%><a href=<?php echo $mynameis; ?>><img src=images/1/dcbam.gif border=0></a></td><td  class=tabhead width=15><?php echo $urale; ?></td><td  class=tabhead width=15><?php echo $hist; ?></td><?php echo $edi; ?><?php echo $dele; ?><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>

<?php
   $thisuid = $cotduid;
   include ("getavatar.php"); 
printf("<tr><td class=titu colspan=%s>%s</td></tr>",$cola,$cotdalt);
print("<tr><td colspan=$cola><table width=100% cellpadding=0 cellspacing=0>");
printf("<tr><td class=ava rowspan=2 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span></td></tr>",urlencode($cotduid),$avatarurl,urlencode($cotduid), $cotduid,$postato);
printf("<tr><td class=cotd><a href=javascript:dlcotd('%s')><img src=getcotd.php?cotdfn=%s&xsize=450 alt=\"%s\" border=0></a></td></tr>",urlencode($cotdfn),urlencode($cotdfn),$cotdalt);
   print("</td></tr></table></td></tr>");
$result = mysql_query("SELECT content, cuid, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM comments WHERE cpid='$cotdid' AND ctype=2 ORDER BY cposted");
if ($myrow = mysql_fetch_array($result)) {
?>
<tr class=tabhead>
<td  class=tabhead width=95%><img src=images/1/dcom.gif border=0></td><td  class=tabhead width=15><?php echo $urale2; ?></td><td  class=tabhead width=15><?php echo $hist2; ?></td><?php echo $edi2; ?><?php echo $dele2; ?><td width=15 class=tabhead><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=<?php echo $cola; ?>><table width=100% cellpadding=0 cellspacing=0>
<?php

do {
	$thisuid = $myrow["cuid"];
	include ("getavatar.php"); 
	$postato= date("d/m/Y H:i", $myrow["cpostato"]);
printf("<tr><td class=ava rowspan=2 valign=top><a href=scheda.php?zid=%s>%s</a></td><td class=titi><a href=scheda.php?zid=%s>%s</a> <span class=nota>%s</span></tr><tr><td><div class=ute>%s</div></td></tr>",urlencode($myrow["cuid"]),$avatarurl,urlencode($myrow["cuid"]),$myrow["cuid"],$postato,modernize($myrow["content"]));
print("<tr><td colspan=2 class=tabsep></td></tr>");
} while ($myrow = mysql_fetch_array($result));
print ("</table></td></tr>");

}
}
else if (isset($cotdid) && isset($edico)) {
	$result=MYSQL_QUERY("SELECT cotduid FROM cotd WHERE cotdid='$cotdid'");
if (@MYSQL_RESULT($result,0,"cotduid")==$id){
if ($edico==2) {print("<script>alert(\"non possiamo accettare il tuo materiale: non &egrave; stato allegato nessun file, file troppo grosso (max 300K) o file di tipo errato (solo jpeg)\");");}
 ?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=95%><img src=images/1/dcbam.gif border=0></td><td  class=tabhead width=15><?php echo $hist; ?></td><td width=15  class=tabhead><img src=images/spacer.gif width=15></td></tr>
<?php
$result=MYSQL_QUERY("SELECT cotdalt from cotd WHERE cotdid='$cotdid'");
$title= @MYSQL_RESULT($result,0,"cotdalt");

?>
 <tr><td align=center><div class=con><form  enctype="multipart/form-data" method=post name=cotd action=<?php echo $mynameis; ?>?cotdid=<?php echo $cotdid; ?>&save=1  onSubmit="return verCotd(document.cotd);disBut(document.cotd.subcotd)"><span class=con>chi &egrave; questa figa:</span> <INPUT TYPE=text  class=inputs size=58 NAME="cotdalt" value="<?php echo $title; ?>"><br><input type="file" name="pbindata" size=61 class=inputs><br><INPUT TYPE=SUBMIT  class=buttons NAME="subcotd" VALUE="invia"></form></td></tr></table>
<?php

}}
else if (!isset($subcotd))
{
$start=(!isset($start))?0:$start;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM cotd");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-9;
$nextious = $start+9;
$thelast = $contejo-9;
$prev=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/bl1.gif',1);return overlib('pagina di bambulije precedente', WRAP);\"><img src=images/1/bl0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a>";
$next=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bm1.gif',1);return overlib('pagina di bambulije successiva', WRAP);\"><img src=images/1/bm0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a>";
	$prev2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/bl1.gif',1);return overlib('pagina di bambulije precedente', WRAP);\"><img src=images/1/bl0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a>";
$next2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bm1.gif',1);return overlib('pagina di bambulije successiva', WRAP);\"><img src=images/1/bm0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a>";
$thef=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f5','','images/1/bf1.gif',1);return overlib('prima pagina di bambulije', WRAP);\"><img src=images/1/bf0.gif  name=f5 width=15 height=20 border=0 id=f5 /></a>";
$thel=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f6','','images/1/bu1.gif',1);return overlib('ultima pagina di bambulije', WRAP);\"><img src=images/1/bu0.gif  name=f6 width=15 height=20 border=0 id=f6 /></a>";
	$thef2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f7','','images/1/bf1.gif',1);return overlib('prima pagina di bambulije', WRAP);\"><img src=images/1/bf0.gif  name=f7 width=15 height=20 border=0 id=f7 /></a>";
$thel2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f8','','images/1/bu1.gif',1);return overlib('ultima pagina di bambulije', WRAP);\"><img src=images/1/bu0.gif  name=f8 width=15 height=20 border=0 id=f8 /></a>";

?>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr  class=tabhead>
<td><img src=images/1/dcbam.gif  height="20"></td>
<td width=15><?php echo $hist; ?></td><td width=15><?php echo $thef; ?></td><td width=15><?php echo $prev; ?></td><td width=15><?php echo $next; ?></td><td width=15><?php echo $thel; ?></td><td width=15><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=7><table width="100%" border=0 cellpadding="0" cellspacing="0"><?php
$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn,cotdd,  count(cid) as commz  FROM cotd LEFT JOIN comments ON cotdid=cpid  AND ctype=2 GROUP BY cotdid ORDER BY cotdposted DESC LIMIT $start,9");
if ($myrow = mysql_fetch_array($result)) {$tpr=0;$rpp=0;
 do {   $tpr++;    
	$thisuid = $myrow["cotduid"];
	include ("getavatar.php"); 
        $postato= date("d/m/Y H:i",$myrow["postato"]);
         if ($tpr==1) {print("<tr>");} 
 printf("<td class=robbe><a href=%s?cotdid=%s onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap  class=tttd align=right valign=top>ritoccata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td  class=tttd nowrap valign=top><i>%s</i><br>download: %s<br>commenti: %s</td></tr></table></div>', WRAP, CAPTION, '%s')\" onmouseout='return nd();'><img border=0 src=getcotd.php?cotdfn=%s&xsize=180 ></a></td>", $mynameis, $myrow["cotdid"],$myrow["cotduid"],$myrow["cotduid"],$avatarurl,$postato,$myrow["cotdd"],$myrow["commz"],addslashes($myrow["cotdalt"]),$myrow["cotdfn"]);
 					if ($tpr<>3)  {print("<td class=tabsepv></td>");}
          if ($tpr==3 && $rpp<2) {print("</tr><tr><td colspan=5 class=tabsep></td></tr>");$tpr=0;$rpp++;}
	}

        while ($myrow = mysql_fetch_array($result));
        if ($tpr!=0) {for ($xs=$tpr;$xs<3;$xs++) {print ("<td class=robbe></td>");
        if ($xs<>2) {print("<td class=tabsepv></td>");}
        } print ("</tr>");}}
?></table></td></tr><tr class=tabhead><td></td><td width=15><?php echo $hist2; ?></td><td width=15><?php echo $thef2; ?></td><td width=15><?php echo $prev2; ?></td><td width=15><?php echo $next2; ?></td><td width=15><?php echo $thel2; ?></td><td width=15><img src=images/spacer.gif width=15></td></tr>

   <?php
}}
if (isset($id) && !isset($delthis) && !isset($edico)) {
if (isset($subcotd) && !isset ($save))
{
if($pbindata_name!="" && $pbindata_size<300000 && ($pbindata_type=="image/pjpeg" || $pbindata_type=="image/jpeg")){
		$result=MYSQL_QUERY("INSERT INTO cotd (cotdalt, cotduid) ".
        "VALUES ('$cotdalt','$id')");
	$cotdid=mysql_insert_id();
$newfile=$cotdid . "cotd.jpg";
@copy($pbindata, "cotd/$newfile"); 
$result=MYSQL_QUERY("UPDATE cotd SET cotdposted=cotdposted,cotdfn='$newfile' WHERE cotdid='$cotdid'");
print ("<script>self.location='$mynameis?cotdid=$cotdid';</script>");
} else {print("<script>alert(\"non possiamo accettare il tuo materiale: non � stato allegato nessun file, file troppo grosso (max 300K) o file di tipo errato (solo jpeg)\");");}
}
else if (isset($cotdid))
{
?>

<tr class=tabhead>
<td  width=95%><img src=images/1/detcnp.gif border=0></td><td  class=tabhead width=15><?php echo $urale3; ?></td><td  class=tabhead width=15><?php echo $hist3; ?></td><?php echo $edi3; ?><?php echo $dele3; ?><td  class=tabhead width=15><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=<?php echo $cola; ?> align="center">
	  <form id="commenti" name="commenti" method="post" action=<?php echo $mynameis; ?>?cotdid=<?php echo $cotdid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)">
	    <textarea name="content" cols="80" rows="5" class="fields"></textarea><br>
	    
	    
	    <input type="submit" class=buttons name="subcom" value="invia" />

	  </form>
	  </td></tr>

<?php

}

else
{ 
	$result = mysql_query("SELECT cotd  FROM users WHERE id='$id'");
	if (@MYSQL_RESULT($result,0,"cotd")=='Y') {
	
if (isset($newcotd)){	 ?><table width=100% cellpadding=0 cellspacing=0 border=0><tr class=tabhead>
<td width=95%><img src=images/1/dcbam.gif border=0></td></tr><tr><td align=center><?php } else { ?><tr><td align=center colspan=7><?php } ?>

<div class=con><form  enctype="multipart/form-data" method=post name=cotd action=<?php echo $mynameis; ?>  onSubmit="return verCotd(document.cotd);disBut(document.cotd.subcotd)"><span class=con>chi &egrave; questa figa:</span> <INPUT TYPE=text  class=inputs size=58 NAME="cotdalt" ><br><input type="file" name="pbindata" size=61 class=inputs><br><INPUT TYPE=SUBMIT  class=buttons NAME="subcotd" VALUE="invia"></form></td></tr></table>

<?php }else{print("</table>");}}
}
if (isset($cotdid)) {print("</table>");}