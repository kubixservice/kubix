<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if($missionID): ?>

<?php foreach($get_mission as $gm): ?>
<h2>Mission view '<?php echo $gm->mission_name; ?>'</h2>
<table class="vertical-table">
	<tr>
		<th>Mission ID</th>
		<td><?php echo htmlspecialchars($gm->mission_id) ?></td>
		<th>Mission Name</th>
		<td><?php echo htmlspecialchars($gm->mission_name) ?></td>
	</tr>
	<tr>
		<th>Mission Type</th>
		<td><?php echo MissionType($gm->mission_type); ?></td>
		<th>Mission Desc.</th>
		<td><?php echo htmlspecialchars($gm->mission_desc) ?></td>
	</tr>
	<tr>
		<th>Mission Time</th>
		<td><?php echo htmlspecialchars($gm->mission_time / 3600) ?>h</td>
		<th>Mission equip LVL</th>
		<td><?php echo htmlspecialchars($gm->mission_equiplv) ?></td>
	</tr>
	<tr>
		<th>Reward #1</th>
		<td>				
			<?php if ($auth->actionAllowed('item', 'view')): ?>
				<?php echo $this->linkToItem($gm->mission_reward1, $gm->mission_reward1) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($gm->name_english) ?>
			<?php endif ?>
		</td>
		
		<th>Reward Count #1</th>
		<td><?php echo number_format((int)$gm->mission_rewardval1) ?></td>
	</tr>
	<tr>
		<th>Reward #2</th>
		<td>				
			<?php if ($auth->actionAllowed('item', 'view')): ?>
				<?php echo $this->linkToItem($gm->mission_reward2, $gm->mission_reward2) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($gm->name_english) ?>
			<?php endif ?>
		</td>
		
		<th>Reward Count #2</th>
		<td><?php echo number_format((int)$gm->mission_rewardval2) ?></td>
	</tr>
	<tr>
		<th>Reward #3</th>
		<td>				
			<?php if ($auth->actionAllowed('item', 'view')): ?>
				<?php echo $this->linkToItem($gm->mission_reward3, $gm->mission_reward3) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($gm->name_english) ?>
			<?php endif ?>
		</td>
		
		<th>Reward Count #3</th>
		<td><?php echo number_format((int)$gm->mission_rewardval3) ?></td>
	</tr>
	<tr>
		<th>Base EXP</th>
		<td><?php echo number_format((int)$gm->mission_charbaseexp * 20) ?></td>
		<th>Job EXP</th>
		<td><?php echo number_format((int)$gm->mission_charjobexp * 20) ?></td>
	</tr>
	<tr>
		<th>Companion EXP</th>
		<td><?php echo number_format((int)$gm->mission_compbaseexp) ?></td>
		<th>Resources</th>
		<td><?php echo number_format((int)$gm->zeny_reward) ?></td>
	</tr>
	<tr>
		<th>Req. Level</th>
		<td><?php echo number_format((int)$gm->mission_reqlevel) ?></td>
		<th>Req. Job</th>
		<td><?php echo CompanionJob($gm->mission_jobreq); ?></td>
	</tr>
</table>
<?php endforeach ?>
<?php else: ?>
<p>No such mission was found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>