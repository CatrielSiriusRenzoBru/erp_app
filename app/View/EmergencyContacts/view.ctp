<div class="emergencyContacts view">
<h2><?php echo __('Emergency Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emergencyContact['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $emergencyContact['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Othernames'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['othernames']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 1'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['address_line_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 2'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['address_line_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 3'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['address_line_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 4'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['address_line_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country Id'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['country_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postcode'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['postcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relationship'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['relationship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Emergency Contact'), array('action' => 'edit', $emergencyContact['EmergencyContact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Emergency Contact'), array('action' => 'delete', $emergencyContact['EmergencyContact']['id']), array(), __('Are you sure you want to delete # %s?', $emergencyContact['EmergencyContact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Emergency Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emergency Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Countries'); ?></h3>
	<?php if (!empty($emergencyContact['Country'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['title']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['created_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['modified']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['modified_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
	<?php echo $emergencyContact['Country']['deleted']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Country'), array('controller' => 'countries', 'action' => 'edit', $emergencyContact['Country']['id'])); ?></li>
			</ul>
		</div>
	</div>
	