<?php
$expirat = mktime(0,0,0,1,1,2011);
$clientip= getenv ("REMOTE_ADDR") ;

if (isset($ercook))  
{$checkcook=0;
setcookie('id',"",$expirat,"/", "", 0);
setcookie('id',"");
unset($id);
} 
else 
if (isset($loginsub) && isset($id)) {
$result=MYSQL_QUERY("SELECT id FROM users WHERE id='$id' AND pass=PASSWORD ('$pass')");
if (@MYSQL_RESULT($result,0,"id")==null){
$checkcook=1;
setcookie('id',"",$expirat,"/", "", 0);
unset($id);
}else
{$checkcook=2;
setcookie('id', $id, $expirat,"/", "", 0);

$result=MYSQL_QUERY("UPDATE users set created=created, lastclientip='$clientip' WHERE id='$id'");
}} 
else if (isset($id) && (empty($id) || $id=="" || $id==null)){
setcookie('id',"",$expirat,"/", "", 0);
unset($id);
$checkcook=0;}
else if (isset($id)) {
	$result=MYSQL_QUERY("SELECT disable FROM users WHERE id='$id'");
if (@MYSQL_RESULT($result,0,"disable")=='Y' && !isset($pass)){
setcookie('id',"",$expirat,"/", "", 0);
setcookie('id',"");
unset($id);
$checkcook=0;}
$result=MYSQL_QUERY("SELECT id FROM users WHERE id='$id'");
if (@MYSQL_RESULT($result,0,"id")==null){$checkcook=0;
setcookie('id',"",$expirat,"/", "", 0);
unset($id);
}else{$checkcook=2;$result=MYSQL_QUERY("UPDATE users set created=created, lastclientip='$clientip' WHERE id='$id'");}}else 
{$checkcook=4;}
?>