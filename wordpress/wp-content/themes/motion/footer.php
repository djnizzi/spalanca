<?php
/**
 * @package WordPress
 * @subpackage Motion
 */
?>

<div id="footer">

<div class="foot1">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_left') ) : ?>   
<li>
<h3>NiZ on the web</h3>
<ul>
 <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>
</li>
<?php endif; ?>
</ul>
</div><!-- /foot1 -->

<div class="foot2">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_middle') ) : ?> 
<li>
<h3>Pages</h3>
<ul>
 <?php wp_list_pages('title_li='); ?>
</ul>
</li>
<?php endif; ?>
</ul>
</div><!-- /foot2 -->

<div class="foot3">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_right') ) : ?> 
<li>
<h3>Monthly archives</h3>
<ul>
 <?php wp_get_archives('type=monthly&limit=5'); ?>
</ul>
</li>
<?php endif; ?>
</ul>
</div><!-- /foot3 -->
     
<div class="cleared"></div>
</div><!-- /footer -->


<div id="credits">
<div id="creditsleft">
Powered by <a href="http://wordpress.org/extend/themes/" rel="generator">WordPress</a>. Theme: <a href="http://85ideas.com/public-releases/wordpress-theme-motion/">Motion</a> by <a href="http://85ideas.com/" rel="designer">85ideas</a> edited by NiZ. (c) 2010 spalanca productions
</div><!-- /creditsleft -->
        
<div id="creditsright">
<a href="#main">&#91; Back to top &#93;</a>
</div><!-- /creditsright -->
<div class="cleared"></div>
</div><!-- /credits -->

<?php wp_footer(); ?>
</div><!-- /wrapper -->

</body>
</html>
