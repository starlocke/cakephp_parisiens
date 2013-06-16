<div class="surveySms form">
<?php echo $this->Form->create('SurveySm'); ?>
	<fieldset>
		<legend><?php echo __('Add Survey Sm'); ?></legend>
	<?php
		echo $this->Form->input('q1');
		echo $this->Form->input('q2');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Survey Sms'), array('action' => 'index')); ?></li>
	</ul>
</div>
