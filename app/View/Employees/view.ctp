<div class="row">
    <div class="col-md-12">
      <?php $e = $employees; 
            //echo '<pre>'; print_r($e); exit;
      ?>
       <h2 class="form-signin-heading"><?php echo $e['Employee']['firstname'].' '. $e['Employee']['othernames'].' '.$e['Employee']['lastname'];?></h2>
       <h4 class="labeller"><?php echo $e['JobTitle']['title'];?></h4>
       <div class="col-sm-2"><div class="picture">Picture</div>
        </div>
        
       <div class="col-md-10">
            <table class="table table-hover">
      <thead>
        <tr>
            <th colspan="4"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $e['EmployeeType']['title'];?><br/><span class="labeller">Contract Type</span></td>
          <td><?php echo $e['Gender']['title'];?><br/><span class="labeller">Gender</span></td>
          <td><?php echo $team['CostCentre']['title'];?><br/><span class="labeller">Cost Centre</span></td>
          <td><?php echo $e['Location']['title'];?><br/><span class="labeller">Location</span></td>
        </tr>
        <tr>
            <td><a href="mailto:<?php echo $e['Employee']['email'];?>"><?php echo $e['Employee']['email'];?></a><br/><span class="labeller">Email</span></td>
          <td><?php echo $e['Employee']['work_telephone'];?><br/><span class="labeller">Work Telephone</span></td>
          <td><?php echo $e['Employee']['home_telephone'];?><br/><span class="labeller">Home Telephone</span></td>
          <td><?php echo $e['Employee']['mobile'];?><br/><span class="labeller">Mobile</span></td>
        </tr>
        <tr>
          <td><?php echo $e['Nationality']['title'];?><br/><span class="labeller">Nationality</span></td>
          <td><?php echo $e['Ethnicity']['title'];?><br/><span class="labeller">Ethnicity</span></td>
          <td><?php echo $e['EmployeeStatus']['title'];?><br/><span class="labeller">Employment Status</span></td>
          <td><?php echo $e['SalaryBand']['title'];?><br/><span class="labeller">Salary Band</span></td>
        </tr>
        <tr>
          <td><?php echo $e['Department']['title'];?><br/><span class="labeller">Function</span></td>
          <td><?php echo $e['Team']['title'];?><br/><span class="labeller">Team</span></td>
          <td><?php echo $e['EmployeeStatus']['title'];?><br/><span class="labeller">Line Manager</span></td>
          <td><?php echo $e['SalaryBand']['title'];?><br/><span class="labeller">User Group</span></td>
        </tr>
      </tbody>
    </table>
        </div>
    </div>
    <div class="row">
    <div class="panel col-md-12">
            <div class=" panel panel-primary ">
                <div class="panel-body">    
        
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <li role="presentation" class="active"><a href="#emergency" aria-controls="emergency" role="tab" data-toggle="tab">Emergency Contacts</a></li>
  <li role="presentation"><a href="#bene" aria-controls="bene" role="tab" data-toggle="tab">Next of Kin</a></li>
  <li role="presentation"><a href="#payslips" aria-controls="payslips" role="tab" data-toggle="tab">Payslips</a></li>
  <li role="presentation"><a href="#leaverecords" aria-controls="leaverecords" role="tab" data-toggle="tab">Leave Records</a></li>
  <li role="presentation"><a href="#leaverequests" aria-controls="leaverequests" role="tab" data-toggle="tab">Leave Requests</a></li>
  <li role="presentation"><a href="#assets" aria-controls="assets" role="tab" data-toggle="tab">Assets</a></li>
  <li role="presentation"><a href="#salary" aria-controls="salary" role="tab" data-toggle="tab">Salary</a></li>
  <li role="presentation"><a href="#feedback" aria-controls="feedback" role="tab" data-toggle="tab">Feedback</a></li>
  <li role="presentation"><a href="#training" aria-controls="training" role="tab" data-toggle="tab">Training</a></li>
  <li role="presentation"><a href="#pd" aria-controls="pd" role="tab" data-toggle="tab">Performance Dialogue</a></li>
