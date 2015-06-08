<div class="titles index">
	<h2><?php echo __('Titles'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($titles as $title): ?>
	<tr>
		<td><?php echo h($title['Title']['id']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['title']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['created']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['modified']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($title['Title']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $title['Title']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $title['Title']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $title['Title']['id']), array(), __('Are you sure you want to delete # %s?', $title['Title']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination pagination-large">
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('« Previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Next »'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
        </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Title'), array('action' => 'add')); ?></li>
	</ul>
</div>
