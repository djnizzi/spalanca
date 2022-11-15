<?php
include ("configchat.php");
include ("connect.php");
include ("cookie.php");
	?>
<head>
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<link rel="stylesheet" href="chathistory.css" type="text/css">
<script src=mashiro.js></script>
<title>|solo-x-i-tuoi-occhi|spalanca|dot|com|</title>
</head>
<?php
if (isset($id)){


	?>
	<body>

<?php

if (isset($inizio)) {$startdate=substr($inizio,4)."-".substr($inizio,2,2)."-".substr($inizio,0,2);} else {$startdate='2002-04-04'; }
if (isset($fine)) {$enddate=substr($fine,4)."-".substr($fine,2,2)."-".substr($fine,0,2);} else {$enddate='2010-12-31';}
$result = mysql_query("SELECT sm_cuid, sm_chat, UNIX_TIMESTAMP(DATE_ADD(sm_cposted, INTERVAL $fuso HOUR)) AS postato FROM sm_chat WHERE sm_cposted >= '$startdate' AND sm_cposted <= '$enddate' ORDER BY sm_cposted");
if ($myrow = mysql_fetch_array($result)) { do {
printf("<table cellpadding=0 cellspacing=1 border=0 width=100%%><tr><td valign=top class=masblack width=80 nowrap valign=top align=right><span class=masname>%s</span><br><span class=masdate>%s</span></td><td class=maswhite valign=top>%s</td></tr><tr><td colspan=2 class=masall><img src=images/spacer.gif></td></tr></table>", $myrow["sm_cuid"],date("d/m H:i", $myrow["postato"]),wrapize($myrow["sm_chat"]));
} while  ($myrow = mysql_fetch_array($result));  }
?>      

<?php }  else { ?><br><br><br><center>members only area<?php } ?> 
