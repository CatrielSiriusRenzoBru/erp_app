<div class="beneficiaries form">
<?php echo $this->Form->create('Beneficiary'); ?>
	<fieldset>
		<legend><?php echo __('Add Beneficiary'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('firstname');
		echo $this->Form->input('othernames');
		echo $this->Form->input('lastname');
		echo $this->Form->input('address_line_1');
		echo $this->Form->input('address_line_2');
		echo $this->Form->input('address_line_3');
		echo $this->Form->input('address_line_4');
		echo $this->Form->input('country_id');
		echo $this->Form->input('postcode');
		echo $this->Form->input('relationship');
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

		<li><?php echo $this->Html->link(__('List Beneficiaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>