</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="emergency">
  <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span>'.__(' Add Emergency Contact'), array('controller'=>'emergencycontacts', 'action' => 'add', $e['Employee']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm', "data-toggle"=>"modal", "data-target"=>"#addDetails"));?>
  <?php 
        if(!empty($emergency)){
            //echo '<pre>';print_r($emergency);
  ?>
           <table class="table table-hover table-condensed" width="100%" id="EmergencyContactTable">
            <thead><tr>
                    <th>No.</th>
                    <th><?php echo __('Fullname'); ?></th>
                    <th><?php echo __('Relationship'); ?></th>
                    <th><?php echo __('Contacts'); ?></th>
                    <th><?php echo __('Address'); ?></th>
                    <th  class="actions text-center"><?php echo __('Action'); ?></th></tr>
            </thead>
            <tbody>
      <?php 
      $i = 1;
        foreach($emergency as $u){
            echo '<tr id="tr'.$u['EmergencyContact']["id"].'">';
            echo '<th>'.$i.'</th>';
            echo '<td>'.$u['Title']["title"].' '.$u['EmergencyContact']["firstname"].' '.$u['EmergencyContact']["othernames"].' '.$u['EmergencyContact']["lastname"].'</td>';
            echo '<td>'.$u['Relationship']["title"].'</td>';
            echo '<td>'.$u['EmergencyContact']["telephone"].'<br/><a href="mailto:'.$u['EmergencyContact']["email"].'">'.$u['EmergencyContact']["email"].'</a></td>';
            echo '<td>'.$u['EmergencyContact']["address_line_1"].'<br/>'.$u['EmergencyContact']["address_line_2"].'<br/>'.$u['Country']["title"].'<br/> '.$u['EmergencyContact']["postcode"].'</td>';
            echo  '<td class="actions text-right">';
            //echo $this->Html->link('<span class="glyphicon glyphicon-info-sign">'.__(' View').'</span>', array('controller'=>'emergencycontacts', 'action' => 'view', $u['id']), array('escape'=>false, 'class'=>'btn btn-default btn-sm', "data-toggle"=>"modal", "data-target"=>"#addDetails")).' ';
            echo $this->Html->link('<span class="glyphicon glyphicon-edit">'.__(' Edit').'</span>', array('controller'=>'emergencycontacts', 'action' => 'edit', $u['EmergencyContact']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm', "data-toggle"=>"modal", "data-target"=>"#addDetails")).' ';
            echo $this->Form->postLink('<span class="glyphicon glyphicon-trash">'.__(' Delete').'</span>', array('controller'=>'emergencycontacts', 'action' => 'delete', $u['EmergencyContact']['id']), array('escape'=>false, 'class'=>'btn btn-danger btn-sm'), __('Are you sure you want to delete'));
        
        echo '</td></tr>';
        
            $i++;
        }
        ?>
        </tbody></table>
<?php
        } else {
            echo '<p>No emergency contact details found.</p>';
        }
  ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="bene">
  <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span>'.__(' Add Next of King'), array('controller'=>'beneficiaries', 'action' => 'add', $e['Employee']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm', "data-toggle"=>"modal", "data-target"=>"#addDetails"));?>
  <?php 
        if(!empty($beneficiary)){
            //echo '<pre>';print_r($emergency);
  ?>
           <table class="table table-hover table-condensed" width="100%" id="EmergencyContactTable">
            <thead><tr>
                    <th>No.</th>
                    <th><?php echo __('Fullname'); ?></th>
                    <th><?php echo __('Percentage'); ?></th>
                    <th><?php echo __('Contacts'); ?></th>
                    <th><?php echo __('Address'); ?></th>
                    <th  class="actions text-center"><?php echo __('Action'); ?></th></tr>
            </thead>
            <tbody>
      <?php 
      $i = 1;
        foreach($beneficiary as $u){
            echo '<tr id="tr'.$u['Beneficiary']["id"].'">';
            echo '<th>'.$i.'</th>';
            echo '<td>'.$u['Title']["title"].' '.$u['Beneficiary']["firstname"].' '.$u['Beneficiary']["othernames"].' '.$u['Beneficiary']["lastname"].'</td>';
            echo '<td>'.$u['Beneficiary']['percentage'].'</td>';
            echo '<td>'.$u['Beneficiary']['telephone'].'<br/><a href="mailto:'.$u['Beneficiary']["email"].'">'.$u['Beneficiary']["email"].'</a></td>';
            echo '<td>'.$u['Beneficiary']["address_line_1"].'<br/>'.$u['Beneficiary']["address_line_2"].'<br/>'.$u['Country']["title"].'<br/> '.$u['Beneficiary']["postcode"].'</td>';
            echo  '<td class="actions text-right">';
            //echo $this->Html->link('<span class="glyphicon glyphicon-info-sign">'.__(' View').'</span>', array('controller'=>'emergencycontacts', 'action' => 'view', $u['id']), array('escape'=>false, 'class'=>'btn btn-default btn-sm', "data-toggle"=>"modal", "data-target"=>"#addDetails")).' ';
            echo $this->Html->link('<span class="glyphicon glyphicon-edit">'.__(' Edit').'</span>', array('controller'=>'beneficiaries', 'action' => 'edit', $u['Beneficiary']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm', "data-toggle"=>"modal", "data-target"=>"#addDetails")).' ';
            echo $this->Form->postLink('<span class="glyphicon glyphicon-trash">'.__(' Delete').'</span>', array('controller'=>'beneficiaries', 'action' => 'delete', $u['Beneficiary']['id']), array('escape'=>false, 'class'=>'btn btn-danger btn-sm'), __('Are you sure you want to delete'));
        
        echo '</td></tr>';
        
            $i++;
        }
        ?>
        </tbody></table>
<?php
        } else {
            echo '<p>No next-of-kings found.</p>';
        }
  ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="payslips">Message
      <?php 
        if(!empty($e['Beneficiary'])){
           echo '<pre>'; print_r($e['Beneficiary']);
        }
      ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="leaverecords">Leave Records
<div class="chart">
            

        <div id="columnwrapper" style="display: block; float: left; width:100%; margin-bottom: 20px;"></div>
        <div class="clear"></div>	

        <?php echo ""; ?>

</div>
      
      <?php 
        if(!empty($e['LeaveRecord'])){ 
            //echo '<pre>'; print_r($e['LeaveRecord']);
      ?>
        
      <?php 
            $thead = $tbody = '';
            foreach($e['LeaveRecord'] as $r){
                $thead .= '<th>'.$r['id'].'</th>';
                $tbody .= '<td><span class="badge">'.$r['days_left'].'</span> / '.$r['days_taken'].'</td>';
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
           
     <?php   }
      ?>
  </div>
    <div role="tabpanel" class="tab-pane" id="leaverequests"><h4><?php echo __('Leave Request'); ?></h4>
      <?php 
        if(!empty($leaves)){
           //echo '<pre>'; print_r($e['LeaveRequest']);
         
      ?>
      <table class="table table-hover table-striped table-condensed" width="100%" id="LeavePlanTable">
            <thead><tr>
                    <th>No.</th>
                    <th><?php echo __('Start Date'); ?></th>
                    <th><?php echo __('End Date'); ?></th>
                    <th><?php echo __('Leave Type'); ?></th>
                    <th><?php echo __('Days'); ?></th>
                    <th><?php echo __('Day Type'); ?></th>
                    <th><?php echo __('Status'); ?></th>
                    <th></tr>
            </thead>
            <tbody>
      <?php //echo '<pre>'; print_r($planned); exit;
      $i = 1;
        foreach($leaves as $u){
            echo '<tr id="tr'.$u["LeaveRequest"]["id"].'"><th>'.$i.'</th>';
                    ;
                    echo '<td>'.date('d M Y', strtotime($u["LeaveRequest"]["start_date"])).'</td>';
                    echo '<td>'.date('d M Y', strtotime($u["LeaveRequest"]["end_date"])).'</td>';
                    echo '<td>'.$u["LeaveType"]["title"].'</td>';
                    echo '<td align="center">'.$u["LeaveRequest"]["leave_days"].'</td>';
                    echo '<td>'.$u["LeaveRequest"]["days_type"].'</td>';
                    echo '<td>'.$u["LeaveStatus"]["title"].'</td>';
                    echo  '<td class="actions text-right"> <button type="button" class="glyphicon glyphicon-info-sign btn btn-default btn-sm" data-toggle="modal" data-target="#myModal"> View</button> ';
                   
                    if($u["LeaveStatus"]["id"]==2){
                        echo $this->Html->link('<span class="glyphicon glyphicon-ok-circle">'.__(' Approve').'</span>', array('action' => 'approve', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-primary btn-sm'), __('Are you sure you want to Approve?')).' ';
			echo $this->Form->postLink('<span class="glyphicon glyphicon-ban-circle">'.__(' Reject').'</span>', array('action' => 'reject', $u['LeaveRequest']['id']), array('escape'=>false, 'class'=>'btn btn-danger btn-sm'), __('Are you sure you want to Reject'));
                    }
                    
                echo '</td></tr>';
        
            $i++;
        }
        
   
        ?>
            
            </tbody> </table>
	
        <?php  
        } else {
            echo '<p>No leave records found.</p>';
        }
        ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="assets">Assets Loan
      <?php 
        if(!empty($e['AssetLoaner'])){
           echo '<pre>'; print_r($e['AssetLoaner']);
        }
      ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="salary">Salary Detials
      <?php 
        if(!empty($e['Salary'])){
           echo '<pre>'; print_r($e['Salary']);
        }
      ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="feedback">Feedback</div>
  <div role="tabpanel" class="tab-pane" id="training">Training
      
  </div>
  <div role="tabpanel" class="tab-pane" id="pd">Performance Dialogue
      <?php 
        if(!empty($e['Pd'])){
           echo '<pre>'; print_r($e['Pd']);
        }
      ?>
  </div>
</div>

<script>
  $(function () {
    $('#myTab a:first').tab('show')
  })
</script>
     
 <?php //echo '<pre>'; print_r($employees); ?>       
    </div>    
</div>
    </div>
    </div>
</div>

       <!-- Modal -->
<div id="addDetails" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      </div>
      
      
    </div>

  </div>
</div> 