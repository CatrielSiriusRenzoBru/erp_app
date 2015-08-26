<div class="row">
    <h2><?php echo __('Leave History'); ?></h2>
    <div class="row">
        <div class="panel col-lg-12">
            <div class=" panel panel-primary ">
                <div class="panel-body">
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
</div>