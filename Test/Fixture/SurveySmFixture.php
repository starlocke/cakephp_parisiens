<?php
/**
 * SurveySmFixture
 *
 */
class SurveySmFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'survey_sm';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'length' => 36, 'key' => 'primary'),
		'q1' => array('type' => 'integer[]', 'null' => true),
		'q2' => array('type' => 'integer[]', 'null' => true),
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
			'id' => '98abcee4-d620-11e2-ab8e-080027347923',
			'q1' => '{25,25,25,25}',
			'q2' => '{25,25,25,25}',
			'created' => '2013-06-15 20:37:21'
		),
	);

}
