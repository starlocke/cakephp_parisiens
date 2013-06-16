<?php
App::uses('SurveySmsController', 'Controller');

/**
 * SurveySmsController Test Case
 *
 */
class SurveySmsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey_sm'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/survey_sms/index.json', array('method'=>'GET', 'return' => 'contents'));
		$expected = '{"surveySms":[{"SurveySm":{"id":"98abcee4-d620-11e2-ab8e-080027347923","q1":"{25,25,25,25}","q2":"{25,25,25,25}","created":"2013-06-15 20:37:21"}}]}';
		$this->assertEquals($expected, $this->contents);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->testAction('/survey_sms/view/98abcee4-d620-11e2-ab8e-080027347923.json',
						array('method'=>'GET', 'return'=>'vars'));
		$this->assertEquals('98abcee4-d620-11e2-ab8e-080027347923', $this->vars['surveySm']['SurveySm']['id']);
		$this->assertEquals('2013-06-15 20:37:21', $this->vars['surveySm']['SurveySm']['created']);
		$this->assertEquals('{25,25,25,25}', $this->vars['surveySm']['SurveySm']['q1']);
		$this->assertEquals('{25,25,25,25}', $this->vars['surveySm']['SurveySm']['q2']);
		$expected = '{"surveySm":{"SurveySm":{"id":"98abcee4-d620-11e2-ab8e-080027347923","q1":"{25,25,25,25}","q2":"{25,25,25,25}","created":"2013-06-15 20:37:21"}}}';
		$this->assertEquals($expected, $this->contents);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$data = array(
			'SurveySm' => array(
					'q1' => '{30,30,30,10}'
				, 'q2' => '{20,20,20,40}'
			)
		);
		$this->testAction('/survey_sms/add.json', array('data' => $data));
		$this->assertRegExp('/survey_sms$/', $this->headers['Location']);
		$this->testAction('/survey_sms/index.json', array('method'=>'GET', 'return'=>'vars'));
		$this->assertNotEmpty($this->vars['surveySms'][1]['SurveySm']['id']);
		$this->assertNotEmpty($this->vars['surveySms'][1]['SurveySm']['created']);
		$this->assertEquals('{30,30,30,10}', $this->vars['surveySms'][1]['SurveySm']['q1']);
		$this->assertEquals('{20,20,20,40}', $this->vars['surveySms'][1]['SurveySm']['q2']);
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$data = array('SurveySm' => array('id' => '98abcee4-d620-11e2-ab8e-080027347923', 'q1' => '{20,30,20,30,123}'));
		$this->testAction('/survey_sms/edit/98abcee4-d620-11e2-ab8e-080027347923',
						array('method'=>'POST', 'data' => $data, 'return'=>'contents'));
		$this->assertRegExp('/survey_sms$/', $this->headers['Location']);
		//$this->autoMock = false;
		$this->testAction('/survey_sms', array('method'=>'GET', 'return'=>'vars'));
		$this->assertEquals('98abcee4-d620-11e2-ab8e-080027347923', $this->vars['surveySms'][0]['SurveySm']['id']);
		$this->assertEquals('2013-06-15 20:37:21', $this->vars['surveySms'][0]['SurveySm']['created']);
		$this->assertEquals('{20,30,20,30,123}', $this->vars['surveySms'][0]['SurveySm']['q1']);
		$this->assertEquals('{25,25,25,25}', $this->vars['surveySms'][0]['SurveySm']['q2']);
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->testAction('/survey_sms/delete/98abcee4-d620-11e2-ab8e-080027347923');
		$this->assertRegExp('/survey_sms$/', $this->headers['Location']);
		$this->testAction('/survey_sms', array('method'=>'GET', 'return'=>'vars'));
		$this->assertEmpty($this->vars['surveySms']);
	}

	public function testReport() {
		$this->testAction('/survey_sms/report.json', array('method'=>'GET', 'return'=>'vars'));
		$this->assertNotEmpty($this->vars['report']);
		$this->assertEquals('{"report":{"sympathique":"25","joyeux":"25","chaleureux":"25","g\u00e9n\u00e9reux":"25","vertus":"100","bavard":"25","ennuyeux":"25","stress\u00e9":"25","pr\u00e9tentieux":"25","vices":"100"}}', $this->contents);
	}

}
