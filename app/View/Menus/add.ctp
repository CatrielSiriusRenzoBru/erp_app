<div class="menus form">
<?php echo $this->Form->create('Menu'); ?>
	<fieldset>
		<legend><?php echo __('Add Menu'); ?></legend>
	<?php
		echo $this->Form->input('appid');
		echo $this->Form->input('parent');
		echo $this->Form->input('name');
		echo $this->Form->input('icon');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('user_role_id');
		echo $this->Form->input('ordering');
		echo $this->Form->input('deleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Roles'), array('controller' => 'user_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'user_roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
