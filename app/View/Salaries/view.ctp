<div class="salaries view">
<h2><?php echo __('Salary'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($salary['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $salary['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Base Salary'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['base_salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary Band'); ?></dt>
		<dd>
			<?php echo $this->Html->link($salary['SalaryBand']['title'], array('controller' => 'salary_bands', 'action' => 'view', $salary['SalaryBand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($salary['Salary']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Salary'), array('action' => 'edit', $salary['Salary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Salary'), array('action' => 'delete', $salary['Salary']['id']), array(), __('Are you sure you want to delete # %s?', $salary['Salary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Salaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Salary Bands'), array('controller' => 'salary_bands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Salary Band'), array('controller' => 'salary_bands', 'action' => 'add')); ?> </li>
	</ul>
</div>
