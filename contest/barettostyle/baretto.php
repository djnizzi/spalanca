<?php
$database="leth4l";
$user = "leth4l";
$passaworta = "trustno1";
$hostname = "localhost";
include ("../../connect.php");
include ("../../cookie.php");
if (isset($subba)) {
	 
	
	if($pbindata_name!="" && $pbindata_size<131072 && $pbindata_type=="image/pjpeg"){
		$data1=imagecreatefromjpeg ($pbindata);

		$result=MYSQL_QUERY("INSERT INTO baretto (buid)  ".
"VALUES ('$id')");
	$entid=mysql_insert_id();
@copy($pbindata, "../baretto/$entid-barentry.jpg"); 

$xsize=150;

if (ImageSY($data1)<ImageSX($data1)){$newthing=ImageCreateTrueColor($xsize,(ImageSY($data1)/ImageSX($data1))*$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,$xsize,(ImageSY($data1)/ImageSX($data1))*$xsize,ImageSX($data1),ImageSY($data1));
} else {$newthing=ImageCreateTrueColor((ImageSX($data1)/ImageSY($data1))*$xsize,$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,(ImageSX($data1)/ImageSY($data1))*$xsize,$xsize,ImageSX($data1),ImageSY($data1));}
imagejpeg($newthing,"../baretto/thumbs/$entid"."-barentryt.jpg");
 } else {print ("<script>alert(\"non possiamo accettare il tuo materiale: non è stato allegato nessun file, file troppo grosso (max 128K) o file di tipo errato (solo jpeg)\");</script>");} }

$start=(!isset($start))?0:$start;
$result = mysql_query("SELECT COUNT(*) AS contejo FROM baretto");
$contejo= @MYSQL_RESULT($result,0,"contejo");
$previous = $start-6;
$nextious = $start+6;
$prev=($start==0)?"<img src=pix.gif>":"<a href=baretto.php?start=$previous><img src=pre.gif width=20 height=20 alt=\"6 precedenti\" border=0></a>";
$next=($contejo<=$nextious)?"<img src=pix.gif>":"<a href=baretto.php?start=$nextious><img src=nex.gif width=20 height=20 alt=\"6 successivi\" border=0></a>";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>indossa IL BARETTO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>
function dlrobba(theURL,features){
window.open(theURL,'dlbar',features);}
function disBut (theel)
{
theel.disabled=true;
}
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #76A7FF;
}
.subbox {
	background-color: #B4D4FF;
}
.dashbox {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	background-color: #003FB1;
	border: 1px dotted #FFFFFF;
	color: #FFFFFF;
}
.dashgal {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	background-color: #397CFF;
	border: 1px dotted #FFFFFF;
	color: #FFFFFF;
	height: 156px;
	width: 156px;
	text-align: center;
}
-->
</style></head>

<body><form   enctype="multipart/form-data" method=post name=baretto action=baretto.php >
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" background="headbk.jpg"><img src="barhead.jpg" width="600" height="70"></td>
  </tr>
  <tr>
    <td colspan="3">      <table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td background="barbk.jpg"><table  border="0" align="center" cellpadding="3" cellspacing="3">
          <?php
                        
                        $result = mysql_query("SELECT bid,buid FROM baretto ORDER BY bposted DESC LIMIT $start,6");
if ($myrow = mysql_fetch_array($result)) {$tpr=0;$hmr=0;
do { $tpr++;
if ($tpr==1) {print("<tr>");}
   print("<td class=dashgal>");
   printf("<a href=baritem.php?bid=%s><img src=../baretto/thumbs/%s-barentryt.jpg border=0 alt=\"by %s\"></a>",$myrow["bid"],$myrow["bid"],$myrow["buid"]);
   print("</td>");
   if ($tpr==3) {print("</tr>");$tpr=0;$hmr++;}
} while ($myrow = mysql_fetch_array($result));if($hmr<2){
	for ($xss=$hmr;$xss<4;$xss++)
	{
  if ($tpr!=0) {for ($xs=$tpr;$xs<3;$xs++) {print ("<td class=dashgal><img src=pix.gif></td>");} print ("</tr>");$tpr=0;$hmr++;}else if($xss<3 && $hmr<2){print ("<tr><td class=dashgal><img src=pix.gif></td>");$tpr++;}}}}

?>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td width="20" class="subbox"><?php echo $prev; ?></td>
    <td class="subbox">
<?php if (isset($id)) {?><div align="center"><input name="pbindata" type="file" class="dashbox" size="40">
      <input name="subba" type="submit" class="dashbox" value="invia"></div><?php } ?></td>
    <td class="subbox"><div align="right"><?php echo $next; ?></div></td>
  </tr>
</table></form>
</body>
</html><?php
?>           