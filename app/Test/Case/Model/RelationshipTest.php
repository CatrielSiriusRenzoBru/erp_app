<?php
App::uses('Relationship', 'Model');

/**
 * Relationship Test Case
 *
 */
class RelationshipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.relationship',
		'app.emergency_contact',
		'app.country',
		'app.employee',
		'app.bank',
		'app.currency',
		'app.employee_type',
		'app.gender',
		'app.title',
		'app.department',
		'app.team',
		'app.cost_centre',
		'app.location',
		'app.course',
		'app.training',
		'app.job_title',
		'app.ethnicity',
		'app.employee_status',
		'app.nationality',
		'app.salary_band',
		'app.salary',
		'app.user',
		'app.user_role',
		'app.menu',
		'app.asset_loaner',
		'app.asset',
		'app.beneficiary',
		'app.employee_reward',
		'app.leave_record',
		'app.leave_type',
		'app.leave_request',
		'app.leave_status',
		'app.payroll',
		'app.pd'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Relationship = ClassRegistry::init('Relationship');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Relationship);

		parent::tearDown();
	}

}
