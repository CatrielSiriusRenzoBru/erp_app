<div class="ethnicities index">
	<h2><?php echo __('Ethnicities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ethnicities as $ethnicity): ?>
	<tr>
		<td><?php echo h($ethnicity['Ethnicity']['id']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['title']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['created']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['modified']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ethnicity['Ethnicity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ethnicity['Ethnicity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ethnicity['Ethnicity']['id']), array(), __('Are you sure you want to delete # %s?', $ethnicity['Ethnicity']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ethnicity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
