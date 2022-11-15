<head><link rel="alternate" type="application/x-cooliris-quick" href="http://www.spalanca.com/cooliris-quick.xml" /><link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
<script type="text/javascript" src="overlib_mini.js"></script></head>
<body onload="MM_preloadImages('images/1/bl1.gif','images/1/bm1.gif','images/1/bf1.gif','images/1/bu1.gif','images/1/bb1.gif')">
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");

$start=(!isset($start))?0:$start;
$ordina=(!isset($ordina))?"pposted":$ordina;
if (isset($come)) {$comeo=$come;$come=($come=='ASC')?"ASC":"DESC";} else {$come="DESC"; $comeo=$come;}
if (isset($categ)) {$catego=($categ=='tutti')?"tutti":$categ;$categ2=($categ=='tutti')?"":"&& ptid='$categ'";$categ=($categ=='tutti')?"":"WHERE ptid='$categ'"; } else {$categ=""; $catego="tutti"; $categ2="";}
$result = mysql_query("SELECT COUNT(*) AS contejo FROM posts $categ");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-9;
$nextious = $start+9;
$thelast = $contejo-9;
$prev=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous&ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f1','','images/1/bl1.gif',1);return overlib('pagina di robbe precedente', WRAP);\"><img src=images/1/bl0.gif  name=f1 width=15 height=20 border=0 id=f1 /></a>";
$next=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious&ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f2','','images/1/bm1.gif',1);return overlib('pagina di robbe successiva', WRAP);\"><img src=images/1/bm0.gif  name=f2 width=15 height=20 border=0 id=f2 /></a>";
	$prev2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$previous&ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f3','','images/1/bl1.gif',1);return overlib('pagina di robbe precedente', WRAP);\"><img src=images/1/bl0.gif  name=f3 width=15 height=20 border=0 id=f3 /></a>";
$next2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$nextious&ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f4','','images/1/bm1.gif',1);return overlib('pagina di robbe successiva', WRAP);\"><img src=images/1/bm0.gif  name=f4 width=15 height=20 border=0 id=f4 /></a>";
$thef=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f5','','images/1/bf1.gif',1);return overlib('prima pagina di robbe', WRAP);\"><img src=images/1/bf0.gif  name=f5 width=15 height=20 border=0 id=f5 /></a>";
$thel=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast&ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f6','','images/1/bu1.gif',1);return overlib('ultima pagina di robbe', WRAP);\"><img src=images/1/bu0.gif  name=f6 width=15 height=20 border=0 id=f6 /></a>";
	$thef2=($start==0)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f7','','images/1/bf1.gif',1);return overlib('prima pagina di robbe', WRAP);\"><img src=images/1/bf0.gif  name=f7 width=15 height=20 border=0 id=f7 /></a>";
$thel2=($contejo<=$nextious)?"<img src=images/spacer.gif width=15>":"<a href=$mynameis?start=$thelast&ordina=$ordina&come=$come&categ=$catego 
	onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f8','','images/1/bu1.gif',1);return overlib('ultima pagina di robbe', WRAP);\"><img src=images/1/bu0.gif  name=f8 width=15 height=20 border=0 id=f8 /></a>";
$hist="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f9','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f9 width=15 height=20 border=0 id=f9 /></a>";

