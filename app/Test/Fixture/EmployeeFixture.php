<?php
/**
 * EmployeeFixture
 *
 */
class EmployeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'employee_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'employee_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 12, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gender_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'team_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'manager_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'delegated_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'location_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'job_title_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'home_telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'work_telephone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'extension' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mobile' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address_line_1' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address_line_2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address_line_3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address_line_4' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'postcode' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 12, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'nationality_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'ethnicity_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'employee_status_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'salary_band_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'salary' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'start_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'deleted' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'employee_type_id' => 1,
			'employee_number' => 'Lorem ipsu',
			'gender_id' => 1,
			'department_id' => 1,
			'team_id' => 1,
			'manager_id' => 1,
			'delegated_id' => 1,
			'location_id' => 1,
			'job_title_id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'home_telephone' => 'Lorem ipsum d',
			'work_telephone' => 'Lorem ipsum d',
			'extension' => 'Lorem ip',
			'mobile' => 'Lorem ipsum d',
			'address_line_1' => 'Lorem ipsum dolor sit amet',
			'address_line_2' => 'Lorem ipsum dolor sit amet',
			'address_line_3' => 'Lorem ipsum dolor sit amet',
			'address_line_4' => 'Lorem ipsum dolor sit amet',
			'country_id' => 1,
			'postcode' => 'Lorem ipsu',
			'nationality_id' => 1,
			'ethnicity_id' => 1,
			'employee_status_id' => 1,
			'salary_band_id' => 1,
			'salary' => 1,
			'start_date' => '2015-03-07',
			'end_date' => '2015-03-07',
			'created' => '2015-03-07 14:50:16',
			'created_by' => 1,
			'modified' => '2015-03-07 14:50:16',
			'modified_by' => 1,
			'deleted' => 1
		),
	);

}
