<?php
/** 
Plugin Name: Product Size charts for Woocommerce 
Plugin URI: https://www.phoeniixx.com/product/product-size-charts-for-woocommerce/
Description: This Plugin lets you display size charts on product pages, so that your customers are facilitated in selecting the right size for the item.
Author: phoeniixx
Author URI: http://www.phoeniixx.com
Version: 3.0
Text Domain:phoen-size-chart
WC requires at least: 2.6.0
WC tested up to: 3.9.0
**/
if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{
	
	include(dirname(__FILE__).'/libs/execute-libs.php');
	
	define('PHOEN_SIZECHART_PLUGURL',plugins_url(  "/", __FILE__));
	
	add_action('admin_enqueue_scripts', 'phoen_size_chart_style'); 
	
	add_action('wp_enqueue_scripts', 'phoen_sc_frontend_style'); 
	
	add_action('init', 'phoen_size_chart_fw_setting');
	
	add_action('save_post','phoen_size_chart_metabox_data_save');
	
	if(get_option('size_chart_chekbox')!='')
	{
		add_filter( 'woocommerce_product_tabs', 'phoen_size_chart_frontend_tabs' );
	}
	
	add_action('admin_menu', 'phoen_add_sc_custom_menu');
	
	include(dirname(__FILE__).'/size_chart_admin.php');
	
	register_activation_hook( __FILE__, 'phoen_size_chart_activate' );
	
	function phoen_size_chart_activate()
	{
		$phoen_size_chart = get_option('size_chart_chekbox');
		
		if($phoen_size_chart == ''){
			
			update_option('size_chart_chekbox', 'enable');	
		
		}
	}
	
	function phoen_size_chart_style()
	{
		wp_enqueue_style( 'style-size_chart', PHOEN_SIZECHART_PLUGURL.'assets/css/size_chart.css' );
		
		wp_enqueue_script( 'script-size-chart-request', PHOEN_SIZECHART_PLUGURL.'assets/js/sc_metabox.js', array( 'jquery' ));
		
	}
	
	function phoen_sc_frontend_style ()
	{
		wp_enqueue_style( 'style-size_chart', PHOEN_SIZECHART_PLUGURL.'assets/css/size_chart.css' );
		
	}

	function phoen_size_chart_frontend_tabs($phoen_chart_tabs)
	{
		global $post;

		$custom_post_args = array(
									'post_per_page' => -1,
									'post_type'     => 'phoen_size_chart',
									'post_status'   => 'publish',
									'meta_key'      => 'phoen_metaboxes_product',
									'meta_value'    => $post->ID
								);

		$phoen_size_chart = get_posts( $custom_post_args );

		if ( count( $phoen_size_chart ) > 0 ) 
		{
			foreach ( $phoen_size_chart as $chart ) {
				
				$phoen_chart_tabs[ 'phoen-wcpsc-tab-' . $chart->post_name ] = array(
					
					'title'         => $chart->post_title,
					
					'priority'      => 80,
					
					'callback'      => 'phoen_size_chart_frontend_tab_content',
					
					'phoen_size_chart_id' => $chart->ID
				);
			}
		}

		return apply_filters( 'phoen_size_chart_tabs', $phoen_chart_tabs, $post->ID);

	}
	
	function phoen_size_chart_frontend_tab_content ($phoen_size_chart_key, $phoen_size_chart_tab)
	{
		if ( !isset( $phoen_size_chart_tab[ 'phoen_size_chart_id' ] ) )
             
			return;
		
		$phoen_chart_id = $phoen_size_chart_tab[ 'phoen_size_chart_id' ];
		
		$phoen_chart_table_meta = get_post_meta( $phoen_chart_id, 'phoen_chart_table', true );
		
		include(dirname(__FILE__).'/templates/product.php');
		
	}
	
	
}
?>
