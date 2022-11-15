<?php
if (!isset($zid)){
if (isset($subsig)){
$result=MYSQL_QUERY("SELECT id FROM users WHERE id='$newid'");
if (@MYSQL_RESULT($result,0,"id")!=null)
{print "&egrave; un vero peccato ma lo username $newid appartiene ad un altro personaggio | <a href=signup.php>ritenta</a>";
?><script>whattatit("iscrizione fallita: username gi&egrave; in uso")</script><?php
}else{
if(isset($chex)){$mailon='Y';}else{$mailon='N';}
if($icon_name!=""  && $icon_size<65535 && ($icon_type=="image/jpeg" || $icon_type=="image/pjpeg" || $icon_type=="image/gif")){
$data = addslashes(fread(fopen($icon, "r"), filesize($icon)));
$result=MYSQL_QUERY("INSERT INTO users (id,pass,email,mailon,bindata,filename,filesize,filetype) ".
        "VALUES ('$newid',OLD_PASSWORD('$pass'),'$email','$mailon','$data','$icon_name','$icon_size','$icon_type')");
        $thisuid = $newid;
        include ("getavatar.php"); 
$licona="<br><br>questa &egrave; la tua bellissima icona<br><br>" . $avatarurl;
} else {
$result=MYSQL_QUERY("INSERT INTO users (id,pass,email,mailon) ".
        "VALUES ('$newid',OLD_PASSWORD('$pass'),'$email','$mailon')");
$licona="<br><br>non hai inserito la tua icona o hai usato un file non valido (max 64K gif o jpeg). niente paura: potrai farlo in seguito dal pulsante 'gestisciti'";
}
?>
<script>whattatit("bella, <?php echo addslashes($newid); ?>! ora spalanca!")</script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/spalancah.jpg width=338 height=20></td>
                      </tr>
 <tr><td class=massim align=center><?php
print ("<br>bella, <b>$newid</b>! ora puoi spalancare da brutto anche tu! cosa ne pensi?");
print ("<br><br>la tua password &egrave; <b>$pass</b> scrivitela, se la dimentichi &egrave; impossibile recuperarla!");
print ("<br><br>la tua mail &egrave; <b>$email</b>");
if ($mailon=="N"){
print (" e hai scelto di non renderla visibile ai frequentatori di spalanca.com");}
else{print (" e hai scelto di renderla visibile ai frequentatori di spalanca.com al momento della visualizzazione della tua scheda");}
print ($licona . "<br>");
print ("<br>se non sei contento/a con questi dati potrai sempre modificarli dal pulsante 'gestisciti' una volta loggato/a<br>&nbsp;</td></tr></table>");}
} else {
?>
<script>whattatit("spalanca anche tu!")</script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/andus.jpg width=338 height=20></td>
                      </tr>
                                            <tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td class=mascont><?php
include ("abouthow1.php");
 ?></td></tr></table></td></tr>
 <tr><td><form  enctype="multipart/form-data" method=post name=signup action=<?php echo $mynameis; ?> onSubmit="return verSignup(document.signup);disBut(document.signup.subsig)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center>username: <INPUT TYPE=text  class=buttons size=16 NAME="newid"> (max 16 caratteri)</td></tr><tr><td align=center>password: <INPUT TYPE=password name=pas class=buttons size=16>
 conferma: <INPUT TYPE=password  class=buttons size=16 NAME="pass"></td></tr>
 <tr><td align=center>e-mail: <INPUT TYPE=text  class=buttons size=25 NAME="email"> <input type="checkbox" name="chex"> visibile</td></tr>
<tr><td align=center>icona: <input type="file" name="icon" size=61 class=buttons></td></tr>
<tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subsig" VALUE="entra nel fantastico mondo di spalanca.com"></td></tr>
</table></form></td></tr></table>
<?php
}
}
else if (isset($id) && $zid==$id) {
if (!isset($subsig)) {
?><script>whattatit("gestisci i tuoi dati")</script><?php
$result=MYSQL_QUERY("SELECT email,mailon FROM users WHERE id='$id'");
$checked=(@MYSQL_RESULT($result,0,"mailon")=='Y')?"checked":"";
$thisuid = $zid;
include ("getavatar.php"); 
?>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/gestisci.jpg width=338 height=20></td>
                      </tr>
 <tr><td><form  enctype="multipart/form-data" method=post name=signup action=<?php echo $mynameis; ?>?zid=<?php echo urlencode($zid); ?> onSubmit="return verSignupEd(document.signup);disBut(document.signup.subsig)"><table class=masall width=100% border=0 cellspacing=0 cellpadding=0 class=mascont2>
 <tr><td align=center><br><?php echo $avatarurl; ?><br><?php echo $zid; ?><br>&nbsp;</td></tr><tr><td align=center>password attuale: <INPUT TYPE=password name=oldpass class=buttons size=16>
  nuova password: <INPUT TYPE=password name=pas class=buttons size=16> conferma nuova password: <INPUT TYPE=password  class=buttons size=16 NAME="pass"></td></tr>
 <tr><td align=center>e-mail: <INPUT TYPE=text  class=buttons size=25 NAME="email" value=<?php echo @MYSQL_RESULT($result,0,"email"); ?>> <input type="checkbox" name="chex" <?php echo $checked; ?>> visibile</td></tr>
<tr><td align=center>icona: <input type="file" name="icon" size=61 class=buttons></td></tr>
<tr><td align=center><INPUT TYPE=SUBMIT  class=buttons NAME="subsig" VALUE="salva"></td></tr>
</table></form></td></tr></table>
<?php }
else {
if(isset($chex)){$mailon='Y';}else{$mailon='N';}
if($icon_name!=""  && $icon_size<65535 && ($icon_type=="image/jpeg" || $icon_type=="image/pjpeg" || $icon_type=="image/gif")){
$data = addslashes(fread(fopen($icon, "r"), filesize($icon)));
$result=MYSQL_QUERY("UPDATE users SET  created=created,email='$email',mailon='$mailon',bindata='$data',filename='$icon_name',filesize='$icon_size',filetype='$icon_type' WHERE id='$zid'");
}else{$result=MYSQL_QUERY("UPDATE users SET created=created,email='$email',mailon='$mailon' WHERE id='$zid'");        
}
 ?>
<script>whattatit("dati processati")</script>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td class=masall align=center><img src=images/spalancah.jpg width=338 height=20></td>
                      </tr>
 <tr><td class=massim align=center><br><?php  $thisuid = $zid;
  include ("getavatar.php"); echo $avatarurl; ?><br><b><?php echo $zid; ?></b><br><?php
if ($pass!="" && $oldpass!="") {
$result=MYSQL_QUERY("SELECT id FROM users WHERE id='$id' AND pass=OLD_PASSWORD ('$oldpass')");
if (@MYSQL_RESULT($result,0,"id")==null) {
print ("<br>la tua password non &egrave; stata modificata in quanto la password attuale risulta errata<br>");
} else {
$result=MYSQL_QUERY("UPDATE users SET pass=OLD_PASSWORD ('$pass'), created=created WHERE id='$zid'");
print ("<br>la tua nuova password &egrave; <b>$pass</b> scrivitela, se la dimentichi &egrave; impossibile recuperarla!<br>");
}
}
print ("<br>la tua mail &egrave; <b>$email</b>");
if ($mailon=="N"){
print (" e hai scelto di non renderla visibile ai frequentatori di spalanca.com");}
else{print (" e hai scelto di renderla visibile ai frequentatori di spalanca.com al momento della visualizzazione della tua scheda");}
print ("<br><br>se non sei contento/a con questi dati potrai sempre modificarli dal pulsante 'gestisciti' una volta loggato/a<br>&nbsp;</td></tr></table>");
}
}
?>