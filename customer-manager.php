<?php
/*
	Plugin Name: Customer Manager
	Version: 0.3
	Plugin URI: http://www.webtechglobal.co.uk/wordpress-customer-manager
	Description: Customer Manager plugin for Wordpress is a professional tool for providing after sale support and increasing your effeciancy
	Author: Ryan Bayne
	Author URI: http://www.webtechglobal.co.uk/blog/wordpress/wordpress-customer-manager
*/

global $wpdb;

ini_set('display_errors',1);
error_reporting(E_ALL);

// fix for mac users
ini_set('auto_detect_line_endings', 1);

function eci_downloadrequest() 
{
	if( isset( $_GET['86523542135'] ) )
	{ 
		$wcm = get_option('wcm_optionsarray');
 		
		// check if code exists in array
		if( isset( $wcm['downloadcodes'][$_GET['86523542135']] ) )
		{
			global $current_user;
			get_currentuserinfo();
			
			// check if visitor is logged in and user id matches arrays user id
			if( $wcm['downloadcodes'][$_GET['86523542135']]['userid'] == $current_user->ID )
			{
				// now check if url is expired
				$timelimit = $wcm['downloadcodes'][$_GET['86523542135']]['time'] + (10 * 60);
	
				if( time() < $timelimit )
				{		
					global $wpdb;
		
					$location = get_bloginfo( 'url' ) . '/wp-content/' . $wcm['settings']['digitaldownload']['directory'] .'/' . $wcm['downloadcodes'][$_GET['86523542135']]['productfile'] ;
					header("HTTP/1.1 301 Moved Permanently");
					header("Location: " . $location);
					header("Connection: close");
				}	
				else
				{
					// expired
				}
			}
			else
			{
				// no match do not allow download
			}
		}
		else
		{
			// passed code does not exist in array
		}
	}// end of if isset download request
}
add_action('status_header', 'eci_downloadrequest');

function wcm_pluginintigrationcheck()
{
	global $current_user;
	get_currentuserinfo();
	
	if( $current_user->user_level == 10 )// user is admin
	{
		include_once('functions/wcm_functions_global.php');
		$wcm_optionsarray = get_option('wcm_optionsarray');
		if( $wcm_optionsarray['estore']['intigrated'] == true ){  wcm_importestore();	}
	}
}add_action('admin_head', 'wcm_pluginintigrationcheck',0);// add action for checking external plugin intigration

// import css file for plugin only
function wcm_wysiwygeditor() 
{
	wp_enqueue_script( 'common' );
	wp_enqueue_script( 'jquery-color' );
	wp_print_scripts('editor');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	if (function_exists('wp_tiny_mce')) wp_tiny_mce();
	wp_admin_css();
	wp_enqueue_script('utils');
	do_action("admin_print_styles-post-php");
	do_action('admin_print_styles');
}add_action('admin_head', 'wcm_wysiwygeditor');

// plugin activation and installation hook then functions
function wcm_install()
{	// state 0 is first time installation - passing 1 indicates uninstall then reinstall - passing 2 indicates uninstall only
	include('wcm_installation.php');
	wcm_databaseinstallation(0);
	wcm_blogpreperation(0);
}register_activation_hook(__FILE__,'wcm_install');

