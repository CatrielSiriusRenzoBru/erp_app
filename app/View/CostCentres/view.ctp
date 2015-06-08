<div class="costCentres view">
<h2><?php echo __('Cost Centre'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($costCentre['Team']['title'], array('controller' => 'teams', 'action' => 'view', $costCentre['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($costCentre['CostCentre']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cost Centre'), array('action' => 'edit', $costCentre['CostCentre']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cost Centre'), array('action' => 'delete', $costCentre['CostCentre']['id']), array(), __('Are you sure you want to delete # %s?', $costCentre['CostCentre']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cost Centres'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cost Centre'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($costCentre['Employee'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Employee Type Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['employee_type_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Employee Number'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['employee_number']; ?>
&nbsp;</dd>
		<dt><?php echo __('Gender Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['gender_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Team Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['team_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Manager Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['manager_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Delegated Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['delegated_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cost Centre Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['cost_centre_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Location Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['location_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Job Title Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['job_title_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['email']; ?>
&nbsp;</dd>
		<dt><?php echo __('Home Telephone'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['home_telephone']; ?>
&nbsp;</dd>
		<dt><?php echo __('Work Telephone'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['work_telephone']; ?>
&nbsp;</dd>
		<dt><?php echo __('Extension'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['extension']; ?>
&nbsp;</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['mobile']; ?>
&nbsp;</dd>
		<dt><?php echo __('Address Line 1'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['address_line_1']; ?>
&nbsp;</dd>
		<dt><?php echo __('Address Line 2'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['address_line_2']; ?>
&nbsp;</dd>
		<dt><?php echo __('Address Line 3'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['address_line_3']; ?>
&nbsp;</dd>
		<dt><?php echo __('Address Line 4'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['address_line_4']; ?>
&nbsp;</dd>
		<dt><?php echo __('Country Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['country_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['postcode']; ?>
&nbsp;</dd>
		<dt><?php echo __('Nationality Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['nationality_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Ethnicity Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['ethnicity_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Employee Status Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['employee_status_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Salary Band Id'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['salary_band_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['created_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['modified']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['modified_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
	<?php echo $costCentre['Employee']['deleted']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Employee'), array('controller' => 'employees', 'action' => 'edit', $costCentre['Employee']['id'])); ?></li>
			</ul>
		</div>
	</div>
	