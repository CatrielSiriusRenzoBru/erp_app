<?php
App::uses('AppModel', 'Model');
/**
 * LeaveRequest Model
 *
 * @property Employee $Employee
 * @property LeaveType $LeaveType
 * @property Status $Status
 */
class LeaveRequest extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'leave_type_id' => array(
                    "notEmpty"  => array(
                        "rule"          => "notEmpty",
                        "message"       => "Can't be empty",
                        ),
		),
		'leave_days' => array(
                    "notEmpty"  => array(
                        "rule"          => "notEmpty",
                        "message"       => "Can't be empty",
                        ),
		),
		'start_date' => array(
                    "notEmpty"  => array(
                        "rule"          => "notEmpty",
                        "message"       => "Can't be empty",
                        ),
                ),
		'end_date' => array(
                    "notEmpty"  => array(
                        "rule"          => "notEmpty",
                        "message"       => "Can't be empty",
                        ),
		),
		'relievers' => array(
                    "notEmpty"  => array(
                        "rule"          => "notEmpty",
                        "message"       => "Can't be empty",
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
		),
		'LeaveStatus' => array(
			'className' => 'LeaveStatus',
			'foreignKey' => 'leave_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Approver' => array(
			'className' => 'Employee',
			'foreignKey' => 'approver',
			'conditions' => '',
			'fields' => 'firstname, othernames, lastname',
			'order' => ''
		),
	);
}
