<div class="surveyPmas index">
	<h2><?php echo __('Survey Pmas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('q1'); ?></th>
			<th><?php echo $this->Paginator->sort('q2'); ?></th>
			<th><?php echo $this->Paginator->sort('q3'); ?></th>
			<th><?php echo $this->Paginator->sort('q4'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveyPmas as $surveyPma): ?>
	<tr>
		<td><?php echo h($surveyPma['SurveyPma']['id']); ?>&nbsp;</td>
		<td><?php echo h($surveyPma['SurveyPma']['q1']); ?>&nbsp;</td>
		<td><?php echo h($surveyPma['SurveyPma']['q2']); ?>&nbsp;</td>
		<td><?php echo h($surveyPma['SurveyPma']['q3']); ?>&nbsp;</td>
		<td><?php echo h($surveyPma['SurveyPma']['q4']); ?>&nbsp;</td>
		<td><?php echo h($surveyPma['SurveyPma']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $surveyPma['SurveyPma']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $surveyPma['SurveyPma']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $surveyPma['SurveyPma']['id']), null, __('Are you sure you want to delete # %s?', $surveyPma['SurveyPma']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Survey Pma'), array('action' => 'add')); ?></li>
	</ul>
</div>
