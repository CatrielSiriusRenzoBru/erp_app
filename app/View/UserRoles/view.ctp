<div class="userRoles view">
<h2><?php echo __('User Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Privilege'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['privilege']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($userRole['UserRole']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Role'), array('action' => 'edit', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Role'), array('action' => 'delete', $userRole['UserRole']['id']), array(), __('Are you sure you want to delete # %s?', $userRole['UserRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Menus'); ?></h3>
	<?php if (!empty($userRole['Menu'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Appid'); ?></th>
		<th><?php echo __('Parent'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Icon'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('User Role Id'); ?></th>
		<th><?php echo __('Ordering'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userRole['Menu'] as $menu): ?>
		<tr>
			<td><?php echo $menu['id']; ?></td>
			<td><?php echo $menu['appid']; ?></td>
			<td><?php echo $menu['parent']; ?></td>
			<td><?php echo $menu['name']; ?></td>
			<td><?php echo $menu['icon']; ?></td>
			<td><?php echo $menu['controller']; ?></td>
			<td><?php echo $menu['action']; ?></td>
			<td><?php echo $menu['user_role_id']; ?></td>
			<td><?php echo $menu['ordering']; ?></td>
			<td><?php echo $menu['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'menus', 'action' => 'view', $menu['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'menus', 'action' => 'edit', $menu['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menus', 'action' => 'delete', $menu['id']), array(), __('Are you sure you want to delete # %s?', $menu['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($userRole['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Role Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Othernames'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userRole['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['user_role_id']; ?></td>
			<td><?php echo $user['employee_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['othernames']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['created_by']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['modified_by']; ?></td>
			<td><?php echo $user['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
