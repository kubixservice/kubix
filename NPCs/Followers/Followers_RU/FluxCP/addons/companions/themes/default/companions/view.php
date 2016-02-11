<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if($companion): ?>
<h2>Companion view</h2>
	<table class="vertical-table">
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Count</th>
			<th>Desc.</th>
			<th>Getting by</th>
		</tr>
		<?php foreach($companion_id as $cid): ?>
		<tr>
			<td><a href="<?=$this->url('companions', 'view')?>&id=<?=$cid->companion_unique_id?>"><?=$cid->companion_name?></td>	
			
			<td><a href="<?=$this->url('companions', 'by_class')?>&id=<?=$cid->companion_class?>"><?=CompanionJob($cid->companion_class);?></td>	
			
			<td><?php echo $cid->companion_count_all;?></td>
			
			<td><?php echo $cid->companion_desc;?></td>	
			
			<td><?php echo Getting_By($cid->getting_by); ?></td>
		</tr>
	</table>
	
	<?php if($cid->companion_cutin != "Companion") : ?>
	<p>IMAGE :</p>
	<img src="<?php echo $cid->companion_cutin ?>" />
	<?php endif ?>
	
	<?php if($cid->companion_sound != "default") : ?>
	<p>Sound :</p>
	<?php echo $cid->companion_sound;?>
	<?php endif ?>
	
	<?php endforeach ?>
<?php else: ?>
<p>No such companions was found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>