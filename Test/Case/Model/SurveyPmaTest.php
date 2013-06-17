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

	public function testReport(){
		$actual = $this->SurveyPma->report();
		$this->assertEquals(1, $actual['q1.min']);
		$this->assertEquals(1, $actual['q1.max']);
		$this->assertEquals(1, $actual['q1.sum']);
		$this->assertEquals(1, $actual['q1.avg']);
		$this->assertEquals(0, $actual['q1.stddev_pop'], 'stddev_pop');
		$this->assertEquals(0, $actual['q1.var_pop'], 'var_pop');
		$this->assertEquals(0, $actual['q1.stddev_samp'], 'stddev_samp');
		$this->assertEquals(0, $actual['q1.var_samp'], 'var_samp');

		$this->assertEquals(1, $actual['q2.min']);
		$this->assertEquals(1, $actual['q2.max']);
		$this->assertEquals(1, $actual['q2.sum']);
		$this->assertEquals(1, $actual['q2.avg']);
		$this->assertEquals(0, $actual['q2.stddev_pop'], 'stddev_pop');
		$this->assertEquals(0, $actual['q2.var_pop'], 'var_pop');
		$this->assertEquals(0, $actual['q2.stddev_samp'], 'stddev_samp');
		$this->assertEquals(0, $actual['q2.var_samp'], 'var_samp');

		$this->assertEquals(1, $actual['q3.respect.1']);
		$this->assertEquals(0, $actual['q3.respect.2']);
		$this->assertEquals(0, $actual['q3.respect.3']);
		$this->assertEquals(0, $actual['q3.respect.4']);
		$this->assertEquals(0, $actual['q3.respect.5']);
		$this->assertEquals(0, $actual['q3.respect.unknown']);

		$this->assertEquals(1, $actual['q3.ponctualité.1']);
		$this->assertEquals(0, $actual['q3.ponctualité.2']);
		$this->assertEquals(0, $actual['q3.ponctualité.3']);
		$this->assertEquals(0, $actual['q3.ponctualité.4']);
		$this->assertEquals(0, $actual['q3.ponctualité.5']);
		$this->assertEquals(0, $actual['q3.ponctualité.unknown']);

		$this->assertEquals(1, $actual['q3.propreté.1']);
		$this->assertEquals(0, $actual['q3.propreté.2']);
		$this->assertEquals(0, $actual['q3.propreté.3']);
		$this->assertEquals(0, $actual['q3.propreté.4']);
		$this->assertEquals(0, $actual['q3.propreté.5']);
		$this->assertEquals(0, $actual['q3.propreté.unknown']);

		$this->assertEquals(1, $actual['q3.politesse.1']);
		$this->assertEquals(0, $actual['q3.politesse.2']);
		$this->assertEquals(0, $actual['q3.politesse.3']);
		$this->assertEquals(0, $actual['q3.politesse.4']);
		$this->assertEquals(0, $actual['q3.politesse.5']);
		$this->assertEquals(0, $actual['q3.politesse.unknown']);

		$this->assertEquals(1, $actual['q3.acueillant.1']);
		$this->assertEquals(0, $actual['q3.acueillant.2']);
		$this->assertEquals(0, $actual['q3.acueillant.3']);
		$this->assertEquals(0, $actual['q3.acueillant.4']);
		$this->assertEquals(0, $actual['q3.acueillant.5']);
		$this->assertEquals(0, $actual['q3.acueillant.unknown']);

		$this->assertEquals(1, $actual['q3.indifférent.1']);
		$this->assertEquals(0, $actual['q3.indifférent.2']);
		$this->assertEquals(0, $actual['q3.indifférent.3']);
		$this->assertEquals(0, $actual['q3.indifférent.4']);
		$this->assertEquals(0, $actual['q3.indifférent.5']);
		$this->assertEquals(0, $actual['q3.indifférent.unknown']);

		$this->assertEquals(1, $actual['q3.français.1']);
		$this->assertEquals(0, $actual['q3.français.2']);
		$this->assertEquals(0, $actual['q3.français.3']);
		$this->assertEquals(0, $actual['q3.français.4']);
		$this->assertEquals(0, $actual['q3.français.5']);
		$this->assertEquals(0, $actual['q3.français.unknown']);

		$this->assertEquals(1, $actual['q4.yes']);
		$this->assertEquals(0, $actual['q4.no']);
		$this->assertEquals(0, $actual['q4.unknown']);
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
