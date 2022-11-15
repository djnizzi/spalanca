<?php
$database="leth4l";
$database2="totocempions";
$user = "root";
$passaworta = "trustno1";
$hostname = "localhost";
$spaltb1="background=images/bkic1.jpg width=86 nowrap";
$spaltb2="<td background=images/bkic2.jpg width=30><img src=images/spacer.gif width=30 height=1></td>";
$spaltb3="background=images/bkic3.jpg width=50" ;
$spaltb4="width=100%" ;
$fillwith="<img src=images/spacer.gif width=32>";
$fuso=6;
$voto=array("0.00"=>"no voto","0.75"=>"fa veramente cagare","1.00"=>"fa cagare"
,"1.25"=>"fa un po' cagare","1.50"=>"bella cagata","1.75"=>"una micro micro",
"2.00"=>"una micro","2.25"=>"una minima","2.50"=>"ci sta dentro una minima","2.75"=>"ci sta quasi dentro","3.00"=>"ci sta dentro"
,"3.25"=>"ci sta dentro scianti","3.50"=>"ci sta dentro di bella","3.75"=>"ci sta dentrissimo",
"4.00"=>"pregio","4.25"=>"molto pregio","4.50"=>"super pregio","4.75"=>"space","5.00"=>"super space");

function emotize($alltext) {
$query = "SELECT emot, icon FROM emoticons"; 
$result = mysql_query($query); 
$emopath="emoticons";
if ($myrow = mysql_fetch_array($result)) { do {
$emotes[] = $myrow['emot']; 
$images[] = " <img src='" . $emopath . "/" . $myrow['icon'] . ".gif'> "; 
} while  ($myrow = mysql_fetch_array($result));  }
return str_replace($emotes, $images, $alltext); 
	}
function modernize($alltext) {
	$words=explode(" ",$alltext);
	foreach (emotize($words) as $worda) {if(substr($worda,0,7)=="http://"){$newchat=$newchat." "."<a href=".$worda. " target=new>[cliccami]</a>";}	
		else if(strlen($worda)>100 and !strstr($worda,' ')) {$newchat=$newchat." ".wordwrap($worda,100," ",1);} 
		else if(strlen($worda)>100 and strstr($worda,' ')) {
				$words2=explode(" ",$worda);
				foreach ($words2 as $worda2) { 
					if (strlen($worda2)>100 and !strstr($worda2,'src=')) {
					$newchat=$newchat." ".wordwrap($worda2,20," ",1);
				}}}
	
	else {$newchat=$newchat." ".$worda;} }
			 
		 return ltrim($newchat);
}
function stefize($alltext) {
	$words=explode(" ",str_replace("<img","<!img",$alltext));
	foreach (emotize($words) as $worda) {if(substr($worda,0,4)=="<img"){$newchat=$newchat." "."[immagine]";}	
		else if(strlen($worda)>100 and !strstr($worda,' ')) {$newchat=$newchat." ".wordwrap($worda,100," ",1);} 
		else if(strlen($worda)>100 and strstr($worda,' ')) {
				$words2=explode(" ",$worda);
				foreach ($words2 as $worda2) { 
					if (strlen($worda2)>100 and !strstr($worda2,'src=')) {
					$newchat=$newchat." ".wordwrap($worda2,20," ",1);
				}}}
	
	else {$newchat=$newchat." ".$worda;} }
			 
		 return ltrim($newchat);
}


?>
