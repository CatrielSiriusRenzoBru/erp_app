<?php
App::uses('AppController', 'Controller');
/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmployeesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

//        function beforeFilter() {
//            parent::beforeFilter();
//        }
        
/**
 * delegate method
 *
 * @return void
 */
	public function delegate() {
		if (!$this->Employee->exists($this->Session->read('Auth.User.Employee.id'))) {
			throw new NotFoundException(__('Employee does not exist'));
                }
		if ($this->request->is(array('post', 'put'))) { 
                        $this->Employee->read(null, $this->Session->read('Auth.User.Employee.id'));
                        $this->Employee->set(array('delegated_id'=>$this->request->data['Employee']['delegated_id']));
			if ($this->Employee->save()) {
				$this->Session->setFlash(__('The delegated line manager has been saved.'));
				return $this->redirect(array('controller'=>'leaverequests', 'action' => 'inbox'));
			} else {
				$this->Session->setFlash(__('The delegated line manager could not be saved. Please, try again.'));
                                return $this->redirect(array('controller'=>'leaverequests', 'action' => 'inbox'));
			}
		}
        }
        
/**
 * index method
 *
 * @return void
 */
       
	public function index() {
		$this->Employee->recursive = 0;
                $this->paginate = array(
                                    'limit' => 5
                                  );
                $employees = $this->Paginator->paginate();
		$this->set(compact('employees'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
                
                
                
                $chartName = 'Column Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'column');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'columnwrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Leave Records',
                    'titleAlign' => 'center',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '',//'#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ),
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Total Days',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')->addData($this->chartData1);
                $series2->addName('London')->addData($this->chartData2);
                $series3->addName('New York')->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                
                
		$options = array('recursive'=>0, 'conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
		$employees = $this->Employee->find('first', $options);
                $team = $this->Employee->Team->find('first', array('recursive'=>0, 'conditions'=>array('Team.id'=>$employees['Employee']['team_id'])));
                $leaves = $this->Employee->LeaveRequest->find('all', array('recursive'=>0, 'conditions'=>array('LeaveRequest.employee_id'=>$employees['Employee']['id'])));
                //echo '<pre>'; print_r($leaves); exit;
                $this->set(compact('employees', 'leaves', 'team', 'chartName'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                    $this->loadModel('User');
			$this->Employee->create();
                        $this->User->create();
			if ($this->Employee->save($this->request->data['Employee']) ){
                                $id = $this->Employee->getLastInsertID();
                                $this->User->data['User']['employee_id'] = $id; 
                                $this->User->save($this->request->data['User']);
				$this->Session->setFlash(__('The details of the employee was saved successfully.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
			}
		}
		$countries = $this->Employee->Country->find('list');
		$ethnicities = $this->Employee->Ethnicity->find('list');
                $nationalities = $this->Employee->Nationality->find('list');
                $genders = $this->Employee->Gender->find('list');
                $titles = $this->Employee->Title->find('list');
		$this->set(compact('titles', 'genders', 'countries', 'nationalities', 'ethnicities'));
	}
/**
 * job method
 *
 * @return void
 */
	public function job() {
		if ($this->request->is('post')) {
                    $this->loadModel('User');
                    //echo '<pre>'; print_r($this->request->data); echo '</pre>'; //exit;
			$this->Employee->create();
                        $this->User->create();
			if ($this->Employee->save($this->request->data['Employee']) ){
                                $id = $this->Employee->getLastInsertID();
                                $this->User->data['User']['employee_id'] = $id; 
                                $this->User->save($this->request->data['User']);
				$this->Session->setFlash(__('The employee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
			}
		}
                
                $this->loadModel('Team');
                $lm = $this->Team->find('all', array('recursive'=>0, 'contain'=>array('Employee') ) );
                //echo '<pre>'; print_r($lm); exit;
                $managers = array();
                foreach($lm as $manager){
                    if(!empty($manager['Employee'])){
                        $managers[$manager['Employee']['id']] = $manager['Employee']['firstname'].' '.$manager['Employee']['othernames'].' '.$manager['Employee']['lastname'];
                    }
                }
                //echo '<pre>';print_r($managers); exit;
		$employeeTypes = $this->Employee->EmployeeType->find('list');
                $currencies = $this->Employee->Currency->find('list');
                $departments = $this->Employee->Team->find('list', array('conditions'=>array('parent'=>0) ) );
		$teams = $this->Employee->Team->find('list', array('conditions'=>array('parent <>'=>0) ) );
		$banks = $this->Employee->Bank->find('list');
		$locations = $this->Employee->Location->find('list');
		$jobTitles = $this->Employee->JobTitle->find('list');
		$countries = $this->Employee->Country->find('list');
		$ethnicities = $this->Employee->Ethnicity->find('list');
		$employeeStatuses = $this->Employee->EmployeeStatus->find('list');
		$salaryBands = $this->Employee->SalaryBand->find('list');
                $nationalities = $this->Employee->Nationality->find('list');
                $this->loadModel('UserRole');
                $userRoles = $this->UserRole->find('list');
                $titles = $this->Employee->Title->find('list');
		$this->set(compact('departments', 'currencies', 'banks', 'userRoles', 'employeeTypes', 'teams', 'managers', 'delegateds', 'costCentres', 'locations', 'jobTitles', 'countries', 'nationalities', 'ethnicities', 'employeeStatuses', 'salaryBands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employee->save($this->request->data)) {
				$this->Session->setFlash(__('The employee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
		$employeeTypes = $this->Employee->EmployeeType->find('list');
		$teams = $this->Employee->Team->find('list');
		$costCentres = $this->Employee->CostCentre->find('list');
		$locations = $this->Employee->Location->find('list');
		$jobTitles = $this->Employee->JobTitle->find('list');
		$countries = $this->Employee->Country->find('list');
		$ethnicities = $this->Employee->Ethnicity->find('list');
		$employeeStatuses = $this->Employee->EmployeeStatus->find('list');
		$salaryBands = $this->Employee->SalaryBand->find('list');
		$this->set(compact('employeeTypes', 'teams', 'managers', 'delegateds', 'costCentres', 'locations', 'jobTitles', 'countries', 'nationalities', 'ethnicities', 'employeeStatuses', 'salaryBands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Employee->id = $id;
		if (!$this->Employee->exists()) {
			throw new NotFoundException(__('Invalid employee'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employee->delete()) {
			$this->Session->setFlash(__('The employee has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employee could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        public function column() {
                
                $this->layout = 'chart';
                
                $chartName = 'Column Chart';
                
                $mychart = $this->Highcharts->create($chartName, 'column');
                
                $this->Highcharts->setChartParams($chartName, array(
                    'renderTo' => 'columnwrapper', // div to display chart inside
                    'chartWidth' => 800,
                    'chartHeight' => 600,
                    'chartMarginTop' => 60,
                    'chartMarginLeft' => 90,
                    'chartMarginRight' => 30,
                    'chartMarginBottom' => 110,
                    'chartSpacingRight' => 10,
                    'chartSpacingBottom' => 15,
                    'chartSpacingLeft' => 0,
                    'chartAlignTicks' => FALSE,
                    'chartBackgroundColorLinearGradient' => array(0, 0, 0, 300),
                    'chartBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'title' => 'Monthly Sales Summary',
                    'titleAlign' => 'left',
                    'titleFloating' => TRUE,
                    'titleStyleFont' => '18px Metrophobic, Arial, sans-serif',
                    'titleStyleColor' => '#0099ff',
                    'titleX' => 20,
                    'titleY' => 20,
                    'legendEnabled' => TRUE,
                    'legendLayout' => 'horizontal',
                    'legendAlign' => 'center',
                    'legendVerticalAlign ' => 'bottom',
                    'legendItemStyle' => array('color' => '#222'),
                    'legendBackgroundColorLinearGradient' => array(0, 0, 0, 25),
                    'legendBackgroundColorStops' => array(array(0, 'rgb(217, 217, 217)'), array(1, 'rgb(255, 255, 255)')),
                    'tooltipEnabled' => FALSE,
                    //'tooltipBackgroundColorLinearGradient'=> array(0,0,0,50),   // triggers js error
                    //'tooltipBackgroundColorStops' 	=> array(array(0,'rgb(217, 217, 217)'),array(1,'rgb(255, 255, 255)')),
                    //'plotOptionsLinePointStart' 		=> strtotime('-30 day') * 1000,
                    //'plotOptionsLinePointInterval' 	=> 24 * 3600 * 1000,
                    //'xAxisType' 				=> 'datetime',
                    //'xAxisTickInterval' 			=> 10,
                    //'xAxisStartOnTick' 			=> TRUE,
                    //'xAxisTickmarkPlacement' 		=> 'on',
                    //'xAxisTickLength' 			=> 10,
                    //'xAxisMinorTickLength' 		=> 5,
                    'xAxisLabelsEnabled' => TRUE,
                    'xAxisLabelsAlign' => 'right',
                    'xAxisLabelsStep' => 1,
                    //'xAxisLabelsRotation' 		=> -35,
                    'xAxislabelsX' => 5,
                    'xAxisLabelsY' => 20,
                    'xAxisCategories' => array(
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ),
                    //'yAxisMin' 				=> 0,
                    //'yAxisMaxPadding'			=> 0.2,
                    //'yAxisEndOnTick'			=> FALSE,
                    //'yAxisMinorGridLineWidth' 		=> 0,
                    //'yAxisMinorTickInterval' 		=> 'auto',
                    //'yAxisMinorTickLength' 		=> 1,
                    //'yAxisTickLength'			=> 2,
                    //'yAxisMinorTickWidth'			=> 1,
                    'yAxisTitleText' => 'Units Sold',
                    //'yAxisTitleAlign' 			=> 'high',
                    //'yAxisTitleStyleFont' 		=> '14px Metrophobic, Arial, sans-serif',
                    //'yAxisTitleRotation' 			=> 0,
                    //'yAxisTitleX' 			=> 0,
                    //'yAxisTitleY' 			=> -10,
                    //'yAxisPlotLines' 			=> array( array('color' => '#808080', 'width' => 1, 'value' => 0 )),

                    /* autostep options */
                    'enableAutoStep' => FALSE
                        )
                );

                $series1 = $this->Highcharts->addChartSeries();
                $series2 = $this->Highcharts->addChartSeries();
                $series3 = $this->Highcharts->addChartSeries();

                $series1->addName('Tokyo')->addData($this->chartData1);
                $series2->addName('London')->addData($this->chartData2);
                $series3->addName('New York')->addData($this->chartData3);

                $mychart->addSeries($series1);
                $mychart->addSeries($series2);
                $mychart->addSeries($series3);
                
                $this->set(compact('chartName'));
        }
}
