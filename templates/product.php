<?php

if ( ! defined( 'ABSPATH' ) )
{
	exit;   
}

$t = json_decode($phoen_chart_table_meta);
?>
<table class="phoen-wcpsc-product-table">
	<tbody>
	<?php foreach($t as $index => $row)
	{ 
	?>
		<tr>
			<?php foreach($row as $col)
			{
			?>
			<td>
				<?php echo  $col; ?>
			</td>
			<?php } ?>
		</tr>
			<?php }?>

	</tbody>
</table>