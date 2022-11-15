<?php  if (isset($id)){
include ("config.php");
include ("connect.php");
include ("cookie.php");
mysql_select_db($database2);
include ("sm_structure.php");
include ("m4_nav.php"); ?>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center" colspan=2><img src="images/sm_class.jpg" width="338" height="20"></td>
  </tr>
      <tr>
    <td class="mastoxic3" align=center rowspan=2><table border="0" cellpadding="3" cellspacing=1 align=center class=masblack>

  <?php
  $result=MYSQL_QUERY("SELECT count(*) as segnari FROM m4_playaz");
  $partecipantes= @MYSQL_RESULT($result,0,"segnari");
  $result=MYSQL_QUERY("SELECT sm_points, sm_pid FROM m4_playaz ORDER BY sm_points DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
printf("<tr><td class=masblack valign=top><a href=m4_scheda.php?zid=%s>%s</a></td><td background=images/m4_bk.jpg align=right width=78><a href=m4_scheda.php?zid=%s><img src=getdata.php?zid=%s&wht=users border=0  width=50 height=50></a></td><td class=mascont align=center><b><font size=+3>%s</font></b><br>punti</td></tr>",urlencode($myrow["sm_pid"]),$myrow["sm_pid"],urlencode($myrow["sm_pid"]),urlencode($myrow["sm_pid"]),$myrow["sm_points"]);
} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc6.jpg"></td>
  </tr>
<?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, sm_16tid, sm_flagfn FROM m4_16teams, m4_teams WHERE sm_16tid=sm_tid AND sm_16w='W'  GROUP BY sm_16tid  ORDER BY segnari DESC");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes));
printf("<tr><td class=mastoxic align=right width=100><img src=tm/%s></td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td class=mascont width=50 align=right>%s %%</td></tr>",urlencode($myrow["sm_flagfn"]),round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
	<tr>
    <td class="mastoxic3" align=center><table border="0" cellpadding="3" cellspacing=1 align=center >
         <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc7.jpg"></td>
  </tr>
 <?php	
$result=MYSQL_QUERY("SELECT count(*) as segnari, sm_name1 FROM m4_goleadors, m4_stars WHERE sm_sid=sm_gsid  GROUP BY sm_gsid  ORDER BY segnari DESC LIMIT 10");
if ($myrow = mysql_fetch_array($result)) {
	do{
	$perc=(($myrow["segnari"]*100)/($partecipantes*5));
printf("<tr><td class=mastoxic align=right width=100>%s</td><td class=mascont width=104><img src=images/white.gif  width=%s height=14></td><td width=50 class=mascont align=right>%s %%</td></tr>",$myrow["sm_name1"],round($perc,0),round($perc,2));
} while  ($myrow = mysql_fetch_array($result));} ?>	
</table></td></tr>
</table>	
	
<?php } else { ?><script>parent.location='m4_noid.php'</script><?php }   include ("m4_copy.php"); ?>
   
