<?php
App::uses('SurveyNqvrsController', 'Controller');

/**
 * SurveyNqvrsController Test Case
 *
 */
class SurveyNqvrsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey_nqvr'
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
		$this->testAction('/survey_nqvrs/delete/85bd58b6-d620-11e2-ae09-080027347923');
		$this->assertRegExp('/survey_nqvrs$/', $this->headers['Location']);
		$this->testAction('/survey_nqvrs', array('method'=>'GET', 'return'=>'vars'));
		$this->assertEmpty($this->vars['surveyNqvrs']);
	}

}
