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
		$this->testAction('/survey_nqvrs/index.json', array('method'=>'GET', 'return' => 'contents'));
		$expected = '{"surveyNqvrs":[{"SurveyNqvr":{"id":"85bd58b6-d620-11e2-ae09-080027347923","q1":true,"q2":true,"q3":1,"q4":"{1}","q5":"{1,1,1,1}","q6":1,"created":"2013-06-15 20:37:21"}}]}';
		$this->assertEquals($expected, $this->contents);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->testAction('/survey_nqvrs/view/85bd58b6-d620-11e2-ae09-080027347923.json',
						array('method'=>'GET', 'return'=>'vars'));
		$this->assertEquals('85bd58b6-d620-11e2-ae09-080027347923', $this->vars['surveyNqvr']['SurveyNqvr']['id']);
		$this->assertEquals('2013-06-15 20:37:21', $this->vars['surveyNqvr']['SurveyNqvr']['created']);
		$this->assertEquals(true, $this->vars['surveyNqvr']['SurveyNqvr']['q1']);
		$this->assertEquals(true, $this->vars['surveyNqvr']['SurveyNqvr']['q2']);
		$this->assertEquals(1, $this->vars['surveyNqvr']['SurveyNqvr']['q3']);
		$this->assertEquals('{1}', $this->vars['surveyNqvr']['SurveyNqvr']['q4']);
		$this->assertEquals('{1,1,1,1}', $this->vars['surveyNqvr']['SurveyNqvr']['q5']);
		$this->assertEquals(1, $this->vars['surveyNqvr']['SurveyNqvr']['q6']);
		$expected = '{"surveyNqvr":{"SurveyNqvr":{"id":"85bd58b6-d620-11e2-ae09-080027347923","q1":true,"q2":true,"q3":1,"q4":"{1}","q5":"{1,1,1,1}","q6":1,"created":"2013-06-15 20:37:21"}}}';
		$this->assertEquals($expected, $this->contents);
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
