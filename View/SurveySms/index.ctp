<div class="surveySms index">
	<h2><?php echo __('Survey Sms'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('q1'); ?></th>
			<th><?php echo $this->Paginator->sort('q2'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($surveySms as $surveySm): ?>
	<tr>
		<td><?php echo h($surveySm['SurveySm']['id']); ?>&nbsp;</td>
		<td><?php echo h($surveySm['SurveySm']['q1']); ?>&nbsp;</td>
		<td><?php echo h($surveySm['SurveySm']['q2']); ?>&nbsp;</td>
		<td><?php echo h($surveySm['SurveySm']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $surveySm['SurveySm']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $surveySm['SurveySm']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $surveySm['SurveySm']['id']), null, __('Are you sure you want to delete # %s?', $surveySm['SurveySm']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Survey Sm'), array('action' => 'add')); ?></li>
	</ul>
</div>
