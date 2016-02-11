<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if($companionID >= 0): ?>
<h2>Companion view by class : <?php echo CompanionJob($companionID); ?></h2>
	<table class="vertical-table">
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Count</th>
			<th>Getting by</th>
		</tr>
		<?php foreach($get_companion as $gc): ?>
		<tr>
			<td><a href="<?=$this->url('companions', 'view')?>&id=<?=$gc->companion_unique_id?>"><?=$gc->companion_name?></td>	
			
			<td>
				<?php echo CompanionJob($gc->companion_class);?>
			</td>
			
			<td>
				<?php echo $gc->companion_count_all;?>
			</td>
			
			<td><?php echo Getting_By($gc->getting_by); ?></td>
		</tr>
		<?php endforeach ?>
	</table>
<?php else: ?>
<p>No such companions was found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>