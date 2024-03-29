<div class="userRoles form">
<?php echo $this->Form->create('UserRole'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Role'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('privilege');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserRole.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UserRole.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
