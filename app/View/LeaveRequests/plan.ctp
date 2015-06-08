
<div class="container">
    <h2>Plan Leave</h2>
    <div class="row">
        <div class="panel col-lg-6 well">
<br/>


  <?php 
            echo $this->Form->Create( 'LeaveRequest', array('default'=>false, "class"=>"form-horizontal"));
            echo $this->Form->input('leave_type_id', array( 'empty'=>'- Select - ', 'options' => $options, 
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Leave Type</label><div class="col-sm-5">', 
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
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">End Date</label><div class="col-sm-9">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('relievers', array('autocomplete'=>'off', 'placeholder'=>'Enter the names of your reliever',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Relievers</label><div class="col-sm-9">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false) 
                    );
            echo $this->Form->input('employee_comment', array('type'=>'textarea', 'placeholder'=>'Enter some comment...',
                            'before'=>'<div class="form-group"><label for="title" class="col-sm-3 control-label">Your Comments</label><div class="col-sm-8">', 
                            'after'=>'</div></div>',
                            'class'=>'form-control',
                            'label'=>false)
                    );
           ?>
            <div class="form-group">
          <label for="title" class="col-sm-3 control-label"></label><div class="col-sm-7">
          <?php          
            echo $this->Form->submit('Save', array('class'=>'btn btn-lg btn-primary', 'id'=>'LeaveRequestSave') );
        ?>
        </div></div>
        </div>
    
    
    </div>
    <div class="row">
        <div class="col-lg-6">
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
        
        <table class="table table-hover table-striped table-condensed" width="100%" id="LeavePlanTable">
            <thead><tr><th>No.</th><th>Start Date</th><th>End Date</th><th>Leave Type</th><th align>Days</th><th>Action</th></tr></thead>
            <tbody>
      <?php 
      $i = 1;
        foreach($planned as $u){
            echo '<tr id="tr'.$u["LeaveRequest"]["id"].'"><th>'.$i.'</th><td>'.$u["LeaveRequest"]["start_date"].'</td>'
                    . '<td>'.$u["LeaveRequest"]["end_date"].'</td>'
                    . '<td>'.$u["LeaveType"]["title"].'</td>'
                    . '<td align="center">'.$u["LeaveRequest"]["leave_days"].'</td>'
                    . '<td class="text-center">
                        <ul class="nav nav-pills navbar-right">
                            <li role="presentation" class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-label="Actions for item '.$u["LeaveRequest"]["id"].'">
                                <span class="glyphicon glyphicon-option-vertical"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu" id="action">
                               <li><li>'.$this->Html->link('Book',
                                                array('controller'=>'leaverequests', 'action'=>'book', $u["LeaveRequest"]["id"]), array('class'=>'book', 'id'=>$u["LeaveRequest"]["id"])
                                            ).'</li></li>
                               <li class="divider"></li>
                               <li>'.$this->Html->link('Delete',
                                                array('controller'=>'leaverequests', 'action'=>'delete', $u["LeaveRequest"]["id"]), array('class'=>'delete', 'id'=>$u["LeaveRequest"]["id"])
                                            ).'</li>
                              </ul>
                            </li>
                            
                          </ul>
                    </td></tr>';
        
            $i++;
        }
   
        ?>
            
            </tbody> </table>
    </div>
    </div>
  </div> 