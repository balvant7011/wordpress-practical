<?php
/**  
 * Plugin Name: WordPress Connect to Woocommerce
 * Description: This plugin will add a Custom post type and woocommerce product tab.
 * Plugin URI: https://developer.wordpress.org/
 * Version: 1.0
 * Author: Balvant WordPress Developer
 * Author URI: https://developer.wordpress.org/
 * Text Domain: wordpress-connect-to-woocommerce
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


define( 'TEMPLATEPATH', plugin_dir_path( __FILE__ ) );
define( 'TEMPLATEURL', plugins_url() );


include_once('classes/class-admin-custom-post-type.php');
include_once('classes/class-admin-add-product-tab.php');
include_once('classes/class-frontend-product-related-news.php');
include_once('classes/class-frontend-product-in-cart.php');


// Include the Class
new News_Custom_Post_Type();
new Add_Product_Tab_IN_Admin();
new Product_Related_News();
new News_Feature_Logo_in_Cart();

