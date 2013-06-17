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
		$data = array(
			'SurveyNqvr' => array(
					'q1' => true
				, 'q2' => true
				, 'q3' => 2
				, 'q4' => '{2,3}'
				, 'q5' => '{3,4,3,2,1,2,3,4,3,2,1}'
				, 'q6' => 3
			)
		);
		$this->testAction('/survey_nqvrs/add.json', array('data' => $data));
		$this->assertRegExp('/survey_nqvrs$/', $this->headers['Location']);
		$this->testAction('/survey_nqvrs/index.json', array('method'=>'GET', 'return'=>'vars'));
		$this->assertNotEmpty($this->vars['surveyNqvrs'][1]['SurveyNqvr']['id']);
		$this->assertNotEmpty($this->vars['surveyNqvrs'][1]['SurveyNqvr']['created']);
		$this->assertEquals(true, $this->vars['surveyNqvrs'][1]['SurveyNqvr']['q1']);
		$this->assertEquals(true, $this->vars['surveyNqvrs'][1]['SurveyNqvr']['q2']);
		$this->assertEquals(2, $this->vars['surveyNqvrs'][1]['SurveyNqvr']['q3']);
		$this->assertEquals('{2,3}', $this->vars['surveyNqvrs'][1]['SurveyNqvr']['q4']);
		$this->assertEquals('{3,4,3,2,1,2,3,4,3,2,1}', $this->vars['surveyNqvrs'][1]['SurveyNqvr']['q5']);
		$this->assertEquals(3, $this->vars['surveyNqvrs'][1]['SurveyNqvr']['q6']);
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$data = array('SurveyNqvr' => array('id' => '85bd58b6-d620-11e2-ae09-080027347923', 'q2' => false, 'q5' => '{2,3}'));
		$this->testAction('/survey_nqvrs/edit/85bd58b6-d620-11e2-ae09-080027347923',
						array('method'=>'POST', 'data' => $data, 'return'=>'contents'));
		$this->assertRegExp('/survey_nqvrs$/', $this->headers['Location']);
		//$this->autoMock = false;
		$this->testAction('/survey_nqvrs', array('method'=>'GET', 'return'=>'vars'));
		$this->assertEquals('85bd58b6-d620-11e2-ae09-080027347923', $this->vars['surveyNqvrs'][0]['SurveyNqvr']['id']);
		$this->assertEquals('2013-06-15 20:37:21', $this->vars['surveyNqvrs'][0]['SurveyNqvr']['created']);
		$this->assertEquals(true, $this->vars['surveyNqvrs'][0]['SurveyNqvr']['q1']);
		$this->assertEquals(false, $this->vars['surveyNqvrs'][0]['SurveyNqvr']['q2']);
		$this->assertEquals(1, $this->vars['surveyNqvrs'][0]['SurveyNqvr']['q3']);
		$this->assertEquals('{1}', $this->vars['surveyNqvrs'][0]['SurveyNqvr']['q4']);
		$this->assertEquals('{2,3}', $this->vars['surveyNqvrs'][0]['SurveyNqvr']['q5']);
		$this->assertEquals(1, $this->vars['surveyNqvrs'][0]['SurveyNqvr']['q6']);
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

	public function testReport() {
		$this->testAction('/survey_nqvrs/report.json', array('method'=>'GET', 'return'=>'vars'));
		$this->assertNotEmpty($this->vars['report']);
		$this->assertEquals('{"report":{"q1.yes":"1","q1.no":"0","q1.unknown":"0","q2.yes":"1","q2.no":"0","q2.unknown":"0","q3.1-5":"1","q3.6-10":"0","q3.11-50":"0","q3.51+":"0","q3.unknown":"0","q4.tr\u00e8s_amicaux":"1","q4.amicaux":"0","q4.neutres":"0","q4.inamicaux":"0","q4.odieux":"0","q4.unknown":"0","q5.tr\u00e8s_amicaux":"4","q5.amicaux":"0","q5.neutres":"0","q5.inamicaux":"0","q5.odieux":"0","q5.unknown":"0","q6.tr\u00e8s_amicaux":"1","q6.amicaux":"0","q6.neutres":"0","q6.inamicaux":"0","q6.odieux":"0","q6.unknown":"0"}}', $this->contents);
	}

}
