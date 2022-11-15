<?php
include ("configchat.php");
include ("connect.php");
include ("cookie.php");
	?>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<link rel="stylesheet" href="mashiro2.css" type="text/css">
<script src=mashiro.js></script>
<title>|chat|spalanca|dot|com|</title>
</head>
<?php
if (isset($id)){

	$result = mysql_query("SELECT logged FROM users WHERE id='$id'");
	if (@MYSQL_RESULT($result,0,"id")!='Y'){
	$result=MYSQL_QUERY("UPDATE users SET logged='Y' WHERE id='$id'");}

if (isset($subch)) {
$result=MYSQL_QUERY("INSERT INTO sm_chat (sm_cuid,sm_chat) ".
        "VALUES ('$id','$sm_chat')");
	}
if (isset($appesidamesi)) {

$result=MYSQL_QUERY("UPDATE users SET logged='N', created=created WHERE logged='Y'");
	}

	?>
	<body>
	<script type="text/javascript">
<!--
AFS=setTimeout('location.href="<?php echo $PHP_SELF; ?> "',60000);
-->
</script>
<form method=post name=chat action=<?php echo $PHP_SELF; ?> onSubmit="if(document.forms[0].sm_chat.value==''){return false;}">
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr> 
    <td colspan="2" align=center class=masall><textarea class=mascont name="sm_chat" rows="2" cols="30" onfocus="clearTimeout(AFS)"></textarea><br><INPUT TYPE=SUBMIT  class=buttons NAME="subch" VALUE="parla"> <INPUT TYPE=button  class=buttons  VALUE="aggiorna" onClick="window.location='sm_chat.php'"></td>
  </tr>
  <tr> 
    <td  class=masall valign=top width=100%>
      <table width="100%" border="0" cellspacing=1" cellpadding="1">
<?php
$result = mysql_query("SELECT sm_cuid, sm_chat, UNIX_TIMESTAMP(DATE_ADD(sm_cposted, INTERVAL $fuso HOUR)) AS postato FROM sm_chat ORDER BY sm_cposted DESC LIMIT 100");
if ($myrow = mysql_fetch_array($result)) { do {
printf("<tr><td valign=top class=masblack width=1><a href=javascript:scheda('scheda.php?zid=%s');>%s</a></td><td valign=top class=masall align=right nowrap>%s</td></tr><tr><td class=mascont colspan=2 width=100%%>%s</td></tr>", urlencode($myrow["sm_cuid"]),$myrow["sm_cuid"],date("d/m H:i", $myrow["postato"]),wrapize($myrow["sm_chat"]));
} while  ($myrow = mysql_fetch_array($result));  }
?>      
        </table>
    </td>
    <td  class=masall valign=top><table width="100%" border="0" cellspacing="1" cellpadding="1"><tr><td class=masblack nowrap>CI SONO</td>
  </tr>
  <tr> 
    <td valign="top"  class=mascont>
    <?php 
 $result = mysql_query("SELECT id FROM users WHERE logged='Y' ORDER BY id");   
if ($myrow = mysql_fetch_array($result)) { do {
printf("<a href=javascript:scheda('scheda.php?zid=%s');>%s</a><br>", urlencode($myrow["id"]),$myrow["id"]);
} while  ($myrow = mysql_fetch_array($result));  }
    ?></td>
  </tr></table>
  <table width="100%" border="0" cellspacing="1" cellpadding="1"><tr><td class=masblack nowrap><a href=# onClick="expandit('aicons')">FAZZE</a></td>
  </tr>
  <tr name=aicons id=aicons style=display:none> 
    <td valign="top"  class=mascont align=center >
    <?php 
 $result = mysql_query("SELECT emot, icon FROM emoticons GROUP BY icon ORDER BY emot");   
if ($myrow = mysql_fetch_array($result)) { do {
printf("<a href=\"#\" onclick=\"oldsmilie('%s');return false;\"><img alt=\"%s\" src=$emopath\%s.gif border=0></a><br><img src=images/spacer.gif><br>", $myrow["emot"],$myrow["emot"],$myrow["icon"]);
} while  ($myrow = mysql_fetch_array($result));  }
    ?></td>
  </tr></table></td></tr>
</table></form>

<?php }  else { ?><br><br><br><center>members only area<?php } ?> 
