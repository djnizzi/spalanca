<?php  if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("sm_nav.php"); ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center" colspan=2><img src="images/sm_class.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic3" align=center rowspan=3><table border="0" cellpadding="3" cellspacing=1 align=center class=masblack>

  <?php
  $result=MYSQL_QUERY("SELECT count(*) as segnari FROM sm_playaz");
  $partecipantes= @MYSQL_RESULT($result,0,"segnari");
  $result=MYSQL_QUERY("SELECT sm_points, sm_pid FROM sm_playaz WHERE sm_paid='Y' ORDER BY sm_points DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
    $thisuid = $myrow["sm_pid"];
    include ("getavatar.php"); 
printf("<tr><td class=masblack valign=top><a href=m2_scheda.php?zid=%s>%s</a></td><td background=images/sm_bk.jpg align=right width=78><a href=sm_scheda.php?zid=%s>%s</a></td><td class=mascont align=center><b><font size=+3>%s</font></b><br>punti</td></tr>",urlencode($myrow["sm_pid"]),$myrow["sm_pid"],urlencode($myrow["sm_pid"]),$avatarurl,$myrow["sm_points"]);
} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
		<td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src=images/tmwallthumb.jpg class=mascont><br><a href="#" onClick="MM_openBrWindow('images/tmwall1280.jpg','tmwall1280','scrollbars=yes,width=500,height=400')">1280x960
    [273Kb]</a> | <a href="#" onClick="MM_openBrWindow('images/tmwall1024.jpg','tmwall1024','scrollbars=yes,width=500,height=400')">1024x768
    [238Kb]</a></td></tr></table></td>
  </tr><tr>
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc6.jpg"></td>
  </tr>
<?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, sm_16tid FROM sm_16teams WHERE sm_16w='W'  GROUP BY sm_16tid  ORDER BY segnari DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes));
printf("<tr><td class=mastoxic align=right width=100><img src=sm_getdata.php?tid=%s></td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td class=mascont width=50 align=right>%s %%</td></tr>",urlencode($myrow["sm_16tid"]),round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
	<tr>
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc7.jpg"></td>
  </tr>
 <?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, sm_name1 FROM sm_goleadors, sm_stars WHERE sm_sid=sm_gsid  GROUP BY sm_gsid  ORDER BY segnari DESC LIMIT 10");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes*5));
printf("<tr><td class=mastoxic align=right width=100>%s</td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td width=50 class=mascont align=right>%s %%</td></tr>",$myrow["sm_name1"],round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
</table>	
	
<?php } else { ?><script>parent.location='sm_noid.php'</script><?php }   include ("sm_copy.php"); ?>
   
