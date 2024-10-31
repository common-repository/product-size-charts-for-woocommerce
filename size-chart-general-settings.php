<?php

if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}
if ( !current_user_can( 'manage_options' ) ){ die(); }
	
if ( ! empty( $_POST ) && check_admin_referer('phoen_size_chart_action', 'phoen_size_chart_nonce_field') ) {
	
	if(isset($_POST['update']))
	{
		$size_chart_chekbox = isset($_POST['size_chart_chekbox'])?sanitize_text_field($_POST['size_chart_chekbox']):'';
		
		update_option('size_chart_chekbox',$size_chart_chekbox);

	}
}
?>
<div id="profile-page" class="wrap">
			<?php
				
				$tab = isset($_GET['tab'])?sanitize_text_field( $_GET['tab'] ):'';
			?>
			<h2>
			<?php _e('Size Chart Plugin Options','phoen-size-chart') ;?>
			</h2>
			<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
				<a class="nav-tab <?php if($tab == 'general' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?post_type=phoen_size_chart&page=phoen_sc&amp;tab=general"><?php _e('General','phoen-size-chart') ;?></a>
				<a class="nav-tab <?php if($tab == 'premium'){ echo esc_html( "nav-tab-active" ); } ?>" href="?post_type=phoen_size_chart&page=phoen_sc&amp;tab=premium"><?php _e('Premium','phoen-size-chart') ;?></a>
				
			</h2>
		</div>
		<?php
		
        if($tab == 'general' || $tab == '')
		{
			
			?>
            <br/>
            	<div class="meta-box-sortables" id="normal-sortables">
				<div class="postbox " id="pho_wcpc_box">
			
						<div class="inside">
						<div class="pho_premium_box">

							<div class="column two">
								<!-----<h2>Get access to Pro Features</h2>----->

								<p><?php _e('Switch to the premium version of product size charts','phoen-size-chart') ;?></p>

									<div class="pho-upgrade-btn">
										<a href="https://www.phoeniixx.com/product/product-size-charts-for-woocommerce/" target="_blank"><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/premium-btn.png" /></a>
										<a target="blank" href="http://sizechart.phoeniixxdemo.com/product/ninja-silhouette/"><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/button2.png" /></a>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<style>
			.phoe_video_main {
					padding: 20px;
					text-align: center;
				}
				
			.phoe_video_main h3 {
					color: #02c277;
					font-size: 28px;
					font-weight: bolder;
					margin: 20px 0;
					text-transform: capitalize
					display: inline-block;
				}
			</style>
			
			<div class="phoe_video_main">
				<h3>How to set up plugin</h3> 
				<iframe width="800" height="360"src="https://www.youtube.com/embed/4YqEdZTTnrE" allowfullscreen></iframe>
			</div>
			
			<form method="post" action="">
				
				<?php wp_nonce_field( 'phoen_size_chart_action', 'phoen_size_chart_nonce_field' ); ?>
				<table class="form-table">
					<tbody>
						<tr>
							<th><label for="size_chart"><?php _e('Enable Size Chart Plugin','phoen-size-chart') ;?></label></th>
							<td><input type="checkbox" value="enable" <?php if(get_option('size_chart_chekbox')!=''){?> checked <?php }?> name="size_chart_chekbox"></td>
							
						</tr>
						<tr>
						<td colspan="2"><input type="submit" class="button button-primary" value="Save" name="update"></td>
						</tr>
					</tbody>
				</table>
			</form>
			<?php
			
		}
		elseif($tab == 'premium')
		{
		  
			
                ?>
                <style>
                .premium-box{ width:100%; height:auto; background:#fff;  }
                .premium-features{}
                .premium-heading{  color: #484747;font-size: 40px;padding-top: 35px;text-align: center;text-transform: uppercase;}
                .premium-features li{ width:100%; float:left;  padding: 80px 0; margin: 0; }
                .premium-features li .detail{ width:50%; }
                .premium-features li .img-box{ width:50%; }
                
                .premium-features li:nth-child(odd) { background:#f4f4f9; }
                .premium-features li:nth-child(odd) .detail{float:right; text-align:left; }
                .premium-features li:nth-child(odd) .detail .inner-detail{}
                .premium-features li:nth-child(odd) .detail p{ }
                .premium-features li:nth-child(odd) .img-box{ float:left; text-align:right;}
                
                .premium-features li:nth-child(even){  }
                .premium-features li:nth-child(even) .detail{ float:left; text-align:right;}
                .premium-features li:nth-child(even) .detail .inner-detail{ margin-right: 46px;}
                .premium-features li:nth-child(even) .detail p{ float:right;} 
                .premium-features li:nth-child(even) .img-box{ float:right;}
                
                .premium-features .detail{}
                .premium-features .detail h2{ color: #484747;  font-size: 24px; font-weight: 700; padding: 0;}
                .premium-features .detail p{  color: #484747;  font-size: 13px;  max-width: 327px;}
                /**images**/
                .pincode-check{ background:url(<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/global_tab_option.png); width:507px; height:313px; display:inline-block; margin-right: 25px; background-repeat:no-repeat;}
                
                .sat-sun-off{ background:url(<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/category_tab_option.png); width:441px; height:271px; display:inline-block; background-size:500px auto; margin-right:30px; background-repeat:no-repeat;}
                
                .bulk-upload{ background:url(<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/Product_Specific.png); width:510px; height:264px; display:inline-block; background-repeat:no-repeat;}
                
                .cod-verify{background:url(<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/tab_placement_option.png); width:510px; height:71px; display:inline-block; margin-right:30px; background-repeat:no-repeat;}
                
                .delivery-date{background:url(<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/add_shortcode.png); width:537px; height:266px; display:inline-block; background-repeat:no-repeat;}
                
                .advance-styling{background:url(<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/modify_default_tabs.png); width:485px; height:626px; display:inline-block; margin-right:30px; background-repeat:no-repeat;}
                
                
                /*upgrade css*/
                
                .upgrade{background:#f4f4f9;padding: 50px 0; width:100%; clear: both;}
                .upgrade .upgrade-box{ background-color: #808a97;
                    color: #fff;
                    margin: 0 auto;
                   min-height: 110px;
                    position: relative;
                    width: 60%;}
                
                .upgrade .upgrade-box p{ font-size: 15px;
                     padding: 19px 20px;
                    text-align: center;}
                
                .upgrade .upgrade-box a{background: none repeat scroll 0 0 #6cab3d;
                    border-color: #ff643f;
                    color: #fff;
                    display: inline-block;
                    font-size: 17px;
                    left: 50%;
                    margin-left: -150px;
                    outline: medium none;
                    padding: 11px 6px;
                    position: absolute;
                    text-align: center;
                    text-decoration: none;
                    top: 36%;
                    width: 277px;}
                
                .upgrade .upgrade-box a:hover{background: none repeat scroll 0 0 #72b93c;}
                
                .premium-vr{ text-transform:capitalize;} 
                .premium-box-head {
                    background: #eae8e7 none repeat scroll 0 0;
                    height: 500px;
                    text-align: center;
                    width: 100%;
                }
                .pho-upgrade-btn {
                    display: block;
                    text-align: center;
                }
                .pho-upgrade-btn a {
                    display: inline-block;
                    margin-top: 75px;
                }
                .main-heading {
                    background: #fff none repeat scroll 0 0;
                    margin-bottom: -70px;
                    text-align: center;
                }
                .main-heading img {
                    margin-top: -200px;
                }
                
                .premium-box-container {
                    margin: 0 auto;
                }
                .premium-box-container .description:nth-child(2n+1) {
                    background: #fff none repeat scroll 0 0;
                }
                .premium-box-container .description {
                    display: block;
                    padding: 35px 0;
                    text-align: center; position: relative;
                }
                
                .premium-box-container .pho-desc-head::after {
                    background: url("<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/head-arrow.png") no-repeat scroll 0 0;
                    content: "";
                    height: 98px;
                    position: absolute;
                    right: 140px;
                    top: 32px;
                    width: 69px;
                }
                
                .pho-plugin-content {
                    margin: 0 auto;
                    overflow: hidden;
                    width: 768px;
                }
                .premium-box-container .description:nth-child(2n+1) .pho-img-bg {
                    background: #f1f1f1 url("<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/image-frame-odd.png") no-repeat scroll 100% top;
                }
                .description .pho-plugin-content .pho-img-bg {
                    border-radius: 5px 5px 0 0;
                    height: auto;
                    margin: 0 auto;
                    padding: 70px 0 40px;
                    width: 750px;
                }
                
                .premium-box-container .pho-desc-head h2 {
                    color: #02c277;
                    font-size: 28px;
                    font-weight: bolder;
                    margin: 0;
                    text-transform: capitalize;
                }
                
                .premium-box-container .pho-plugin-content p {
                    color: #212121;
                    font-size: 18px;
                    line-height: 32px;
                }
                
                .premium-box-container .description:nth-child(2n) .pho-img-bg {
                    background: #f1f1f1 url("<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/image-frame-even.png") no-repeat scroll 100% top;
                }
                
                .premium-box-container .description:nth-child(2n) {
                    background: #eae8e7 none repeat scroll 0 0;
                }
				
				a:focus {
					box-shadow: none;
				}
                
                </style>
                
                <div class="premium-box">
                
                <div class="premium-box-head">
                        <div class="pho-upgrade-btn">
                        <a href="https://www.phoeniixx.com/product/product-size-charts-for-woocommerce/" target="_blank"><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/premium-btn.png" /></a>
						<a target="blank" href="http://sizechart.phoeniixxdemo.com/product/ninja-silhouette/"><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/button2.png" /></a>
					  </div>
                    </div>
                
				<ul class="premium-features">
					<!--<h1 class="premium-heading">Premium Features</h1>-->
					<div class="main-heading"><h1><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/premium-head.png" /></h1></div>
					
					<div class="premium-box-container">
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Activation','phoen-size-chart') ;?></h2></div>
						
						<div class="pho-plugin-content">
						
							<p><?php _e('Once you have uploaded the plugin, activate your plugin in Plugins > Installed plugins If it has been activated correctly, plugin control panel is available in the tab Size Charts in Word Press dashboard.','phoen-size-chart') ;?></p>
								
							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-1.png" />
							
							</div> 
							
						</div>
					
					</div><!-- description end -->
					
					
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Multiple Options For Popup Styling','phoen-size-chart') ;?></h2></div>
						
						<div class="pho-plugin-content">
						
							<p><?php _e(' You could stylize the Popup to suit your websites theme. The plugin allows you to set Popup Background Color, Popup Cancel Button Color & Cancel Button Hover Color as well.','phoen-size-chart') ;?></p>

							<div class="pho-img-bg">
							
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-2.png" />
							
							</div>   

						</div>
					
					</div><!-- description end -->
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Style the Popup Button','phoen-size-chart') ;?></h2></div>
					
						<div class="pho-plugin-content">
							
							<p><?php _e('The plugin allows you to stylize Popup Button as per the theme colors of your site and/or on the basis of your requirement. The plugin lets you set Button Color, Button Text Color, Button Hover Color, Button Text Hover Color & Button Position as per your choice.','phoen-size-chart') ;?></p>
						
							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-3.png" />
							
							</div>   
						
						</div>
					
					</div><!-- description end -->
					
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Set Position of Size Chart Button','phoen-size-chart') ;?></h2></div>
						
						<div class="pho-plugin-content">
							
							<p><?php _e('The plugin lets you set the position of size chart button as either of the two given choices a. After Add to Cart Button<br /> b. After Summary.','phoen-size-chart') ;?></p>
							
							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-4.png" />
							
							</div>   
						
						</div>
					
					</div><!-- description end -->
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Stylize The Size Chart Table','phoen-size-chart') ;?> </h2></div>
						
						<div class="pho-plugin-content">
							
								<p><?php _e('You  could  stylize  the  size chart  table  by  selecting  the  desirable  colors  for  the  Table  Row Heading and Table Column Heading. This would allow you to customize the Table as per your sites theme.','phoen-size-chart') ;?></p>
								
							<div class="pho-img-bg">
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-5.png" />
							</div>
							
						</div>
					
					</div><!-- description end -->
					
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Add Unlimited Number of Size Charts To All Products','phoen-size-chart') ;?></h2></div>
						
						<div class="pho-plugin-content">
						
							<p><?php _e('This feature lets you add as many number of size charts as you want, to all products on your site.','phoen-size-chart') ;?></p>

							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-6.png" />
							
							</div>   
						
						</div>

					</div><!-- description end -->
				   
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Add Unlimited Number of Size Charts To Single Product','phoen-size-chart') ;?></h2></div>
						
						<div class="pho-plugin-content">
							
							<p><?php _e('This  feature  lets  you  to  add  as  many  number  of  size  charts  as  you  want,  to  a single  product on your website.','phoen-size-chart') ;?></p>
							
							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-7.png" />
								
							</div>   
							
						</div>
					
					</div><!-- description end -->
				  
					<div class="description">
						<div class="pho-desc-head"><h2><?php _e('Add Unlimited Number of Size Charts To Product Category','phoen-size-chart') ;?></h2></div>
						
						<div class="pho-plugin-content">
						
							<p><?php _e('This feature lets you to assign as many number of size charts as you want, to a particular product category on your website.','phoen-size-chart') ;?>
							   
							</p>
							
							<div class="pho-img-bg">
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-8.png" />
							</div>   
						
						</div>
					
				   </div><!-- description end -->
					
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Display the Size Chart Table as Per Choice','phoen-size-chart') ;?> </h2></div>
						
						<div class="pho-plugin-content">
						
							<p><?php _e('Depending upon your preference and requirement, you could display the Size-Chart Table either as a Tab, or as a Popup or as a Tabbed Popup, on your website.  ','phoen-size-chart') ;?></p>
							
							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-9.png" />
							
							</div>   
						
						</div>
					
					</div><!-- description end -->             
		  
					<div class="description">
						
						<div class="pho-desc-head"><h2><?php _e('Show Size Chart as Widget','phoen-size-chart') ;?> </h2></div>
						
						<div class="pho-plugin-content">
						
							<p><?php _e('This premium feature of size-charts plugin, allows you to show Size-Chart as Widget, so that the size chart could be displayed everywhere on the site.','phoen-size-chart') ;?></p>

							<div class="pho-img-bg">
								
								<img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/screen-10.png" />
							
							</div>   
						
						</div>
					
					</div><!-- description end -->  
					
				</ul>
                
                <div class="pho-upgrade-btn">
                
                <a href="https://www.phoeniixx.com/product/product-size-charts-for-woocommerce/" target="_blank"><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/premium-btn.png" /></a>
                <a target="blank" href="http://sizechart.phoeniixxdemo.com/product/ninja-silhouette/"><img src="<?php echo PHOEN_SIZECHART_PLUGURL; ?>assets/images/button2.png" /></a>
                </div>
                </div><!-- premium-box-container -->
                
                
                
                </div>
            
            
            
            <?php
		}
		?>