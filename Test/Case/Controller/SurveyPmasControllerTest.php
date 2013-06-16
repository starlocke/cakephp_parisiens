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
		$this->testAction('/survey_pmas/index.json', array('method'=>'GET', 'return' => 'contents'));
		$expected = '{"surveyPmas":[{"SurveyPma":{"id":"862289f2-d620-11e2-80f1-080027347923","q1":1,"q2":1,"q3":"{1,1,1,1,1,1,1}","q4":true,"created":"2013-06-15 20:37:21"}}]}';
		$this->assertEquals($expected, $this->contents);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->testAction('/survey_pmas/view/862289f2-d620-11e2-80f1-080027347923.json',
						array('method'=>'GET', 'return'=>'vars'));
		$this->assertEquals('862289f2-d620-11e2-80f1-080027347923', $this->vars['surveyPma']['SurveyPma']['id']);
		$this->assertEquals('2013-06-15 20:37:21', $this->vars['surveyPma']['SurveyPma']['created']);
		$this->assertEquals(1, $this->vars['surveyPma']['SurveyPma']['q1']);
		$this->assertEquals(1, $this->vars['surveyPma']['SurveyPma']['q2']);
		$this->assertEquals('{1,1,1,1,1,1,1}', $this->vars['surveyPma']['SurveyPma']['q3']);
		$this->assertEquals(true, $this->vars['surveyPma']['SurveyPma']['q4']);
		$expected = '{"surveyPma":{"SurveyPma":{"id":"862289f2-d620-11e2-80f1-080027347923","q1":1,"q2":1,"q3":"{1,1,1,1,1,1,1}","q4":true,"created":"2013-06-15 20:37:21"}}}';
		$this->assertEquals($expected, $this->contents);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$data = array(
			'SurveyPma' => array(
					'q1' => 2
				, 'q2' => 3
				, 'q3' => '{1,2,3,4,5,4,3}'
				, 'q4' => true
			)
		);
		$this->testAction('/survey_pmas/add.json', array('data' => $data));
		$this->assertRegExp('/survey_pmas$/', $this->headers['Location']);
		$this->testAction('/survey_pmas/index.json', array('method'=>'GET', 'return'=>'vars'));
		$this->assertNotEmpty($this->vars['surveyPmas'][1]['SurveyPma']['id']);
		$this->assertNotEmpty($this->vars['surveyPmas'][1]['SurveyPma']['created']);
		$this->assertEquals(2, $this->vars['surveyPmas'][1]['SurveyPma']['q1']);
		$this->assertEquals(3, $this->vars['surveyPmas'][1]['SurveyPma']['q2']);
		$this->assertEquals('{1,2,3,4,5,4,3}', $this->vars['surveyPmas'][1]['SurveyPma']['q3']);
		$this->assertEquals(true, $this->vars['surveyPmas'][1]['SurveyPma']['q4']);

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
