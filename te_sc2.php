<?php   ?>
<body onLoad='editstuff(document.all.select3, document.all.selectQ);editstuff(document.all.select4, document.all.selectS);editstuff(document.all.select5, document.all.selectF);editstuff(document.all.select6, document.all.selectW)'>
<?php   include ("te_nav.php");?>
<form name=scheda method=post action=te_scheda.php?zid=<?php echo urlencode($id); ?>  onSubmit="return verScheda(document.scheda);">
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
$result=MYSQL_QUERY("SELECT sm_mid, sm_team1, sm_team2, UNIX_TIMESTAMP(sm_date) as ladata, sm_group FROM te_match, te_teams WHERE sm_tid=sm_team1 ORDER BY sm_date");
if ($myrow = mysql_fetch_array($result)) {
	do{ $sijuega= date("d/m/Y H:i", $myrow["ladata"]);
$resultd=MYSQL_QUERY("SELECT  sm_g1, sm_g2, sm_1x2 FROM te_res WHERE sm_rpid='$id' AND sm_rmid='{$myrow['sm_mid']}'"); 
if ($myrow2 = mysql_fetch_array($resultd)) { do{
$optiong1='<option selected value=' . $myrow2["sm_g1"] .'>' .$myrow2["sm_g1"] . '</option>';
$optiong2='<option selected value=' . $myrow2["sm_g2"] .'>' .$myrow2["sm_g2"] . '</option>';
$optionx='<option selected value=' . $myrow2["sm_1x2"] .'>' .$myrow2["sm_1x2"] . '</option>';
} while  ($myrow2 = mysql_fetch_array($resultd));}
	printf ("<tr><td class=mascont>%s</td><td class=mascont>Gruppo %s</td>", $sijuega,$myrow["sm_group"]);
	printf ("<td class=mastoxic>%s</td><td align=center class=mastoxic> - </td><td align=right class=mastoxic>%s</td>",$myrow["sm_team1"],$myrow["sm_team2"]);
	printf ("<td nowrap class=mascont align=center><select  class=mastoxic name=tc_g1[%s]>$goalsstuff$optiong1</select> - <select class=mastoxic name=tc_g2[%s]>$goalsstuff$optiong2</select></td><td class=mascont align=center><select class=mastoxic name=tc_1x2[%s]>$signstuff$optionx</select></td></tr>", $myrow["sm_mid"],$myrow["sm_mid"],$myrow["sm_mid"] );
	} while  ($myrow = mysql_fetch_array($result));} ?>
	</table></td>
  </tr>
	<?php
$result2=MYSQL_QUERY("SELECT sm_tid FROM te_teams ORDER BY sm_tid");
if ($myrow = mysql_fetch_array($result2)) {
	do{
$allteams=$allteams . "<option value='" . $myrow["sm_tid"] . "'>". $myrow["sm_tid"] . "</option>";
} while  ($myrow = mysql_fetch_array($result2)); ?>

    <tr>
    <td class="mastoxic" align=center><table width="90%" border="0" cellspacing="1" cellpadding="1" align=center>
     <tr>
    <td class="masblack" align="center" colspan=3><img src="images/sm_sc3.jpg"></td>
  </tr>
	<?php
		$result4=MYSQL_QUERY("SELECT sm_16tid FROM te_16teams WHERE sm_16pid='$id'  AND sm_16w='4' ORDER BY sm_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my8=$my8 . "<option value='" . $myrow2["sm_16tid"] . "'>". $myrow2["sm_16tid"] . "</option>";
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
		$result4=MYSQL_QUERY("SELECT sm_16tid FROM te_16teams WHERE sm_16pid='$id'  AND sm_16w='2' ORDER BY sm_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my4=$my4 . "<option value='" . $myrow2["sm_16tid"] . "'>". $myrow2["sm_16tid"] . "</option>";
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
		$result4=MYSQL_QUERY("SELECT sm_16tid FROM te_16teams WHERE sm_16pid='$id'  AND sm_16w='F' ORDER BY sm_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my2=$my2 . "<option value='" . $myrow2["sm_16tid"] . "'>". $myrow2["sm_16tid"] . "</option>";
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
    <td class="masblack" align="center" colspan=3><img src="images/te_sc6.jpg"></td>
  </tr>
	<?php
		$result4=MYSQL_QUERY("SELECT sm_16tid FROM te_16teams WHERE sm_16pid='$id'  AND sm_16w='W' ORDER BY sm_16tid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$my1=$my1 . "<option value='" . $myrow2["sm_16tid"] . "'>". $myrow2["sm_16tid"] . "</option>";
} while  ($myrow2 = mysql_fetch_array($result4));}
print ("<tr><td  width=33% class=mascont align=center><select class=mastoxic name=selectW size=10 multiple>");
print ($allteams);
print ("</select></td><td  width=33% class=mastoxic align=center><input type=button class=buttons value='aggiungi --&gt;' ");
print ("onClick='return addstuffgood(document.all.select6, this.form.selectW)'><br><br><input");
print (" type=button class=buttons value='&nbsp;&lt;-- rimuovi&nbsp;'");
print ("onClick='return addstuffgood(this.form.selectW, document.all.select6)'></td><td  width=33% class=mascont align=center><select class=mastoxic name=\"select6[]\" id=select6  size=1 multiple>$my1</select></td></tr>");
}
$result=MYSQL_QUERY("SELECT  sm_tid FROM te_teams ORDER BY sm_tid");
if ($myrow = mysql_fetch_array($result)) {print ("<script>function dynsel(squadra,giocatore) {for(i=0;i<giocatore.length;i++){giocatore.options[i]=null;i--;}");  
do{

	$resulto=MYSQL_QUERY("SELECT  sm_sid, sm_name1 FROM te_stars WHERE sm_stid='{$myrow['sm_tid']}' ORDER BY sm_name1");
	if ($myrow2 = mysql_fetch_array($resulto)) {
		printf ("if (squadra.options[squadra.options.selectedIndex].value=='%s'){",$myrow["sm_tid"]);	
	do{
printf("var newone = new Option('%s', '%s');giocatore.options.add(newone);",$myrow2["sm_name1"],$myrow2["sm_sid"]);	
} while  ($myrow2 = mysql_fetch_array($resulto));print("}");
	} 		
	
}while  ($myrow = mysql_fetch_array($result));
print("}</script>");} 
$result3=MYSQL_QUERY("SELECT sm_sid, sm_name1 FROM te_stars ORDER BY sm_name1");
if ($myrow = mysql_fetch_array($result3)) {
	do{
$allstars=$allstars . "<option value='" . $myrow["sm_sid"] . "'>". $myrow["sm_name1"] . "</option>";
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
	$result4=MYSQL_QUERY("SELECT sm_gsid,sm_name1 FROM te_goleadors,te_stars WHERE sm_gpid='$id' AND sm_gsid=sm_sid ORDER BY sm_name1");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$myG=$myG . "<option value='" . $myrow2["sm_gsid"] . "'>". $myrow2["sm_name1"] . "</option>";
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
$result4=MYSQL_QUERY("SELECT sm_fsid, sm_name1 FROM te_final,te_stars WHERE sm_fpid='$id' AND sm_fsid=sm_sid");
if ($myrow2 = mysql_fetch_array($result4)) {
	do{
$myX=$myX . "<option value='" . $myrow2["sm_fsid"] . "'>". $myrow2["sm_name1"] . "</option>";
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