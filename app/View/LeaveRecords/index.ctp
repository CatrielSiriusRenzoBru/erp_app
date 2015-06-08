<div class="leaveRecords index">
	<h2><?php echo __('Leave Records'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('leave_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('days_left'); ?></th>
			<th><?php echo $this->Paginator->sort('days_taken'); ?></th>
			<th><?php echo $this->Paginator->sort('leave_year'); ?></th>
			<th><?php echo $this->Paginator->sort('days_carried_over'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leaveRecords as $leaveRecord): ?>
	<tr>
		<td><?php echo h($leaveRecord['LeaveRecord']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($leaveRecord['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $leaveRecord['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($leaveRecord['LeaveType']['title'], array('controller' => 'leave_types', 'action' => 'view', $leaveRecord['LeaveType']['id'])); ?>
		</td>
		<td><?php echo h($leaveRecord['LeaveRecord']['days_left']); ?>&nbsp;</td>
		<td><?php echo h($leaveRecord['LeaveRecord']['days_taken']); ?>&nbsp;</td>
		<td><?php echo h($leaveRecord['LeaveRecord']['leave_year']); ?>&nbsp;</td>
		<td><?php echo h($leaveRecord['LeaveRecord']['days_carried_over']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leaveRecord['LeaveRecord']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leaveRecord['LeaveRecord']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leaveRecord['LeaveRecord']['id']), array(), __('Are you sure you want to delete # %s?', $leaveRecord['LeaveRecord']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
    <div class="pagination pagination-large">
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('« Previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Next »'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
    </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Leave Record'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Types'), array('controller' => 'leave_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Type'), array('controller' => 'leave_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
