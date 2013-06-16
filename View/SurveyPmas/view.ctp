<div class="surveyPmas view">
<h2><?php  echo __('Survey Pma'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($surveyPma['SurveyPma']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q1'); ?></dt>
		<dd>
			<?php echo h($surveyPma['SurveyPma']['q1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q2'); ?></dt>
		<dd>
			<?php echo h($surveyPma['SurveyPma']['q2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q3'); ?></dt>
		<dd>
			<?php echo h($surveyPma['SurveyPma']['q3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q4'); ?></dt>
		<dd>
			<?php echo h($surveyPma['SurveyPma']['q4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($surveyPma['SurveyPma']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey Pma'), array('action' => 'edit', $surveyPma['SurveyPma']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey Pma'), array('action' => 'delete', $surveyPma['SurveyPma']['id']), null, __('Are you sure you want to delete # %s?', $surveyPma['SurveyPma']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Pmas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Pma'), array('action' => 'add')); ?> </li>
	</ul>
</div>
