<?php 
/**
 * @package WordPress
 * @subpackage Motion
 */
get_header(); ?>

<div id="main">
<div id="content">

<?php
    if(isset($_GET['author_name'])) :
        $curauth = get_userdatabylogin($author_name);
    else :
        $curauth = get_userdata(intval($author));
    endif;
?>

<h2 id="contentdesc">Entries by <span><?php echo $curauth->nickname; ?></span> &raquo;</h2>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
     
<div class="post" id="post-<?php the_ID(); ?>">
<div class="posttop">
<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="postmetatop">
<div class="categs">Filed Under: <?php the_category(', ') ?></div>
<div class="date"><span><?php the_time('M.d, Y') ?></span></div>
<div class="cleared"></div>
</div><!-- /postmetatop -->
</div><!-- /posttop -->
</div><!-- /post -->

<?php endwhile; ?>
<?php else : ?>
<div class="post">
<div class="posttop">
<h2 class="posttitle"><a href="#">Oops!</a></h2>
</div><!-- /posttop -->        
<div class="postcontent">
<p>What you are looking for doesn't seem to be on this page...</p>
</div><!-- /postcontent -->        
</div><!-- /post -->
<?php endif; ?>

<div id="navigation">
<?php if(function_exists('wp_pagenavi')) { ?>
<?php wp_pagenavi(); ?>
<?php }
else { ?>
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
<?php } ?><!-- end of pagenavi conditional statement -->
<div class="cleared"></div>
</div><!-- /navigation -->

</div><!-- /content -->

        
<?php get_sidebar(); ?>


</div><!-- /main --> 
<?php get_footer(); ?>

