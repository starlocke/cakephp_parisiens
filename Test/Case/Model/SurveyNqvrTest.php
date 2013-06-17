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
		// count_integer_elements_equal -- START
		$this->SurveyNqvr->query(
<<<EOT

CREATE OR REPLACE FUNCTION count_integer_elements_equal(integer[], integer)
  RETURNS bigint AS
\$BODY\$
  SELECT COALESCE(c,0)
  FROM
  (
    SELECT i, count(*) c
    FROM
      (SELECT unnest($1::integer[]) i) i
    GROUP BY i ORDER BY c DESC
  ) foo
  WHERE i = $2
  ;
\$BODY\$
  LANGUAGE sql VOLATILE
  COST 100;
EOT
		); // count_integer_elements_equal -- END
		// count_integer_elements_outside_range -- START
		$this->SurveyNqvr->query(
<<<EOT
CREATE OR REPLACE FUNCTION count_integer_elements_outside_range(integer[], integer, integer)
  RETURNS bigint AS
\$BODY\$
  SELECT
    COALESCE(SUM(c)::bigint, 0)
  FROM
  (
    SELECT c
    FROM
    (
      SELECT i, count(*) c
      FROM
        (SELECT unnest($1::integer[]) i) i
      GROUP BY i ORDER BY c DESC
    ) foo
    WHERE
      i IS NULL
      OR
      i < $2
      OR
      i > $3
  ) bar
  ;
\$BODY\$
  LANGUAGE sql VOLATILE
  COST 100;
EOT
		);// count_integer_elements_outside_range -- END
	}

	public function testFixture(){
		$this->SurveyNqvr->read(null, '85bd58b6-d620-11e2-ae09-080027347923');
		$this->assertTrue( !empty($this->SurveyNqvr->id), "Fixture not found.");
	}

	public function testReport(){
		$actual = $this->SurveyNqvr->report();
		$this->assertEquals(1, $actual['q1.yes']);
		$this->assertEquals(0, $actual['q1.no']);
		$this->assertEquals(0, $actual['q1.unknown']);
		$this->assertEquals(1, $actual['q2.yes']);
		$this->assertEquals(0, $actual['q2.no']);
		$this->assertEquals(0, $actual['q2.unknown']);
		$this->assertEquals(1, $actual['q3.1-5']);
		$this->assertEquals(0, $actual['q3.6-10']);
		$this->assertEquals(0, $actual['q3.11-50']);
		$this->assertEquals(0, $actual['q3.51+']);
		$this->assertEquals(0, $actual['q3.unknown']);
		$this->assertEquals(1, $actual['q4.très_amicaux']);
		$this->assertEquals(0, $actual['q4.amicaux']);
		$this->assertEquals(0, $actual['q4.neutres']);
		$this->assertEquals(0, $actual['q4.inamicaux']);
		$this->assertEquals(0, $actual['q4.odieux']);
		$this->assertEquals(0, $actual['q4.unknown']);
		$this->assertEquals(4, $actual['q5.très_amicaux']);
		$this->assertEquals(0, $actual['q5.amicaux']);
		$this->assertEquals(0, $actual['q5.neutres']);
		$this->assertEquals(0, $actual['q5.inamicaux']);
		$this->assertEquals(0, $actual['q5.odieux']);
		$this->assertEquals(0, $actual['q5.unknown']);
		$this->assertEquals(1, $actual['q6.très_amicaux']);
		$this->assertEquals(0, $actual['q6.amicaux']);
		$this->assertEquals(0, $actual['q6.neutres']);
		$this->assertEquals(0, $actual['q6.inamicaux']);
		$this->assertEquals(0, $actual['q6.odieux']);
		$this->assertEquals(0, $actual['q6.unknown']);
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
