<?php
App::uses('AppModel', 'Model');
/**
 * LeaveRecord Model
 *
 * @property Employee $Employee
 * @property LeaveType $LeaveType
 */
class LeaveRecord extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LeaveType' => array(
			'className' => 'LeaveType',
			'foreignKey' => 'leave_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
