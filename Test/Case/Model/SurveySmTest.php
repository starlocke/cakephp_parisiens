<?php
App::uses('SurveySm', 'Model');

/**
 * SurveySm Test Case
 *
 */
class SurveySmTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey_sm'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SurveySm = ClassRegistry::init('SurveySm');
	}

	public function testFixture(){
		$this->SurveySm->read(null, '98abcee4-d620-11e2-ab8e-080027347923');
		$this->assertTrue( !empty($this->SurveySm->id), "Fixture not found.");
	}

	public function testReport(){
		$actual = $this->SurveySm->report();
		$this->assertEquals(25, $actual['sympathique']);
		$this->assertEquals(25, $actual['joyeux']);
		$this->assertEquals(25, $actual['chaleureux']);
		$this->assertEquals(25, $actual['généreux']);
		$this->assertEquals(100, $actual['vertus']);
		$this->assertEquals(25, $actual['bavard']);
		$this->assertEquals(25, $actual['ennuyeux']);
		$this->assertEquals(25, $actual['stressé']);
		$this->assertEquals(25, $actual['prétentieux']);
		$this->assertEquals(100, $actual['vices']);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SurveySm);

		parent::tearDown();
	}

}
