<?php 
$result=mysql_query("select style,UNIX_TIMESTAMP(DATE_SUB(deadline, INTERVAL $fuso HOUR)) as ddln ,UNIX_TIMESTAMP(DATE_SUB(voteline, INTERVAL $fuso HOUR)) as vtln from contest WHERE id='$conid'");
$condir=@MYSQL_RESULT($result,0,"style");
$deadline=@MYSQL_RESULT($result,0,"ddln");
$voteline=@MYSQL_RESULT($result,0,"vtln");
?>
<html>
<head>
<title>|contest|dot|spalanca|dot|com|</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo $condir; ?>/contest.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src='../mashiro.js'></script>
</head>

<body onLoad="MM_preloadImages('<?php echo $condir; ?>/cbut12.gif','<?php echo $condir; ?>/cbut22.gif','<?php echo $condir; ?>/cbut32.gif','<?php echo $condir; ?>/cbut42.gif')">
<table width="901"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="60" valign="top"><a href=http://www.spalanca.com target=spalanca><img src="<?php echo $condir; ?>/clogo1.gif" width="60" height="196" border=0></a></td>
    <td valign="top"><table width="841" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="841" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="51"><a href=http://www.spalanca.com target=spalanca><img src="<?php echo $condir; ?>/clogo2.gif" border=0 width="51" height="80"></a></td>
            <td width="389" valign="bottom"><a href="conhome.php?conid=<?php echo $conid; ?>"><img src="<?php echo $condir; ?>/clogo3.gif" border=0 width="389" height="19"></a></td>
            <td width="80" valign="bottom">
<?php if(isset($id) && time()<$deadline) { 
echo "<a href=conenter.php?conid=$conid onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image4','','$condir/cbut12.gif',1)\"><img src=$condir/cbut11.gif alt=\"partecipa al concorso\" name=Image4 width=80 height=19 border=0></a>";
}else{
echo "<img src=$condir/cbut10.gif>";
}
?></td>            

            <td width="80" valign="bottom"><a href="congallery.php?conid=<?php echo $conid; ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','<?php echo $condir; ?>/cbut22.gif',1)"><img src="<?php echo $condir; ?>/cbut21.gif" alt="sfoglia le opere in concorso" name="Image5" width="80" height="19" border="0"></a></td>
            <td width="80" valign="bottom"><a href="conrules.php?conid=<?php echo $conid; ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','<?php echo $condir; ?>/cbut32.gif',1)"><img src="<?php echo $condir; ?>/cbut31.gif" alt="leggi il regolamento del concorso" name="Image6" width="80" height="19" border="0"></a></td>
            <td width="71" valign="bottom"><a href="javascript:if(document.forms[0].fts.value==''){alert('sì, ma cerca cosa?');}else{document.forms[0].submit();}" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','<?php echo $condir; ?>/cbut42.gif',1)"><img src="<?php echo $condir; ?>/cbut41.gif" alt="cerca nel concorso" name="Image7" width="71" height="19" border="0"></a></td>
            <td valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <form action=conresults.php?conid=<?php echo $conid; ?> method=post name=ftf ><tr>
    <td class=srcfld2><input name="fts" type="text" class="srcfld"></td>
  </tr></form>
</table>
</td>
            <td width="1" valign="bottom"><img src="<?php echo $condir; ?>/spacer.gif" width="1" height="1"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>