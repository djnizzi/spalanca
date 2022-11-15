<?php
	if (isset($id) && $spacevote==""){
$result1=mysql_query("select count(*) as nufro from posts where puid='$id'");
$result1a=mysql_query("select count(*) as nufgro from posts where puid='$id' and voto>=3");
$result2=mysql_query("select count(*) as nuffo from forum where fuid='$id'");
$result3=mysql_query("select count(*) as nufco from comments where cuid='$id'");
$result4=mysql_query("select count(*) as nufne from news where nuid='$id' and online='Y'");

if (@MYSQL_RESULT($result1,0,"nufro")>4 && @MYSQL_RESULT($result1a,0,"nufgro")>2 && @MYSQL_RESULT($result2,0,"nuffo")>29 && @MYSQL_RESULT($result3,0,"nufco")>29 && @MYSQL_RESULT($result4,0,"nufne")>0)
 {$result=mysql_query("update users set space='Y' where id='$id'");}
		}
?>