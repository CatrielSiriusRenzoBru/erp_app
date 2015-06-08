<div class="assets form">
<?php echo $this->Form->create('Asset', array( "class"=>"form-horizontal")); ?>
	<fieldset>
		<legend><?php echo __('Add Asset'); ?></legend>
	<?php
		echo $this->Form->input('title', array('before'=>'<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label><div class="col-sm-6">', 'after'=>'</div>
  </div>', 'label'=>false));
		echo $this->Form->input('barcode', array('before'=>'<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Barcode</label><div class="col-sm-6">', 'after'=>'</div>
  </div>', 'label'=>false));
		echo $this->Form->input('description', array('before'=>'<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Description</label><div class="col-sm-6">', 'after'=>'</div>
  </div>', 'label'=>false));
		echo $this->Form->input('quantity', array('before'=>'<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Quantity</label><div class="col-sm-6">', 'after'=>'</div>
  </div>', 'label'=>false));
	?>
  <div class="form-group"><div class="col-sm-6">
          <label for="title" class="col-sm-4 control-label"></label>           
<?php echo $this->Form->submit( __('Save'), array('class'=>'btn btn-primary')); ?>
      </div></div>
  </fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Assets'), array('controller'=>'assets', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(__('List Asset Loaners'), array('controller' => 'asset_loaners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asset Loaner'), array('controller' => 'asset_loaners', 'action' => 'add')); ?> </li>
	</ul>
</div>
