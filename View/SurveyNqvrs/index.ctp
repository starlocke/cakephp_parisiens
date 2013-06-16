<div class="surveyNqvrs index">
	<h2><?php echo __('Survey Nqvrs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('q1'); ?></th>
			<th><?php echo $this->Paginator->sort('q2'); ?></th>
			<th><?php echo $this->Paginator->sort('q3'); ?></th>
			<th><?php echo $this->Paginator->sort('q4'); ?></th>
			<th><?php echo $this->Paginator->sort('q5'); ?></th>
			<th><?php echo $this->Paginator->sort('q6'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveyNqvrs as $surveyNqvr): ?>
	<tr>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['id']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['q1']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['q2']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['q3']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['q4']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['q5']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['q6']); ?>&nbsp;</td>
		<td><?php echo h($surveyNqvr['SurveyNqvr']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $surveyNqvr['SurveyNqvr']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $surveyNqvr['SurveyNqvr']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $surveyNqvr['SurveyNqvr']['id']), null, __('Are you sure you want to delete # %s?', $surveyNqvr['SurveyNqvr']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Survey Nqvr'), array('action' => 'add')); ?></li>
	</ul>
</div>
