<div class="surveyPmas form">
<?php echo $this->Form->create('SurveyPma'); ?>
	<fieldset>
		<legend><?php echo __('Add Survey Pma'); ?></legend>
	<?php
		echo $this->Form->input('q1');
		echo $this->Form->input('q2');
		echo $this->Form->input('q3');
		echo $this->Form->input('q4');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Survey Pmas'), array('action' => 'index')); ?></li>
	</ul>
</div>
