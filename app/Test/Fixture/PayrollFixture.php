<?php
/**
 * PayrollFixture
 *
 */
class PayrollFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'payroll';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'employee_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'payroll_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'rate_applied' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tax_component' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'title' => 'Lorem ipsum dolor sit amet',
			'employee_id' => 1,
			'payroll_code' => 1,
			'amount' => 1,
			'rate_applied' => 1,
			'tax_component' => 1,
			'created' => '2015-03-07 00:30:26',
			'created_by' => 1,
			'modified' => '2015-03-07 00:30:26',
			'modified_by' => 1,
			'deleted' => 1
		),
	);

}