$hist2="<a href=javascript:self.history.back()  onmouseout='MM_swapImgRestore();return nd();' onmouseover=\"MM_swapImage('f0','','images/1/bb1.gif',1);return overlib('indietro', WRAP);\"><img src=images/1/bb0.gif  name=f0 width=15 height=20 border=0 id=f0 /></a>";
?>
<form method=post name=ordina action=<?php echo $mynameis; ?>>
<table width=100% cellpadding=0 cellspacing=0 border=0><tr  class=tabhead>
<td><img src=images/1/dsr.gif width="95" height="20"></td>
<td width=420 nowrap><select name=ordina class=titsel>
<option SELECTED VALUE=pposted>data</option>
<option VALUE=voto>voto</option>
<option VALUE=title>nome</option>
<option VALUE=tvd>n. vista</option>
<option VALUE=tdd>n. download</option>
</select>&nbsp;
<select name=come class=titsel>
<option SELECTED VALUE=DESC>discendente</option>
<option VALUE="ASC">ascendente</option>
</select>&nbsp;
<select name=categ class=titsel>
<option SELECTED VALUE=tutti>tutte le robbe</option>
<?php
$result = mysql_query("SELECT tid,cat FROM categories ORDER BY cat");
if ($myrow = mysql_fetch_array($result)) {
 do {printf ("<option value=%s>%s</option>", $myrow["tid"], $myrow["cat"]);}
 while ($myrow = mysql_fetch_array($result));
 }
 ?>
</select>&nbsp;<input TYPE=submit value=visualizza class=titbut><script>redux(document.forms['ordina'].ordina,'<?php echo $ordina; ?>');redux(document.forms['ordina'].come,'<?php echo $comeo; ?>');redux(document.forms['ordina'].categ,'<?php echo $catego; ?>');</script></td><td width=15><?php echo $hist; ?></td><td width=15><?php echo $thef; ?></td><td width=15><?php echo $prev; ?></td><td width=15><?php echo $next; ?></td><td width=15><?php echo $thel; ?></td><td width=15><img src=images/spacer.gif width=15></td></tr>
<tr><td colspan=8><table width="100%" border=0 cellpadding="0" cellspacing="0"><?php
$result = mysql_query("SELECT pid,puid,voto,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,title,tvd,tdd,cat FROM posts,categories WHERE ptid=tid $categ2 ORDER BY $ordina $come LIMIT $start,9");
if ($myrow = mysql_fetch_array($result)) {$tpr=0;$rpp=0;
 do {   $tpr++;    $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
        $pid= $myrow["pid"];
        $postato= date("d/m/Y H:i",$myrow["postato"]);
         if ($tpr==1) {print("<tr>");} 
   $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
 if ($myrow3 = mysql_fetch_array($result3)) {
$commisi=$myrow3["commz"];
	}
	$thisuid = $myrow["puid"];
include ("getavatar.php"); 
 printf("<td class=robbe><a href=robba06.php?pid=%s onmouseover=\"return overlib('<div class=ttdiv><table cellpadding=0 cellspacing=2 border=0 width=100%><tr><td nowrap align=right class=tttd valign=top>creata da<br><strong>%s</strong><br>%s</td><td class=tabsepv><img src=images/spacer.gif width=3></td><td  class=tttd nowrap valign=top><i>%s</i><br>%s<br>vista: %s<br>download: %s<br>commenti: %s<br>voto: %s (%s)</td></tr></table></div>', WRAP, CAPTION, '%s')\" onmouseout='return nd();'><img src=robba/thumbs/%st-robba.jpg></a></td>", $myrow["pid"],$myrow["puid"],$myrow["puid"],$avatarurl,$postato,$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$commisi, $finalvote,$qfv,addslashes($myrow["title"]),$myrow["pid"]);
 					if ($tpr<>3)  {print("<td class=tabsepv></td>");}
          if ($tpr==3 && $rpp<2) {print("</tr><tr><td colspan=5 class=tabsep></td></tr>");$tpr=0;$rpp++;}
	}

        while ($myrow = mysql_fetch_array($result));
        if ($tpr!=0) {for ($xs=$tpr;$xs<3;$xs++) {print ("<td class=robbe></td>");
        if ($xs<>2) {print("<td class=tabsepv></td>");}
        } print ("</tr>");}}
?></table></td></tr><tr class=tabhead><td></td><td></td><td width=15><?php echo $hist2; ?></td><td width=15><?php echo $thef2; ?></td><td width=15><?php echo $prev2; ?></td><td width=15><?php echo $next2; ?></td><td width=15><?php echo $thel2; ?></td><td width=15><img src=images/spacer.gif width=15></td></tr></table>





