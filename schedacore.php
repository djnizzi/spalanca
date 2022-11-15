<?php
if (isset($zid)) {
$result=MYSQL_QUERY("SELECT mailon, email FROM users WHERE id='$zid'");
 ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/personaggio.jpg width=338 height=20></td>
                      </tr>
 <tr><td class=massim align=center><br><?php $thisuid = $zid;
include ("getavatar.php"); echo $avatarurl ?><br><b><?php echo $zid; ?></b><?php
if (@MYSQL_RESULT($result,0,"mailon")=='Y') {
print ("<br><a href=mailto:". @MYSQL_RESULT($result,0,"email") .">" . @MYSQL_RESULT($result,0,"email") . "</a>");  }
print ("<br>&nbsp;</td></tr></table>");
$start=(!isset($start))?0:$start;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM posts WHERE puid='$zid'");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-6;
$nextious = $start+6;
$prev=($start==0)?"&nbsp;":"&nbsp;<a href=$mynameis?start=$previous&zid=".urlencode($zid).">vai indietro</a>";
$next=($contejo<=$nextious)?"&nbsp;":"<a href=$mynameis?start=$nextious&zid=".urlencode($zid).">vai avanti</a>&nbsp;";
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/att.jpg width=338 height=20></td>
                      </tr>
                      
                      <?php
$result = mysql_query("SELECT count(*) as newsc from news where nuid='$zid'");
$result2 = mysql_query("SELECT count(*) as robbac from posts where puid='$zid'");
$result3 = mysql_query("SELECT count(*) as newfc from forum where fuid='$zid' AND fid=reply");
$result4 = mysql_query("SELECT count(*) as allfc from forum where fuid='$zid'");
$result5 = mysql_query("SELECT count(*) as commc from comments where cuid='$zid'");
$isco = mysql_query("SELECT cotd FROM users WHERE id='$zid'");
if(@MYSQL_RESULT($isco,0,"cotd")=='Y') {
$result6 = mysql_query("SELECT count(*) as chicks from cotd where cotduid='$zid'");
$chicks=@MYSQL_RESULT($result6,0,"chicks") . " chicks<br>";
}else{$chicks="";}
   print("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack>");
   printf("<tr><td align=center class=mascont2><br>%s news<br>%s robbe<br>%s messaggi nei forum<br>%s forum aperti<br>%s commenti<br>%s&nbsp;", @MYSQL_RESULT($result,0,"newsc"),@MYSQL_RESULT($result2,0,"robbac"),@MYSQL_RESULT($result4,0,"allfc"),@MYSQL_RESULT($result3,0,"newfc"),@MYSQL_RESULT($result5,0,"commc"),$chicks);
   print("</td></tr></table></td></tr>");


?>
</table>

<table width="100%" border="0" cellspacing="2" cellpadding="0"><tr>
                        <td class="masall" align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
<td width=33% class="greek"><?php echo $prev; ?></td>
                              <td class="greek" align="center"><img src="images/opere.jpg" width="338" height="20"></td>
                              <td width=33% class="greek" align="right"><?php echo $next; ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
<?php

$result = mysql_query("SELECT pid,voto,UNIX_TIMESTAMP(pposted) AS postato,title,tvd,tdd,cat FROM posts,categories WHERE ptid=tid AND puid='$zid' ORDER BY pposted DESC LIMIT $start,6");
if ($myrow = mysql_fetch_array($result)) {
 do {      $qfv=$myrow["voto"];
$finalvote=$voto[round($qfv)];
        $pid= $myrow["pid"];
        $postato= date("d/m/Y H:i",$myrow["postato"]);
 
        print ("<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0 class=masblack><tr><td valign=top><span class=mastika>");
        printf("<a href=robba.php?pid=%s>%s</a></span><br>inviato %s</td>", $myrow["pid"], $myrow["title"],$postato);
        print ("</tr><tr><td class=mascont2><table width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2><tr><td align=center width=50%>");
        printf("<a href=robba.php?pid=%s><img src=thumb.php?pid=%s&xsize=150 border=0 class=masall></a></td><td>Categoria: %s<br>Vista: %s<br>Download: %s<br>Voto: %s (%s)", $myrow["pid"], $myrow["pid"],$myrow["cat"], $myrow["tvd"],$myrow["tdd"],$finalvote,$qfv);
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
                            </tr>
                          </table>
                        </td>
                      </tr>
</table>
<?php
}
?>