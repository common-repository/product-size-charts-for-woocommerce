<?php

if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}

/************************This function create custom post type******************************/
function phoen_size_chart_fw_setting()
	{
			$labels = array(
					'name' => 'Size Charts',
					'singular_name' => 'Size',
					'add_new' => 'Add Size Chart',
					'add_new_item' => 'Add  Size Charts',
					'edit' => 'Edit',
					'edit_item' => 'Edit Size Charts',
					'new_item' => 'New Size charts',
					'view' => 'View',
					'search_items' => 'Search Size chart',
					'not_found' => 'No Size Charts found',
					'not_found_in_trash' => 'No Size chart found in Trash',   
				);
	 
			
			$args = array(
					'labels'                    => $labels,
					'public'                    => true,
					'show_ui'                   => true,
					'menu_position'             => 10,
					'menu_icon'					=> esc_url(PHOEN_SIZECHART_PLUGURL.'assets/images/phoenixx.png'),
					'exclude_from_search'       => true,
					'capability_type'           => 'post',
					'map_meta_cap'              => true,
					'rewrite'                   => true,
					'has_archive'               => true,
					'hierarchical'              => false,
					'show_in_nav_menus'         => false,               
					'supports'                  => array('title'),
					
				);
				
				
	   
		register_post_type('phoen_size_chart', $args);
		
		$args =array(
					'labels'	=> 'Chart Options',
					'pages'		=>'phoen_size_chart',
					'context'  => 'normal',
					'priority' => 'default',
					'id'	   =>'phoen_size_chart_option'
		);
		
	}
				

	add_action( 'add_meta_boxes', 'phoen_size_chart_register_table_metabox');

/****************This function resgiter the meta box********************/
	function phoen_size_chart_register_table_metabox()
	{
		   add_meta_box('phoen_size_chart1','Chart Options','phoen_size_chart_add_product_metabox','phoen_size_chart', 'normal','low'); 
		   add_meta_box('phoen_size_chart', 'Create Your Size Chart',  'phoen_size_chart_add_size_chart_metaboxes', 'phoen_size_chart','normal','high');  
		   
		   
	}
	
	/*
	***	
	This function create product meta box 
	***
	*/
	function phoen_size_chart_add_product_metabox($post)
	{
		global $post;
		$prod_args = array(
					'posts_per_page'    => -1,
					'post_type'         => 'product',
					'post_status'       => 'publish',
					'orderby'           => 'title',
					'order'             => 'ASC',
				);
				$products = get_posts( $prod_args );
				$data = get_post_meta($post->ID, 'phoen_metaboxes_product');
			require_once(dirname(__FILE__).'/templates/meta_product.php');
	}

/****************** This function create chart sheet metabox **************************/
	function phoen_size_chart_add_size_chart_metaboxes($post)
	{
		
		$phoen_chart_table_meta=isset($phoen_chart_table_meta)?$phoen_chart_table_meta:'';
		
		global $post;
		$args = array(
					'phoen_chart_table'        => $phoen_chart_table_meta
				);
		$phoen_chart_table_meta = get_post_meta( $post->ID, 'phoen_chart_table', true) ? get_post_meta( $post->ID, 'phoen_chart_table', true) : '[[""]]';
		
		require_once(dirname(__FILE__).'/templates/meta_table.php');
		
	}
/*************************This function save metadata ****************************/
	 function phoen_size_chart_metabox_data_save($post_id)
	 {
		 
		if ( !empty( $_POST[ 'phoen_chart_table' ] ) ){
					
					
					$phoen_chart_table_meta = isset($_POST[ 'phoen_chart_table' ])?sanitize_text_field($_POST[ 'phoen_chart_table' ]):'';
					
					$chat_option = isset($_POST['phoen_metaboxes_product'])?sanitize_text_field($_POST['phoen_metaboxes_product']):'';
					
					update_post_meta( $post_id, 'phoen_chart_table', $phoen_chart_table_meta );
					
					update_post_meta( $post_id, 'phoen_metaboxes_product', $chat_option);
				}
	 }
	 
	 /******** This function add settting sub menu in admin *******/
	 function phoen_add_sc_custom_menu()
	 {
		add_submenu_page('edit.php?post_type=phoen_size_chart', 'siz_chart_setting', 'Settings', 'manage_options', 'phoen_sc', 'phoen_size_chart_settings' );

	 }
	
	/**************This function show general and premium setting *****************/
	function phoen_size_chart_settings()
	{
		require_once(dirname(__FILE__).'/size-chart-general-settings.php');
		
	}
?>