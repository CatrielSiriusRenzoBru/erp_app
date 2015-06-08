<div class="holidays form">
<?php echo $this->Form->create('Holiday'); ?>
	<fieldset>
		<legend><?php echo __('Add Holiday'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('holiday_date');
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

		<li><?php echo $this->Html->link(__('List Holidays'), array('action' => 'index')); ?></li>
	</ul>
</div>
