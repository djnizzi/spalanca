<?php
if (isset($subco)) {
	$result0=MYSQL_QUERY("SELECT count(*) as coniglio from concomments WHERE cpid='$entid' AND conid='$conid' AND cuid='$id' AND vote<>'0'");
	$result00=MYSQL_QUERY("SELECT euid from contentries WHERE entid='$entid' AND conid='$conid'");
	if (MYSQL_RESULT($result00,0,"euid")==$id){
$result=MYSQL_QUERY("INSERT INTO concomments (content,cuid,cpid,vote,conid) ".
        "VALUES ('$content','$id','$entid','0','$conid')");		
	}else if (@MYSQL_RESULT($result0,0,"coniglio")>0 && $vote!=0){
		$result=MYSQL_QUERY("UPDATE concomments SET cposted=cposted, vote='0' WHERE cpid='$entid' AND cuid='$id'");
		$result=MYSQL_QUERY("INSERT INTO concomments (content,cuid,cpid,vote,conid) ".
        "VALUES ('$content','$id','$entid','$vote','$conid')");}else{
 	
$result=MYSQL_QUERY("INSERT INTO concomments (content,cuid,cpid,vote,conid) ".
        "VALUES ('$content','$id','$entid','$vote','$conid')");}

} 
if (isset($delro) && isset($entid)) {
$result=MYSQL_QUERY("SELECT euid FROM contentries WHERE entid='$entid'  AND conid='$conid'");
if (@MYSQL_RESULT($result,0,"euid")==$id) {	
$result=MYSQL_QUERY("DELETE FROM contentries WHERE entid='$entid' AND conid='$conid'");
@unlink(	"$conid/$entid-entry.jpg");
@unlink(	"$conid/thumbs/$entid"."-entryq.jpg");
@unlink(	"$conid/thumbs/$entid"."-entryt.jpg");
 ?>
<script>alert("L'opera in concorso è stata cancellata con successo");window.location='conenter.php?conid=<?php echo $conid; ?>'</script><?php
}else { ?><script>alert("Non è possibile cancellare opere non tue!");window.location='conenter.php?conid=<?php echo $conid; ?>&entid=<?php echo $entid; ?>'</script><?php
}
}
 

 
if (isset($subro)) {
	 
	
	if($pbindata_name!="" && $pbindata_size<196605 && $pbindata_type=="image/pjpeg"){
		$data1=imagecreatefromjpeg ($pbindata);
		if (ImageSY($data1)<800 && ImageSX($data1)<800){print ("<script>alert(\"non possiamo accettare il tuo materiale: non hai rispettato il minimo della dimensione in pixel (lato più lungo minimo 800 pixel)\");</script>");}else {
		$result=MYSQL_QUERY("INSERT INTO contentries (name,cdetails,euid,conid)  ".
"VALUES ('$title','$pcontent','$id','$conid')");
	$entid=mysql_insert_id();
@copy($pbindata, "$conid/$entid-entry.jpg"); 

if (ImageSY($data1)<ImageSX($data1)){$sWidth=round(ImageSY($data1)*0.8);}else{$sWidth=round(ImageSX($data1)*0.8);}
if (ImageSY($data1)<ImageSX($data1)){$sY=round(ImageSY($data1)/10);$sX=rand($sY,round(ImageSX($data1)-$sWidth));}else{$sX=round(ImageSY($data1)/10);$sY=rand($sX,round(ImageSY($data1)-$sWidth));}
$xsize=95;
$newthing=ImageCreateTrueColor($xsize,$xsize);
imagecopyresampled($newthing,$data1,0,0,$sX,$sY,$xsize,$xsize,$sWidth,$sWidth);
imagejpeg($newthing,"$conid/thumbs/$entid"."-entryq.jpg");
$xsize=135;
if (ImageSY($data1)<ImageSX($data1)){$newthing=ImageCreateTrueColor($xsize,(ImageSY($data1)/ImageSX($data1))*$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,$xsize,(ImageSY($data1)/ImageSX($data1))*$xsize,ImageSX($data1),ImageSY($data1));
} else {$newthing=ImageCreateTrueColor((ImageSX($data1)/ImageSY($data1))*$xsize,$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,(ImageSX($data1)/ImageSY($data1))*$xsize,$xsize,ImageSX($data1),ImageSY($data1));}
imagejpeg($newthing,"$conid/thumbs/$entid"."-entryt.jpg");
 }} else {print ("<script>alert(\"non possiamo accettare il tuo materiale: non è stato allegato nessun file, file troppo grosso (max 192K) o file di tipo errato (solo jpeg)\");</script>");} }


