<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo __('Add Beneficiary'); ?></h4>
        
      </div>
<?php echo $this->Form->create('Beneficiary', array("controller" => "beneficiaries", "action"=>"add", "class"=>"form-horizontal")); ?>
	
	<?php
        echo $this->Form->input('title_id', array( 'empty'=>'- Select - ', 'options'=>$title,
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Title</label><div class="col-sm-4">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('firstname', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">First name</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('othernames', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Othername(s)</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('lastname', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Surname</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('telephone', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Telephone</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('email', array('type'=>'email', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Email Address</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('address_line_1', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Address Line 1</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('address_line_2', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Address Line 2</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('postcode', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Post Code</label><div class="col-sm-5">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('country_id', array( 'empty'=>'- Select - ', 'options'=>$country,
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Country</label><div class="col-sm-4">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
        echo $this->Form->input('percentage', array( 'type'=>'text',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Percentage</label><div class="col-sm-4">',
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
		echo $this->Form->input('employee_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
	echo $this->Form->submit('Save Next-of-King', array('id'=>'AddEmergencyContact',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label"></label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control btn btn-primary') 
                    );
            echo $this->Form->end();
        ?>
    
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
</div>

