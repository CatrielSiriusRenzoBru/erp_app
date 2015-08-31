<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 * @property EmployeeType $EmployeeType
 * @property Gender $Gender
 * @property Department $Department
 * @property Team $Team
 * @property Location $Location
 * @property JobTitle $JobTitle
 * @property Country $Country
 * @property Ethnicity $Ethnicity
 * @property EmployeeStatus $EmployeeStatus
 * @property y $y
 * @property AssetLoaner $AssetLoaner
 * @property Beneficiary $Beneficiary
 * @property Department $Department
 * @property EmergencyContact $EmergencyContact
 * @property EmployeeReward $EmployeeReward
 * @property LeaveRecord $LeaveRecord
 * @property LeaveRequest $LeaveRequest
 * @property Payroll $Payroll
 * @property Pd $Pd
 * @property Salary $Salary
 * @property Team $Team
 * @property Training $Training
 * @property User $User
 */
class Employee extends AppModel {

    public $virtualFields = array('fullname'=>'CONCAT(Employee.firstname, " ", IFNULL(Employee.othernames,""), " ", Employee.lastname)');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'employee_type_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
      'title_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Please select the employee's title",
				'required' => true,
			),
		),
      'firstname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter the first name',
			),
		),
      'dob' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter the date of birth',
				'required' => true,
			),
		),
      'lastname' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter the surname or family name',
				'required' => true,
			),
		),
		'employee_number' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter employee number',
			),
		),
		'gender_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter the gender',
			),
		),
		'department_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'team_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'manager_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'location_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter your location',
			),
		),
		'job_title_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
		),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Email cannot be empty',
			),
		),
		'mobile' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'address_line_1' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'address_line_2' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'address_line_3' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'country_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'postcode' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'nationality_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'ethnicity_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'employee_status_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'salary_band_id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'salary' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
		'start_date' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Can't be empty",
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
                'Bank' => array(
			'className' => 'Bank',
			'foreignKey' => 'bank_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Currency' => array(
			'className' => 'Currency',
			'foreignKey' => 'currency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EmployeeType' => array(
			'className' => 'EmployeeType',
			'foreignKey' => 'employee_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Title' => array(
			'className' => 'Title',
			'foreignKey' => 'title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'JobTitle' => array(
			'className' => 'JobTitle',
			'foreignKey' => 'job_title_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ethnicity' => array(
			'className' => 'Ethnicity',
			'foreignKey' => 'ethnicity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EmployeeStatus' => array(
			'className' => 'EmployeeStatus',
			'foreignKey' => 'employee_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Nationality' => array(
			'className' => 'Nationality',
			'foreignKey' => 'nationality_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SalaryBand' => array(
			'className' => 'SalaryBand',
			'foreignKey' => 'salary_band_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
        );

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AssetLoaner' => array(
			'className' => 'AssetLoaner',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Beneficiary' => array(
			'className' => 'Beneficiary',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmergencyContact' => array(
			'className' => 'EmergencyContact',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EmployeeReward' => array(
			'className' => 'EmployeeReward',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'LeaveRecord' => array(
			'className' => 'LeaveRecord',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'LeaveRequest' => array(
			'className' => 'LeaveRequest',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Payroll' => array(
			'className' => 'Payroll',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Pd' => array(
			'className' => 'Pd',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Salary' => array(
			'className' => 'Salary',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Training' => array(
			'className' => 'Training',
			'foreignKey' => 'employee_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
