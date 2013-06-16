<div class="surveySms view">
<h2><?php  echo __('Survey Sm'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($surveySm['SurveySm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q1'); ?></dt>
		<dd>
			<?php echo h($surveySm['SurveySm']['q1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Q2'); ?></dt>
		<dd>
			<?php echo h($surveySm['SurveySm']['q2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($surveySm['SurveySm']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Survey Sm'), array('action' => 'edit', $surveySm['SurveySm']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Survey Sm'), array('action' => 'delete', $surveySm['SurveySm']['id']), null, __('Are you sure you want to delete # %s?', $surveySm['SurveySm']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Survey Sms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Survey Sm'), array('action' => 'add')); ?> </li>
	</ul>
</div>
