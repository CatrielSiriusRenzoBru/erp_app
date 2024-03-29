<?php
App::uses('AppController', 'Controller');
/**
 * LeaveRequests Controller
 *
 * @property LeaveRequest $LeaveRequest
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LeaveRequestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

       
/**
 * index method
 *
 * @return void
 */
	public function index() {
            $this->Paginator->settings = array(
                'conditions'=>array('LeaveRequest.deleted'=>0, 'LeaveRequest.employee_id'=>  $this->Auth->user('employee_id')),
                'limit' => 15,
                'recursive' => 0
            );
            $planned = $this->Paginator->paginate('LeaveRequest');
            $this->set(compact('planned'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
                $this->layout = null;
		if (!$this->LeaveRequest->exists($id)) {
			throw new NotFoundException(__('Invalid leave request'));
		}
		$options = array('conditions' => array('LeaveRequest.' . $this->LeaveRequest->primaryKey => $id));
		
                $leaveRequest = $this->LeaveRequest->find('first', $options);
                //find the relievers
                $arr = explode(',',$leaveRequest['LeaveRequest']['relievers']);
                $this->loadModel('Employee');
                $relievers = $this->Employee->find('all', array('recursive'=>-1, 'fields'=>array('firstname', 'othernames', 'lastname'), 'conditions'=>array('Employee.id'=>$arr)) );
                
                $this->set(compact('leaveRequest', 'relievers'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeaveRequest->create();
			if ($this->LeaveRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The leave request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave request could not be saved. Please, try again.'));
			}
		}
		$employees = $this->LeaveRequest->Employee->find('list');
		$leaves = $this->LeaveRequest->Leave->find('list');
		$statuses = $this->LeaveRequest->Status->find('list');
		$this->set(compact('employees', 'leaves', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LeaveRequest->exists($id)) {
			throw new NotFoundException(__('Invalid leave request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeaveRequest->save($this->request->data)) {
				$this->Session->setFlash(__('The leave request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
                                $this->Session->setFlash(__('The leave request could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
			}
		} else {
			$options = array('conditions' => array('LeaveRequest.' . $this->LeaveRequest->primaryKey => $id));
			$this->request->data = $this->LeaveRequest->find('first', $options);
		}
		$this->loadModel('LeaveRecord');
                $list = $this->LeaveRecord->find( 'all', array('conditions'=>array('employee_id'=>$this->Auth->user('employee_id'))) );
                $options = array();
                foreach($list as $row){
                    $options[$row['LeaveType']['id']] = $row['LeaveType']['title'];
                }
                //for leave type drop down
                $this->set(compact('options', 'list'));
		$this->set(compact('employees', 'leaves', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
                $response = array();
		$this->LeaveRequest->id = $id;
		if (!$this->LeaveRequest->exists()) {
			throw new NotFoundException(__('Invalid leave request'));
		}
                $rs = $this->LeaveRequest->find('first', array('conditions'=>array('LeaveRequest.id'=>$id)));
                $leave_type_id = $rs['LeaveRequest']['leave_type_id'];
                $leave_days = $rs['LeaveRequest']['leave_days'];
                $this->loadModel('LeaveRecord');
                $leave_records = $this->LeaveRecord->find('first', array('conditions'=>array('leave_type_id'=>$rs['LeaveRequest']['leave_type_id'], 'employee_id'=>$this->Auth->user('employee_id'), 'leave_year'=>date('Y'))));
                $this->LeaveRecord->id = $leave_records['LeaveRecord']['id'];
                $this->LeaveRecord->set(array(
                        'employee_id'=>$rs['LeaveRequest']['employee_id'],
                        'days_left' => $leave_records['LeaveRecord']['days_left']+$rs['LeaveRequest']['leave_days'], 
                        'days_taken'=>$leave_records['LeaveRecord']['days_taken']-$rs['LeaveRequest']['leave_days'],
                        'leave_year'=>date('Y'),
                        'modified_by'=>$this->Auth->user('employee_id'),
                        'modified' => date('Y-m-d H:i:s')
                ));
                if($this->LeaveRecord->save()){
                    $this->request->id = $id;
                    $this->LeaveRequest->set(array('deleted'=>1));
                    if ($this->LeaveRequest->save()) {
                        $response['alert'] = "The leave request has been deleted.";
                        $response['success'] = 1;
                    } else {
                        $response['success'] = 0;
                        $response['alert'] = "The leave request could not be deleted. Please, try again.";
                    }
                } else {
                    $response['success'] = 0;
                    $response['alert'] = "The leave request could not be deleted. Please, try again.";
                }
                echo json_encode($response);
                exit;
	}
        public function plan(){
            $this->loadModel('LeaveRecord');
            $list = $this->LeaveRecord->find( 'all', array('conditions'=>array('employee_id'=>$this->Auth->user('employee_id'))) );
            $options = array();
            foreach($list as $row){
                $options[$row['LeaveType']['id']] = $row['LeaveType']['title'];
            }
            //for leave type drop down
            $this->set(compact('options', 'list'));
            
            //when something is posted
            if ($this->request->is('post', 'put')) {
                   //validate data before save
                    $leave_records = $this->LeaveRecord->find('first', array('conditions'=>array('LeaveRecord.leave_type_id'=>$this->request->data['LeaveRequest']['leave_type_id'], 'LeaveRecord.leave_year'=>date('Y'), 'LeaveRecord.deleted'=>0, 'LeaveRecord.employee_id'=>$this->Auth->user('employee_id'))) );
                    //print_r($leave_records); exit;
                    switch ($this->request->data['LeaveRequest']['leave_type_id']){
                        case 1:
                            if($this->request->data['LeaveRequest']['leave_days'] <= $leave_records['LeaveRecord']['days_left']){
                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['start_date'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
                                $error = false;
                                if( $this->request->data['LeaveRequest']['leave_days'] > $leave_records['LeaveType']['max_days']){
                                    $enddate = 'The maximum you can book for this leave type is '.$leave_records['LeaveType']['max_days'].' days.';
                                    $error = true;
                                }
                            } else {
                                $enddate = 'You cannot book '.$this->request->data['LeaveRequest']['leave_days'].' days, you only have '.$leave_records['LeaveRecord']['days_left'].' days.';
                                $error = true;
                            }
                        break;
                        case 2:
                            $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['start_date'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
                            $error = false;
                        break;
                        case 3:
                            if($this->request->data['LeaveRequest']['leave_days'] <= $leave_records['LeaveRecord']['days_left']){
                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['start_date'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
                                $error = false;
                            } else {
                                $enddate = 'You do not have enough days';
                                $error = true;
                            }
                        break;
                        case 4:
                            if($this->request->data['LeaveRequest']['leave_days'] <= $leave_records['LeaveRecord']['days_left']){
                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['startdate'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
                                $ddays = $leave_records['LeaveRecord']['days_left'];
                                $error = false;
                            } else {
                                $enddate = 'You do not have enough days';
                                $error = true;
                            }
                        break;
                        case 5:
                            if($leave_days <= $leave_records['LeaveRecord']['days_left']){
                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['startdate'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
                                $ddays = $leave_records['LeaveRecord']['days_left'];
                                $error = false;
                            } else {
                                $enddate = 'You do not have enough days';
                                $error = true;
                            }
                        break;
                        default: $enddate = 'Could not retrieve the end date'; $error = true;
                    }
                    
                    
                    $this->request->data['LeaveRequest']['end_date'] = $enddate;
                    //end of validation
                        if($error === false){
                            $this->request->data['LeaveRequest']['employee_id'] = $this->Auth->user('employee_id');
                            $this->request->data['LeaveRequest']['days_type'] = (!isset($this->request->data['LeaveRequest']['days_type'])) ? 'Full' : 'Half';
                            $this->request->data['LeaveRequest']['created_by'] = $this->Auth->user('employee_id');
                            $this->request->data['LeaveRequest']['created'] = date('Y-m-d H:i:s');
                            $this->request->data['LeaveRequest']['leave_status_id'] = 1;
                            
                            $this->LeaveRecord->read(null, $leave_records['LeaveRecord']['id']);
                            
                            $this->LeaveRecord->set(array('employee_id' => $this->Auth->user('employee_id'), 
                                                            'leave_type_id'=>$this->request->data['LeaveRequest']['leave_type_id'], 
                                                            'days_left' => $leave_records['LeaveRecord']['days_left']-$this->request->data['LeaveRequest']['leave_days'], 
                                                            'days_taken'=>$leave_records['LeaveRecord']['days_taken']+$this->request->data['LeaveRequest']['leave_days'],
                                                            'leave_year'=>date('Y'),
                                                            'modified_by'=>$this->Auth->user('employee_id'),
                                                            'modified' => date('Y-m-d H:i:s')
                                                            ));
                            $this->LeaveRequest->create();
                            if ($this->LeaveRequest->save($this->request->data) and $this->LeaveRecord->save()) {
                                    $this->Session->setFlash(__('The leave request has been saved.'), 'alert-box', array('class'=>'alert-success') );
                                    return $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Session->setFlash(__('The leave request could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
                        }
                    } else {
                        $response['success'] = 0;
                        $this->Session->setFlash(__('The leave request could not be saved. Please, check the dates.'), 'alert-box', array('class'=>'alert-danger') );
                    }
		}
        }

        public function history(){

        }

        public function archive(){

        }

        public function team(){

        }
        
        public function calendar($id = null){
            //get month and year
            if(!isset($id)){
                $date = date('m-Y');
            } else {
                $date = $id;
            }
            $val = explode('-', $date);
            $number = cal_days_in_month(CAL_GREGORIAN, $val[0], $val[1]);
            $start = $val[1].'-'.$val[0].'-1';
            $end = $val[1].'-'.$val[0].'-'.$number;
            
            $leaves = $this->LeaveRequest->find('all', array(
                'recursive'=>0,
                'fields'=>array('LeaveRequest.leave_status_id', 'LeaveRequest.start_date', 'LeaveRequest.end_date', 'Employee.firstname', 'Employee.othernames', 'Employee.lastname'),
                'conditions'=>array(
                'Employee.team_id'=>$this->Session->read('Auth.User.Employee.team_id'),
                'OR'=>array(
                    array('LeaveRequest.start_date <= '=>$start,'LeaveRequest.end_date >= '=>$start),
                    array('LeaveRequest.start_date >='=>$start,'LeaveRequest.end_date <='=>$end),
                    array('LeaveRequest.start_date <='=>$end,'LeaveRequest.end_date >='=>$end)
                 )
                 )));
            //echo '<pre>'; print_r($leaves);exit;
            if(!isset($id)){
                $this->set('leaves',$leaves);
            } else {
                $date = $start;
                $month_id = date('d', strtotime($date));
                $totalDays = date('t', strtotime($date));

                $mainBody = ''; //init the main body of the calendar
                $counter = 0; //use this to make the header blocks generate only once  
                foreach($leaves as $r){ //loop once throuth the SQL query
                    $year = date('Y', strtotime($date));    //init year for calendar
                    $month = date('m', strtotime($date));   //init month for calendar
                    $day = date('d', strtotime($date));     //init day for calendar
                    //create table headers
                    $mainBody .= '<tr><th>'.$r['Employee']['firstname'].' '.substr($r['Employee']['othernames'],0,1).'. '.$r['Employee']['lastname'].'</th>'; //print the name of employee on the current leave you are working on
                    if($counter === 0){                         //print blank starting cell for 
                        $dAlpha = '<th></th>';                  //M T W T F S S block
                        $dNum = '<th></th>';                    // 1 2 3 4 5 6 ... 28 or 30 or 31 etc block
                    }
                    for($i=1; $i<=$totalDays; $i++){            //use only one for block for getting MTWTFSS block, 1234... and calendar body block
                        if($counter === 0){                     //check if this is the first time and print headers once
                            $nextDay = date('D', mktime(0, 0, 0, $month, $day, $year));
                            $css = ( in_array( $nextDay, ['Sat', 'Sun'] ) ) ? ' style="color:grey;background-color:#ddd" ' : '';
                            $dAlpha .= '<th '.$css.'>'.  substr($nextDay, 0, 1).'</th>';
                            $dNum .= '<th '.$css.'>'.$i.'</th>';

                        }
                        //end of printing header once
                        
                        //generate colours based on status 
                        switch($r['LeaveRequest']['leave_status_id']){
                            case 1:
                                $colour = 'orange';
                            break;
                            case 2:
                                $colour = 'yellow';
                            break;
                            case 3:
                                $colour = 'green';
                            break;
                            case 4:
                                $colour = 'red';
                            break;
                            case 5:
                                $colour = 'blue';
                            break;
                            case 1:
                                $colour = 'lightgreen';
                            break;
                            default: $colour = 'black';
                        }
                        
                        //do main body below
                        $css2 = ' style="background-color:'.$colour.'"'; //cumtom css this shouldn't be here better declared in CSS file and class called here
                        $nextDate = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)); //generate each day, this is a php thing you need to find Ruby equivalent Make Time/ Make Date
                        if( $nextDate >= $r['LeaveRequest']['start_date'] and $nextDate <= $r['LeaveRequest']['end_date'] ){ //main logic for printing is day is booked no need for all the plenty if blocks in the previous solution
                            $mainBody .= '<th '.$css2.'>&nbsp;</th>';                        //print the booked day
                        } else {
                            $mainBody .= '<th>&nbsp;</th>';                                  //print blank if day is free
                        }
                        $day++;                                                              //increament day for next day date generation
                    }
                    $mainBody .= '<tr>';
                    $counter++;                                                             //increase counter to prevent duplicating headers
                }
                $html = '<table class="table table-bordered" style="font-size:10px;"><tr>'.$dAlpha.'</tr><tr>'.$dNum.'</tr>'.$mainBody.'</table>'; //put everything together
                $response['success'] = 1;
                $response['html'] = $html;
                echo json_encode($response);
                exit;
            }
        }
        public function inbox(){
            
            $this->Paginator->settings = array(
                'conditions' => array('LeaveRequest.leave_status_id' => 2, 'LeaveRequest.deleted' => 0),
                'limit' => 15,
                'recursive' => 0
            );
            $this->loadModel('Employee');
            $condition = array(
              'recursive'=>0,
              'fields'=>array(
                  'Employee.id',
                  'fullname',
              ),
              'conditions' => array(
                'Employee.team_id'=> $this->Session->read('Auth.User.Employee.team_id'),
                'User.user_role_id'=>$this->Session->read('Auth.User.UserRole.id'),
                'Employee.id <>'=>$this->Session->read('Auth.User.id')
                ));
            $options = $this->Employee->find('list', $condition);
            if(empty($options)){
                $condition = array(
              'recursive'=>0,
              'fields'=>array(
                  'Employee.id',
                  'fullname',
              ),
              'conditions' => array(
                'Employee.department_id'=> $this->Session->read('Auth.User.Employee.department_id'),
                'User.user_role_id'=>$this->Session->read('Auth.User.UserRole.id'),
                'Employee.id <>'=>$this->Session->read('Auth.User.id')
                ));
            $options = $this->Employee->find('list', $condition);
            }
            $planned = $this->Paginator->paginate('LeaveRequest');
            $this->set(compact('planned', 'options'));
            
            
        }
        
        public function report(){

        }
        
        public function book($id = null){
            $this->LeaveRequest->id = $id;
            if (!$this->LeaveRequest->exists()) {
                    throw new NotFoundException(__('Invalid leave request'));
            }
            $this->LeaveRequest->read(null, $id);
            $this->LeaveRequest->set(array('leave_status_id'=>2));
            if($this->LeaveRequest->save()) {
                $this->Session->setFlash(__('The leave request has been booked successfully.'), 'alert-box', array('class'=>'alert-success') );
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The leave request could not be booked. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
            }
        }
        
        public function approve($id = null){
            $this->LeaveRequest->id = $id;
            if (!$this->LeaveRequest->exists()) {
                    throw new NotFoundException(__('Invalid leave request'));
            }
            //validate approvals
            $newStatus = 3;
            $this->validateApproval($id, $newStatus);
            $this->LeaveRequest->read(null, $id);
            $this->LeaveRequest->set(array('leave_status_id'=>$newStatus
                                            , 'approved_date'=>date('Y-m-d H:i:s')
                                            ,'approver'=>$this->Auth->user('id')));
            if($this->LeaveRequest->save()) {
                $this->Session->setFlash(__('The leave request has been approved successfully.'), 'alert-box', array('class'=>'alert-success') );
                return $this->redirect(array('action' => 'inbox'));
            } else {
                $this->Session->setFlash(__('The leave request could not be approved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
            }
        }
        
        public function reject($id = null){
            $this->LeaveRequest->id = $id;
            if (!$this->LeaveRequest->exists()) {
                    throw new NotFoundException(__('Invalid leave request'));
            }
            //validate approvals
            $newStatus = 4;
            $this->validateApproval($id, $newStatus);
            $this->LeaveRequest->read(null, $id);
            $this->LeaveRequest->set(array('leave_status_id'=>$newStatus
                                            , 'approved_date'=>date('Y-m-d H:i:s')
                                            ,'approver'=>$this->Auth->user('id')));
            if($this->LeaveRequest->save()) {
                $this->Session->setFlash(__('The leave request has been rejected successfully.'), 'alert-box', array('class'=>'alert-success') );
                return $this->redirect(array('action' => 'inbox'));
            } else {
                $this->Session->setFlash(__('The leave request could not be rejected. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
            }
        }
        
        public function validateApproval($id = null, $newStatus){
            $this->LeaveRequest->id = $id;
            if (!$this->LeaveRequest->exists()) {
                    throw new NotFoundException(__('Invalid leave request'));
            }
            $leave = $this->LeaveRequest->find('first', array('recursive'=>-1, 'conditions'=>array('LeaveRequest.id'=>$id)));
            
            //leave cannot be approved by requester
            if($this->Auth->user('id')==$leave['LeaveRequest']['employee_id']){
                $this->Session->setFlash(__('You are not authorized to approve your own leave, an alert has been sent to the system administrator about this action.'), 'alert-box', array('class'=>'alert-warning') );
                return $this->redirect(array('action' => 'error'));
            }
            exit('stop');
            //approver must have approval rights
            if($this->Session->read('Auth.User.UserRole.id')>2){
                $this->Session->setFlash(__('You are not authorized to approve your own leave, an alert has been sent to the system administrator about this action.'), 'alert-box', array('class'=>'alert-warning') );
                return $this->redirect(array('action' => 'error'));
            }
            //approved and rejected leave cannot be changed
            if(in_array($leave['LeaveRequest']['leave_status_id'], array(3,4))){
                $this->Session->setFlash(__('You are not authorized to modify this request, an alert has been sent to the system administrator about this action.'), 'alert-box', array('class'=>'alert-warning') );
                return $this->redirect(array('action' => 'error'));
            }
            //leave status cannot be reverted
            if($leave['LeaveRequest']['leave_status'] > $newStatus){
                $this->Session->setFlash(__('You are not authorized to modify this request, an alert has been sent to the system administrator about this action.'), 'alert-box', array('class'=>'alert-warning') );
                return $this->redirect(array('action' => 'error'));
            }
        }
        
        public function error(){
            
        }
        
        public function reliever(){
            $this->loadModel('Employee');
            $employees = $this->Employee->find('all', array('recursive'=>-1, 'conditions'=>array('Employee.manager_id'=>$this->Session->read("Auth.User.Employee.manager_id"),'Employee.id !='=>$this->Auth->user('id'))));
            
            $json = '[';
            foreach($employees as $emp){
                $json .= '{"id":"'.$emp['Employee']['id'].'", "name":"'.$emp['Employee']['firstname'].' '.$emp['Employee']['othernames'].' '.$emp['Employee']['lastname'].'"},';
            }
            $json = trim($json, ',');
            $json .= ']';
            echo ltrim(rtrim($json,'"'),'"');
            exit;
        }
        public function getenddate(){
            if(isset($_POST['leave_type_id'])){
                extract($_POST);
                $response = array();
		$ddays = $leave_days;
		//check what type of leave type and return end date
                $this->loadModel('LeaveRecord');
                $leave_records = $this->LeaveRecord->find('first', array('conditions'=>array('LeaveRecord.leave_type_id'=>$leave_type_id, 'LeaveRecord.leave_year'=>date('Y'), 'LeaveRecord.deleted'=>0, 'LeaveRecord.employee_id'=>$this->Auth->user('employee_id'))) );
                switch ($leave_type_id){
                    case 1:
                        if($leave_days <= $leave_records['LeaveRecord']['days_left']){
                            $enddate = $this->calculateEnd($startdate, $leave_days,  $leave_records['LeaveType']['weekends']);
                            if($leave_days > $leave_records['LeaveType']['max_days']){
                                $enddate = 'The maximum you can book for this leave type is '.$leave_records['LeaveType']['max_days'].' days.';
                            }
                        } elseif( $leave_records['LeaveRecord']['days_left']==0 ) {
                            $enddate = 'You cannot book '.$leave_days.' day'.(($leave_days==1)?'':'s').', your remaining balance is '.$leave_records['LeaveRecord']['days_left'];
                        } else {
                            $enddate = 'You cannot book '.$leave_days.' day'.(($leave_days==1)?'':'s').', you only have '.$leave_records['LeaveRecord']['days_left'].' day'.(($leave_records['LeaveRecord']['days_left']==1)?'':'s').' left';
                        }
                    break;
                    case 2:$enddate = $this->calculateEnd($startdate, $leave_days, $leave_records['LeaveType']['weekends']);
                    break;
                    case 3:
                        if($leave_days <= $leave_records['LeaveRecord']['days_left']){
                            $enddate = $this->calculateEnd($startdate, $leave_days, 'Yes');
                        } else {
                            $enddate = 'You do not have enough days';
                        }
                    break;
                    case 4:
                        if($leave_days <= $leave_records['LeaveRecord']['days_left']){
                            $enddate = $this->calculateEnd($startdate, $leave_records['LeaveRecord']['days_left'], $leave_records['LeaveType']['weekends']);
                            $ddays = $leave_records['LeaveRecord']['days_left'];
                        } else {
                            $enddate = 'You do not have enough days';
                        }
                    break;
                    case 5:
                        if($leave_days <= $leave_records['LeaveRecord']['days_left']){
                            $enddate = $this->calculateEnd($startdate, $leave_records['LeaveRecord']['days_left'], $leave_records['LeaveType']['weekends']);
                            $ddays = $leave_records['LeaveRecord']['days_left'];
                        } else {
                            $enddate = 'You do not have enough days';
                        }
                    break;
                    default : $enddate = 'Could not retrieve the end date';
                }
                $response['leave_type'] = $leave_type_id;
                $response['startdate'] = $startdate;
                $response['leave_days'] = $ddays;
                $response['success'] = 1;
                $response['success'] = 1;
                $response['enddate'] = $enddate; 
            } else {
                $response['success'] = 0;
            }
            echo json_encode($response);
            exit; 
        }
        //get all holidays
        public function getHolidays( $startdate = null){
            //$startdate = '2015-04-01';
            $this->loadModel("Holiday");
            $condition = (isset($startdate)) ? array('conditions' => array('holiday_date >= ' => $startdate) ) : '';
            $hol = $this->Holiday->find('all', $condition);
            $holidays = array();
            foreach($hol as $h){
                $holidays[] = $h['Holiday']['holiday_date'];
            }
            return($holidays);
            exit;
        }
        //calculate the endate
        public function calculateEnd( $startdate, $leave_days,  $with_weekend = null ){
            $ddays = $leave_days;
            $range = array();
            $year = date('Y', strtotime( $startdate ));
            $month = date('m',  strtotime( $startdate ));
            $day = date('d',  strtotime( $startdate ));
            for( $i = 0; $i < $leave_days; $i++ )
                {
                        $next  = date ('Y-m-d', mktime(0, 0, 0, $month,   $day,   $year));
                        if(  in_array( $next, $this->getHolidays() ) )
                        {
                            $day++;
                            $leave_days++;
                        } else {
                            $day++;
                        }
                if($with_weekend=='Yes'){
                    if( date('D',strtotime($next)) === 'Fri'){
                        $day = $day+2;
                    } 
                }
                $range[] = $next;
                }
                
                return $range[$leave_days - 1];
        }
}


//if (!$this->LeaveRequest->exists($id)) {
//			throw new NotFoundException(__('Invalid leave request'));
//            }
//            $this->loadModel('LeaveRecord');
//            $list = $this->LeaveRecord->find( 'all', array('conditions'=>array('employee_id'=>$this->Auth->user('employee_id'))) );
//            $options = array();
//            foreach($list as $row){
//                $options[$row['LeaveType']['id']] = $row['LeaveType']['title'];
//            }
//          
//            $details = $this->LeaveRequest->find('first', array('conditions'=>array('LeaveRequest.id'=>$id, 'LeaveRequest.deleted'=>0)));
//            $start_date = $details['LeaveRequest']['start_date'];
//            $end_date = $details['LeaveRequest']['end_date'];
//            $leave_days = $details['LeaveRequest']['leave_days'];
//            $employee_comment = $details['LeaveRequest']['employee_comment'];
//            $this->set(compact('start_date', 'options', 'list', 'employee_comment', 'leave_days', 'end_date' ));
//            //when something is posted
//            if ($this->request->is('post', 'put')) {
//                   //validate data before save
//                    $leave_records = $this->LeaveRecord->find('first', array('conditions'=>array('LeaveRecord.leave_type_id'=>$this->request->data['LeaveRequest']['leave_type_id'], 'LeaveRecord.leave_year'=>date('Y'), 'LeaveRecord.deleted'=>0, 'LeaveRecord.employee_id'=>$this->Auth->user('employee_id'))) );
//                    //print_r($leave_records); exit;
//                    switch ($this->request->data['LeaveRequest']['leave_type_id']){
//                        case 1:
//                            if($this->request->data['LeaveRequest']['leave_days'] <= $leave_records['LeaveRecord']['days_left']){
//                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['start_date'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
//                                $error = false;
//                                if( $this->request->data['LeaveRequest']['leave_days'] > $leave_records['LeaveType']['max_days']){
//                                    $enddate = 'The maximum you can book for this leave type is '.$leave_records['LeaveType']['max_days'].' days.';
//                                    $error = true;
//                                }
//                            } else {
//                                $enddate = 'You cannot book '.$this->request->data['LeaveRequest']['leave_days'].' days, you only have '.$leave_records['LeaveRecord']['days_left'].' days.';
//                                $error = true;
//                            }
//                        break;
//                        case 2:
//                            $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['start_date'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
//                            $error = false;
//                        break;
//                        case 3:
//                            if($this->request->data['LeaveRequest']['leave_days'] <= $leave_records['LeaveRecord']['days_left']){
//                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['start_date'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
//                                $error = false;
//                            } else {
//                                $enddate = 'You do not have enough days';
//                                $error = true;
//                            }
//                        break;
//                        case 4:
//                            if($this->request->data['LeaveRequest']['leave_days'] <= $leave_records['LeaveRecord']['days_left']){
//                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['startdate'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
//                                $ddays = $leave_records['LeaveRecord']['days_left'];
//                                $error = false;
//                            } else {
//                                $enddate = 'You do not have enough days';
//                                $error = true;
//                            }
//                        break;
//                        case 5:
//                            if($leave_days <= $leave_records['LeaveRecord']['days_left']){
//                                $enddate = $this->calculateEnd( $this->request->data['LeaveRequest']['startdate'], $this->request->data['LeaveRequest']['leave_days'],  $leave_records['LeaveType']['weekends']);
//                                $ddays = $leave_records['LeaveRecord']['days_left'];
//                                $error = false;
//                            } else {
//                                $enddate = 'You do not have enough days';
//                                $error = true;
//                            }
//                        break;
//                        default: $enddate = 'Could not retrieve the end date'; $error = true;
//                    }
//                    
//                    
//                    $this->request->data['LeaveRequest']['end_date'] = $enddate;
//                    //end of validation
//                        if($error === false){
//                            $this->request->data['LeaveRequest']['employee_id'] = $this->Auth->user('employee_id');
//                            $this->request->data['LeaveRequest']['days_type'] = (!isset($this->request->data['LeaveRequest']['days_type'])) ? 'Full' : 'Half';
//                            $this->request->data['LeaveRequest']['created_by'] = $this->Auth->user('employee_id');
//                            $this->request->data['LeaveRequest']['created'] = date('Y-m-d H:i:s');
//                            $this->request->data['LeaveRequest']['leave_status_id'] = 1;
//                            
//                            $this->LeaveRecord->read(null, $leave_records['LeaveRecord']['id']);
//                            $this->LeaveRequest->read(null, $id);
//                            
//                            $this->LeaveRecord->set(array('employee_id' => $this->Auth->user('employee_id'), 
//                                                            'leave_type_id'=>$this->request->data['LeaveRequest']['leave_type_id'], 
//                                                            'days_left' => $leave_records['LeaveRecord']['days_left']-$this->request->data['LeaveRequest']['leave_days'], 
//                                                            'days_taken'=>$leave_records['LeaveRecord']['days_taken']+$this->request->data['LeaveRequest']['leave_days'],
//                                                            'leave_year'=>date('Y'),
//                                                            'modified_by'=>$this->Auth->user('employee_id'),
//                                                            'modified' => date('Y-m-d H:i:s')
//                                                            ));
//                            $this->LeaveRequest->set($this->request->data);
//                            if ($this->LeaveRequest->save() and $this->LeaveRecord->save()) {
//                                    $this->Session->setFlash(__('The leave request has been saved.'), 'alert-box', array('class'=>'alert-success') );
//                                    return $this->redirect(array('action' => 'index'));
//                        } else {
//                            $this->Session->setFlash(__('The leave request could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
//                        }
//                    } else {
//                        $response['success'] = 0;
//                        $this->Session->setFlash(__('The leave request could not be saved. Please, check the dates.'), 'alert-box', array('class'=>'alert-danger') );
//                    }
//		}