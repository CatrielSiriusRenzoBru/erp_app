<div class="leaveTypes form">
<?php echo $this->Form->create('LeaveType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Leave Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('title2');
		echo $this->Form->input('entitlement');
		echo $this->Form->input('max_days');
		echo $this->Form->input('gender');
		echo $this->Form->input('probation');
		echo $this->Form->input('user_role_ids');
		echo $this->Form->input('weekends');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LeaveType.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LeaveType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Records'), array('controller' => 'leave_records', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Record'), array('controller' => 'leave_records', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Requests'), array('controller' => 'leave_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Request'), array('controller' => 'leave_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
