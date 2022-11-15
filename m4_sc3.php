<?php  include ("m4_nav.php"); ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center"><img src="images/sm_scheda.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic" align=center><table border="0" cellpadding="3" cellspacing=1 align=center class=masblack>
     <tr>
  <?php
  $result=MYSQL_QUERY("SELECT sm_points FROM m4_playaz WHERE sm_pid='$zid'");
 if (@MYSQL_RESULT($result,0,"sm_points")==null) {
	$sm_points="X";} else {$sm_points=@MYSQL_RESULT($result,0,"sm_points");}
print("	    <td class=masblack valign=top>$zid</td><td background=images/m4_bk.jpg align=right width=78><img src=getdata.php?zid=". urlencode($zid) ."&wht=users border=0  width=50 height=50></td><td class=mascont align=center><b><font size=+3>$sm_points</font></b><br>punti</td>");
    ?></tr></table></td></tr>
 <?php 
   $result=MYSQL_QUERY("SELECT sm_points FROM m4_playaz WHERE sm_pid='$zid'");
if (@MYSQL_RESULT($result,0,"sm_points")==null){
 ?>  
      <tr>
    <td class="mastoxic" align=center>questo personaggio non ha ancora compilato la scheda di partecipazione al TotoFuﬂballWeltmeisterschaft 2006
     </td></tr></table>
 <?php } else {   ?><tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=9><img src="images/sm_sc1.jpg"></td>
  </tr>
 <?php
$result=MYSQL_QUERY("SELECT sm_mid, sm_team1, sm_team2,  m4_res.sm_g1 as g1, m4_res.sm_g2 as g2 , m4_res.sm_1x2 as x2, UNIX_TIMESTAMP(sm_date)  as ladata, sm_group FROM m4_match, m4_teams, m4_res WHERE sm_tid=sm_team1 AND sm_rmid=sm_mid AND sm_rpid='$zid' ORDER BY sm_date");
if ($myrow = mysql_fetch_array($result)) {
	do{ $sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	printf ("<tr><td class=mascont>%s</td><td class=mascont>Gruppo %s</td>", $sijuega,$myrow["sm_group"]);
			$tim1 = $myrow["sm_team1"];
$tim2 = $myrow["sm_team2"];
    $query1res = @MYSQL_QUERY("SELECT sm_flagfn FROM m4_teams WHERE sm_tid='$tim1'");
    $query2res = @MYSQL_QUERY("SELECT sm_flagfn FROM m4_teams WHERE sm_tid='$tim2'");
    $flag1 = "tm/" .  @MYSQL_RESULT($query1res,0,"sm_flagfn");
    $flag2 = "tm/" . @MYSQL_RESULT($query2res,0,"sm_flagfn");
        
	printf ("<td align=right class=mastoxic><img src=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=%s></td>",$flag1,$myrow["sm_team1"],$myrow["sm_team2"],$flag2);
	printf ("<td nowrap class=mascont align=center>%s - %s</td><td class=mascont align=center>%s</td></tr>", $myrow["g1"],$myrow["g2"],$myrow["x2"] );
	} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc2.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT sm_16tid, sm_flagfn FROM m4_16teams, m4_teams WHERE  sm_16tid=sm_tid AND sm_16pid='$zid' AND sm_16w='8' ORDER BY sm_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tm/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["sm_flagfn"]),$myrow["sm_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc3.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT sm_16tid, sm_flagfn FROM m4_16teams, m4_teams WHERE  sm_16tid=sm_tid AND sm_16pid='$zid' AND sm_16w='4' ORDER BY sm_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tm/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["sm_flagfn"]),$myrow["sm_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc4.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT sm_16tid, sm_flagfn FROM m4_16teams, m4_teams WHERE  sm_16tid=sm_tid AND sm_16pid='$zid' AND sm_16w='2' ORDER BY sm_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tm/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["sm_flagfn"]),$myrow["sm_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table>
	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc5.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT sm_16tid, sm_flagfn FROM m4_16teams, m4_teams WHERE  sm_16tid=sm_tid AND sm_16pid='$zid' AND sm_16w='F' ORDER BY sm_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tm/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["sm_flagfn"]),$myrow["sm_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table>
	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc6.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT sm_16tid, sm_flagfn FROM m4_16teams, m4_teams WHERE  sm_16tid=sm_tid AND sm_16pid='$zid' AND sm_16w='W' ORDER BY sm_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tm/%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["sm_flagfn"]),$myrow["sm_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
 </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center"><img src="images/sm_sc7.jpg"></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT sm_name1 FROM m4_goleadors, m4_stars WHERE sm_gpid='$zid' AND sm_gsid=sm_sid ORDER BY sm_name1");
if ($myrow = mysql_fetch_array($result2)) {	print("<tr><td  class=mastoxic align=center>");
	do{

printf ("%s<br>",$myrow["sm_name1"]);

} while  ($myrow = mysql_fetch_array($result2));print("</td>");} ?>
	</table></td> 
 	  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center"><img src="images/sm_sc8.jpg"></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT sm_name1 FROM m4_final, m4_stars WHERE sm_fpid='$zid' AND sm_fsid=sm_sid ORDER BY sm_name1");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic align=center>%s</td>",$myrow["sm_name1"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table> 	
<?php } ?>
   

