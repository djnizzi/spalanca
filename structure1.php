<?php
	include ("randomstuff.php");
?>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title>|spalanca|dot|com|</title>
<link rel="stylesheet" href="mashiro.css" type="text/css">
<link rel="shortcut icon" href="favicon.ico">
<script type='text/javascript' src='mashiro.js'></script>
</head>
<body bgcolor="#FFFFFF" text="#000000" onLoad="MM_preloadImages('images/b11.jpg','images/b21.jpg','images/b31.jpg','images/b41.jpg','images/b51.jpg','images/b61.jpg')">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="masall">
    <tr>
    <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr><!?php echo rand(0,5); ?>
                  <td><a href=home.php?nocount=1><img src="images/logo.jpg" alt="<?php echo $theslog; ?>" border=0 width="202" height="50"></a></td>
                  <td width="100%" background="images/hbk.jpg" align="center" valign="middle">
<?php
include ("search.php");
?>
                  </td>
                      <td><!--<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="43" height="50">
      <param name="movie" value="spalanclock_ny.swf">
      <param name="quality" value="high">
      <embed src="spalanclock_ny.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="43" height="50"></embed>
    </object></td>
    <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="43" height="50">
      <param name="movie" value="spalanclock_london.swf">
      <param name="quality" value="high">
      <embed src="spalanclock_london.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="43" height="50"></embed>
    </object></td>
    <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="43" height="50">
      <param name="movie" value="spalanclock.swf">
      <param name="quality" value="high">
      <embed src="spalanclock.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="43" height="50"></embed>
    </object></td>
    <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="43" height="50">
      <param name="movie" value="spalanclock_mo.swf">
      <param name="quality" value="high">
      <embed src="spalanclock_mo.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="43" height="50"></embed>
    </object></td>
    <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="43" height="50">
      <param name="movie" value="spalanclock_to.swf">
      <param name="quality" value="high">
      <embed src="spalanclock_to.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="43" height="50"></embed>
    </object>--></td>
                  <td><img src="images/lethalogo.jpg" width="119" height="50"></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td background="images/bbk.jpg">&nbsp;</td>
                  <td width="120"><a href="robbe.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','images/b11.jpg',1)"><img name="Image15" border="0" src="images/b1.jpg" width="120" height="20"></a></td>
                  <td width="120"><a href="forum.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image16','','images/b21.jpg',1)"><img name="Image16" border="0" src="images/b2.jpg" width="120" height="20"></a></td>
<?php
if (isset($id)){
print("<td width=120><a href=\"javascript:chatwin=window.open('sm_chat06.php','chatmeup','width=310,height=300,scrollbars=yes');chatwin.focus();\" onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image40','','images/b61.jpg',1)\"><img name=Image40 border=0 src=images/b6.jpg width=120 height=20></a></td>");
}   ?>
                  <td width="120"><a href="robba.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image17','','images/b31.jpg',1)"><img name="Image17" border="0" src="images/b3.jpg" width="120" height="20"></a></td>
<?php
if (isset($id)){
print("<td width=120><a href=signup.php?zid=" . urlencode($id) . " onMouseOut=\"MM_swapImgRestore()\" onMouseOver=\"MM_swapImage('Image18','','images/b41.jpg',1)\"><img name=Image18 border=0 src=images/b4.jpg width=120 height=20></a></td>");
}   ?>
                  <td width="120"><a href="about.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image19','','images/b51.jpg',1)"><img name="Image19" border="0" src="images/b5.jpg" width="120" height="20"></a></td>
                  <td background="images/bbk.jpg">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
<?php
?>