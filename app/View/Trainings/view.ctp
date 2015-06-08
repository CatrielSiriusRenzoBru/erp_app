<div class="trainings view">
<h2><?php echo __('Training'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($training['Training']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($training['Training']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($training['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $training['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($training['Course']['title'], array('controller' => 'courses', 'action' => 'view', $training['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($training['Training']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($training['Training']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($training['Training']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approver Id'); ?></dt>
		<dd>
			<?php echo h($training['Training']['approver_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved Date'); ?></dt>
		<dd>
			<?php echo h($training['Training']['approved_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($training['Training']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($training['Training']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($training['Training']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($training['Training']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($training['Training']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Training'), array('action' => 'edit', $training['Training']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Training'), array('action' => 'delete', $training['Training']['id']), array(), __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
