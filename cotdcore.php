<?php
if (isset($subcotd) && isset($save) && isset($cotdid))
{
if($pbindata_name!="" && $pbindata_size<300000 && ($pbindata_type=="image/pjpeg" || $pbindata_type=="image/jpeg")){
$result=MYSQL_QUERY("SELECT cotdfn from cotd WHERE cotdid='$cotdid'");
$oldfile=(@MYSQL_RESULT($result,0,"cotdfn"));
$newfile=$cotdid . "cotd.jpg";
@unlink(	"cotd/$oldfile");	
@copy($pbindata, "cotd/$newfile"); 
$result=MYSQL_QUERY("UPDATE cotd SET cotdalt='$cotdalt',cotdposted=cotdposted,cotdfn='$newfile' WHERE cotdid='$cotdid'");
print ("<script>window.location='$mynameis?cotdid=$cotdid';</script>");
} else {print ("<script>window.location='$mynameis?cotdid=$cotdid&edico=2';</script>");}
}
if (isset($delthis) && isset($cotdid))  {
$result=MYSQL_QUERY("SELECT cotduid, cotdfn FROM cotd WHERE cotdid='$cotdid'");
$oldfile= (@MYSQL_RESULT($result,0,"cotdfn"));
if (@MYSQL_RESULT($result,0,"cotduid")==$id) {	
$result=MYSQL_QUERY("DELETE FROM cotd WHERE cotdid=$cotdid");

@unlink(	"cotd/$oldfile");
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center>La chick è stata cancellata con successo</td>
                      </tr>
</table>

<?php
}}

