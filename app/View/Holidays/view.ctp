<div class="holidays view">
<h2><?php echo __('Holiday'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holiday Date'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['holiday_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['modified_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Holiday'), array('action' => 'edit', $holiday['Holiday']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Holiday'), array('action' => 'delete', $holiday['Holiday']['id']), array(), __('Are you sure you want to delete # %s?', $holiday['Holiday']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Holidays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holiday'), array('action' => 'add')); ?> </li>
	</ul>
</div>
