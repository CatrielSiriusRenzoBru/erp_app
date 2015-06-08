<div class="container">
    <div class="col-lg-8">
      
       <h3 class="form-signin-heading"><?php echo __('Employment Information'); ?></h3>
       <hr>
      
       <?php 
       
            echo $this->Form->Create( 'Employee', array('default'=>false, "class"=>"form-horizontal"));
            echo $this->Form->input('start_date', array('type'=>'text', 'placeholder'=>'Enter employment date',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Employment Date</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'id'=>'datepicker',
                            'label'=>false) 
                    );
            echo $this->Form->input('job_title_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Job Title</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('department_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Function</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('team_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Team</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('location_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Location</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('manager_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Line Manager</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('User.user_role_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Access Level</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('employee_type_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Employee Type</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo '<hr>';
            echo $this->Form->input('salary_band_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Salary Band</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('currency_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Currency</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('salary', array('type'=>'text', 'placeholder'=>'Enter amount',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Annual Gross</label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('ssn', array('type'=>'text', 'placeholder'=>'Enter SSN',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Social Security Number</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('account_number', array('type'=>'text', 'placeholder'=>'Enter account number',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Account Number</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('bank_id', array( 'empty'=>'- Select - ', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Bank</label><div class="col-sm-6">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('branch_name', array('type'=>'text', 'placeholder'=>'Enter branch or sort code',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Bank Branch/Sort Code</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            
           ?>
            <div class="form-group">
          <label for="title" class="col-sm-3 control-label"></label><div class="col-sm-7">
          <?php 
            //echo '<a class="btn btn-default" href="#" role="button">Save & Go To Previous</a>'; 
            echo $this->Form->submit('Save & Continue', array('class'=>'btn btn-primary', 'id'=>'EmployeeSave') );
        ?>
        </div></div>
        </div>
       
    </div>