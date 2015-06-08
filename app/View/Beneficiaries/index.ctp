<div class="beneficiaries index">
	<h2><?php echo __('Beneficiaries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('othernames'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('address_line_1'); ?></th>
			<th><?php echo $this->Paginator->sort('address_line_2'); ?></th>
			<th><?php echo $this->Paginator->sort('address_line_3'); ?></th>
			<th><?php echo $this->Paginator->sort('address_line_4'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('postcode'); ?></th>
			<th><?php echo $this->Paginator->sort('relationship'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($beneficiaries as $beneficiary): ?>
	<tr>
		<td><?php echo h($beneficiary['Beneficiary']['id']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($beneficiary['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $beneficiary['Employee']['id'])); ?>
		</td>
		<td><?php echo h($beneficiary['Beneficiary']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['othernames']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['address_line_1']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['address_line_2']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['address_line_3']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['address_line_4']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($beneficiary['Country']['title'], array('controller' => 'countries', 'action' => 'view', $beneficiary['Country']['id'])); ?>
		</td>
		<td><?php echo h($beneficiary['Beneficiary']['postcode']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['relationship']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['created']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['modified']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $beneficiary['Beneficiary']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $beneficiary['Beneficiary']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $beneficiary['Beneficiary']['id']), array(), __('Are you sure you want to delete # %s?', $beneficiary['Beneficiary']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Beneficiary'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
