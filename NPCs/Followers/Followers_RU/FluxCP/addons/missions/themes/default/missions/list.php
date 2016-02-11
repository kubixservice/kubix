<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2>Garrison missions list</h2>

	<table class="vertical-table">
		<tr>
			<th>Name</th>
			<th>Type</th>
			<th>Desc.</th>
			<th>Time</th>
			<th>Reward</th>
			<th>Reward Count</th>
			<th>Reward</th>
			<th>Reward Count</th>
			<th>Reward</th>
			<th>Reward Count</th>
			<th>Base EXP</th>
			<th>Job EXP</th>
			<th>Companion EXP</th>
			<th>Resources</th>
			<th>Level req.</th>
			<th>Job req.</th>
			<th>Min. equip level</th>
				
		</tr>
		<?php foreach ($missions as $ms): ?>
		<tr>
			<td><a href="<?=$this->url('missions', 'view')?>&id=<?=$ms->mission_id?>"><?=$ms->mission_name?></td>	
			
			<td>
				<?php echo MissionType($ms->mission_type);?>
			</td>
			
			<td>
				<?php echo $ms->mission_desc;?>
			</td>
			
			<td>
				<?php echo htmlspecialchars($ms->mission_time / 3600); echo 'h';?>
			</td>
			
			<td>
				<?php if ($auth->actionAllowed('item', 'view')): ?>
					<?php echo $this->linkToItem($ms->mission_reward1, $ms->mission_reward1) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($ms->mission_reward1) ?>
				<?php endif ?>
			</td>
			
			<td>
				<?php echo $ms->mission_rewardval1;?>
			</td>
			
			<td>
				<?php if ($auth->actionAllowed('item', 'view')): ?>
					<?php echo $this->linkToItem($ms->mission_reward2, $ms->mission_reward2) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($ms->mission_reward2) ?>
				<?php endif ?>
			</td>	
			
			<td>
				<?php echo $ms->mission_rewardval2;?>
			</td>
			
			<td>
				<?php if ($auth->actionAllowed('item', 'view')): ?>
					<?php echo $this->linkToItem($ms->mission_reward3, $ms->mission_reward3) ?>
				<?php else: ?>
					<?php echo htmlspecialchars($ms->mission_reward3) ?>
				<?php endif ?>
			</td>
			
			<td>
				<?php echo $ms->mission_rewardval3;?>
			</td>
			
			<td>
				<?php echo number_format($ms->mission_charbaseexp*20) ?>
			</td>
			
			<td>
				<?php echo number_format($ms->mission_charjobexp*20) ?>
			</td>
			
			<td>
				<?php echo $ms->mission_compbaseexp;?>
			</td>
			
			<td>
				<?php echo $ms->zeny_reward;?>
			</td>
			
			<td>
				<?php echo $ms->mission_reqlevel;?>
			</td>
			
			<td>
				<?php echo CompanionJob($ms->mission_jobreq); ?>
			</td>
			
			<td>
				<?php echo $ms->mission_equiplv;?>
			</td>
		</tr>
		<?php endforeach ?>
	</table>