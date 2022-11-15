<?php
$logform1="<script>var gfunk = new String(parent.location);if (gfunk.indexOf('noid')>-1){parent.location='t7_home.php';}</script>";
$logform2="<FORM name=logform action=t7_rulez.php?loginsub=1 method=post>".
              "<table width=100%% border=0 cellspacing=1 cellpadding=0>".
               "<tr>".
                 "<td class=mascont align=center><input type=text name=id class=buttons size=8><input size=10 type=password name=pass class=buttons> <a href=\"javascript:lowAll(document.logform);document.logform.submit()\">loggami</a> | <a href=signup.php target=_top>iscrivimi</a>%s</td>" .
               "</tr>".
             "</table></form>";
if ($checkcook==0)  {
printf ($logform2, "");
} else if ($checkcook==1) {
printf ($logform2, " | spiacenti: username o password errati, non sei loggato/a...");
} else if ($checkcook==2 || isset($id)){
printf ($logform1);
} else {
printf ($logform2, "");
}
?>