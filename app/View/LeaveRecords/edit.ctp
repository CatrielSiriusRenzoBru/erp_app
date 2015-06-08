<div class="leaveRecords form">
<?php echo $this->Form->create('LeaveRecord'); ?>
	<fieldset>
		<legend><?php echo __('Edit Leave Record'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('leave_type_id');
		echo $this->Form->input('days_left');
		echo $this->Form->input('days_taken');
		echo $this->Form->input('leave_year');
		echo $this->Form->input('days_carried_over');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LeaveRecord.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LeaveRecord.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Records'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
