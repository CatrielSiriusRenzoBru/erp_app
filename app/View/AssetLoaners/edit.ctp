<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo __('Edit Asset Assignment'); ?></h4>
        
      </div>
<?php echo $this->Form->create('AssetLoaner', array("controller" => "assetloaners", "action"=>"edit", "class"=>"form-horizontal")); ?>
	
	<?php
		echo $this->Form->input('asset_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Asset</label><div class="col-sm-4">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
//                echo $this->Form->input('borrowed_date', array('type'=>'text', 'placeholder'=>'Pick start date',
//                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Assign Date</label><div class="col-sm-5">', 
//                            'after'=>'</div></div>',
//                            'class'=>'form-control',
//                            'label'=>false) 
//                    );
                echo $this->Form->input('comments', array('type'=>'textarea', 'placeholder'=>'Enter some comment...',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Your Comments</label><div class="col-sm-8">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
		echo $this->Form->input('employee_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
                echo $this->Form->submit('Assign Asset', array('id'=>'AddAssetLoaner',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label"></label><div class="col-sm-4">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control btn btn-primary') 
                    );
                echo $this->Form->end();
        ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
</div>
