<?php
	require("sajax.php");
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

	$result=MYSQL_QUERY("UPDATE users SET logged='N' WHERE id='$id'");
}


function add_line($id, $msg) {
$result=MYSQL_QUERY("INSERT INTO sm_chat (sm_cuid,sm_chat) ".
        "VALUES ('$id','$msg')");
	}
	function get_lines($fuso){
		$lines="<table width=100% border=0 cellspacing=1 cellpadding=1>";
$result = mysql_query("SELECT sm_cuid, sm_chat, UNIX_TIMESTAMP(DATE_ADD(sm_cposted, INTERVAL $fuso HOUR)) AS postato FROM sm_chat ORDER BY sm_cposted DESC LIMIT 30");
if ($myrow = mysql_fetch_array($result)) { do {
$lines=$lines. "<tr><td valign=top class=masblack width=1><a href=javascript:scheda('scheda.php?zid=".urlencode($myrow["sm_cuid"])."');>".$myrow["sm_cuid"]."</a></td><td valign=top class=masall align=right nowrap>".date("d/m H:i", $myrow["postato"])."</td></tr><tr><td class=mascont colspan=2 width=100%>".wrapize($myrow["sm_chat"])."</td></tr>";
} while  ($myrow = mysql_fetch_array($result));  }
$lines=$lines."</table>";
return utf8_encode($lines);
	}
	function get_people(){
		$result = mysql_query("SELECT id FROM users WHERE logged='Y' ORDER BY id");   
if ($myrow = mysql_fetch_array($result)) { do {
$people=$people."<a href=javascript:scheda('scheda.php?zid=".urlencode($myrow["id"])."');>".$myrow["id"]."</a><br>";
} while  ($myrow = mysql_fetch_array($result));  }
return utf8_encode($people);
		}


	
	$sajax_request_type = "GET";
	sajax_init();
	sajax_export("add_line", "get_lines", "get_people", "logitout");
	sajax_handle_client_request();
	?>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<link rel="stylesheet" href="mashiro2.css" type="text/css">
<script src=mashiro.js></script>
<title>|gestione|comunicazione|spalanca|dot|com|</title>
	<script>

	<?
	sajax_show_javascript();
	?>
	
	function refresh_cb(new_data) {
		document.getElementById("wall").innerHTML = new_data;
		setTimeout("refresh()", 1000);
	}
	
	function refresh() {
		x_get_lines(<? echo $fuso; ?>, refresh_cb);
		
	}
		function p_refresh_cb(new_peop) {
		document.getElementById("peop").innerHTML = new_peop;
		setTimeout("p_refresh()", 1000);
	}
	
	function p_refresh() {
		x_get_people(p_refresh_cb);
		
	}
	function logmeout_cb() {

	}
	
	function logmeout() {
		x_logitout('<? echo $id; ?>', logmeout_cb);
		
	}

	function add_cb() {
		// we don't care..
	}

	function add() {
		var line;
		line = document.getElementById("line").value;
		if (line == "") 
			return;
		x_add_line('<? echo utf8_encode($id); ?>', line, add_cb);
		document.getElementById("line").value = "";
	}
</script>
</head>
	<body  onload="refresh();p_refresh();" onUnload="logmeout()">
<form method=post name=chat action=# onsubmit="add();return false;">
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr> 
    <td colspan="2" align=center valign=middle class=masall><input id="line" type=text size=40 class=mascont name="line"></td>
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
printf("<a href=\"#\" onclick=\"smilie('%s');return false;\"><img alt=\"%s\" src=$emopath/%s.gif border=0></a><br><img src=images/spacer.gif><br>", $myrow["emot"],$myrow["emot"],$myrow["icon"]);
} while  ($myrow = mysql_fetch_array($result));  }
    ?></td>
  </tr></table></td></tr>
</table></form>

<?php }  else { ?><br><br><br><center>members only area<?php } ?> 
