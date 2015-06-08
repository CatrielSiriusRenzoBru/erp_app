<div class="payrolls view">
<h2><?php echo __('Payroll'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payroll['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $payroll['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payroll Code'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['payroll_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate Applied'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['rate_applied']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax Component'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['tax_component']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($payroll['Payroll']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payroll'), array('action' => 'edit', $payroll['Payroll']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payroll'), array('action' => 'delete', $payroll['Payroll']['id']), array(), __('Are you sure you want to delete # %s?', $payroll['Payroll']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrolls'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payroll'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
