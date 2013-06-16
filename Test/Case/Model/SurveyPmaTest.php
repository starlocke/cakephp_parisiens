<?php
App::uses('SurveyPma', 'Model');

/**
 * SurveyPma Test Case
 *
 */
class SurveyPmaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey_pma'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SurveyPma = ClassRegistry::init('SurveyPma');
	}

	public function testFixture(){
		$this->SurveyPma->read(null, '862289f2-d620-11e2-80f1-080027347923');
		$this->assertTrue( !empty($this->SurveyPma->id), "Fixture not found.");
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SurveyPma);

		parent::tearDown();
	}

}