if (isset($id) && !isset($entid)){if (time()<$deadline){
?> 
<form  enctype="multipart/form-data" method=post name=robba action=conenter.php?conid=<?php echo $conid; ?> onSubmit="return verCont(document.robba);disBut(document.robba.subro)">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="60"><img src="<?php echo $condir; ?>/cent.gif" width="60" height="481"></td>
            <td><table width="100%"  border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#999999"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="<?php echo $condir; ?>/spacer.gif" width="19" height="19"></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="701" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td width="59" align="right" valign="bottom" class="subbox1">Titolo</td>
                            <td class="subbox1" align=center><input name="title" type="text" class="subfld1"></td>
                          </tr>
                          <tr>
                            <td align="right" valign="bottom" class="subbox2">Opera</td>
                            <td class="subbox2" align=center><input name="pbindata" type="file" class="subfld2"></td>
                          </tr>
                          <tr>
                            <td align="right" valign="bottom" class="subbox3">Dettagli<br>                              </td>
                            <td class="subbox3" align=center><textarea name="pcontent" class="subfld3"></textarea></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="right" class="subbox4"><input name="subro" type="submit" class="subfld4" value="invia"></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="39" align="right" valign="bottom" class="fontreg">&copy;2004 LETH/\L SOFTWORKS</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="60" border="0" cellspacing="0" cellpadding="0">

            </table></td>
            </tr>
        </table>
<?php
}}

