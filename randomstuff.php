<?php
$result=mysql_query("select stxt from slogan ORDER by RAND() LIMIT 1");
$theslog=@MYSQL_RESULT($result,0,"stxt");
?>