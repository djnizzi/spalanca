<?php ?>
<tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=9><img src="images/tc_sc7.jpg"></td>
  </tr>
 <?php
$result=MYSQL_QUERY("SELECT tc_mid, tc_team1, tc_team2,  tc_res.tc_g1 as g1, tc_res.tc_g2 as g2 , tc_res.tc_1x2 as x2, UNIX_TIMESTAMP(tc_date)  as ladata, tc_group2 FROM tc_match, tc_teams, tc_res WHERE tc_tid=tc_team1 AND tc_rmid=tc_mid AND tc_rpid='$zid' AND tc_mid<145 AND tc_mid>96 ORDER BY tc_date");
if ($myrow = mysql_fetch_array($result)) {
	do{ $sijuega= date("d/m/Y H:i", $myrow["ladata"]);
	printf ("<tr><td class=mascont>%s</td><td class=mascont>Gruppo %s</td>", $sijuega,$myrow["tc_group2"]);
	printf ("<td align=right class=mastoxic><img src=tc_getdata.php?tid=%s></td><td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td><td class=mastoxic><img src=tc_getdata.php?tid=%s></td>",urlencode($myrow["tc_team1"]),$myrow["tc_team1"],$myrow["tc_team2"],urlencode($myrow["tc_team2"]));
	printf ("<td nowrap class=mascont align=center>%s - %s</td><td class=mascont align=center>%s</td></tr>", $myrow["g1"],$myrow["g2"],$myrow["x2"] );
	} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=1><img src="images/sm_sc3.jpg"></td>
  </tr><tr><td class=mastoxic><table width="100%" border="0" cellspacing="1" align=center>
	<?php
$result2=MYSQL_QUERY("SELECT tc_16tid FROM tc_16teams WHERE  tc_16pid='$zid' AND tc_16w='Q' ORDER BY tc_16tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
printf ("<tr><td  class=mastoxic2 align=right width=50%%><img src=tc_getdata.php?tid=%s></td><td  class=mastoxic2 width=50%%>%s</td>",urlencode($myrow["tc_16tid"]),$myrow["tc_16tid"]);
} while  ($myrow = mysql_fetch_array($result2));} ?>
	</table></td></tr></table></td>
  </tr>

<?php ?>
   
