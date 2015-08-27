<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo __('Leave Details'); ?></h4>
        
      </div>
      <div class="modal-body">
        Details of leave request
          <table class="table-hover table">
              <tr><th>Requester</th><td><?php echo $leaveRequest['Employee']['firstname'].' '.$leaveRequest['Employee']['othernames'].' '.$leaveRequest['Employee']['lastname'];?></td></tr>
              <tr><th>Leave Type</th><td><?php echo $leaveRequest['LeaveType']['title'];?></td></tr>
              <tr><th>Leave Status</th><td><?php echo $leaveRequest['LeaveStatus']['title'];?></td></tr>
              <tr><th>Start Date</th><td><?php echo date('jS F Y', strtotime($leaveRequest['LeaveRequest']['start_date']));?></td></tr>
              <tr><th>End Date</th><td><?php echo date('jS F Y', strtotime($leaveRequest['LeaveRequest']['end_date']));?></td></tr>
              <tr><th>Number of Days</th><td><?php echo $leaveRequest['LeaveRequest']['leave_days'].' <i>('.$leaveRequest['LeaveRequest']['days_type'].')</i>';?></td></tr>
              <tr><th>Requester Comments</th><td><?php echo $leaveRequest['LeaveRequest']['employee_comment'];?></td></tr>
              <tr><th>Reliever(s)</th><td>
                  <?php if(!empty($relievers)){
                            foreach($relievers as $row){
                              echo $row['Employee']['firstname'].' '.$row['Employee']['othernames'].' '.$row['Employee']['lastname'].'<br/>';
                            }
                        }
                  ?>
              </td></tr>
              <?php if($leaveRequest['LeaveRequest']['leave_status_id']>2){?>
                    <tr><th>Approved By</th><td><?php echo $leaveRequest['Approver']['firstname'].' '.$leaveRequest['Approver']['othernames'].' '.$leaveRequest['Approver']['lastname'];?></td></tr>
                    <tr><th>Approved On</th><td><?php echo date('jS F Y (H:i:s)', strtotime($leaveRequest['LeaveRequest']['approved_date']));?></td></tr>
              <?php } ?>
              <tr><th>Created On</th><td><?php echo date('jS F Y H:i:s', strtotime($leaveRequest['LeaveRequest']['created']));?></td></tr>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>