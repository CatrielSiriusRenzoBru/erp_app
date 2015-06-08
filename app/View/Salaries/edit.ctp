<div class="salaries form">
<?php echo $this->Form->create('Salary'); ?>
	<fieldset>
		<legend><?php echo __('Edit Salary'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('base_salary');
		echo $this->Form->input('salary_band_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Salary.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Salary.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salary Bands'), array('controller' => 'salary_bands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary Band'), array('controller' => 'salary_bands', 'action' => 'add')); ?> </li>
	</ul>
</div>
