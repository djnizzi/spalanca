<?php  if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("t10_nav.php"); 
mysql_select_db($database2);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center" colspan=2><img src="images/sm_class.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic3" align=center rowspan=2><table border="0" cellpadding="3" cellspacing=1 align=center class=masblack>

  <?php
  $result=MYSQL_QUERY("SELECT count(*) as segnari FROM t10_playaz");
  $partecipantes= @MYSQL_RESULT($result,0,"segnari");
  $result=MYSQL_QUERY("SELECT tc_points, tc_pid FROM t10_playaz WHERE tc_paid='Y' ORDER BY tc_points DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
    $thisuid = $myrow["tc_pid"];
    mysql_select_db($database);
    include ("getavatar.php"); 
    mysql_select_db($database2);
printf("<tr><td class=masblack valign=top><a href=t10_scheda.php?zid=%s>%s</a></td><td background=images/tc_bk.jpg align=right width=78><a href=t10_scheda.php?zid=%s>%s</a></td><td class=mascont align=center><b><font size=+3>%s</font></b><br>punti</td></tr>",urlencode($myrow["tc_pid"]),$myrow["tc_pid"],urlencode($myrow["tc_pid"]),$avatarurl,$myrow["tc_points"]);
} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
		
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/tc_sc6.jpg"></td>
  </tr>
<?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, tc_16tid FROM t10_16teams WHERE tc_16w='W'  GROUP BY tc_16tid  ORDER BY segnari DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes));
printf("<tr><td class=mastoxic align=right width=100><img src=t10_getdata.php?tid=%s></td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td class=mascont width=50 align=right>%s %%</td></tr>",urlencode($myrow["tc_16tid"]),round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
	<tr>
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc7.jpg"></td>
  </tr>
 <?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, tc_name1 FROM t10_goleadors, t10_stars WHERE tc_sid=tc_gsid  GROUP BY tc_gsid  ORDER BY segnari DESC LIMIT 10");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes*5));
printf("<tr><td class=mastoxic align=right width=100>%s</td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td width=50 class=mascont align=right>%s %%</td></tr>",$myrow["tc_name1"],round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
</table>	
	
<?php } else { ?><script>parent.location='t10_noid.php'</script><?php }   include ("sm_copy.php"); ?>
   
