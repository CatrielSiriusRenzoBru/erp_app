<div class="menus view">
<h2><?php echo __('Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appid'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['appid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['parent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icon'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['icon']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Role'); ?></dt>
		<dd>
			<?php echo $this->Html->link($menu['UserRole']['title'], array('controller' => 'user_roles', 'action' => 'view', $menu['UserRole']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ordering'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['ordering']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu'), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), array(), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
