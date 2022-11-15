<?php
	if (isset($id)){
		$result=mysql_query("select space from users where id='$id'");
		if (@MYSQL_RESULT($result,0,"space")=="Y") {$spacevote="<option value=4.5>{$voto['4.50']}</option><option value=4.75>{$voto['4.75']}</option><option value=5>{$voto['5.00']}</option>";}else{$spacevote="";}
		}else{$spacevote="";}

?>