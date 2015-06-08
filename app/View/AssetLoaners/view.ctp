<div class="assetLoaners view">
<h2><?php echo __('Asset Loaner'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($assetLoaner['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $assetLoaner['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asset'); ?></dt>
		<dd>
			<?php echo $this->Html->link($assetLoaner['Asset']['title'], array('controller' => 'assets', 'action' => 'view', $assetLoaner['Asset']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Borrowed Date'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['borrowed_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['due_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Returned Date'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['returned_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approver Id'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['approver_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved Date'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['approved_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($assetLoaner['AssetLoaner']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asset Loaner'), array('action' => 'edit', $assetLoaner['AssetLoaner']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asset Loaner'), array('action' => 'delete', $assetLoaner['AssetLoaner']['id']), array(), __('Are you sure you want to delete # %s?', $assetLoaner['AssetLoaner']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Asset Loaners'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset Loaner'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Assets'), array('controller' => 'assets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset'), array('controller' => 'assets', 'action' => 'add')); ?> </li>
	</ul>
</div>
