<div class="payrolls index">
	<h2><?php echo __('Payrolls'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr>
			<th><?php echo __('Title'); ?></th>
			<th><?php echo __('Employee'); ?></th>
			<th><?php echo __('Payroll Code'); ?></th>
			<th><?php echo __('Amount (GHS)'); ?></th>
			<th><?php echo __('Rate'); ?></th>
			<th><?php echo __('Tax Component'); ?></th>
			<th><?php echo __('Date'); ?></th>
			<th><?php echo __('Created By'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($payrolls as $payroll): //echo '<pre>'; print_r($payroll); //exit; ?>
	<tr>    
		<td><?php echo $payroll['Payroll']['title']; ?></td>
		<td>
			<?php echo $this->Html->link( $payroll['Employee']['firstname'].' '.$payroll['Employee']['othernames'].' '.$payroll['Employee']['lastname']
                                , array('controller' => 'employees', 'action' => 'view', $payroll['Payroll']['employee_id'])); ?>
		</td>
		<td><?php echo h($payroll['Payroll']['payroll_code']); ?></td>
		<td><?php echo h($this->Number->currency($payroll['Payroll']['amount'], '')); ?>&nbsp;</td>
		<td><?php echo h($payroll['Payroll']['rate_applied']); ?>&nbsp;</td>
		<td><?php echo h($this->Number->currency($payroll['Payroll']['tax_component'], '')); ?>&nbsp;</td>
                <td><?php echo h(date('d M Y H:i:s', strtotime($payroll['Payroll']['created']))); ?>&nbsp;</td>
		<td><?php echo h($payroll['Payroll']['created_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $payroll['Payroll']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $payroll['Payroll']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $payroll['Payroll']['id']), array(), __('Are you sure you want to delete # %s?', $payroll['Payroll']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
</div>
