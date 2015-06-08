<div class="assetLoaners form">
<?php echo $this->Form->create('AssetLoaner'); ?>
	<fieldset>
		<legend><?php echo __('Add Asset Loaner'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('asset_id');
		echo $this->Form->input('borrowed_date');
		echo $this->Form->input('due_date');
		echo $this->Form->input('returned_date');
		echo $this->Form->input('comments');
		echo $this->Form->input('approver_id');
		echo $this->Form->input('approved_date');
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

		<li><?php echo $this->Html->link(__('List Asset Loaners'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Assets'), array('controller' => 'assets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset'), array('controller' => 'assets', 'action' => 'add')); ?> </li>
	</ul>
</div>
