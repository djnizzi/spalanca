<?php

if(isset($bid)){
$database="leth4l";
$user = "leth4l";
$passaworta = "trustno1";
$hostname = "localhost";
include ("../../connect.php");
include ("../../cookie.php");
?>
<html>
<head>
<title>indossa IL BARETTO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body {

	background-color: #76A7FF;
	background-image: url("barbk.jpg");
}
.dashgal {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	background-color: #397CFF;
	border: 1px dotted #FFFFFF;
	color: #FFFFFF;

}
</style>
<?php
print ("<table border=0 cellpadding=3 cellspacing=0><tr><td class=dashgal><img src=../baretto/$bid-barentry.jpg></td></tr></table>");
} ?>


