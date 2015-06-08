<div class="payrolls form">
<?php echo $this->Form->create('Payroll'); ?>
	<fieldset>
		<legend><?php echo __('Add Payroll'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('payroll_code');
		echo $this->Form->input('amount');
		echo $this->Form->input('rate_applied');
		echo $this->Form->input('tax_component');
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

		<li><?php echo $this->Html->link(__('List Payrolls'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
