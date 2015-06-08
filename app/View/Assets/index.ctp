<div class="assets index">
	<h2><?php echo __('Assets'); ?></h2>
	<table class="table table-striped table-hover table-bordered">
	<thead>
            <tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="text-center"><?php echo $this->Paginator->sort('title'); ?></th>
			<th class="text-center"><?php echo $this->Paginator->sort('barcode'); ?></th>
			<th class="text-center"><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="text-center"><?php echo $this->Paginator->sort('quantity'); ?></th>
			<th class="actions text-center"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($assets as $asset): ?>
	<tr>
		<td><?php echo h($asset['Asset']['id']); ?>&nbsp;</td>
		<td><?php echo h($asset['Asset']['title']); ?>&nbsp;</td>
		<td><?php echo h($asset['Asset']['barcode']); ?>&nbsp;</td>
		<td><?php echo h($asset['Asset']['description']); ?>&nbsp;</td>
                <td class="text-right"><?php echo h($asset['Asset']['quantity']); ?>&nbsp;</td>
		<td class="actions text-center">
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span>'.__(' View'), array('action' => 'view', $asset['Asset']['id']), array('escape'=>false, 'class'=>'btn btn-default btn-sm')); ?>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit">'.__(' Edit').'</span>', array('action' => 'edit', $asset['Asset']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm')); ?>
			<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-trash">'.__(' Delete').'</span>', array('action' => 'delete', $asset['Asset']['id']), array('escape'=>false, 'class'=>'btn btn-danger btn-sm'), __('Are you sure you want to delete %s?', $asset['Asset']['title'])); ?>
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
		<li><?php echo $this->Html->link(__('New Asset'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Asset Loaners'), array('controller' => 'asset_loaners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset Loaner'), array('controller' => 'asset_loaners', 'action' => 'add')); ?> </li>
	</ul>
</div>
