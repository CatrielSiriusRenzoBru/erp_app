<?php
App::uses('Team', 'Model');

/**
 * Team Test Case
 *
 */
class TeamTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.team',
		'app.employee',
		'app.employee_type',
		'app.gender',
		'app.cost_centre',
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
		'app.department',
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
		$this->Team = ClassRegistry::init('Team');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Team);

		parent::tearDown();
	}

}
