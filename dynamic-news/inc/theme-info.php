<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 */


// Add Theme Info page to admin menu
add_action('admin_menu', 'dynamicnews_add_theme_info_page');
function dynamicnews_add_theme_info_page() {
	
	add_theme_page( 
		__('Welcome to Dynamic News', 'dynamicnews'), 
		__('Theme Info', 'dynamicnews'), 
		'edit_theme_options', 
		'dynamicnews', 
		'dynamicnews_display_theme_info_page'
	);
	
}


// Display Theme Info page
function dynamicnews_display_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme_data = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( __( 'Welcome to %1s %2s', 'dynamicnews' ), $theme_data->Name, $theme_data->Version ); ?></h1>

		<div class="theme-description"><?php echo $theme_data->Description; ?></div>
		
		<hr>
		<div class="important-links clearfix">
			<p><strong><?php _e('Important Links:', 'dynamicnews'); ?></strong>
				<a href="http://themezee.com/themes/dynamicnews/" target="_blank"><?php _e('Theme Info Page', 'dynamicnews'); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php _e('Changelog', 'dynamicnews'); ?></a>
				<a href="http://preview.themezee.com/dynamicnews/" target="_blank"><?php _e('Theme Demo', 'dynamicnews'); ?></a>
				<a href="http://themezee.com/docs/dynamicnews-documentation/" target="_blank"><?php _e('Theme Documentation', 'dynamicnews'); ?></a>
				
				<span class="social-icons">
					<a href="http://themezee.com/newsletter/" target="_blank"><span class="genericon-mail"></span></a>
					<a href="https://www.facebook.com/ThemeZee" target="_blank"><span class="genericon-facebook"></span></a>
					<a href="https://twitter.com/ThemeZee" target="_blank"><span class="genericon-twitter"></a>
				</span>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
				
					<h3><?php printf( __( 'Getting Started with %s', 'dynamicnews' ), $theme_data->Name ); ?></h3>
						
					<div class="section">
						<h4><?php _e( 'Theme Documentation', 'dynamicnews' ); ?></h4>
						
						<p class="about"><?php _e( 'Need any help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'dynamicnews' ); ?></p>
						<p>
							<a href="http://themezee.com/docs/dynamicnews-documentation/" target="_blank" class="button button-secondary"><?php _e('Visit Dynamic News Documentation', 'dynamicnews'); ?></a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php _e( 'Theme Options', 'dynamicnews' ); ?></h4>
						
						<p class="about"><?php _e( 'Dynamic News supports the awesome Theme Customizer for all theme settings. Click "Customize Theme" to open the Customizer now.', 'dynamicnews' ); ?></p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary">Customize Theme</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( __( 'Dynamic News is proudly brought to you by %1s.', 'dynamicnews' ), 
				'<a target="_blank" href="http://themezee.com" title="ThemeZee">ThemeZee</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


// Add CSS for Theme Info Panel
add_action('admin_enqueue_scripts', 'dynamicnews_theme_info_page_css');
function dynamicnews_theme_info_page_css() { 
	
	// Load styles and scripts only on themezee page
	if ( isset($_GET['page']) and $_GET['page'] == 'dynamicnews' ) :
		
		// Embed theme info css style
		wp_enqueue_style('dynamicnews-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');
		
		// Register Genericons
		wp_enqueue_style('dynamicnews-genericons', get_template_directory_uri() . '/css/genericons.css');
		
	endif;
}


?>