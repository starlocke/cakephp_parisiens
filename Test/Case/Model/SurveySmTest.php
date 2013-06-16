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
