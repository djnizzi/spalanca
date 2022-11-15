<?php

if($pid && $xsize) {

 $type='image/jpeg';
 $data1=imagecreatefromjpeg ("robba/$pid-robba.jpg");
 
 if (ImageSY($data1)<ImageSX($data1)){$newthing=ImageCreateTrueColor($xsize,(ImageSY($data1)/ImageSX($data1))*$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,$xsize,(ImageSY($data1)/ImageSX($data1))*$xsize,ImageSX($data1),ImageSY($data1));
} else {$newthing=ImageCreateTrueColor((ImageSX($data1)/ImageSY($data1))*$xsize,$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,(ImageSX($data1)/ImageSY($data1))*$xsize,$xsize,ImageSX($data1),ImageSY($data1));}
 

  imagejpeg($newthing);


};
?>