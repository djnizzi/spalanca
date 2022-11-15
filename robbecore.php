<?php
$start=(!isset($start))?0:$start;
$ordina=(!isset($ordina))?"pposted":$ordina;
if (isset($come)) {$comeo=$come;$come=($come=='ASC')?"ASC":"DESC";} else {$come="DESC"; $comeo=$come;}
if (isset($categ)) {$catego=($categ=='tutti')?"tutti":$categ;$categ2=($categ=='tutti')?"":"&& ptid='$categ'";$categ=($categ=='tutti')?"":"WHERE ptid='$categ'"; } else {$categ=""; $catego="tutti"; $categ2="";}
$result = mysql_query("SELECT COUNT(*) AS contejo FROM posts $categ");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-6;
$nextious = $start+6;
$prev=($start==0)?"&nbsp;":"&nbsp;<a href=$mynameis?start=$previous&ordina=$ordina&come=$come&categ=$catego>vai indietro</a>";
$next=($contejo<=$nextious)?"&nbsp;":"<a href=$mynameis?start=$nextious&ordina=$ordina&come=$come&categ=$catego>vai avanti</a>&nbsp;";
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
<td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center"><img src="images/robbe.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr><td><form method=post name=ordina action=<?php echo $mynameis; ?>>
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <td class="masall" align="center">
<select name=ordina class=buttons>
<option SELECTED VALUE=pposted>data</option>
<option VALUE=voto>voto</option>
<option VALUE=title>nome</option>
<option VALUE=tvd>n. vista</option>
<option VALUE=tdd>n. download</option>
</select>&nbsp;
<select name=come class=buttons>
<option SELECTED VALUE=DESC>discendente</option>
<option VALUE="ASC">ascendente</option>
</select>&nbsp;
<select name=categ class=buttons>
<option SELECTED VALUE=tutti>tutte le robbe</option>
<?php
$result = mysql_query("SELECT tid,cat FROM categories ORDER BY cat");
if ($myrow = mysql_fetch_array($result)) {
 do {printf ("<option value=%s>%s</option>", $myrow["tid"], $myrow["cat"]);}
 while ($myrow = mysql_fetch_array($result));
 }
 ?>
</select>&nbsp;<input TYPE=submit value=visualizza class=buttons></td></tr></table>
<script>redux(document.forms['ordina'].ordina,'<?php echo $ordina; ?>');redux(document.forms['ordina'].come,'<?php echo $comeo; ?>');redux(document.forms['ordina'].categ,'<?php echo $catego; ?>');</script>
</form></td></tr>
<?php
$result = mysql_query("SELECT pid,puid,voto,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,title,tvd,tdd,cat FROM posts,categories WHERE ptid=tid $categ2 ORDER BY $ordina $come LIMIT $start,6");
if ($myrow = mysql_fetch_array($result)) {
 do {       $qfv=$myrow["voto"];
$finalvote=$voto[number_format(round($qfv),2)];
        $pid= $myrow["pid"];
        $postato= date("d/m/Y H:i",$myrow["postato"]);
        $thisuid = $myrow["puid"];
        include ("getavatar.php");
       print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
        printf("<a href=robba.php?pid=%s>%s</a></span><br>creato da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td><td align=right  $spaltb1><a href=scheda.php?zid=%s>%s</a></td>", $myrow["pid"], $myrow["title"],urlencode($myrow["puid"]), $myrow["puid"],$postato ,urlencode($myrow["puid"]),$avatarurl);
        print ("</tr><tr><td colspan=2 class=mascont2><table width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2><tr><td align=center width=50%>");
        printf("<a href=robba.php?pid=%s><img src=robba/thumbs/%st-robba.jpg border=0 class=masall></a></td><td>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)", $myrow["pid"], $myrow["pid"],$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$finalvote,$qfv);
        $result3 = mysql_query("SELECT COUNT(*) AS commz FROM comments WHERE cpid='$pid' AND ctype=0");
 if ($myrow3 = mysql_fetch_array($result3)) {
	 printf("<br>Commenti: %s</td>", $myrow3["commz"]);
	}
        print ("</tr></table></td></tr></table></td></tr>");
        } while ($myrow = mysql_fetch_array($result));
}
?>
<tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
<td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center"><img src="images/spacer.gif" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>                          </table>
                        </td>
                      </tr>

</table>
<?php
?>