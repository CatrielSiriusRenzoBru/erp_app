<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.user_role',
		'app.menu',
		'app.employee',
		'app.employee_type',
		'app.team',
		'app.cost_centre',
		'app.department',
		'app.gender',
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
		'app.payroll',
		'app.asset_loaner',
		'app.asset',
		'app.beneficiary',
		'app.emergency_contact',
		'app.employee_reward',
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
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
