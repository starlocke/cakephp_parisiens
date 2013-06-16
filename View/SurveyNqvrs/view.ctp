<div class="surveyNqvrs view">
<h2><?php  echo __('Survey Nqvr'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q1'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['q1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q2'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['q2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q3'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['q3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q4'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['q4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q5'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['q5']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q6'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['q6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($surveyNqvr['SurveyNqvr']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey Nqvr'), array('action' => 'edit', $surveyNqvr['SurveyNqvr']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey Nqvr'), array('action' => 'delete', $surveyNqvr['SurveyNqvr']['id']), null, __('Are you sure you want to delete # %s?', $surveyNqvr['SurveyNqvr']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Nqvrs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Nqvr'), array('action' => 'add')); ?> </li>
	</ul>
</div>
