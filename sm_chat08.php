<?php

require_once("xajax.inc.php");
$xajax = new xajax();



include ("configchat.php");
include ("connect.php");
include ("cookie.php");

if (isset($appesidamesi)) {

$result=MYSQL_QUERY("UPDATE users SET logged='N', created=created WHERE logged='Y'");
	}
if (isset($id)){

	$result = mysql_query("SELECT logged FROM users WHERE id='$id'");
	if (@MYSQL_RESULT($result,0,"id")!='Y'){
	$result=MYSQL_QUERY("UPDATE users SET logged='Y' WHERE id='$id'");}

function logitout($id) {
    $objResponse = new xajaxResponse();

	$result=MYSQL_QUERY("UPDATE users SET logged='N' WHERE id='$id'");
}


function add_line($id, $msg) {
    $objResponse = new xajaxResponse();

$result=MYSQL_QUERY("INSERT INTO sm_chat (sm_cuid,sm_chat) ".
        "VALUES ('$id','$msg')");
	}
	function get_lines($fuso){
    $objResponse = new xajaxResponse();

		$lines="<table width=100% border=0 cellspacing=1 cellpadding=1>";
$result = mysql_query("SELECT sm_cuid, sm_chat, UNIX_TIMESTAMP(DATE_ADD(sm_cposted, INTERVAL $fuso HOUR)) AS postato FROM sm_chat ORDER BY sm_cposted DESC LIMIT 30");
if ($myrow = mysql_fetch_array($result)) { do {
$lines=$lines. "<tr><td valign=top class=masblack width=1><a href=javascript:scheda('scheda.php?zid=".urlencode($myrow["sm_cuid"])."');>".$myrow["sm_cuid"]."</a></td><td valign=top class=masall align=right nowrap>".date("d/m H:i", $myrow["postato"])."</td></tr><tr><td class=mascont colspan=2 width=100%>".wrapize($myrow["sm_chat"])."</td></tr>";
} while  ($myrow = mysql_fetch_array($result));  }
$lines=$lines."</table>";


    return $objResponse;

	}
	function get_people(){
    $objResponse = new xajaxResponse();

		$result = mysql_query("SELECT id FROM users WHERE logged='Y' ORDER BY id");   
if ($myrow = mysql_fetch_array($result)) { do {
$people=$people."<a href=javascript:scheda('scheda.php?zid=".urlencode($myrow["id"])."');>".$myrow["id"]."</a><br>";
} while  ($myrow = mysql_fetch_array($result));  }

    $objResponse->addAssign("peop","innerHTML", $people);
        return $objResponse;

		}
$xajax->registerFunction("get_people");
$xajax->registerFunction("get_lines");
$xajax->registerFunction("add_line");
$xajax->registerFunction("logitout");
$xajax->processRequests();

	?>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<title>|gestione|comunicazione|spalanca|dot|com|</title>

<?php $xajax->printJavascript(); ?>
<script src=mashiro.js></script>


	<script>



	
	function refresh() {
		   
	xajax_get_lines('<? echo $fuso; ?>');
		setTimeout("refresh()", 1000);
	}
	function p_refresh() {
		   
	xajax_get_people();
		setTimeout("p_refresh()", 1000);
	}	


	
	function logmeout() {
	xajax_logitout('<? echo $id; ?>');
			
	}


	function add() {
		var line;
		line = document.getElementById("line").value;
		if (line == "") 
			return;
				xajax_add_line('<? echo $id; ?>', document.getElementById('line').value);
		document.getElementById("line").value = "";
	}
</script>
<link rel="stylesheet" href="mashiro2.css" type="text/css">
</head>
	<body  onload="refresh();p_refresh();" onUnload="logmeout()">
<form method=post name=chat action=# onSubmit="add();return false;">
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr> 
    <td colspan="2" align=center valign=middle class=masall><input type=text size=40 class=mascont id="line"></td>
  </tr>
  <tr> 
    <td  class=masall valign=top width=100%><div id="wall"></div></td>
    <td  class=masall valign=top><table width="100%" border="0" cellspacing="1" cellpadding="1"><tr><td class=masblack nowrap>CI SONO</td>
  </tr>
  <tr> 
    <td valign="top"  class=mascont><div id="peop"></div></td>
  </tr></table>
  <table width="100%" border="0" cellspacing="1" cellpadding="1"><tr><td class=masblack nowrap><a href=# onClick="expandit('aicons')">FAZZE</a></td>
  </tr>
  <tr name=aicons id=aicons style=display:none> 
    <td valign="top"  class=mascont align=center >
    <?php 
 $result = mysql_query("SELECT emot, icon FROM emoticons GROUP BY icon ORDER BY emot");   
if ($myrow = mysql_fetch_array($result)) { do {
printf("<a href=\"#\" onclick=\"smilie('%s');return false;\"><img alt=\"%s\" src=$emopath\%s.gif border=0></a><br><img src=images/spacer.gif><br>", $myrow["emot"],$myrow["emot"],$myrow["icon"]);
} while  ($myrow = mysql_fetch_array($result));  }
    ?></td>
  </tr></table></td></tr>
</table></form>

<?php }  else { ?><br><br><br><center>members only area<?php } ?> 
