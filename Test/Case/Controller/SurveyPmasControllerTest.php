<?php
App::uses('SurveyPmasController', 'Controller');

/**
 * SurveyPmasController Test Case
 *
 */
class SurveyPmasControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey_pma'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->testAction('/survey_pmas/delete/862289f2-d620-11e2-80f1-080027347923');
		$this->assertRegExp('/survey_pmas$/', $this->headers['Location']);
		$this->testAction('/survey_pmas', array('method'=>'GET', 'return'=>'vars'));
		$this->assertEmpty($this->vars['surveyPmas']);
	}

}
