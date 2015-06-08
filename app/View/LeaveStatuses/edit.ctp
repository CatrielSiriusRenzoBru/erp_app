<div class="leaveStatuses form">
<?php echo $this->Form->create('LeaveStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Leave Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LeaveStatus.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('LeaveStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Requests'), array('controller' => 'leave_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Request'), array('controller' => 'leave_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
