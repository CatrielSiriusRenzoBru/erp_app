<div class="salaryBands form">
<?php echo $this->Form->create('SalaryBand'); ?>
	<fieldset>
		<legend><?php echo __('Edit Salary Band'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('band_min');
		echo $this->Form->input('band_max');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SalaryBand.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SalaryBand.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Salary Bands'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('controller' => 'salaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('controller' => 'salaries', 'action' => 'add')); ?> </li>
	</ul>
</div>
