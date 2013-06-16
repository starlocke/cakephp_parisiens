<div class="surveyNqvrs form">
<?php echo $this->Form->create('SurveyNqvr'); ?>
	<fieldset>
		<legend><?php echo __('Add Survey Nqvr'); ?></legend>
	<?php
		echo $this->Form->input('q1');
		echo $this->Form->input('q2');
		echo $this->Form->input('q3');
		echo $this->Form->input('q4');
		echo $this->Form->input('q5');
		echo $this->Form->input('q6');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Survey Nqvrs'), array('action' => 'index')); ?></li>
	</ul>
</div>
