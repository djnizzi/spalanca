<?php   ?>

<form name=scheda method=post action=tc_scheda.php?zid=<?php echo $id; ?>  onSubmit="return verSchedaToo(document.scheda);">
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=7><img src="images/tc_sc7.jpg"></td>
  </tr>
 <?php
$allteams="";
$allstars="";
$my16="";
$my8="";
$my4="";
$my2="";
$my1="";
$myG="";
$myX="";
$optiong1="";
$optiong2="";
$optionx="";
$goalsstuff="<option value=0 selected>0</option><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option><option value=6>6</option><option value=7>7</option><option value=8>8</option><option value=9>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option>";
$signstuff="<option value=1>1</option><option value=X selected>X</option><option value=2>2</option>";
$secondfase1=mktime (0,0,0,11,20,2002);
$secondfase2=mktime (0,0,0,3,20,2003);

$result=MYSQL_QUERY("SELECT tc_mid, tc_team1, tc_team2, UNIX_TIMESTAMP(tc_date) as ladata, tc_group2 FROM tc_match, tc_teams WHERE tc_tid=tc_team1 AND tc_mid>96 AND tc_mid<145 ORDER BY tc_date");
if ($myrow = mysql_fetch_array($result)) {
	do{ $sijuega= date("d/m/Y H:i", $myrow["ladata"]);
$resultd=MYSQL_QUERY("SELECT  tc_g1, tc_g2, tc_1x2 FROM tc_res WHERE tc_rpid='$id' AND tc_rmid='{$myrow['tc_mid']}'"); 
if ($myrow2 = mysql_fetch_array($resultd)) { do{
$optiong1='<option selected value=' . $myrow2["tc_g1"] .'>' .$myrow2["tc_g1"] . '</option>';
$optiong2='<option selected value=' . $myrow2["tc_g2"] .'>' .$myrow2["tc_g2"] . '</option>';
$optionx='<option selected value=' . $myrow2["tc_1x2"] .'>' .$myrow2["tc_1x2"] . '</option>';
} while  ($myrow2 = mysql_fetch_array($resultd));}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>Gruppo %s</td>", $sijuega,$myrow["tc_group2"]);
	printf ("<td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td>",$myrow["tc_team1"],$myrow["tc_team2"]);
	printf ("<td nowrap class=mascont align=center><select  class=mastoxic name=tc_g1[%s]>$goalsstuff$optiong1</select> - <select class=mastoxic name=tc_g2[%s]>$goalsstuff$optiong2</select></td><td class=mascont align=center><select class=mastoxic name=tc_1x2[%s]>$signstuff$optionx</select></td></tr>", $myrow["tc_mid"],$myrow["tc_mid"],$myrow["tc_mid"] );
	} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc3.jpg"></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT tc_tid FROM tc_teams WHERE tc_group2 <> 'E' ORDER BY tc_tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
$allteams=$allteams . "<option value='" . $myrow["tc_tid"] . "'>". $myrow["tc_tid"] . "</option>";
} while  ($myrow = mysql_fetch_array($result2));

	$result4=MYSQL_QUERY("SELECT tc_16tid FROM tc_16teams WHERE tc_16pid='$id'  AND tc_16w='Q' ORDER BY tc_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my16=$my16 . "<option value='" . $myrow2["tc_16tid"] . "'>". $myrow2["tc_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select class=mastoxic name=select16 size=8 multiple>");
print ($allteams);
print ("</select></td><td width=33%  class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select2, this.form.select16)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;'");
print ("onClick='return addstuffgood(this.form.select16, document.all.select2)'></td><td class=mascont  width=33% align=center><select class=mastoxic name=\"select2[]\" id=select2  size=8 multiple>$my16</select></td></tr>");
?>
	</table></td>
  </tr>
  <?php
print ("<tr><td class=mastoxic align=center><input class=buttons type=submit value='invia scheda'   name='subsc2'></td></tr>");
} ?>

</form><script>editstuff(document.all.select2, document.all.select16);</script><?php ?>