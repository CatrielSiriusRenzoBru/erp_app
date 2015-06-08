<div class="beneficiaries view">
<h2><?php echo __('Beneficiary'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($beneficiary['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $beneficiary['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Othernames'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['othernames']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 1'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['address_line_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 2'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['address_line_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 3'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['address_line_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 4'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['address_line_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($beneficiary['Country']['title'], array('controller' => 'countries', 'action' => 'view', $beneficiary['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relationship'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['relationship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($beneficiary['Beneficiary']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Beneficiary'), array('action' => 'edit', $beneficiary['Beneficiary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Beneficiary'), array('action' => 'delete', $beneficiary['Beneficiary']['id']), array(), __('Are you sure you want to delete # %s?', $beneficiary['Beneficiary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Beneficiaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Beneficiary'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
