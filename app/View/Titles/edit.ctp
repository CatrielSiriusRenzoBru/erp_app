<div class="titles form">
<?php echo $this->Form->create('Title'); ?>
	<fieldset>
		<legend><?php echo __('Edit Title'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Title.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Title.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Titles'), array('action' => 'index')); ?></li>
	</ul>
</div>
