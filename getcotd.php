<?php
if($cotdfn && $xsize) {

    $type='image/jpeg';
    $data=imagecreatefromjpeg ("cotd/$cotdfn");
    $newthing=ImageCreateTrueColor($xsize,(ImageSY($data)/ImageSX($data))*$xsize);
imagecopyresampled($newthing,$data,0,0,0,0,$xsize,(ImageSY($data)/ImageSX($data))*$xsize,ImageSX($data),ImageSY($data));

     imagejpeg($newthing);


};
?>