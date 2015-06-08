<div class="leaveRecords view">
<h2><?php echo __('Leave Record'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leaveRecord['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $leaveRecord['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leave Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leaveRecord['LeaveType']['title'], array('controller' => 'leave_types', 'action' => 'view', $leaveRecord['LeaveType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Days Left'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['days_left']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Days Taken'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['days_taken']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leave Year'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['leave_year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Days Carried Over'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['days_carried_over']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($leaveRecord['LeaveRecord']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Leave Record'), array('action' => 'edit', $leaveRecord['LeaveRecord']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Leave Record'), array('action' => 'delete', $leaveRecord['LeaveRecord']['id']), array(), __('Are you sure you want to delete # %s?', $leaveRecord['LeaveRecord']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Records'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Record'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
