<?php

?>
<br><table border=0 cellspacing=0 cellpadding=2 align=center>
<tr><td class=mascont align=center><?php
if (!isset ($nocount)) {
$result = mysql_query("UPDATE counter SET accessed=accessed+1 WHERE pageid='home.php'");}
$result = mysql_query("SELECT accessed FROM counter WHERE pageid='home.php'");
print ("accessi a questa pagina: <b>" . @MYSQL_RESULT($result,0,"accessed") . "</b>");
$result = mysql_query("SELECT count(*) as contejo FROM users");
print ("<br>iscritti a |spalanca|dot|com|: <b>" . @MYSQL_RESULT($result,0,"contejo") . "</b>") ;
$result = mysql_query("SELECT count(*) as contejo FROM posts");
print ("<br>robba pubblicata: <b>" . @MYSQL_RESULT($result,0,"contejo")) ;
 ?></td></tr></table>
<?php

?>