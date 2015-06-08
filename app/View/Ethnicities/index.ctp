<div class="ethnicities index">
	<h2><?php echo __('Ethnicities'); ?></h2>
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
	<?php foreach ($ethnicities as $ethnicity): ?>
	<tr>
		<td><?php echo h($ethnicity['Ethnicity']['id']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['title']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['created']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['modified']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($ethnicity['Ethnicity']['deleted']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ethnicity['Ethnicity']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ethnicity['Ethnicity']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ethnicity['Ethnicity']['id']), array(), __('Are you sure you want to delete # %s?', $ethnicity['Ethnicity']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
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
		<li><?php echo $this->Html->link(__('New Ethnicity'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
