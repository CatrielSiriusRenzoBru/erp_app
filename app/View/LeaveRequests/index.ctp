<div class="row">
    <h2><?php echo __('Leave History'); ?></h2>
    <div class="row">
        <div class="panel col-lg-12">
            <div class=" panel panel-primary ">
                <div class="panel-body">
                 <table class="table table-hover table-striped table-condensed" width="100%" id="LeavePlanTable">
           
            <thead><tr>
                    <th>No.</th>
                    <th><?php echo $this->Paginator->sort('start_date', 'Start Date'); ?></th>
                    <th><?php echo $this->Paginator->sort('end_date', 'End Date'); ?></th>
                    <th><?php echo $this->Paginator->sort('leave_type_id', 'Leave Type'); ?></th>
                    <th><?php echo $this->Paginator->sort('leave_days', 'Days'); ?></th>
                    <th><?php echo $this->Paginator->sort('leave_status_id', 'Status'); ?></th>
                    <th  class="text-center">Action</th>
                   </tr>
            </thead>
            <tbody>
      <?php 
      $i = 1;
      //echo '<pre>';print_r($planned); exit;
        foreach($planned as $u){
            echo '<tr id="tr'.$u["LeaveRequest"]["id"].'"><th>'.$i.'</th><td>'.$u["LeaveRequest"]["start_date"].'</td>'
                    . '<td>'.$u["LeaveRequest"]["end_date"].'</td>'
                    . '<td>'.$u["LeaveType"]["title"].'</td>'
                    . '<td>'.$u["LeaveRequest"]["leave_days"].'</td>'
                    . '<td>'.$u["LeaveStatus"]["title"].'</td>'
                    . '<td class="text-right">'
			. $this->Html->link('<span class="glyphicon glyphicon-info-sign"></span>'.__(' View'), array('action' => 'view', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-default btn-sm', "data-toggle"=>"modal", "data-target"=>"#viewDetails")).' '
			. $this->Form->postLink('<span class="glyphicon glyphicon-ok-circle">'.__(' Book').'</span>', array('action' => 'book', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm'), __('Are you sure you want to book this leave?')).' '
			. $this->Form->postLink('<span class="glyphicon glyphicon-ban-circle">'.__(' Delete').'</span>', array('action' => 'delete', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-danger btn-sm'), __('Are you sure you want to delete this leave'))
		.'
                       
                    </td></tr>';
        
            $i++;
        }
   
        ?>
          
    </tbody> </table>
                </div>  </div>
    <div class="pagination pagination-large">
        <ul class="pagination">
            <?php
                echo $this->Paginator->prev(__('« Previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Next »'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
        </ul>

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
    </div>
</div>