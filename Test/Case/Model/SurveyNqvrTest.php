<?php
App::uses('SurveyNqvr', 'Model');

/**
 * SurveyNqvr Test Case
 *
 */
class SurveyNqvrTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey_nqvr'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SurveyNqvr = ClassRegistry::init('SurveyNqvr');
	}

	public function testFixture(){
		$this->SurveyNqvr->read(null, '85bd58b6-d620-11e2-ae09-080027347923');
		$this->assertTrue( !empty($this->SurveyNqvr->id), "Fixture not found.");
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SurveyNqvr);

		parent::tearDown();
	}

}
