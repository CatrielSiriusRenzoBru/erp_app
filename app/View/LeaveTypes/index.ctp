<div class="leaveTypes index">
	<h2><?php echo __('Leave Types'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('title2'); ?></th>
			<th><?php echo $this->Paginator->sort('entitlement'); ?></th>
			<th><?php echo $this->Paginator->sort('max_days'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('probation'); ?></th>
			<th><?php echo $this->Paginator->sort('user_role_ids'); ?></th>
			<th><?php echo $this->Paginator->sort('weekends'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leaveTypes as $leaveType): ?>
	<tr>
		<td><?php echo h($leaveType['LeaveType']['id']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['title']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['title2']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['entitlement']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['max_days']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['gender']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['probation']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['user_role_ids']); ?>&nbsp;</td>
		<td><?php echo h($leaveType['LeaveType']['weekends']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leaveType['LeaveType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leaveType['LeaveType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leaveType['LeaveType']['id']), array(), __('Are you sure you want to delete # %s?', $leaveType['LeaveType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Leave Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Leave Records'), array('controller' => 'leave_records', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Record'), array('controller' => 'leave_records', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leave Requests'), array('controller' => 'leave_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leave Request'), array('controller' => 'leave_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