if (isset($entid)  && !isset($delro)){
$result = mysql_query("SELECT euid,UNIX_TIMESTAMP(DATE_ADD(eposted, INTERVAL $fuso HOUR)) AS postato,name,cdetails FROM contentries WHERE entid='$entid' AND conid='$conid'");
$postato= date("d/m/Y H:i",@MYSQL_RESULT($result,0,"postato"));
$result2 = mysql_query("SELECT vote, COUNT(*) AS votez FROM concomments WHERE cpid='$entid'  AND conid='$conid' AND vote<>'0' GROUP BY vote");
if ($myrow2 = mysql_fetch_array($result2)) {
            $totalone=0;
            $counem=0;
            do {
            $totalone=$totalone+(($myrow2["votez"]+0)*($myrow2["vote"]+0));
            $counem=$counem+$myrow2["votez"];
            } while ($myrow2 = mysql_fetch_array($result2));
            $qfv=$totalone/$counem;
            $finalvote=$voto[number_format(round($qfv),2)]; 
            $votalo=MYSQL_QUERY("UPDATE contentries SET eposted=eposted, voto=$qfv WHERE entid='$entid'  AND conid='$conid'");
} ?>
 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="60"><img src="<?php echo $condir; ?>/cpho.gif" width="60" height="460"></td>
            <td rowspan="2"><table width="100%"  border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#999999"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="<?php echo $condir; ?>/spacer.gif" width="19" height="19"></td>
                  </tr>
                  <tr>
                    <td align="center"><table width="701" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" class="entry1"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td class="entry7"><img src="<?php echo $condir; ?>/spacer.gif" height=12></td>
                                </tr>
                                <tr>
                                  <td class="entry8" colspan=2><?php echo MYSQL_RESULT($result,0,"name"); ?></td>
                                </tr>
                                <tr>
                                  <td class=entry9><?php echo date("d/m/Y H:i",MYSQL_RESULT($result,0,"postato")); ?></td><td class="entry7"><b><a href="congallery.php?euid=<?php echo urlencode(MYSQL_RESULT($result,0,"euid")); ?>&conid=<?php echo $conid; ?>"><?php echo MYSQL_RESULT($result,0,"euid"); ?></a></td>
                                </tr>
                              </table> </td>
                            <td align="center" valign="middle" class="entry4" bgcolor=<?php echo $finalvote; ?>><?php $qfvv=(round($qfv,9)==0)?"":round($qfv,9); echo $qfvv; ?></td>
                          </tr>
                          <tr>
                            <td class="entry2">
       <?php include ("conimagexy.php");                     
                       printf( "<a href=javascript:dlrobba('condl.php?entid=%s&conid=%s',%s)><img src=conthumb.php?conid=%s&entid=%s&xsize=499&ysize=259 border=0 class=entry></a>",$entid,$conid,$featuring,$conid,$entid);
                ?>             
                            </td>
                            <td class="entry5"><div id="votcom"><table cellpadding="0" cellspacing="0" border="0" width=100%>
 <?php
 $result0 = mysql_query("SELECT content, cuid, vote, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM concomments WHERE cpid='$entid'  AND conid='$conid' ORDER BY cposted");
if ($myrow = mysql_fetch_array($result0)) {
do {
printf("<tr><td class=votcomh nowrap><b>%s</b><br>%s</td><td class=votcomv bgcolor=%s>%s</td></tr><tr><td colspan=2 class=votcomc>%s</td></tr><tr><td colspan=2 class=whitepx><img src=%s/whitepix.gif height=1 width=1></td></tr>",$myrow["cuid"],date("d/m/Y H:i",$myrow["cpostato"]),$voto[$myrow["vote"]],$myrow["vote"],wordwrap($myrow["content"],20," ",1),$condir);
} while ($myrow = mysql_fetch_array($result0));
}                           
?>  
</table></div></td>
                          </tr>
                          <tr>
                            <td class="entry3"><div id="concom"><?php echo MYSQL_RESULT($result,0,"cdetails"); ?></div></td>
                            <td class="entry6"> 
                            <?php if(isset($id) && time()<$voteline) {  ?>
                            <table border="0" cellspacing="0" cellpadding="0"><form method=post name=commenti action=conenter.php?conid=<?php echo $conid; ?>&entid=<?php echo $entid; ?>  onSubmit="return verComm(document.commenti);disBut(document.commenti.subco)">
                              <tr>
                                <td colspan="3"><textarea name="content" class="entfld2"></textarea></td>
                                </tr>
                              <tr>
                                <td><img src="<?php echo $condir; ?>/vs.gif" width="86" height="21" border=0 usemap="#vsmap"></td>
                                <td><input onFocus="this.blur()" name="vote" value=0 type="text" class="entfld1"></td>
                                <td><input name="subco" type="submit" class="entfld3" value="vota"></td>
                              </tr>
                            </form></table><?php } ?></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="39" align="right" valign="bottom" class="fontreg">&copy;2004 LETH/\L SOFTWORKS</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="60" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="<?php echo $condir; ?>/cpho0.gif" width="40" height="21"></td>
                <td width="20"><?php if (isset($id) && $id==@MYSQL_RESULT($result,0,"euid") && time()<$deadline) { ?>
                	                	<a href="javascript:if(confirm('Vuoi veramente cancellare la tua opera?')){window.location='conenter.php?entid=<?php echo $entid; ?>&conid=<?php echo $conid; ?>&delro=1';}" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image12','','<?php echo $condir; ?>/cpcan2.gif',1)"><img src="<?php echo $condir; ?>/cpcan1.gif" alt="cancella" name="Image12" width="20" height="20" border="0"></a><?php 
                	                	} else { ?>
                	                <img src="<?php echo $condir; ?>/cpcan0.gif" width="20" height="20" border="0"><?php }
                	                	?></td>
              </tr>
            </table></td>
            </tr>
        </table>
<map name="vsmap">
  <area shape="rect" coords="0,1,5,20" href="#" onClick="document.commenti.vote.value=1"> 
 <area shape="rect" coords="5,1,10,20" href="#" onClick="document.commenti.vote.value=1.25">
  <area shape="rect" coords="10,1,15,20" href="#" onClick="document.commenti.vote.value=1.5">
    <area shape="rect" coords="15,1,20,20" href="#" onClick="document.commenti.vote.value=1.75">
	    <area shape="rect" coords="20,1,25,20" href="#" onClick="document.commenti.vote.value=2">
		    <area shape="rect" coords="25,1,30,20" href="#" onClick="document.commenti.vote.value=2.25">
			    <area shape="rect" coords="30,1,35,20" href="#" onClick="document.commenti.vote.value=2.5">
				    <area shape="rect" coords="35,1,40,20" href="#" onClick="document.commenti.vote.value=2.75">
					    <area shape="rect" coords="40,1,45,20" href="#" onClick="document.commenti.vote.value=3">
						    <area shape="rect" coords="45,1,50,20" href="#" onClick="document.commenti.vote.value=3.25">  
							  <area shape="rect" coords="50,1,55,20" href="#" onClick="document.commenti.vote.value=3.5">
							  				    <area shape="rect" coords="55,1,60,20" href="#" onClick="document.commenti.vote.value=3.75">
					    <area shape="rect" coords="60,1,65,20" href="#" onClick="document.commenti.vote.value=4">
						    <area shape="rect" coords="65,1,70,20" href="#" onClick="document.commenti.vote.value=4.25">  
							  <area shape="rect" coords="70,1,75,20" href="#" onClick="document.commenti.vote.value=4.5">
							  				    <area shape="rect" coords="75,1,80,20" href="#" onClick="document.commenti.vote.value=4.75">
<area shape="rect" coords="80,1,85,20" href="#" onClick="document.commenti.vote.value=5">
</map>
<?php
} 

?>