<?php
if (isset($id)){
$result=mysql_query("SELECT admin FROM users WHERE id='$id'");
$result2=mysql_query("SELECT count(*) AS newsno FROM news WHERE online='N'");
$logform1=(@MYSQL_RESULT($result,0,"admin")=='Y' && @MYSQL_RESULT($result2,0,"newsno")!='0')?"<script>input_box=confirm('Ci sono " . @MYSQL_RESULT($result2,0,"newsno").  " news in attesa della tua approvazione');if (input_box==true){document.location='news06.php?admin=1';}</script>":"";
print $logform1;}
$logform2="<script>alert('username o password errati, non sei loggata/o... riprova!');</script>";

if ($checkcook==1) {
print $logform2;
} else if ($checkcook==2 || isset($id)){
$result=MYSQL_QUERY("UPDATE users set created=created, disable='N', lastclientip='$clientip' WHERE id='$id'");
} 
include("space.php");
?>