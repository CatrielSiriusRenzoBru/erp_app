<div class="employeeTypes view">
<h2><?php echo __('Employee Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($employeeType['EmployeeType']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employee Type'), array('action' => 'edit', $employeeType['EmployeeType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employee Type'), array('action' => 'delete', $employeeType['EmployeeType']['id']), array(), __('Are you sure you want to delete # %s?', $employeeType['EmployeeType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employee Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($employeeType['Employee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Type Id'); ?></th>
		<th><?php echo __('Employee Number'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Manager Id'); ?></th>
		<th><?php echo __('Delegated Id'); ?></th>
		<th><?php echo __('Cost Centre Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Job Title Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Home Telephone'); ?></th>
		<th><?php echo __('Work Telephone'); ?></th>
		<th><?php echo __('Extension'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Address Line 1'); ?></th>
		<th><?php echo __('Address Line 2'); ?></th>
		<th><?php echo __('Address Line 3'); ?></th>
		<th><?php echo __('Address Line 4'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Nationality Id'); ?></th>
		<th><?php echo __('Ethnicity Id'); ?></th>
		<th><?php echo __('Employee Status Id'); ?></th>
		<th><?php echo __('Salary Band Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($employeeType['Employee'] as $employee): ?>
		<tr>
			<td><?php echo $employee['id']; ?></td>
			<td><?php echo $employee['employee_type_id']; ?></td>
			<td><?php echo $employee['employee_number']; ?></td>
			<td><?php echo $employee['gender_id']; ?></td>
			<td><?php echo $employee['team_id']; ?></td>
			<td><?php echo $employee['manager_id']; ?></td>
			<td><?php echo $employee['delegated_id']; ?></td>
			<td><?php echo $employee['cost_centre_id']; ?></td>
			<td><?php echo $employee['location_id']; ?></td>
			<td><?php echo $employee['job_title_id']; ?></td>
			<td><?php echo $employee['email']; ?></td>
			<td><?php echo $employee['home_telephone']; ?></td>
			<td><?php echo $employee['work_telephone']; ?></td>
			<td><?php echo $employee['extension']; ?></td>
			<td><?php echo $employee['mobile']; ?></td>
			<td><?php echo $employee['address_line_1']; ?></td>
			<td><?php echo $employee['address_line_2']; ?></td>
			<td><?php echo $employee['address_line_3']; ?></td>
			<td><?php echo $employee['address_line_4']; ?></td>
			<td><?php echo $employee['country_id']; ?></td>
			<td><?php echo $employee['postcode']; ?></td>
			<td><?php echo $employee['nationality_id']; ?></td>
			<td><?php echo $employee['ethnicity_id']; ?></td>
			<td><?php echo $employee['employee_status_id']; ?></td>
			<td><?php echo $employee['salary_band_id']; ?></td>
			<td><?php echo $employee['created']; ?></td>
			<td><?php echo $employee['created_by']; ?></td>
			<td><?php echo $employee['modified']; ?></td>
			<td><?php echo $employee['modified_by']; ?></td>
			<td><?php echo $employee['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'employees', 'action' => 'view', $employee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'employees', 'action' => 'delete', $employee['id']), array(), __('Are you sure you want to delete # %s?', $employee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
