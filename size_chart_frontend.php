<?php
/** 
Plugin Name: Product Size charts for Woocommerce 
Plugin URI: https://www.phoeniixx.com/product/product-size-charts-for-woocommerce/
Description: This Plugin lets you display size charts on product pages, so that your customers are facilitated in selecting the right size for the item.
Author: phoeniixx
Author URI: http://www.phoeniixx.com
Version: 2.1
**/
if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{
	add_action('admin_enqueue_scripts', 'phoen_size_chart_style'); 
	
	add_action('wp_enqueue_scripts', 'phoen_sc_frontend_style'); 
	
	add_action('init', 'phoen_wcsc_setting');
	
	add_action('save_post','phoen_metabox_table_save');
	
	if(get_option('size_chart_chekbox')!='')
	{
		add_filter( 'woocommerce_product_tabs', 'phoen_sc_product_tab' );
	}
	
	add_action('admin_menu', 'phoen_add_sc_custom_menu');
	
	register_activation_hook( __FILE__, 'phoen_size_chart_activate' );
	
	/************ include admin setting file **************/
	include(dirname(__FILE__).'/size_chart_admin.php');
	
	/****** This function activate the plugin setting ******/
	function phoen_size_chart_activate()
	{
		add_option('size_chart_chekbox', 'enable');
	}
	
	function phoen_size_chart_style()
	{
		wp_enqueue_style( 'style-size_chart', plugin_dir_url( __FILE__ ).'/css/size_chart.css' );
		
		wp_enqueue_script( 'script-size-chart-request', plugin_dir_url( __FILE__ ).'/js/sc_metabox.js', array( 'jquery' ));
		
	}
	
	function phoen_sc_frontend_style ()
	{
		wp_enqueue_style( 'style-size_chart', plugin_dir_url( __FILE__ ).'/css/size_chart.css' );
		
	}
	

/*********************** This function add tab particular product ************************/
	 function phoen_sc_product_tab($tabs)
	 {
		global $post;
		
		$args = array(
			'post_per_page' => -1,
			'post_type'     => 'phoen_size_chart',
			'post_status'   => 'publish',
			'meta_key'      => 'phoen_metaboxes_product',
			'meta_value'    => $post->ID
		);

		$charts = get_posts( $args );

		if ( count( $charts ) > 0 ) 
		{
			foreach ( $charts as $c ) {
				
				$tabs[ 'phoen-wcpsc-tab-' . $c->post_name ] = array(
					
					'title'         => $c->post_title,
					
					'priority'      => 99,
					
					'callback'      => 'phoen_sc_create_tab_content',
					
					'phoen_wcpsc_id' => $c->ID
				);
			}
		}
		
		return apply_filters( 'phoen_wcpsc_product_tabs', $tabs, $post->ID);
 
	 }
	 
	 /**************************** This function show tab content **********************************/
	function phoen_sc_create_tab_content ($key, $tab)
	{
		if ( !isset( $tab[ 'phoen_wcpsc_id' ] ) )
             
			return;
		
		$c_id = $tab[ 'phoen_wcpsc_id' ];
		
		$table_meta = get_post_meta( $c_id, '_table_meta', true );
		
		include(dirname(__FILE__).'/templates/product.php');
		
	}
	
	
}
?>
