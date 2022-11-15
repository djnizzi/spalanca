<?php

if($bid && $xsize && $ysize) {

 $type='image/jpeg';
 $data1=imagecreatefromjpeg ("../baretto/$bid-barentry.jpg");
 if ((ImageSY($data1)/ImageSX($data1))*$xsize < $ysize){$newthing=ImageCreateTrueColor($xsize,(ImageSY($data1)/ImageSX($data1))*$xsize);
imagecopyresampled($newthing,$data1,0,0,0,0,$xsize,(ImageSY($data1)/ImageSX($data1))*$xsize,ImageSX($data1),ImageSY($data1));
} else {$newthing=ImageCreateTrueColor((ImageSX($data1)/ImageSY($data1))*$ysize,$ysize);
imagecopyresampled($newthing,$data1,0,0,0,0,(ImageSX($data1)/ImageSY($data1))*$ysize,$ysize,ImageSX($data1),ImageSY($data1));}
 

  imagejpeg($newthing);


};
?>