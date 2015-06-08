<div class="salaries index">
	<h2><?php echo __('Salaries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('base_salary'); ?></th>
			<th><?php echo $this->Paginator->sort('salary_band_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($salaries as $salary): ?>
	<tr>
		<td><?php echo h($salary['Salary']['id']); ?>&nbsp;</td>
		<td><?php echo h($salary['Salary']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($salary['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $salary['Employee']['id'])); ?>
		</td>
		<td><?php echo h($salary['Salary']['base_salary']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($salary['SalaryBand']['title'], array('controller' => 'salary_bands', 'action' => 'view', $salary['SalaryBand']['id'])); ?>
		</td>
		<td><?php echo h($salary['Salary']['created']); ?>&nbsp;</td>
		<td><?php echo h($salary['Salary']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($salary['Salary']['modified']); ?>&nbsp;</td>
		<td><?php echo h($salary['Salary']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($salary['Salary']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $salary['Salary']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $salary['Salary']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $salary['Salary']['id']), array(), __('Are you sure you want to delete # %s?', $salary['Salary']['id'])); ?>
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
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Salary'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salary Bands'), array('controller' => 'salary_bands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary Band'), array('controller' => 'salary_bands', 'action' => 'add')); ?> </li>
	</ul>
</div>
