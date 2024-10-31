<?php 

if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}

$phoen_chart_table_data = json_decode($phoen_chart_table_meta);
?>
<div id="phoen-sc-metabox-table-wrapper">
		<input id="phoen-sc-table-hidden" type="hidden" name="phoen_chart_table" value='<?php echo esc_attr($phoen_chart_table_meta);?>'>
		<table id="phoen-sc-metabox-table">
			<thead>
				<tr>
				<?php foreach($phoen_chart_table_data[0] as $phoen_chart_table_col)
				{
					?>
					<th>
						
						<a href="javascript:void(0);" class="phoen-sc-add-col">+</a>
						<a href="javascript:void(0);" class="phoen-sc-del-col">-</a>
						
					</th>
				<?php } ?>
					<th></th>
				</tr>
			</thead>
			<tbody>
		 <?php foreach($phoen_chart_table_data as $phoen_chart_table_row)
		 {
			 ?>
				<tr>
			<?php foreach($phoen_chart_table_row as $phoen_chart_table_col)
			{
			?>
					<td>
					<input type="text" class="phoen-input-table" value="<?php echo esc_attr($phoen_chart_table_col); ?>">
					</td>
					
				<?php } ?>
					<td class="phoen-sc-table-button-container">
						<a href="javascript:void(0);" class="phoen-sc-add-row">+</a>	<a href="javascript:void(0);" class="phoen-sc-del-row">-</a>
						
				<?php } ?>
					</td>
				</tr>
			</tbody>
		</table>

	</div>