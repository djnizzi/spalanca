<?php

function mantra_custom_styles() {

/* This  retrieves  admin options. */
$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {
     ${"$key"} = esc_attr($value) ;
}
$totalwidth= $mantra_sidewidth+$mantra_sidebar+50;

?>

<style>
.single-attachment #content,#wrapper, #access, #colophon, #branding, #main,  .attachment img { width:<?php echo ($totalwidth) ?>px ;}
#access .menu-header, div.menu {width:<?php echo ($totalwidth-12) ?>px ;}
#content img {	max-width:<?php echo ($mantra_sidewidth-40) ?>px;}
#content .wp-caption{	max-width:<?php echo ($mantra_sidewidth-30) ?>px;}

<?php if ($mantra_side == "1c" || $mantra_side =="Disable") { ?>
#content {width:<?php echo ($totalwidth-50) ?>px; margin:20px;} <?php }

?><?php if ($mantra_side == "2cSr" || $mantra_side == "Right") { ?>
#content { width:<?php echo ($mantra_sidewidth- 10) ?>px;}
#primary,#secondary {width:<?php echo ($mantra_sidebar  ) ?>px;} <?php }

?><?php if ($mantra_side == "2cSl" || $mantra_side == "Left") { ?>
#content { width:<?php echo ($mantra_sidewidth - 10) ?>px;float:right;margin:0 20px 0 0;}
#primary,#secondary {width:<?php echo ($mantra_sidebar ) ?>px;float:left;padding-left:0px;clear:left;border:none;border-right:1px dashed #EEE;padding-right:20px;}
.widget-title { -moz-border-radius-topleft:0px; -webkit-border-radius:0px;border-radius-topleft:0px ; -moz-border-radius-topright:10px ;border-radius-topright:10px ;	border-top-right-radius:10px;
	-webkit-border-top-right-radius:10px;text-align:right;padding-right:5%;width:100%;} <?php } 

?><?php if ($mantra_side == "3cSr" ) { ?>
#content { width:<?php echo ($mantra_sidewidth- 20) ?>px;}
#primary,#secondary {width:<?php echo ($mantra_sidebar/2  ) ?>px;} <?php } 

?><?php if ($mantra_side == "3cSl" ) { ?>
#content { width:<?php echo ($mantra_sidewidth - 20) ?>px;float:right;margin:0 20px 0 0;display:block;}
#primary,#secondary {width:<?php echo ($mantra_sidebar/2 ) ?>px;float:left;padding-left:0px;;border:none;border-right:1px dashed #EEE;padding-right:20px;}
.widget-title { -moz-border-radius-topleft:0px; -webkit-border-radius:0px;border-radius-topleft:0px ; -moz-border-radius-topright:10px ;border-radius-topright:10px ;	border-top-right-radius:10px;
	-webkit-border-top-right-radius:10px;text-align:right;padding-right:5%;width:100%;} <?php } 

?><?php if ($mantra_side == "3cSs" ) { ?>
#content { width:<?php echo ($mantra_sidewidth - 20) ?>px;float:right;margin:0 20px 0 0;display:block;}
#primary {width:<?php echo ($mantra_sidebar/2 ) ?>px;float:left;padding-left:0px;border:none;border-right:1px dashed #EEE;padding-right:20px;}
#secondary {width:<?php echo ($mantra_sidebar/2 ) ?>px;float:right;}
#primary .widget-title { -moz-border-radius-topleft:0px; -webkit-border-radius:0px;border-radius-topleft:0px ; -moz-border-radius-topright:10px ;border-radius-topright:10px ;	border-top-right-radius:10px;
	-webkit-border-top-right-radius:10px;text-align:right;padding-right:5%;width:100%;} <?php } ?>


#content p, #content ul, #content ol {
font-size:<?php echo $mantra_fontsize ?>;
<?php if ($mantra_lineheight != "Default") { ?>line-height:<?php echo $mantra_lineheight ?>; <?php }
?><?php if ($mantra_wordspace != "Default") { ?>word-spacing:<?php echo $mantra_wordspace ?>;<?php }
?><?php if ($mantra_letterspace != "Default") { ?>letter-spacing:<?php echo $mantra_letterspace ?>;<?php }
?><?php if ($mantra_textalign != "Default") { ?>text-align:<?php echo $mantra_textalign;  ?> ; <?php } ?>}
<?php if (stripslashes($mantra_fontfamily) != '"Segoe UI", Arial, sans-serif') { ?>
* {font-family:<?php echo $mantra_fontfamily;  ?> ; }<?php }
?><?php if ($mantra_caption != "Light") { ?> #content .wp-caption { <?php }
?><?php if ($mantra_caption == "White") { ?> background-color:#FFF;}
 <?php } else if ($mantra_caption == "Light Gray") {?> background-color:#EEE; }
 <?php } else if ($mantra_caption == "Gray") {?> background-color:#CCC;}
 <?php } else if ($mantra_caption == "Dark Gray") {?> background-color:#444;color:#CCC;}
 <?php } else if ($mantra_caption == "Black") {?> background-color:#000;color:#CCC;}
<?php }
?><?php if ($mantra_contentlist == "Hide") { ?> #content ul li { background-image:none ; padding-left:0;} <?php }
?><?php if ($mantra_title == "Hide") { ?> #site-title, #site-description { visibility:hidden;} <?php }
?><?php if ($mantra_comtext == "Hide") { ?> #respond .form-allowed-tags { display:none;} <?php }
?><?php if ($mantra_comclosed == "Hide in posts") { ?> .nocomments { display:none;} <?php } elseif ($mantra_comclosed == "Hide in pages") { ?> .nocomments2 {display:none;} <?php } elseif ($mantra_comclosed == "Hide everywhere") { ?> .nocomments, .nocomments2 {display:none;} <?php }
?><?php if ($mantra_tables == "Enable") { ?> #content table {border:none;} #content tr {background:none;} #content table {border:none;} #content tr th,
#content thead th {background:none;} #content tr td {border:none;}<?php }
?><?php if ($mantra_headfontsize != "Default") { ?> h2.entry-title { font-size:<?php echo $mantra_headfontsize; ?> ;}<?php }
?><?php if ($mantra_sidefontsize != "Default") { ?> .widget-area a:link, .widget-area a:visited { font-size:<?php echo $mantra_sidefontsize; ?> ;}<?php }

?><?php if ($mantra_backcolor != "444444") { ?> body { background-color:<?php echo $mantra_backcolor; ?> ;}<?php }
?><?php if ($mantra_headercolor != "333333") { ?> #header { background-color:<?php echo $mantra_headercolor; ?>  ;}<?php }
?><?php if ($mantra_prefootercolor != "222222") { ?> #footer { background-color:<?php echo $mantra_prefootercolor; ?>  ;}<?php }
?><?php if ($mantra_footercolor != "171717") { ?> #footer2 { background-color:<?php echo $mantra_footercolor; ?>  ;}<?php }
?><?php if ($mantra_titlecolor != "0D85CC") { ?> #site-title span a { color:<?php echo $mantra_titlecolor; ?>  ;}<?php }
?><?php if ($mantra_descriptioncolor != "0D85CC") { ?> #site-description { color:<?php echo $mantra_descriptioncolor; ?>  ;}<?php }
?><?php if ($mantra_contentcolor != "333333") { ?> #content p, #content ul, #content ol { color:<?php echo $mantra_contentcolor; ?>  ;}<?php }
?><?php if ($mantra_linkscolor != "0D85CC") { ?> .widget-area a:link, .widget-area a:visited, a:link, a:visited ,#searchform #s:hover , #container #s:hover, #access a:hover, #wp-calendar tbody td a , #site-info a ,#site-copyright a, #access li:hover > a, #access ul ul :hover > a { color:<?php echo $mantra_linkscolor; ?>;}<?php }
?><?php if ($mantra_hovercolor != "333333") { ?>  a:hover, .entry-meta a:hover, .entry-utility a:hover , .widget-area a:hover { color:<?php echo $mantra_hovercolor; ?> ;}<?php }
?><?php if ($mantra_headtextcolor != "333333") { ?> #content .entry-title a, #content .entry-title, #content h1, #content h2, #content h3, #content h4, #content h5, #content h6{ color:<?php echo $mantra_headtextcolor; ?> ;}<?php }
?><?php if ($mantra_headtexthover != "000000") { ?> #content .entry-title a:hover { color:<?php echo $mantra_headtexthover; ?> ;}<?php }
?><?php if ($mantra_sideheadbackcolor != "444444") { ?> .widget-title { background-color:<?php echo $mantra_sideheadbackcolor; ?> ;}<?php }
?><?php if ($mantra_sideheadtextcolor != "2EA5FD") { ?> .widget-title { color:<?php echo $mantra_sideheadtextcolor; ?>  ;}<?php }

?><?php if (1) { ?> #footer-widget-area .widget-title { color:<?php echo $mantra_footerheader; ?> ;}<?php }
?><?php if (1) { ?> #footer-widget-area a { color:<?php echo $mantra_footertext; ?>  ;}<?php }
?><?php if (1) { ?> #footer-widget-area a:hover { color:<?php echo $mantra_footerhover; ?>  ;}<?php }

?><?php if ($mantra_pin != "Pin2") { ?> #content .wp-caption { background-image:url(<?php echo get_template_directory_uri()."/images/pins/".$mantra_pin; ?>.png)  ;} <?php }
?><?php if ($mantra_sidebullet != "arrow_white") { ?>.widget-area ul ul li{ background-image:url(<?php echo get_template_directory_uri()."/images/bullets/".$mantra_sidebullet; ?>.png);
<?php if($mantra_sidebullet == "folder_black" || $mantra_sidebullet == "folder_light") {?> padding-top:5px;padding-left:20px; } <?php } ?><?php }

?><?php if ($mantra_pagetitle == "Hide") { ?> .page h1.entry-title, .home .page h2.entry-title { display:none;} <?php }
?><?php if ($mantra_categtitle == "Hide") { ?> h1.page-title { display:none;} <?php }
?><?php if (($mantra_postdate == "Hide" && $mantra_postcateg == "Hide") || ($mantra_postauthor == "Hide" && $mantra_postcateg == "Hide") ) { ?>.bl_sep {display:none;} <?php }
?><?php if ($mantra_postdate == "Hide") { ?> span.entry-date, span.onDate {display:none;} <?php }
?><?php if ($mantra_postauthor == "Hide") { ?> .author {display:none;} <?php }
?><?php if ($mantra_postcateg == "Hide") { ?> span.bl_categ {display:none;} <?php }
?><?php if ($mantra_posttag == "Hide") { ?> span.bl_posted {display:none;} <?php }
?><?php if ($mantra_postbook == "Hide") { ?>  span.bl_bookmark {display:none;} <?php }
?><?php if ($mantra_parindent != "0px") { ?>  p {text-indent:<?php echo $mantra_parindent;?> ;} <?php }
?><?php if ($mantra_posttime == "Hide") { ?>  .entry-time {display:none;} <?php } ?>
</style>

<?php  } 

// Mantra function for inseting into the header the Custom Css field in the theme options
 
function mantra_customcss() {
$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {
     ${"$key"} = esc_attr($value) ; }

if ($mantra_customcss != "") { echo '<style>'.$mantra_customcss.'</style>';}
							}
?>

