<div class="leaveStatuses view">
<h2><?php echo __('Leave Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($leaveStatus['LeaveStatus']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Leave Status'), array('action' => 'edit', $leaveStatus['LeaveStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Leave Status'), array('action' => 'delete', $leaveStatus['LeaveStatus']['id']), array(), __('Are you sure you want to delete # %s?', $leaveStatus['LeaveStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Requests'), array('controller' => 'leave_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Request'), array('controller' => 'leave_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Leave Requests'); ?></h3>
	<?php if (!empty($leaveStatus['LeaveRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Leave Type Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Leave Days'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Days Type'); ?></th>
		<th><?php echo __('Relievers'); ?></th>
		<th><?php echo __('Employee Comment'); ?></th>
		<th><?php echo __('Approver'); ?></th>
		<th><?php echo __('Approver Comment'); ?></th>
		<th><?php echo __('Approved Date'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Approver Viewed'); ?></th>
		<th><?php echo __('Requester Viewed'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($leaveStatus['LeaveRequest'] as $leaveRequest): ?>
		<tr>
			<td><?php echo $leaveRequest['id']; ?></td>
			<td><?php echo $leaveRequest['employee_id']; ?></td>
			<td><?php echo $leaveRequest['leave_type_id']; ?></td>
			<td><?php echo $leaveRequest['created']; ?></td>
			<td><?php echo $leaveRequest['created_by']; ?></td>
			<td><?php echo $leaveRequest['modified']; ?></td>
			<td><?php echo $leaveRequest['modified_by']; ?></td>
			<td><?php echo $leaveRequest['leave_days']; ?></td>
			<td><?php echo $leaveRequest['start_date']; ?></td>
			<td><?php echo $leaveRequest['end_date']; ?></td>
			<td><?php echo $leaveRequest['days_type']; ?></td>
			<td><?php echo $leaveRequest['relievers']; ?></td>
			<td><?php echo $leaveRequest['employee_comment']; ?></td>
			<td><?php echo $leaveRequest['approver']; ?></td>
			<td><?php echo $leaveRequest['approver_comment']; ?></td>
			<td><?php echo $leaveRequest['approved_date']; ?></td>
			<td><?php echo $leaveRequest['status_id']; ?></td>
			<td><?php echo $leaveRequest['approver_viewed']; ?></td>
			<td><?php echo $leaveRequest['requester_viewed']; ?></td>
			<td><?php echo $leaveRequest['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'leave_requests', 'action' => 'view', $leaveRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'leave_requests', 'action' => 'edit', $leaveRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'leave_requests', 'action' => 'delete', $leaveRequest['id']), array(), __('Are you sure you want to delete # %s?', $leaveRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Leave Request'), array('controller' => 'leave_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
