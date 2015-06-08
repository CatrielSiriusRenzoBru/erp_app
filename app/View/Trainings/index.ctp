<div class="trainings index">
	<h2><?php echo __('Trainings'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('comments'); ?></th>
			<th><?php echo $this->Paginator->sort('approver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('approved_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($trainings as $training): ?>
	<tr>
		<td><?php echo h($training['Training']['id']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($training['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $training['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($training['Course']['title'], array('controller' => 'courses', 'action' => 'view', $training['Course']['id'])); ?>
		</td>
		<td><?php echo h($training['Training']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['comments']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['approver_id']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['approved_date']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['created']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['modified']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $training['Training']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $training['Training']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $training['Training']['id']), array(), __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
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
		<li><?php echo $this->Html->link(__('New Training'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
