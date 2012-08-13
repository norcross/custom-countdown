<?php

class customCountdown
{

	/**
	 * This is our constructor
	 *
	 * @return customCountdown
	 */
	public function __construct() {
		add_action 					( 'after_setup_theme',      array( $this, 'header_setup'	) );
		add_action					( 'admin_menu',				array( $this, 'ccd_settings'	) );
		add_action					( 'admin_init', 			array( $this, 'reg_settings'	) );
		add_action					( 'admin_enqueue_scripts',	array( $this, 'admin_scripts'	) );
		add_action					( 'wp_enqueue_scripts',		array( $this, 'front_scripts'	) );
		add_action					( 'wp_footer',				array( $this, 'footer_dates'	) );		
		add_filter					( 'admin_footer_text',		array( $this, 'ccd_footer'		) );
	}


	/**
	 * add custom header setup
	 *
	 * @return customCountdown
	 */


	public function header_setup() {

		$args = array(
			'flex-width'    => true,
			'width'         => 500,
			'flex-height'	=> true,
			'height'        => 80,
			'default-image' => get_template_directory_uri() . '/images/banner-default.png',
		);
		add_theme_support( 'custom-header', $args );

	}

	/**
	 * build out settings page
	 *
	 * @return customCountdown
	 */


	public function ccd_settings() {
	    add_submenu_page('themes.php', 'Countdown Options', 'Countdown Options', 'manage_options', 'custom-countdown', array( $this, 'ccd_setup_display' ));
	}

	/**
	 * Register settings
	 *
	 * @return customCountdown
	 */


	public function reg_settings() {
		register_setting( 'ccd_options', 'ccd_options');		

	}


	/**
	 * Display main options page structure
	 *
	 * @return customCountdown
	 */
	 
	public function ccd_setup_display() { ?>
	
		<div class="wrap">
    	<div class="icon32" id="icon-ccd"><br></div>
		<h2>Custom Countdown Settings</h2>
        
	        <div class="ccd_options">
            	<div class="ccd_form_text">

                </div>
                
                <div class="ccd_form_options">
	            <form method="post" action="options.php">
			    <?php
                settings_fields( 'ccd_options' );
				$ccd_options	= get_option('ccd_options');

				// make a default date 2 weeks from now
				$default_t	= time() + (14 * 24 * 60 * 60);
				$twoweeks	= date('m/d/Y', $default_t);

				$launch		= (isset($ccd_options['launch']) ? $ccd_options['launch'] : $twoweeks);

				?>
        
				<p>
					<label for="ccd_options[launch]">Launch Date</label>
					<input type="text" id="ccd_launch" name="ccd_options[launch]" class="timepicker" value="<?php echo $launch; ?>" />
                
                </p>
               
    
	    		<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
				</form>
                </div>
    
            </div>

        </div>    
	
	<?php }

	/**
	 * load scripts adn style for post or page editor
	 *
	 * @return customCountdown
	 */


	public function admin_scripts() {
		$current_screen = get_current_screen();
		if ( 'appearance_page_custom-countdown' == $current_screen->base ) {
			wp_enqueue_style( 'ccd-admin', get_bloginfo('stylesheet_directory').'/lib/css/ccd-admin.css', array(), null, 'all' );

			wp_enqueue_script( 'jquery-ui-core');
			wp_enqueue_script( 'jquery-ui-datepicker');
			wp_enqueue_script( 'ccd-admin', get_bloginfo('stylesheet_directory').'/lib/js/ccd.admin.js', array('jquery'), null, true );
		}
	}

	/**
	 * add attribution link
	 *
	 * @return customCountdown
	 */

	public function ccd_footer($text) {

			$text = '<span id="footer-thankyou">Custom Countdown build by <a href="http://andrewnorcross.com/" target="_blank">Andrew Norcross</a>.</span>';

		return $text;
	}

	/**
	 * load scripts for front end
	 *
	 * @return customCountdown
	 */


	public function front_scripts() {

    	wp_enqueue_script('countdown', get_bloginfo('stylesheet_directory').'/lib/js/jquery.countdown.js', array('jquery'), null, true);
    	wp_enqueue_script('ccd-init', get_bloginfo('stylesheet_directory').'/lib/js/ccd.init.js', array('jquery'), null, true);

	}

	/**
	 * store launch date for countdown
	 *
	 * @return customCountdown
	 */


	public function footer_dates() {

		// get the date saved
		$ccd_options	= get_option('ccd_options');
		$launch 		= $ccd_options['launch']; // jQuery stores milliseconds

		echo '<input type="hidden" id="ccd_launch" value="'.$launch.'">';

	}


/// end class
}


// Instantiate our class
$customCountdown = new customCountdown();
	
