<?php  include ("t8_nav.php"); 
mysql_select_db($database2);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center"><img src="images/sm_scheda.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic" align=center><table border="0" cellpadding="3" cellspacing=1 align=center class=masblack>
     <tr>
  <?php
  $result=MYSQL_QUERY("SELECT tc_points FROM t8_playaz WHERE tc_pid='$zid'");
if (@MYSQL_RESULT($result,0,"tc_points")==null){
	$sm_points="X";} else {$sm_points=@MYSQL_RESULT($result,0,"tc_points");}
print("	    <td class=masblack valign=top>$zid</td><td background=images/tc_bk.jpg align=right width=78><img src=getdata.php?zid=". urlencode($zid) ."&wht=users border=0  width=50 height=50></td><td class=mascont align=center><b><font size=+3>$sm_points</font></b><br>punti</td>");
    ?></tr></table></td></tr>
    
     <?php 
   $result=MYSQL_QUERY("SELECT tc_points FROM t8_playaz WHERE tc_pid='$zid'");
if (@MYSQL_RESULT($result,0,"tc_points")==null){
 ?>  
      <tr>
    <td class="mastoxic" align=center>questo personaggio non ha ancora compilato la scheda di partecipazione al TOTOCEMPIONS
     </td></tr></table>
 <?php } else {   ?><tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=9><img src="images/sm_sc1.jpg"></td>
  </tr>
 <?php
$result=MYSQL_QUERY("SELECT tc_mid, tc_team1, tc_team2,  t8_res.tc_g1 as g1, t8_res.tc_g2 as g2 , t8_res.tc_1x2 as x2, UNIX_TIMESTAMP(tc_date)  as ladata, tc_group FROM t8_match, t8_teams, t8_res WHERE tc_tid=tc_team1 AND tc_rmid=tc_mid AND tc_rpid='$zid' ORDER BY tc_date");
if ($myrow = mysql_fetch_array($result)) {
	do{ $sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	printf ("<tr><td class=mascont>%s</td><td class=mascont>Gruppo %s</td>", $sijuega,$myrow["tc_group"]);
		$tim1 = $myrow["tc_team1"];
$tim2 = $myrow["tc_team2"];
    $query1res = @MYSQL_QUERY("SELECT tc_flagfn FROM t8_teams WHERE tc_tid='$tim1'");
    $query2res = @MYSQL_QUERY("SELECT tc_flagfn FROM t8_teams WHERE tc_tid='$tim2'");
    $flag1 = "tc/" .  @MYSQL_RESULT($query1res,0,"tc_flagfn");
    $flag2 = "tc/" . @MYSQL_RESULT($query2res,0,"tc_flagfn");
	printf ("<td align=right class=mastoxic><img src=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=%s></td>",$flag1,$myrow["tc_team1"],$myrow["tc_team2"],$flag2);
	printf ("<td nowrap class=mascont align=center>%s - %s</td><td class=mascont align=center>%s</td></tr>", $myrow["g1"],$myrow["g2"],$myrow["x2"] );
	} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/tc_sc2.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT tc_16tid, tc_flagfn FROM t8_16teams, t8_teams WHERE  tc_16tid=tc_tid AND tc_16pid='$zid' AND tc_16w='8' ORDER BY tc_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tc/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["tc_flagfn"]),$myrow["tc_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc3.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT tc_16tid, tc_flagfn FROM t8_16teams, t8_teams WHERE  tc_16tid=tc_tid AND tc_16pid='$zid' AND tc_16w='4' ORDER BY tc_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tc/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["tc_flagfn"]),$myrow["tc_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc4.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT tc_16tid, tc_flagfn FROM t8_16teams, t8_teams WHERE  tc_16tid=tc_tid AND tc_16pid='$zid' AND tc_16w='2' ORDER BY tc_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tc/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["tc_flagfn"]),$myrow["tc_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table>
	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc5.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT tc_16tid, tc_flagfn FROM t8_16teams, t8_teams WHERE  tc_16tid=tc_tid AND tc_16pid='$zid' AND tc_16w='F' ORDER BY tc_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tc/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["tc_flagfn"]),$myrow["tc_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table>
	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/tc_sc6.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT tc_16tid, tc_flagfn FROM t8_16teams, t8_teams WHERE  tc_16tid=tc_tid AND tc_16pid='$zid' AND tc_16w='W' ORDER BY tc_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tc/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["tc_flagfn"]),$myrow["tc_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
 </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center"><img src="images/sm_sc7.jpg"></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT tc_name1 FROM t8_goleadors, t8_stars WHERE tc_gpid='$zid' AND tc_gsid=tc_sid ORDER BY tc_name1");
if ($myrow = mysql_fetch_array($result2)) {	print("<tr><td  class=mastoxic align=center>");
	do{

printf ("%s<br>",$myrow["tc_name1"]);

} while  ($myrow = mysql_fetch_array($result2));print("</td>");} ?>
	</table></td> 
 	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center"><img src="images/sm_sc8.jpg"></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT tc_name1 FROM t8_final, t8_stars WHERE tc_fpid='$zid' AND tc_fsid=tc_sid ORDER BY tc_name1");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic align=center>%s</td>",$myrow["tc_name1"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr><?php } ?>
    
</table>