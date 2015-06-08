<div class="taxes view">
<h2><?php echo __('Tax'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tax'), array('action' => 'edit', $tax['Tax']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tax'), array('action' => 'delete', $tax['Tax']['id']), array(), __('Are you sure you want to delete # %s?', $tax['Tax']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?> </li>
	</ul>
</div>
