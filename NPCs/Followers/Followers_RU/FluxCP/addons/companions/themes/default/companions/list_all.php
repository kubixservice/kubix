<?php if (!defined('FLUX_ROOT')) exit; ?>
	<table class="vertical-table">
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Count</th>
			<th>Getting by</th>
		</tr>
		<?php foreach($companion_list as $cl): ?>
		<tr>
			<td><a href="<?=$this->url('companions', 'view')?>&id=<?=$cl->companion_unique_id?>"><?=$cl->companion_name?></td>	
			
			<td><a href="<?=$this->url('companions', 'by_class')?>&id=<?=$cl->companion_class?>"><?=CompanionJob($cl->companion_class);?></td>
			
			<td>
				<?php echo $cl->companion_count_all;?>
			</td>
			
			<td><?php echo Getting_By($cl->getting_by); ?></td>
		</tr>
		<?php endforeach ?>
	</table>