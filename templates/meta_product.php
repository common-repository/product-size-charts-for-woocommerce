<?php 

if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}

?>
<div class="inside">
	<table>

		<tr>
			<th >
				<label for="product"><?php _e('Product','phoen-size-chart');?></label>
			</th>
			<td style="padding-left:100px;">
				<select data-std="none" name="phoen_metaboxes_product" id="product">
									
					<option  value="none"  selected="selected"  ><?php _e('None','phoen-size-chart');?></option>
					
					<?php
					foreach($products as $p){
						
						?>
					<option value="<?php echo esc_attr($p->ID); ?>" <?php if(isset($data[0]) && $p->ID == $data[0] ){?> selected="selected" <?php } ?>><?php echo esc_attr($p->post_title);?></option>
					<?php }  ?>
				</select>
			</td>
		
			<td style="padding-left:20px;">
				<span class="desc inline"><?php _e('Select the product where showing this size chart.','phoen-size-chart');?></span>
			</td>
		</tr>
	</table>
</div>