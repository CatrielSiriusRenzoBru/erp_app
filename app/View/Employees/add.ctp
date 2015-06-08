<div class="container">
    <div class="col-lg-8">
      
       <h3 class="form-signin-heading"><?php echo __('Basic Employee Information'); ?></h3>
      
       <?php 
       
            echo $this->Form->Create( 'Employee', array('default'=>false, "class"=>"form-horizontal"));
            echo $this->Form->input('title_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Title</label><div class="col-sm-4">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('firstname', array('type'=>'text', 'placeholder'=>'Enter first name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Firstname</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('othernames', array('type'=>'text', 'placeholder'=>'Enter other names',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Other Names</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('lastname', array('type'=>'text', 'placeholder'=>'Enter surname or family name',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Surname/Family Name</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('dob', array('type'=>'text', 'placeholder'=>'Enter date of birth',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Date of Birth</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'id'=>'datepicker',
                            'label'=>false) 
                    );
            echo $this->Form->input('gender_id', array( 'empty'=>'- Select - ',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Gender</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('email', array('type'=>'text', 'placeholder'=>'Enter email address',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Email Address</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('mobile', array('type'=>'text', 'placeholder'=>'Enter mobile number',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Mobile</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('home_telephone', array('type'=>'text', 'placeholder'=>'Enter home telephone number',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Home Telephone</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('work_telephone', array('type'=>'text', 'placeholder'=>'Enter work telephone number',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Work Telephone</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('extension', array('type'=>'text', 'placeholder'=>'Enter extension number',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Tel. Ext./Cisco Number</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('address_line_1', array('type'=>'text', 'placeholder'=>'Enter address',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Address Line 1</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('address_line_2', array('type'=>'text', 'placeholder'=>'Enter address',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Address Line 2</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('address_line_3', array('type'=>'text', 'placeholder'=>'Enter address',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Address Line 3</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('address_line_4', array('type'=>'text', 'placeholder'=>'Enter address',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Address Line 4</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('postcode', array('type'=>'text', 'placeholder'=>'Enter post code',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Post Code/Zip Code</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('country_id', array( 'empty'=>'- Select - ',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Country</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('nationality_id', array( 'empty'=>'- Select - ',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Nationality</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('ethnicity_id', array( 'empty'=>'- Select - ',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Ethnicity</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
           ?>
            <div class="form-group">
          <label for="title" class="col-sm-3 control-label"></label><div class="col-sm-7">
          <?php          
            echo $this->Form->submit('Save & Continue', array('class'=>'btn btn-primary', 'id'=>'EmployeeSave') );
        ?>
        </div></div>
        </div>
       
    </div>