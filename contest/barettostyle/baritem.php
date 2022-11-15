<?php
$fuso=6;
$database="leth4l";
$user = "leth4l";
$passaworta = "trustno1";
$hostname = "localhost";
include ("../../connect.php");
include ("../../cookie.php");
if (isset($subco)) {

		$result=MYSQL_QUERY("INSERT INTO barcomments (content,cuid,cbid) ".
        "VALUES ('$content','$id','$bid')");
} 

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
function verCont (formo) {
        if (formo.content.value=="") {alert ("scrivi qualcosa!");return false;}
       return true;
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
	scrollbar-base-color: #397CFF;  scrollbar-darkshadow-color: #BED0FF;  scrollbar-face-color: #397CFF;  scrollbar-arrow-color: #ffffff;  scrollbar-highlight-color: #397CFF;  scrollbar-shadow-color: #397CFF;  scrollbar-3dlight-color: #BED0FF;  scrollbar-track-color: #0158FF;                
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
#barcom  {
	height: 310px; width: 147px;
	overflow-y: auto;
	position: absolute;
}
.barcomh {
		font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px; color: #FFFFFF;
	background: #0158FF; 
}

.barcomc {
		font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	text-align: left;
	background: #BED0FF;
}
.barpx {
	background-image: url(barpx.gif); height: 1px;
}


-->
</style></head>

<body><form method=post name=baritem action=baritem.php?bid=<?php echo $bid; ?> onSubmit="return verCont(document.baritem);">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" background="headbk.jpg"><a href="baretto.php"><img src="barhead.jpg" width="600" height="70" border="0"></a></td>
  </tr>
    <tr>
    <td width=440 height=337  background="barbk.jpg"><table  border="0" align="center" cellpadding="3" cellspacing="3"><tr><td class=dashgal>
    <?php    printf("<a href=javascript:dlrobba('bardl.php?bid=%s','width=600,height=400,scrollbars=yes,resizable=yes')><img src=barthumb.php?bid=%s&xsize=426&ysize=323 border=0></a>",$bid,$bid); ?>
    </td></tr></table></td>
    <td rowspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr><td width=160 height=313><div id="barcom"><table cellpadding="0" cellspacing="0" border="0" width=100%>
 <?php
 $result0 = mysql_query("SELECT content, cuid, UNIX_TIMESTAMP(DATE_ADD(cposted, INTERVAL $fuso HOUR)) AS cpostato FROM barcomments WHERE cbid='$bid'  ORDER BY cposted");
if ($myrow = mysql_fetch_array($result0)) {
do {
printf("<tr><td class=barcomh nowrap><b>%s</b> %s</td></tr><tr><td class=barcomc>%s</td></tr><tr><td class=barpx><img src=pix.gif height=1 width=1></td></tr>",$myrow["cuid"],date("d/m/Y H:i",$myrow["cpostato"]),wordwrap($myrow["content"],20," ",1));
} while ($myrow = mysql_fetch_array($result0));
}                           
?>  
</table></div></td></tr><tr><td><?php if(isset($id)) { ?><center><textarea name="content" class="dashbox"></textarea><br><input name="subco" type="submit" class="dashbox" value="commenta"><?php } ?></td></tr></table></td></tr>
<tr><td align=center><font face=verdana size=1 colore=#FFFFFF>designed by <b><?php $result=MYSQL_QUERY("SELECT buid from baretto WHERE bid='$bid'");
echo MYSQL_RESULT($result,0,"buid"); ?></b></td></tr>
</table></form>
</body>
</html><?php
?>           