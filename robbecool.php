<head><link rel="alternate" type="application/x-cooliris-quick" href="http://www.spalanca.com/cooliris-quick.xml" /><link href="images/1/base.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='mashiro.js'></script>
<script type="text/javascript" src="images/1/myol.js"></script>
</head>
<body>
<?php
$mynameis="$PHP_SELF";
include ("config.php");
include ("connect.php");

$result = mysql_query("SELECT pid,puid,UNIX_TIMESTAMP(DATE_ADD(pposted, INTERVAL $fuso HOUR)) AS postato,title FROM posts ORDER BY pposted DESC");
if ($myrow = mysql_fetch_array($result)) { do{
        $postato= date("d/m/Y H:i",$myrow["postato"]);

 printf("<a href=robba/%s-robba.jpg><img src=robba/thumbs/%st-robba.jpg alt='%s - creata da %s - %s></a><br><br>", $myrow["pid"],$myrow["pid"],addslashes($myrow["title"]),$myrow["puid"],$postato);
 					
	}

      while ($myrow = mysql_fetch_array($result));}
