<?php

if($pid) {

$data1ya=imagecreatefromjpeg ("robba/$pid-robba.jpg");
if (ImageSX($data1ya)>850){$winx=850;}else{$winx=ImageSX($data1ya)+(ImageSX($data1ya)/4);}
if (ImageSY($data1ya)>700){$winy=700;}else{$winy=ImageSY($data1ya)+24;}
$featuring="'width=" . $winx . ",height=" . $winy;
if (ImageSX($data1ya)>850 || ImageSY($data1ya)>700){$featuring=$featuring . ",scrollbars=yes";}

 $featuring=$featuring ."'" ;}
?>