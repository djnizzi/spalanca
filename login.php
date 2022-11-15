<?php
if (isset($id)){
$result=mysql_query("SELECT admin FROM users WHERE id='$id'");
$result2=mysql_query("SELECT count(*) AS newsno FROM news WHERE online='N'");
$adminurl=(@MYSQL_RESULT($result,0,"admin")=='Y' && @MYSQL_RESULT($result2,0,"newsno")!='0')?" | <a href=news.php?admin=1>" . @MYSQL_RESULT($result2,0,"newsno"). " news in attesa del tuo sì</a>":"";
$logform1="<FORM name=logform action=$mynameis?ercook=1 method=post>".
              "<table width=100% border=0 cellspacing=2 cellpadding=0>".
                "<tr>".
                  "<td class=mastoxic>bella, <a href=scheda.php?zid=" . urlencode($id) . ">$id</a>! | <a href=\"javascript:document.logform.submit()\">sloggiati</a>$adminurl</td>".
                "</tr>".
              "</table></form>";}

$logform2="<FORM name=logform action=$mynameis?loginsub=1 method=post>".
              "<table width=100%% border=0 cellspacing=2 cellpadding=0>".
               "<tr>".
                 "<td class=mastoxic><input type=text name=id class=buttons size=8><input size=10 type=password name=pass class=buttons> <a href=\"javascript:lowAll(document.logform);document.logform.submit()\">loggami</a> | <a href=signup.php>iscrivimi</a>%s</td>" .
               "</tr>".
             "</table></form>";
if ($checkcook==0)  {
printf ($logform2, "");
} else if ($checkcook==1) {
printf ($logform2, " | spiacenti: username o password errati, non sei loggato/a...");
} else if ($checkcook==2 || isset($id)){
print $logform1;
$result=MYSQL_QUERY("UPDATE users set created=created, disable='N', lastclientip='$clientip' WHERE id='$id'");
} else {
printf ($logform2, "");
}
include("space.php");
?>