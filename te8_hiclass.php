<?php  if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
include ("sm_structure.php");
include ("te8_nav.php"); 
mysql_select_db($database2);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center" colspan=2><img src="images/sm_class.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic3" align=center rowspan=2><table border="0" cellpadding="3" cellspacing=1 align=center class=masblack>

  <?php
  $result=MYSQL_QUERY("SELECT count(*) as segnari FROM te8_playaz");
  $partecipantes= @MYSQL_RESULT($result,0,"segnari");
  $result=MYSQL_QUERY("SELECT tc_points, tc_pid FROM te8_playaz  WHERE tc_paid='Y' ORDER BY tc_points DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
printf("<tr><td class=masblack valign=top><a href=te8_scheda.php?zid=%s>%s</a></td><td background=images/te8_bk.jpg align=right width=78><a href=te8_scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0  width=50 height=50></a></td><td class=mascont align=center><b><font size=+3>%s</font></b><br>punti</td></tr>",urlencode($myrow["tc_pid"]),$myrow["tc_pid"],urlencode($myrow["tc_pid"]),urlencode($myrow["tc_pid"]),$myrow["tc_points"]);
} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
	
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/tc_sc6.jpg"></td>
  </tr>
<?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, tc_16tid, tc_flagfn FROM te8_16teams, te8_teams WHERE  tc_16tid=tc_tid AND tc_16w='W'  GROUP BY tc_16tid  ORDER BY segnari DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes));
printf("<tr><td class=mastoxic align=right width=100><img src=ti/%s></td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td class=mascont width=50 align=right>%s %%</td></tr>",urlencode($myrow["tc_flagfn"]),round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
	<tr>
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc7.jpg"></td>
  </tr>
 <?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, tc_name1 FROM te8_goleadors, te8_stars WHERE tc_sid=tc_gsid  GROUP BY tc_gsid  ORDER BY segnari DESC LIMIT 10");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes*5));
printf("<tr><td class=mastoxic align=right width=100>%s</td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td width=50 class=mascont align=right>%s %%</td></tr>",$myrow["tc_name1"],round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
</table>	
	
<?php } else { ?><script>parent.location='te8_noid.php'</script><?php }   include ("te8_copy.php"); ?>
   
