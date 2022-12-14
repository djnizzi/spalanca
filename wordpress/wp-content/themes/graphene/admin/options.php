<?php global $graphene_settings;
/**
 * Register the settings for the theme. This is required for using the
 * WordPress Settings API.
*/
function graphene_settings_init(){
    // register options set and store it in graphene_settings db entry
	register_setting( 'graphene_options', 'graphene_settings', 'graphene_settings_validator' );
}
add_action( 'admin_init', 'graphene_settings_init' );


/**
 * This function generates the theme's options page in WordPress administration.
 *
 * @package Graphene
 * @since Graphene 1.0
*/
function graphene_options(){
	
	global $graphene_settings, $graphene_defaults;
	
	/* Checks if the form has just been submitted */
	if ( ! isset( $_REQUEST['settings-updated'] ) ) { $_REQUEST['settings-updated'] = false; } 
        
	/* Apply options preset if submitted */ 
	if ( isset( $_POST['graphene_preset'] ) ) {
		include( $graphene_settings['template_dir'] . '/admin/options-presets.php' );
	}
	
	/* Import the graphene theme options */
	if ( isset( $_POST['graphene_import'] ) ) { 
		graphene_import_form();
		return;
	}
	
	/* Import/export the colour presets */
	if ( isset( $_GET['colour_preset'] ) ) { 
		if ( $_GET['colour_preset'] == 'import' ) graphene_import_colour_presets();
		if ( $_GET['colour_preset'] == 'export' ) graphene_export_colour_presets();
		return;
	}
	
	if ( isset( $_POST['graphene_import_confirmed'] ) ) {            
		graphene_import_file();
		return;                           
	}
        
        /* Uninstall the theme if confirmed */
	if ( isset( $_POST['graphene_uninstall_confirmed'] ) ) { 
		include( $graphene_settings['template_dir'] . '/admin/uninstall.php' );
	}       
	
	/* Display a confirmation page to uninstall the theme */
	if ( isset( $_POST['graphene_uninstall'] ) ) { 
	?>

		<div class="wrap">
        <div class="icon32" id="icon-themes"><br /></div>
        <h2><?php _e( 'Uninstall Graphene', 'graphene' ); ?></h2>
        <p><?php _e("Please confirm that you would like to uninstall the Graphene theme. All of the theme's options in the database will be deleted.", 'graphene' ); ?></p>
        <p><?php _e( 'This action is not reversible.', 'graphene' ); ?></p>
        <form action="" method="post">
        	<?php wp_nonce_field( 'graphene-uninstall', 'graphene-uninstall' ); ?>
        	<input type="hidden" name="graphene_uninstall_confirmed" value="true" />
            <input type="submit" class="button graphene_uninstall" value="<?php _e( 'Uninstall Theme', 'graphene' ); ?>" />
        </form>
        </div>
        
		<?php
		return;
	}
	
	/* Get the updated settings before outputting the options page */
	$graphene_settings = graphene_get_settings();
	
	/* This where we start outputting the options page */ ?>
	<div class="wrap meta-box-sortables">
		<div class="icon32" id="icon-themes"><br /></div>
        <h2><?php _e( 'Graphene Theme Options', 'graphene' ); ?></h2>
        
        <p><?php _e( 'These are the global settings for the theme. You may override some of the settings in individual posts and pages.', 'graphene' ); ?></p>
        
		<?php settings_errors( 'graphene_options' ); ?>        
        
        <?php /* Print the options tabs */ ?>
        <?php 
            if ( $_GET['page'] == 'graphene_options' ) :
                $tabs = array(
                    'general' => __( 'General', 'graphene' ),
                    'display' => __( 'Display', 'graphene' ),
					'colours' => __( 'Colours', 'graphene' ),
                    'advanced' => __( 'Advanced', 'graphene' ),
                    );
                $current_tab = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : 'general';
                graphene_options_tabs( $current_tab, $tabs );
            endif;
        ?>
        
        <div class="left-wrap">
        
        <?php /* Begin the main form */ ?>
        <form method="post" action="options.php" class="mainform clearfix" id="graphene-options-form">
		
            <?php /* Output wordpress hidden form fields, e.g. nonce etc. */ ?>
            <?php settings_fields( 'graphene_options' ); ?>
        
            <?php /* Display the current tab */ ?>
            <?php graphene_options_tabs_content( $current_tab ); ?>    
            
            <?php /* The form submit button */ ?>
            <p class="submit"><input type="submit" class="button-primary" id="graphene-save-options" value="<?php _e( 'Save Options', 'graphene' ); ?>" /></p>
        
        <?php /* Close the main form */ ?>
        </form>
        
        <div class="graphene-ajax-response"></div>
        
        </div><!-- #left-wrap -->
        
        <div class="side-wrap">
        
        <?php /* Help notice */ ?>
        <div class="postbox no-toggle">
            <div>
        		<h3 class="hndle"><?php _e( 'Need help?', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <ul>
                	<li><a href="http://docs.graphene-theme.com/"><?php _e( 'Documentation Wiki', 'graphene' ); ?></a></li>
                    <li><a href="http://www.graphene-theme.com/graphene-theme/help-and-support/"><?php _e( 'Support Forum', 'graphene' ); ?></a></li>
                </ul>
                <p><?php printf( __( 'Also, find out how you can %s.', 'graphene' ), '<a href="http://docs.graphene-theme.com/Ways_to_contribute">' . __( 'support the Graphene theme', 'graphene' ) . '</a>' ); ?></p>
            </div>
        </div>
        
        <?php /* PayPal's donation button */ ?>
        <div class="postbox no-toggle">
            <div>
        		<h3 class="hndle"><?php _e( 'Support the developer', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e( 'Developing this awesome theme took a lot of effort and time, months and months of continuous voluntary unpaid work. If you like this theme or if you are using it for commercial websites, please consider a donation to the developer to help support future updates and development.', 'graphene' ); ?></p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="CBWQL2T6B797J">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>
        </div>
        
        
        <?php /* Graphene theme news RSS feed */ ?>
        <div class="postbox graphene-news no-toggle">
            <div>
        		<h3 class="hndle"><?php _e( 'Graphene Theme news', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <?php
				$graphene_news = fetch_feed( array( 'http://www.khairul-syahir.com/topics/tag/graphene-theme/feed', 'http://www.graphene-theme.com/feed/' ) );
				if ( ! is_wp_error( $graphene_news ) ) {
					$maxitems = $graphene_news->get_item_quantity( 3 );
					$news_items = $graphene_news->get_items( 0, $maxitems );
				}
				?>
                <ol class="graphene-news-list">
                	<?php if ( $maxitems == 0 ) : echo '<li>' . __( 'No news items.', 'graphene' ) . '</li>'; else :
                	foreach( $news_items as $news_item ) : ?>
                    	<li>
                        	<a href='<?php echo esc_url( $news_item->get_permalink() ); ?>'><?php echo esc_html( $news_item->get_title() ); ?></a><br />
                            <?php echo esc_html( graphene_truncate_words( strip_tags( $news_item->get_description() ), 20, ' [...]' ) ); ?><br />
                            <span class="news-item-date"><?php echo 'Posted on '. $news_item->get_date( 'j F Y, g:i a' ); ?></span>
                        </li>
                    <?php endforeach; endif; ?>
                </ol>
            </div>
        </div>
        
        
        <?php /* Survey notification */ ?>
        <!--
        <div class="postbox donation">
            <div>
        		<h3 class="hndle"><?php _e( 'Graphene Usage Survey', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e( 'Help us to get to know you better. Take the Graphene theme usage survey now! Every opinion counts towards making the theme better. The survey is very short, and is completely anonymous.', 'graphene' ); ?></p>
                <p><a href="http://www.surveymonkey.com/s/WKJ7SQD" class="button"><?php _e( 'Take the survey', 'graphene' ); ?> &raquo;</a></p>
            </div>
        </div>
        -->
        
        
        <?php /* Natively supported plugins */ ?>
        <div class="postbox no-toggle">
        	<div>
                <h3 class="hndle"><?php _e( 'Add-ons and plugins', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
            	<h4><?php _e( 'Add-ons', 'graphene' ); ?></h4>
            	<p><?php _e( 'Add-ons are not shipped with the theme, but can be installed separately to extend the theme\'s capability.', 'graphene' ); ?></p>
                <ul class="add-ons">
                	<li>
                    	<span class="title">Graphene Mobile Neo: </span>
                        <?php if ( function_exists( 'gmneo_setup' ) ) : ?><span class="activated"><?php _e( 'Installed', 'graphene' ); ?></span>
                        <?php else : ?><span class="not-active"><?php _e( 'Not installed', 'graphene' ); ?>. <a href="http://www.graphene-theme.com/graphene-mobile-neo/features-and-functionalities/"><?php _e( 'Learn more', 'graphene' ); ?> &raquo;</a></span><?php endif; ?><br />
                        <span class="description"><?php _e( 'The new premium mobile theme that fuses elegant design with premium features. It\'s a match of pixel-perfection and code-devilry.', 'graphene' ); ?></span>
                    </li>
                	<li>
                    	<span class="title">Graphene Mobile: </span>
                        <?php if (function_exists( 'mgraphene_options_init' ) ) : ?><span class="activated"><?php _e( 'Installed', 'graphene' ); ?></span>
                        <?php else : ?><span class="not-active"><?php _e( 'Not installed', 'graphene' ); ?>. <a href="http://www.graphene-theme.com/graphene-mobile/features-and-functionalities/"><?php _e( 'Learn more', 'graphene' ); ?> &raquo;</a></span><?php endif; ?><br />
                        <span class="description"><?php _e( 'Mobile extension developed specifically for optimised display of your site on mobile devices, such as iPhone and Android devices.', 'graphene' ); ?></span>
                    </li>
                </ul>
                
                <h4><?php _e( 'Plugins', 'graphene' ); ?></h4>
                <p><?php _e( 'The plugins listed here are natively supported by the theme. All you need to do is install the plugins and activate them.', 'graphene' ); ?></p>
                <ul class="add-ons native-plugins">
                	<?php 
						$plugins = array(
										array( 'name' => 'Ultimate TinyMCE', 'function' => '', 'class' => 'jwl_metabox_admin' ),
										array( 'name' => 'WP-PageNavi', 'function' => 'wp_pagenavi', 'class' => '' ),
										array( 'name' => 'WP-CommentNavi', 'function' => 'wp_commentnavi', 'class' => '' ),
										array( 'name' => 'WP-Email', 'function' => 'wp_email', 'class' => '' ),
										array( 'name' => 'Breadcrumb NavXT', 'function' => 'bcn_display', 'class' => '' ),
									);
						foreach ( $plugins as $plugin) :
					?>
                	<li>
                    	<span class="title"><?php echo $plugin['name']; ?>: </span>
                        <?php if (function_exists( $plugin['function'] ) || class_exists( $plugin['class'] ) ) : ?><span class="activated"><?php _e( 'Activated', 'graphene' ); ?></span>
                        <?php else : ?><span class="not-active"><?php _e( 'Not installed', 'graphene' ); ?></span><?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
            
        
        <?php /* Options Presets. This uses separate form than the main form */ ?>
        <div class="postbox preset non-essential-option">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
                <h3 class="hndle"><?php _e( 'Options Presets', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e("The default settings for the theme is preconfigured for use in blogs. If you're using this theme primarily for a normal website, or if you want to reset the settings to their default values, you can apply one of the available options presets below.", 'graphene' ); ?></p>
                <p><?php _e("Note that you can still configure the individual settings after you apply any preset.", 'graphene' ); ?></p>
                <form action="" method="post">
                    <?php wp_nonce_field( 'graphene-preset', 'graphene-preset' ); ?>
                	<table class="form-table">
                        <tr>
                            <th scope="row" style="width: 140px;"><?php _e( 'Select Options Preset', 'graphene' ); ?></th>
                            <td class="options-cat-list">
                                <input type="radio" name="graphene_options_preset" value="website" id="graphene_options_preset-website" />
                                <label for="graphene_options_preset-website"><?php _e( 'Normal website', 'graphene' ); ?></label>
                                <br />                                
                                <input type="radio" name="graphene_options_preset" value="reset" id="graphene_options_preset-reset" />
                                <label for="graphene_options_preset-reset"><?php _e( 'Reset to default settings', 'graphene' ); ?></label>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="graphene_preset" value="true" />
                    <input type="submit" class="button graphene_preset" value="<?php _e( 'Apply Options Preset', 'graphene' ); ?>" />
                </form>
            </div>
        </div>
        
        
        <?php /* Theme import/export */ ?>    
        <div class="postbox non-essential-option">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e( 'Import/export theme options', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><strong><?php _e( 'Import', 'graphene' ); ?></strong></p>    
                <form action="" method="post">
                    <input type="hidden" name="graphene_import" value="true" />
                    <input type="submit" class="button" value="<?php _e( 'Import Theme options', 'graphene' ); ?>" />
                </form> <br />
                <p><strong><?php _e( 'Export', 'graphene' ); ?></strong></p>                
                <form action="" method="post">
                	<?php wp_nonce_field( 'graphene-export', 'graphene-export' ); ?>
                    <input type="hidden" name="graphene_export" value="true" />
                    <input type="submit" class="button" value="<?php _e( 'Export Theme options', 'graphene' ); ?>" />
                </form>              
            </div>
        </div>
            
        
        <?php /* Theme's uninstall */ ?>
        <div class="postbox non-essential-option">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e( 'Uninstall theme', 'graphene' ); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e("<strong>Be careful!</strong> Uninstalling the theme will remove all of the theme's options from the database. Do this only if you decide not to use the theme anymore.",'graphene' ); ?></p>
                <p><?php _e( 'If you just want to try another theme, there is no need to uninstall this theme. Simply activate the other theme in the Appearance &gt; Themes admin page.','graphene' ); ?></p>
                <p><?php _e("Note that uninstalling this theme <strong>does not remove</strong> the theme's files. To delete the files after you have uninstalled this theme, go to Appearances &gt; Themes and delete the theme from there.",'graphene' ); ?></p>
                <form action="" method="post">
                    <?php wp_nonce_field( 'graphene-options', 'graphene-options' ); ?>
                
                    <input type="hidden" name="graphene_uninstall" value="true" />
                    <input type="submit" class="button graphene_uninstall" value="<?php _e( 'Uninstall Theme', 'graphene' ); ?>" />
                </form>
            </div>
        </div>
            
            
         </div><!-- #side-wrap -->   
         
         <?php if ( $graphene_settings['enable_preview'] == true) : ?>
         <div class="clear"></div>
         <div class="icon32" id="icon-themes"><br /></div>
         <h2><?php _e( 'Preview', 'graphene' ); ?></h2>
         <p><?php _e( 'The preview will be updated when the "Save Options" button above is clicked.', 'graphene' ); ?></p>
         <iframe src="<?php echo home_url( '?preview=true' ); ?>" width="95%" height="600" ></iframe>
         <?php endif; ?>
    </div><!-- #wrap -->
    
    
<?php    
} // Closes the graphene_options() function definition 

include( $graphene_settings['template_dir'] . '/admin/options-import.php' );