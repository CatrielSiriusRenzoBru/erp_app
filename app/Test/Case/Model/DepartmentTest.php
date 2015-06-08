<?php
App::uses('Department', 'Model');

/**
 * Department Test Case
 *
 */
class DepartmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.department',
		'app.employee',
		'app.employee_type',
		'app.gender',
		'app.cost_centre',
		'app.team',
		'app.location',
		'app.course',
		'app.training',
		'app.job_title',
		'app.country',
		'app.nationality',
		'app.ethnicity',
		'app.employee_status',
		'app.salary_band',
		'app.salary',
		'app.user',
		'app.asset_loaner',
		'app.asset',
		'app.beneficiary',
		'app.emergency_contact',
		'app.leave_record',
		'app.leave_type',
		'app.leave_request',
		'app.leave_status',
		'app.pd'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Department = ClassRegistry::init('Department');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Department);

		parent::tearDown();
	}

}
