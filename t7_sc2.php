<?php   ?>
<body onLoad='editstuff(document.all.select2, document.all.select16);editstuff(document.all.select2, document.all.select16);editstuff(document.all.select3, document.all.selectQ);editstuff(document.all.select4, document.all.selectS);editstuff(document.all.select5, document.all.selectF);editstuff(document.all.select6, document.all.selectW)'>
<?php   include ("t7_nav.php");
mysql_select_db($database2);
?>
<form name=scheda method=post action=t7_scheda.php?zid=<?php echo $id; ?>  onSubmit="return verScheda(document.scheda);">
<table width="100%" border="0" cellspacing="1" cellpadding="1">
 <tr>
    <td class="masblack" align="center"><img src="images/sm_scheda.jpg" width="338" height="20"></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=7><img src="images/sm_sc1.jpg"></td>
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
$result=MYSQL_QUERY("SELECT tc_mid, tc_team1, tc_team2, UNIX_TIMESTAMP(tc_date) as ladata, tc_group FROM t7_match, t7_teams WHERE tc_tid=tc_team1 ORDER BY tc_date");
if ($myrow = mysql_fetch_array($result)) {
	do{ $sijuega= date("d/m/Y H:i", $myrow["ladata"]);
$resultd=MYSQL_QUERY("SELECT  tc_g1, tc_g2, tc_1x2 FROM t7_res WHERE tc_rpid='$id' AND tc_rmid='{$myrow['tc_mid']}'"); 
if ($myrow2 = mysql_fetch_array($resultd)) { do{
$optiong1='<option selected value=' . $myrow2["tc_g1"] .'>' .$myrow2["tc_g1"] . '</option>';
$optiong2='<option selected value=' . $myrow2["tc_g2"] .'>' .$myrow2["tc_g2"] . '</option>';
$optionx='<option selected value=' . $myrow2["tc_1x2"] .'>' .$myrow2["tc_1x2"] . '</option>';
} while  ($myrow2 = mysql_fetch_array($resultd));}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>Gruppo %s</td>", $sijuega,$myrow["tc_group"]);
	printf ("<td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td>",$myrow["tc_team1"],$myrow["tc_team2"]);
	printf ("<td nowrap class=mascont align=center><select  class=mastoxic name=tc_g1[%s]>$goalsstuff$optiong1</select> - <select class=mastoxic name=tc_g2[%s]>$goalsstuff$optiong2</select></td><td class=mascont align=center><select class=mastoxic name=tc_1x2[%s]>$signstuff$optionx</select></td></tr>", $myrow["tc_mid"],$myrow["tc_mid"],$myrow["tc_mid"] );
	} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/tc_sc2.jpg"></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT tc_tid FROM t7_teams ORDER BY tc_tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
$allteams=$allteams . "<option value='" . $myrow["tc_tid"] . "'>". $myrow["tc_tid"] . "</option>";
} while  ($myrow = mysql_fetch_array($result2));

	$result4=MYSQL_QUERY("SELECT tc_16tid FROM t7_16teams WHERE tc_16pid='$id'  AND tc_16w='8' ORDER BY tc_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my16=$my16 . "<option value='" . $myrow2["tc_16tid"] . "'>". $myrow2["tc_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select class=mastoxic name=select16 size=10 multiple>");
print ($allteams);
print ("</select></td><td width=33%  class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select2, this.form.select16)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;'");
print ("onClick='return addstuffgood(this.form.select16, document.all.select2)'></td><td class=mascont  width=33% align=center><select class=mastoxic name=\"select2[]\" id=select2  size=16 multiple>$my16</select></td></tr>");
?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc3.jpg"></td>
  </tr>
	<?php
		$result4=MYSQL_QUERY("SELECT tc_16tid FROM t7_16teams WHERE tc_16pid='$id'  AND tc_16w='4' ORDER BY tc_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my8=$my8 . "<option value='" . $myrow2["tc_16tid"] . "'>". $myrow2["tc_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select class=mastoxic name=selectQ size=10 multiple>");
print ($allteams);
print ("</select></td><td  width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select3, this.form.selectQ)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;'");
print ("onClick='return addstuffgood(this.form.selectQ, document.all.select3)'></td><td width=33%  class=mascont align=center><select class=mastoxic name=\"select3[]\" id=select3  size=8 multiple>$my8</select></td></tr>");
?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc4.jpg"></td>
  </tr>
	<?php
		$result4=MYSQL_QUERY("SELECT tc_16tid FROM t7_16teams WHERE tc_16pid='$id'  AND tc_16w='2' ORDER BY tc_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my4=$my4 . "<option value='" . $myrow2["tc_16tid"] . "'>". $myrow2["tc_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td width=33%  class=mascont align=center><select class=mastoxic name=selectS size=10 multiple>");
print ($allteams);
print ("</select></td><td  width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select4, this.form.selectS)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;'");
print ("onClick='return addstuffgood(this.form.selectS, document.all.select4)'></td><td  width=33% class=mascont align=center><select class=mastoxic name=\"select4[]\" id=select4  size=4 multiple>$my4</select></td></tr>");
?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc5.jpg"></td>
  </tr>
	<?php
		$result4=MYSQL_QUERY("SELECT tc_16tid FROM t7_16teams WHERE tc_16pid='$id'  AND tc_16w='F' ORDER BY tc_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my2=$my2 . "<option value='" . $myrow2["tc_16tid"] . "'>". $myrow2["tc_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select class=mastoxic name=selectF size=10 multiple>");
print ($allteams);
print ("</select></td><td  width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select5, this.form.selectF)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;' ");
print ("onClick='return addstuffgood(this.form.selectF, document.all.select5)'></td><td  width=33% class=mascont align=center><select class=mastoxic name=\"select5[]\" id=select5  size=2 multiple>$my2</select></td></tr>");
?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/tc_sc6.jpg"></td>
  </tr>
	<?php
		$result4=MYSQL_QUERY("SELECT tc_16tid FROM t7_16teams WHERE tc_16pid='$id'  AND tc_16w='W' ORDER BY tc_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my1=$my1 . "<option value='" . $myrow2["tc_16tid"] . "'>". $myrow2["tc_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select class=mastoxic name=selectW size=10 multiple>");
print ($allteams);
print ("</select></td><td  width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select6, this.form.selectW)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;'");
print ("onClick='return addstuffgood(this.form.selectW, document.all.select6)'></td><td  width=33% class=mascont align=center><select class=mastoxic name=\"select6[]\" id=select6  size=1 multiple>$my1</select></td></tr>");
}
$result=MYSQL_QUERY("SELECT  tc_tid FROM t7_teams ORDER BY tc_tid");
if ($myrow = mysql_fetch_array($result)) {print ("<script>function dynsel(squadra,giocatore) {for(i=0;i<giocatore.length;i++){giocatore.options[i]=null;i--;}");  
do{

	$resulto=MYSQL_QUERY("SELECT  tc_sid, tc_name1 FROM t7_stars WHERE tc_stid='{$myrow['tc_tid']}' ORDER BY tc_name1");
	if ($myrow2 = mysql_fetch_array($resulto)) {
		printf ("if (squadra.options[squadra.options.selectedIndex].value=='%s'){",$myrow["tc_tid"]);	
	do{
printf("var newone=new Option('%s','%s');giocatore.options.add(newone);",$myrow2["tc_name1"],$myrow2["tc_sid"]);	
} while  ($myrow2 = mysql_fetch_array($resulto));print("}");
	} 		
	
}while  ($myrow = mysql_fetch_array($result));
print("}</script>");} 
$result3=MYSQL_QUERY("SELECT tc_sid, tc_name1 FROM t7_stars ORDER BY tc_name1");
if ($myrow = mysql_fetch_array($result3)) {
	do{
$allstars=$allstars . "<option value='" . $myrow["tc_sid"] . "'>". $myrow["tc_name1"] . "</option>";
} while  ($myrow = mysql_fetch_array($result3));
?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc7.jpg"></td>
  </tr>
	<?php
	$result4=MYSQL_QUERY("SELECT tc_gsid,tc_name1 FROM t7_goleadors,t7_stars WHERE tc_gpid='$id' AND tc_gsid=tc_sid ORDER BY tc_name1");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$myG=$myG . "<option value='" . $myrow2["tc_gsid"] . "'>". $myrow2["tc_name1"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select name=selectSG class=mastoxic onChange='dynsel(document.all.selectSG,document.all.selectG);'><option>seleziona squadra</option>$allteams</select><br><select class=mastoxic name=selectG size=10 multiple>");
print ("</select></td><td  width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffbad(document.all.select7, this.form.selectG)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;' ");
print ("onClick='return removestuffbad(this.form.selectW, document.all.select7)'></td><td  width=33% class=mascont align=center><select class=mastoxic name=\"select7[]\" id=select7  size=5 multiple>$myG</select></td></tr>");
?>
	</table></td>
  </tr>
    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc8.jpg"></td>
  </tr>
	<?php
$result4=MYSQL_QUERY("SELECT tc_fsid, tc_name1 FROM t7_final,t7_stars WHERE tc_fpid='$id' AND tc_fsid=tc_sid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$myX=$myX . "<option value='" . $myrow2["tc_fsid"] . "'>". $myrow2["tc_name1"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select name=selectXG class=mastoxic onChange='dynsel(document.all.selectXG,document.all.selectX);'><option>seleziona squadra</option>$allteams</select><br><select class=mastoxic name=selectX size=10 multiple>");
print ("</select></td><td width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffbad(document.all.select8, this.form.selectX)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;' ");
print ("onClick='return removestuffbad(this.form.selectX, document.all.select8)'></td><td  width=33% class=mascont align=center><select class=mastoxic name=\"select8[]\" id=select8  size=1 multiple>$myX</select></td></tr>");
?>
	</table></td>
  </tr><?php
print ("<tr><td class=mastoxic align=center><input class=buttons type=submit value='invia scheda'   name='subsc'></td></tr>");
} ?></table>

</form></body><?php ?>