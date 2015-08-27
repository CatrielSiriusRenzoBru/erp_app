<div class="row">
       <h2 class="form-signin-heading"><?php echo __('Pending Requests'); ?></h2>
       <div class="panel col-lg-12">
            <div class=" panel panel-primary ">
                <div class="panel-body">
    <?php 
      if(!empty($planned)){
          ?>
	<table class="table table-hover table-striped table-condensed" width="100%" id="LeavePlanTable">
            <thead><tr>
                    <th>No.</th>
                    <th><?php echo $this->Paginator->sort('User.lastname', 'Full Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('start_date', 'Start Date'); ?></th>
                    <th><?php echo $this->Paginator->sort('end_date', 'End Date'); ?></th>
                    <th><?php echo $this->Paginator->sort('leave_type_id', 'Leave Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('leave_days', 'Days'); ?></th>
                    <th></tr>
            </thead>
            <tbody>
      <?php 
      $i = 1;
        foreach($planned as $u){
            echo '<tr id="tr'.$u["LeaveRequest"]["id"].'"><th>'.$i.'</th>'
                    . '<td>'.$u["Employee"]["firstname"].' '.$u["Employee"]["othernames"].' '.$u["Employee"]["lastname"].'</td>'
                    . '<td>'.date('d M Y', strtotime($u["LeaveRequest"]["start_date"])).'</td>'
                    . '<td>'.date('d M Y', strtotime($u["LeaveRequest"]["end_date"])).'</td>'
                    . '<td>'.$u["LeaveType"]["title"].'</td>'
                    . '<td align="center">'.$u["LeaveRequest"]["leave_days"].'</td>'
                    .'<td class="actions text-center">'
			. $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span>'.__(' View'), array('action' => 'view', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-default btn-sm', "data-toggle"=>"modal", "data-target"=>"#viewDetails")).' '
			. $this->Html->link('<span class="glyphicon glyphicon-ok-circle">'.__(' Approve').'</span>', array('action' => 'approve', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm'), __('Are you sure you want to Approve?')).' '
			. $this->Form->postLink('<span class="glyphicon glyphicon-ban-circle">'.__(' Reject').'</span>', array('action' => 'reject', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-danger btn-sm'), __('Are you sure you want to Reject'))
		.'</td></tr>';
        
            $i++;
        }
      } else {
          echo '<tr><td colspan="7"><i>No pending request...</i><p style="height:120px;"></p></td></tr>';
      }
   
        ?>
            
            </tbody> </table>
                    
        </div>
    </div>
</div>
                    
	<div class="pagination pagination-large">
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('« Previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Next »'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>
        </div>
        
       
       <!-- Modal -->
<div id="viewDetails" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> 
 
</div>
        
