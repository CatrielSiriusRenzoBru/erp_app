<div class="relationships view">
<h2><?php echo __('Relationship'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($relationship['Relationship']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Relationship'), array('action' => 'edit', $relationship['Relationship']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Relationship'), array('action' => 'delete', $relationship['Relationship']['id']), array(), __('Are you sure you want to delete # %s?', $relationship['Relationship']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Relationships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Relationship'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emergency Contacts'), array('controller' => 'emergency_contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emergency Contact'), array('controller' => 'emergency_contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Emergency Contacts'); ?></h3>
	<?php if (!empty($relationship['EmergencyContact'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Othernames'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Address Line 1'); ?></th>
		<th><?php echo __('Address Line 2'); ?></th>
		<th><?php echo __('Address Line 3'); ?></th>
		<th><?php echo __('Address Line 4'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Relationship Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($relationship['EmergencyContact'] as $emergencyContact): ?>
		<tr>
			<td><?php echo $emergencyContact['id']; ?></td>
			<td><?php echo $emergencyContact['title']; ?></td>
			<td><?php echo $emergencyContact['employee_id']; ?></td>
			<td><?php echo $emergencyContact['firstname']; ?></td>
			<td><?php echo $emergencyContact['othernames']; ?></td>
			<td><?php echo $emergencyContact['lastname']; ?></td>
			<td><?php echo $emergencyContact['address_line_1']; ?></td>
			<td><?php echo $emergencyContact['address_line_2']; ?></td>
			<td><?php echo $emergencyContact['address_line_3']; ?></td>
			<td><?php echo $emergencyContact['address_line_4']; ?></td>
			<td><?php echo $emergencyContact['country_id']; ?></td>
			<td><?php echo $emergencyContact['postcode']; ?></td>
			<td><?php echo $emergencyContact['relationship_id']; ?></td>
			<td><?php echo $emergencyContact['created']; ?></td>
			<td><?php echo $emergencyContact['created_by']; ?></td>
			<td><?php echo $emergencyContact['modified']; ?></td>
			<td><?php echo $emergencyContact['modified_by']; ?></td>
			<td><?php echo $emergencyContact['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'emergency_contacts', 'action' => 'view', $emergencyContact['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'emergency_contacts', 'action' => 'edit', $emergencyContact['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'emergency_contacts', 'action' => 'delete', $emergencyContact['id']), array(), __('Are you sure you want to delete # %s?', $emergencyContact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Emergency Contact'), array('controller' => 'emergency_contacts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
