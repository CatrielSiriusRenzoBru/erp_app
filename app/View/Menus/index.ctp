<div class="menus index">
	<h2><?php echo __('Menus'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('appid'); ?></th>
			<th><?php echo $this->Paginator->sort('parent'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('icon'); ?></th>
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('action'); ?></th>
			<th><?php echo $this->Paginator->sort('user_role_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ordering'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($menus as $menu): ?>
	<tr>
		<td><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['appid']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['parent']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['icon']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['controller']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['action']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($menu['UserRole']['title'], array('controller' => 'user_roles', 'action' => 'view', $menu['UserRole']['id'])); ?>
		</td>
		<td><?php echo h($menu['Menu']['ordering']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $menu['Menu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $menu['Menu']['id']), array(), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
