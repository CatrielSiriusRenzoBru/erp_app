<div class="row">
        <h2><?php echo __('Plan Leave'); ?></h2>
        <div class="panel col-lg-6">
            <div class=" panel panel-primary ">
                <div class="panel-body">
  <?php 
            echo $this->Form->Create( 'LeaveRequest', array('default'=>true, "class"=>"form-horizontal"));
            
            echo $this->Form->input('leave_type_id', array( 'empty'=>'- Select - ', 'options' => $options, 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Leave Type</label><div class="col-sm-7">', 
                            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'error-message')),
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('days_type', array( 'type'=>'checkbox', 'hiddenField' => false, 'value'=>'Half',
                            'before'=>'<div class="form-group"><div class="col-sm-offset-3 col-sm-5"><div class="checkbox"><label>', 
                            'after'=>' half day(s)</label></div></div>',
                            'label'=>false)
                    );
            echo $this->Form->input('start_date', array('type'=>'text', 'placeholder'=>'Pick start date',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Start Date</label><div class="col-sm-5">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('leave_days', array('maxlength'=>'3', 'min' => 1, 'default' => '1',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Number of Days</label><div class="col-sm-2">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('end_date', array('readonly'=> true, 'type'=>'text', 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">End Date</label><div class="col-sm-8">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('relievers', array('autocomplete'=>'off', 'placeholder'=>'Enter the names of your reliever',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Relievers</label><div class="col-sm-9">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control panel',
                            'label'=>false) 
                    );
            echo $this->Form->input('employee_comment', array('type'=>'textarea', 'placeholder'=>'Enter some comment...',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Your Comments</label><div class="col-sm-8">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
            
            echo $this->Form->submit('Send Request', array('id'=>'Login',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label"></label><div class="col-sm-3">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control btn btn-primary') 
                    );
            echo $this->Form->end();
           ?>
            
        </div>
            </div>
        </div>
    
    </div>
    <div class="row">
        <div class="col-lg-4">
        <?php 
            $thead = $tbody = '';
            foreach($list as $r){
                $thead .= '<th>'.$r['LeaveType']['title'].'</th>';
                $tbody .= '<td><span class="badge">'.$r['LeaveRecord']['days_left'].'</span> / '.$r['LeaveRecord']['days_taken'].'</td>';
            }
            
        ?>
        <table class="table table-bordered">
                <thead>
                    <tr align="center">
                        <?php echo $thead; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr align="center">
                        <?php echo $tbody; ?>
                    </tr>
                </tbody>
        </table>
        
        
    </div>
    </div> 