// plugin admin pages
function wcm_add_pages() 
{
	// admin only pages first
	add_menu_page('My Support', 'My Support', 0, __FILE__, 'wmc_homeadmin');// page dynically changed depending on logged in user authorisation
    add_submenu_page(__FILE__, 'Settings (Admin)', 'Settings (Admin)', 8, 'wcm_settingsadmin', 'wcm_settingspage');
    add_submenu_page(__FILE__, 'Products (Admin)', 'Products (Admin)', 8, 'wcm_productsadmin', 'wcm_sublevel_page2');
    add_submenu_page(__FILE__, 'Contact (Admin)', 'Contact (Admin)', 8, 'wcm_contactadmin', 'wcm_sublevel_page3');
    add_submenu_page(__FILE__, 'Finance (Admin)', 'Finance (Admin)', 8, 'wcm_financeadmin', 'wcm_sublevel_page4');
    add_submenu_page(__FILE__, 'Tickets (Admin)', 'Tickets (Admin)', 8, 'wcm_ticketsadmin', 'wcm_sublevel_page5');
    add_submenu_page(__FILE__, 'FAQ (Admin)', 'FAQ (Admin)', 8, 'wcm_faqadmin', 'wcm_sublevel_page6');
    add_submenu_page(__FILE__, 'Tools (Admin)', 'Tools (Admin)', 8, 'wcm_toolsadmin', 'wcm_sublevel_page7');
    add_submenu_page(__FILE__, 'Rewards (Admin)', 'Rewards (Admin)', 8, 'wcm_rewardsadmin', 'wcm_sublevel_page8');
	
	// customer pages second
    add_submenu_page(__FILE__, 'My Preferences', 'My Preferences', 0, 'wcm_preferencescustomers', 'wcm_preferencespage');
    add_submenu_page(__FILE__, 'My Personal', 'My Personal', 0, 'wcm_personalcustomers', 'wcm_sublevel_customerpage1');
    add_submenu_page(__FILE__, 'My Help', 'My Help', 0, 'wcm_helpcustomers', 'wcm_sublevel_customerpage2');
    add_submenu_page(__FILE__, 'My Products', 'My Products', 0, 'wcm_productscustomers', 'wcm_sublevel_customerpage3');
    add_submenu_page(__FILE__, 'My Rewards', 'My Rewards', 0, 'wcm_rewardscustomers', 'wcm_sublevel_customerpage4');
	
	// set home page depending on logged in user
	global $current_user;
	
	get_currentuserinfo();// get current users information as form will display links for admin only

	function wcm_functions_files()
	{
		include_once('functions/wcm_functions_global.php');
		include_once('functions/wcm_functions_interface.php');
		include_once('functions/wcm_functions_processing.php');
	}
	
	if( $current_user->user_level == 10 )// if admin and not admin users own ticket page
	{
		function wmc_homeadmin() {global $wpdb;wcm_functions_files();require('wmc_adminhomepage.php');}
	}
	else// must be a customer or admin user wanting to view their own created tickets so display their tickets only
	{
		function wmc_homeadmin() {global $wpdb;wcm_functions_files();require('wmc_customerhomepage.php');}
	}
	
	// admin pages only first
	function wcm_settingspage(){global $wpdb;wcm_functions_files();require('wcm_settingspage.php');}
	function wcm_sublevel_page2(){global $wpdb;wcm_functions_files();require('wcm_products.php');}
	function wcm_sublevel_page3(){global $wpdb;wcm_functions_files();require('wcm_contact.php');}
	function wcm_sublevel_page4(){global $wpdb;wcm_functions_files();require('wcm_finance.php');}
	function wcm_sublevel_page5(){global $wpdb;wcm_functions_files();require('wcm_tickets.php');}
	function wcm_sublevel_page6(){global $wpdb;wcm_functions_files();require('wcm_faq.php');}
	function wcm_sublevel_page7(){global $wpdb;wcm_functions_files();require('wcm_tools.php');}
	function wcm_sublevel_page8(){global $wpdb;wcm_functions_files();require('wcm_rewards.php');}
	
	// customer pages second
	function wcm_preferencespage(){global $wpdb;wcm_functions_files();require('wcm_customerpreferences.php');}
	function wcm_sublevel_customerpage1(){global $wpdb;wcm_functions_files();require('wcm_customerpersonal.php');}
	function wcm_sublevel_customerpage2(){global $wpdb;wcm_functions_files();require('wcm_customerhelp.php');}
	function wcm_sublevel_customerpage3(){global $wpdb;wcm_functions_files();require('wcm_customerproducts.php');}
	function wcm_sublevel_customerpage4(){global $wpdb;wcm_functions_files();require('wcm_customerrewards.php');}
}add_action('admin_menu', 'wcm_add_pages',0);
?>