else if (!isset($newcotd)) {
if(isset($subcom)) {
$result=MYSQL_QUERY("INSERT INTO comments (content,cuid,cpid,ctype) ".
        "VALUES ('$content','$id','$cotdid',2)");}
if (isset($cotdid) && !isset($edico))
{ ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/chick.jpg border=0 width=338 height=20></td>
                      </tr>
<?php
$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn  FROM cotd WHERE cotdid=$cotdid");
$cotdalt= @MYSQL_RESULT($result,0,"cotdalt");
$cotduid= @MYSQL_RESULT($result,0,"cotduid");
$cotdfn= @MYSQL_RESULT($result,0,"cotdfn");
$postato= date("d/m/Y H:i", @MYSQL_RESULT($result,0,"postato"));
   print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top $spaltb4><span class=mastika>");
   printf("<a href=cotd.php?cotdid=%s>%s</a></span><br>ritoccata da <a href=scheda.php?zid=%s>%s</a> - inviato %s</td>", $cotdid,$cotdalt,urlencode($cotduid),$cotduid,$postato);
   printf("<td align=right $spaltb1><a href=scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0 width=50 height=50></a></td></tr><tr><td colspan=2 class=mascont2><center><a href=javascript:dlcotd('%s')><img border=0 src=getcotd.php?cotdfn=%s&xsize=450 alt=\"%s\"></a>", urlencode($cotduid), urlencode($cotduid),urlencode($cotdfn),urlencode($cotdfn),$cotdalt);
   print("</td></tr></table></td></tr>");
   if (isset($id) && $id==$cotduid) {
print ("<tr><td class=masall align=center><a href=$mynameis?cotdid=$cotdid&edico=1>modifica</a> | <a href=$mynameis?cotdid=$cotdid&delthis=1>cancella</a>");
 }
print ("</table>");

$result = mysql_query("SELECT content, cuid, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM comments WHERE cpid='$cotdid' AND ctype=2 ORDER BY cposted");
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
else if (isset($cotdid) && isset($edico)) {
	$result=MYSQL_QUERY("SELECT cotduid FROM cotd WHERE cotdid='$cotdid'");
if (@MYSQL_RESULT($result,0,"cotduid")==$id){
if ($edico==2) {print("<center>non possiamo accettare il tuo materiale: non è stato allegato nessun file, file troppo grosso (max 300K) o file di tipo errato (solo jpeg)");}
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/chick.jpg border=0 width=338 height=20></td>
                      </tr>
<?php
$result=MYSQL_QUERY("SELECT cotdalt from cotd WHERE cotdid='$cotdid'");
$title= @MYSQL_RESULT($result,0,"cotdalt");

?>
 <tr><td><form  enctype="multipart/form-data" method=post name=cotd action=<?php echo $mynameis; ?>?cotdid=<?php echo $cotdid; ?>&save=1  onSubmit="return verCotd(document.cotd);disBut(document.cotd.subcotd)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>chi è questa figa: <INPUT TYPE=text  class=buttons size=90 NAME="cotdalt" value="<?php echo $title; ?>"></td></tr> <tr><td align=center><input type="file" name="pbindata" size=61 class=buttons></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subcotd" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php

}}
else if (!isset($subcotd))
{$start=(!isset($start))?0:$start;
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class="masall" align="center" colspan=3>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
<?php
$result = mysql_query("SELECT COUNT(*) AS contejo FROM cotd");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-9;
$nextious = $start+9;
$prev=($start==0)?"&nbsp;":"&nbsp;<a href=$mynameis?start=$previous>vai indietro</a>";
$next=($contejo<=$nextious)?"&nbsp;":"<a href=$mynameis?start=$nextious>vai avanti</a>&nbsp;";
?>
<td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center"><img src="images/chick.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php

$result = mysql_query("SELECT cotdid, cotduid,UNIX_TIMESTAMP(DATE_ADD(cotdposted, INTERVAL $fuso HOUR)) AS postato,cotdalt,cotdfn,  count(cid) as commz  FROM cotd LEFT JOIN comments ON cotdid=cpid  AND ctype=2 GROUP BY cotdid ORDER BY cotdposted DESC LIMIT $start,9");
if ($myrow = mysql_fetch_array($result)) {$tpr=0;
do { $tpr++;
if ($tpr==1) {print("<tr>");}
   $postato= date("d/m/Y H:i",$myrow["postato"]);
   print("<td class=mascont align=center>");
   printf("<a href=cotd.php?cotdid=%s><img border=0 src=getcotd.php?cotdfn=%s&xsize=180 alt=\"%s\nritoccata da %s\ninviata %s\n%s commenti\"></a>", $myrow["cotdid"], urlencode($myrow["cotdfn"]), $myrow["cotdalt"],$myrow["cotduid"],$postato,$myrow["commz"]);
   print("</td>");
   if ($tpr==3) {print("</tr>");$tpr=0;}
} while ($myrow = mysql_fetch_array($result));  if ($tpr!=0) {for ($xs=$tpr;$xs<3;$xs++) {print ("<td><img src=images/spacer.gif width=180 height=1></td>");} print ("</tr>");}}
?>
      <tr>
                        <td class="masall" align="center" colspan=3>
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
print ("<script>window.location='$mynameis?cotdid=$cotdid';</script>");
} else {print("<center>non possiamo accettare il tuo materiale: non è stato allegato nessun file, file troppo grosso (max 300K) o file di tipo errato (solo jpeg)");}
}
else if (isset($cotdid))
{
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/andu.jpg width=338 height=20></td>
                      </tr>
 <tr><td><form method=post name=commenti action=<?php echo $mynameis; ?>?cotdid=<?php echo $cotdid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><textarea class=mascont name="content" rows="5" cols="100"></textarea></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subcom" VALUE="invia"></td></tr>
 </table></form></td></tr></table>

<?php

}

else
{ 
	$result = mysql_query("SELECT cotd  FROM users WHERE id='$id'");
	if (@MYSQL_RESULT($result,0,"cotd")=='Y') { ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/chick.jpg border=0 width=338 height=20></td>
                      </tr>

 <tr><td><form  enctype="multipart/form-data" method=post name=cotd action=<?php echo $mynameis; ?> onSubmit="return verCotd(document.cotd);disBut(document.cotd.subcotd)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>chi è questa figa: <INPUT TYPE=text  class=buttons size=90 NAME="cotdalt"></td></tr> <tr><td align=center><input type="file" name="pbindata" size=61 class=buttons></td></tr><tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subcotd" VALUE="invia"></td></tr>
 </table></form></td></tr></table>
<?php }}
}