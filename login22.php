<?php
$logform1="<button class=hbutton onClick=\"javascript:chatwin=window.open('sm_chat06.php','chatmeup','width=310,height=300,scrollbars=yes');chatwin.focus();\">chat</button><br><button class=hbutton onClick=\"window.location='signup.php?zid=%s'\">gestiscimi</button><br>
<span class=boldened>bella %s!</span> &nbsp;<button class=hbutton onClick=\"javascript:window.location='home.php?ercook=1'\">sloggiami</button><br>";
$logform2="<FORM name=logform action=home.php?loginsub=1 method=post>".
                 "<br><br><br><br><input type=text name=id class=hinput size=8> <input size=10 type=password name=pass class=hinput> <button class=hbutton onClick=\"javascript:lowAll(document.logform);document.logform.submit()\">loggami</button><br><button type=button class=hbutton onclick=\"window.location='signup.php'\">iscrivimi</button>" .
             "</form>";
if ($checkcook==0)  {
printf ($logform2, "");
} else if ($checkcook==1) {
printf ($logform2);
} else if ($checkcook==2 || isset($id)){
printf ($logform1, $id, $id);
} else {
printf ($logform2, "");
}
?>

