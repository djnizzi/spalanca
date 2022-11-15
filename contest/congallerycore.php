<?php
$condeuid=(!isset($euid))?"WHERE conid='".$conid."'":"WHERE euid='".$euid."' AND conid='".$conid."'";
$urleuid=(!isset($euid))?"":"&euid=".$euid;
$start=(!isset($start))?0:$start;
$ordina=(!isset($ordina))?"eposted":$ordina;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM contentries $condeuid");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-15;
$nextious = $start+15;
$prev=($start==0)?"<img src=$condir/cgbla.gif>":"<a href=congallery.php?conid=$conid&start=$previous&ordina=$ordina$urleuid onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image10','','$condir/cgpre2.gif',1)\"><img src=$condir/cgpre1.gif alt=\"15 precedenti\" name=Image10 width=20 height=20 border=0></a>";
$next=($contejo<=$nextious)?"<img src=$condir/cgbla.gif>":"<a href=congallery.php?conid=$conid&start=$nextious&ordina=$ordina$urleuid onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image12','','$condir/cgsuc2.gif',1)\"><img src=$condir/cgsuc1.gif alt=\"15 successivi\" name=Image12 width=20 height=20 border=0></a>";
$come=($ordina=="eposted")?"<a href=congallery.php?conid=$conid&ordina=voto$urleuid onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image11','','$condir/cgvot2.gif',1)\"><img src=$condir/cgvot1.gif alt=\"ordina per voto\" name=Image11 width=20 height=20 border=0></a>":"<a href=congallery.php?conid=$conid onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image11','','$condir/cgcal2.gif',1)\"><img src=$condir/cgcal1.gif alt=\"ordina per data\" name=Image11 width=20 height=20 border=0></a>";
?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="60"><img src="<?php echo $condir; ?>/cgal.gif" width="60" height="461"></td>
            <td rowspan="2"><table width="100%"  border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#999999"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="<?php echo $condir; ?>/spacer.gif" width="19" height="19"></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="701" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#FFFFFF"><table width="701" border="0" cellspacing="1" cellpadding="0">
                        <?php
                        
                        $result = mysql_query("SELECT entid,euid,name FROM contentries $condeuid ORDER BY $ordina DESC LIMIT $start,15");
if ($myrow = mysql_fetch_array($result)) {$tpr=0;$hmr=0;
do { $tpr++; $ranbg=dechex(rand(128,255));
if ($tpr==1) {print("<tr>");}
   print("<td class=galbox bgcolor=$ranbg$ranbg$ranbg>");
   printf("<a href=conenter.php?conid=%s&entid=%s><img src=%s/thumbs/%s-entryt.jpg border=0 class=entry alt=\"%s
by
%s\"></a>",$conid,$myrow["entid"],$conid,$myrow["entid"],$myrow["name"],$myrow["euid"]);
   print("</td>");
   if ($tpr==5) {print("</tr>");$tpr=0;$hmr++;}
} while ($myrow = mysql_fetch_array($result));if($hmr<3){
	for ($xss=$hmr;$xss<5;$xss++)
	{
  if ($tpr!=0) {for ($xs=$tpr;$xs<5;$xs++) {$ranbg=dechex(rand(128,255));print ("<td class=galbox bgcolor=$ranbg$ranbg$ranbg><img src=$condir/spacer.gif width=135 height=1></td>");} print ("</tr>");$tpr=0;$hmr++;}else if($xss<4 && $hmr<3){$ranbg=dechex(rand(128,255));print ("<tr><td class=galbox bgcolor=$ranbg$ranbg$ranbg><img src=$condir/spacer.gif width=135 height=1></td>");$tpr++;}}}}

?>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="39" align="right" valign="bottom" class="fontreg">&copy;2004 LETH/\L SOFTWORKS</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="60" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20"><?php echo $prev; ?></td>
                <td><?php echo $come; ?></td>
                <td width="20"><?php echo $next; ?></td>
              </tr>
            </table></td>
            </tr>
        </table>