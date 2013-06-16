<div class="surveySms form">
<?php echo $this->Form->create('SurveySm'); ?>
	<fieldset>
		<legend><?php echo __('Edit Survey Sm'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('q1');
		echo $this->Form->input('q2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SurveySm.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SurveySm.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Survey Sms'), array('action' => 'index')); ?></li>
	</ul>
</div>
