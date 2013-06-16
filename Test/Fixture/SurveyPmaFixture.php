<?php
/**
 * SurveyPmaFixture
 *
 */
class SurveyPmaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'survey_pma';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'q1' => array('type' => 'integer', 'null' => true),
		'q2' => array('type' => 'integer', 'null' => true),
		'q3' => array('type' => 'integer[]', 'null' => true),
		'q4' => array('type' => 'boolean', 'null' => true),
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
			'id' => '862289f2-d620-11e2-80f1-080027347923',
			'q1' => 1,
			'q2' => 1,
			'q3' => '{1,1,1,1,1,1,1}',
			'q4' => 1,
			'created' => '2013-06-15 20:37:21'
		),
	);

}
