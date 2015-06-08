<div class="assets view">
<h2><?php echo __('Asset'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barcode'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['barcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($asset['Asset']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asset'), array('action' => 'edit', $asset['Asset']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asset'), array('action' => 'delete', $asset['Asset']['id']), array(), __('Are you sure you want to delete # %s?', $asset['Asset']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Assets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asset Loaners'), array('controller' => 'asset_loaners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset Loaner'), array('controller' => 'asset_loaners', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Asset Loaners'); ?></h3>
	<?php if (!empty($asset['AssetLoaner'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Asset Id'); ?></th>
		<th><?php echo __('Borrowed Date'); ?></th>
		<th><?php echo __('Due Date'); ?></th>
		<th><?php echo __('Returned Date'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Approver Id'); ?></th>
		<th><?php echo __('Approved Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($asset['AssetLoaner'] as $assetLoaner): ?>
		<tr>
			<td><?php echo $assetLoaner['id']; ?></td>
			<td><?php echo $assetLoaner['title']; ?></td>
			<td><?php echo $assetLoaner['employee_id']; ?></td>
			<td><?php echo $assetLoaner['asset_id']; ?></td>
			<td><?php echo $assetLoaner['borrowed_date']; ?></td>
			<td><?php echo $assetLoaner['due_date']; ?></td>
			<td><?php echo $assetLoaner['returned_date']; ?></td>
			<td><?php echo $assetLoaner['comments']; ?></td>
			<td><?php echo $assetLoaner['approver_id']; ?></td>
			<td><?php echo $assetLoaner['approved_date']; ?></td>
			<td><?php echo $assetLoaner['created']; ?></td>
			<td><?php echo $assetLoaner['created_by']; ?></td>
			<td><?php echo $assetLoaner['modified']; ?></td>
			<td><?php echo $assetLoaner['modified_by']; ?></td>
			<td><?php echo $assetLoaner['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asset_loaners', 'action' => 'view', $assetLoaner['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asset_loaners', 'action' => 'edit', $assetLoaner['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asset_loaners', 'action' => 'delete', $assetLoaner['id']), array(), __('Are you sure you want to delete # %s?', $assetLoaner['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Asset Loaner'), array('controller' => 'asset_loaners', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
