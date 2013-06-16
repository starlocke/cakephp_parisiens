<?php
/**
 * SurveyNqvrFixture
 *
 */
class SurveyNqvrFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'survey_nqvr';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'q1' => array('type' => 'boolean', 'null' => true),
		'q2' => array('type' => 'boolean', 'null' => true),
		'q3' => array('type' => 'integer', 'null' => true),
		'q4' => array('type' => 'integer[]', 'null' => true),
		'q5' => array('type' => 'integer[]', 'null' => true),
		'q6' => array('type' => 'integer', 'null' => true),
		'created' => array('type' => 'datetime', 'null' => true),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '85bd58b6-d620-11e2-ae09-080027347923',
			'q1' => 1,
			'q2' => 1,
			'q3' => 1,
			'q4' => '{1}',
			'q5' => '{1,1,1,1}',
			'q6' => 1,
			'created' => '2013-06-15 20:37:21'
		),
	);

}
