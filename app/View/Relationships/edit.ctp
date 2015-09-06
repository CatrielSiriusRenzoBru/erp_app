<div class="relationships form">
<?php echo $this->Form->create('Relationship'); ?>
	<fieldset>
		<legend><?php echo __('Edit Relationship'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Relationship.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Relationship.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Relationships'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Emergency Contacts'), array('controller' => 'emergency_contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emergency Contact'), array('controller' => 'emergency_contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>
