<?php
App::uses('AppController', 'Controller');
/**
 * Payrolls Controller
 *
 * @property Payroll $Payroll
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PayrollsController extends AppController {

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
		$this->Payroll->recursive = 0;
		$this->set('payrolls', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payroll->exists($id)) {
			throw new NotFoundException(__('Invalid payroll'));
		}
		$options = array('conditions' => array('Payroll.' . $this->Payroll->primaryKey => $id));
		$this->set('payroll', $this->Payroll->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Payroll->create();
			if ($this->Payroll->save($this->request->data)) {
				$this->Session->setFlash(__('The payroll has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payroll could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Payroll->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Payroll->exists($id)) {
			throw new NotFoundException(__('Invalid payroll'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payroll->save($this->request->data)) {
				$this->Session->setFlash(__('The payroll has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payroll could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payroll.' . $this->Payroll->primaryKey => $id));
			$this->request->data = $this->Payroll->find('first', $options);
		}
		$employees = $this->Payroll->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Payroll->id = $id;
		if (!$this->Payroll->exists()) {
			throw new NotFoundException(__('Invalid payroll'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payroll->delete()) {
			$this->Session->setFlash(__('The payroll has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payroll could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        public function run(){
            $this->loadModel('Tax');
            $this->loadModel('Employee');
            $employees = $this->Employee->find('all', array('recursive'=>-1, 'conditions'=>array('Employee.deleted'=>0, 'Employee.employee_status_id'=>1)));
            //echo '<pre>'; print_r($employees); exit;
            $taxes = $this->Tax->find('all', array('conditions'=>array('Tax.deleted'=>0)));
            
            //echo '<pre>'; print_r($taxes); exit;
            $payroll_code = date('MY');
            
            $payrolls = $this->Payroll->find('all', array( 'conditions'=>array('Payroll.deleted'=>0, 'Payroll.payroll_code'=>$payroll_code), 'order'=>array('Payroll.employee_id'=>'ASC')));
            //echo '<pre>'; print_r($payrolls); exit;
            
            if(!empty($payrolls)){
                //$this->Session->setFlash(__('This Payroll has already run. To rerun seek approval by clicking Rerun button bellow.'));
                $this->Session->setFlash(__('This Payroll has already run. To rerun seek approval by clicking Rerun button bellow.'), 'alert-box', array('class'=>'alert-danger') );
                $this->set(compact('payrolls'));
                return false;
            }
            
            foreach($employees as $employee){
                if($employee['Employee']['salary']>0){
                    // 1. Calculate Employer PF
                    $data = array();
                    //get employee annual basic
                    $annual_basic = $employee['Employee']['salary'];
                    //$employee_id = $employee['Employee']['id'];

                    //get employee monthly basic
                    $monthly_basic = $annual_basic/12;

                    //calculate employer PF
                    $tax = $this->Tax->find('first', array('conditions'=>array('Tax.deleted'=>0, 'Tax.steps'=>'employer_pf')));
                    $data[] = array(
                                    'title'         => $tax['Tax']['title'],
                                    'employee_id'   => $employee['Employee']['id'],
                                    'payroll_code'  => $payroll_code,
                                    'amount'        => $monthly_basic,
                                    'rate_applied'  => $tax['Tax']['rate'],
                                    'tax_component' => $monthly_basic * $tax['Tax']['rate']
                            );
                    // 2. Calculate before tax 
                    // get taxes for before_tax
                    $before_taxes = $this->Tax->find('all', array('conditions'=>array('Tax.deleted'=>0, 'Tax.steps'=>'before_tax')));
                        //loop through and calculate all before tax
                        $chargeable_income = $monthly_basic;
                        foreach($before_taxes as $before_tax){
                            $data[] = array(
                                    'title'         => $before_tax['Tax']['title'],
                                    'employee_id'   => $employee['Employee']['id'],
                                    'payroll_code'  => $payroll_code,
                                    'amount'        => $monthly_basic,
                                    'rate_applied'  => $before_tax['Tax']['rate'],
                                    'tax_component' => $monthly_basic * $before_tax['Tax']['rate']
                            );
                            $chargeable_income = $chargeable_income - ($monthly_basic * $before_tax['Tax']['rate']);
                        }
                    // 3. Apply graduated tax
                        
                    $graduated = $this->Tax->find('all', array('conditions'=>array('Tax.deleted'=>0, 'Tax.steps'=>'tax'), 'order'=>array('Tax.ordering' => 'ASC')));
                    
                    //get cummulative tax
                    $cummulative_tax = 0;
                    $cummulative_income = 0;
                    $income_tax = 0;
                    foreach ($graduated as $next){
                        //get cummulative income and cummulative tax
                        if($next['Tax']['title'] != 'Exceeding'){
                            $cummulative_tax    += $next['Tax']['chargeable']*$next['Tax']['rate'];
                            $cummulative_income += $next['Tax']['chargeable'];
                        } else {
                            $exceeding_tax = $next['Tax']['rate'];
                        }
                        
                    }
                    //echo $cummulative_tax; exit;
                    if(  $chargeable_income > $cummulative_income ){
                        $income_tax = $cummulative_tax + ($chargeable_income - $cummulative_income) * $exceeding_tax;
                    } else {
                        
                        //if amount is less than exceeding amount do a step by step calculation
                        
                        $cummulative_chargeable = 0;
                        $cummulative_tax = 0;
                        
                        $new_income = $chargeable_income;
                        foreach($graduated as $next){
                           
                            if($new_income > $next['Tax']['chargeable']){
                               
                               $cummulative_chargeable += $next['Tax']['chargeable'];
                               $new_income -= $next['Tax']['chargeable']; 
                               //echo $cummulative_tax.'<br/>';
                                
                            } else {
                                
                                $income_tax = ( $new_income * $next['Tax']['rate'] ) + $cummulative_tax;
                                $take_home = $chargeable_income - $income_tax;
                                break;
                            }
                            
                            $cummulative_tax += $next['Tax']['chargeable'] * $next['Tax']['rate'];
                        }
                        
                    }
                    //echo $income_tax.'<br/>'; 
                        $take_home = $chargeable_income - $income_tax;
                        $data[] = array(
                                    'title'         => 'Take Home',
                                    'employee_id'   => $employee['Employee']['id'],
                                    'payroll_code'  => $payroll_code,
                                    'amount'        => $take_home,
                                    'rate_applied'  => $cummulative_tax,
                                    'tax_component' => $income_tax
                            );
                    //exit;
                    //echo $take_home; exit;
                    //echo '<pre>'; print_r($data); exit;
                } else {
                    //say whose salary appears to have a problem
                }
                $this->Payroll->saveMany($data);
            }
            $payrolls = $this->Payroll->find('all', array('conditions'=>array('Payroll.deleted'=>0, 'Payroll.payroll_code'=>$payroll_code)), array('contain'=>array( 'Employee'=>array('User'))));
            $this->Session->setFlash(__('The payroll was generated successfully'), 'alert-box', array('class'=>'alert-success') );
            $this->set(compact('payrolls'));
        }
}
