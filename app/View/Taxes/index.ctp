<div class="taxes index">
	<h2><?php echo __('Taxes'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($taxes as $tax): ?>
	<tr>
		<td><?php echo h($tax['Tax']['id']); ?>&nbsp;</td>
		<td><?php echo h($tax['Tax']['title']); ?>&nbsp;</td>
		<td><?php echo h($tax['Tax']['rate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tax['Tax']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tax['Tax']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tax['Tax']['id']), array(), __('Are you sure you want to delete # %s?', $tax['Tax']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?></li>
	</ul>
</div>
