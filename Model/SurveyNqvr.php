<?php
App::uses('AppModel', 'Model');
/**
 * SurveyNqvr Model
 *
 */
class SurveyNqvr extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'survey_nqvr';

	public function report(){
		$result = $this->query(<<<EOT

SELECT
  COUNT(CASE q1 WHEN true THEN true ELSE null END) AS "q1.yes"
, COUNT(CASE q1 WHEN false THEN true ELSE null END) AS "q1.no"
, COUNT(CASE WHEN q1 IS null THEN true ELSE null END) AS "q1.unknown"

, COUNT(CASE q2 WHEN true THEN true ELSE null END) AS "q2.yes"
, COUNT(CASE q2 WHEN false THEN true ELSE null END) AS "q2.no"
, COUNT(CASE WHEN q2 IS null THEN true ELSE null END) AS "q2.unknown"

, COUNT(CASE q3 WHEN 1 THEN true ELSE null END) AS "q3.1-5"
, COUNT(CASE q3 WHEN 2 THEN true ELSE null END) AS "q3.6-10"
, COUNT(CASE q3 WHEN 3 THEN true ELSE null END) AS "q3.11-50"
, COUNT(CASE q3 WHEN 4 THEN true ELSE null END) AS "q3.51+"
, COUNT(CASE WHEN q3 <= 0 OR q3 >= 5 THEN true ELSE null END) AS "q3.unknown"

, COALESCE(SUM(count_integer_elements_equal(q4, 1)),0) AS "q4.très_amicaux"
, COALESCE(SUM(count_integer_elements_equal(q4, 2)),0) AS "q4.amicaux"
, COALESCE(SUM(count_integer_elements_equal(q4, 3)),0) AS "q4.neutres"
, COALESCE(SUM(count_integer_elements_equal(q4, 4)),0) AS "q4.inamicaux"
, COALESCE(SUM(count_integer_elements_equal(q4, 5)),0) AS "q4.odieux"
, COALESCE(SUM(count_integer_elements_outside_range(q4, 1, 5)),0) AS "q4.unknown"

, COALESCE(SUM(count_integer_elements_equal(q5, 1)),0) AS "q5.très_amicaux"
, COALESCE(SUM(count_integer_elements_equal(q5, 2)),0) AS "q5.amicaux"
, COALESCE(SUM(count_integer_elements_equal(q5, 3)),0) AS "q5.neutres"
, COALESCE(SUM(count_integer_elements_equal(q5, 4)),0) AS "q5.inamicaux"
, COALESCE(SUM(count_integer_elements_equal(q5, 5)),0) AS "q5.odieux"
, COALESCE(SUM(count_integer_elements_outside_range(q5, 1, 5)),0) AS "q5.unknown"

, COUNT(CASE q6 WHEN 1 THEN true ELSE null END) AS "q6.très_amicaux"
, COUNT(CASE q6 WHEN 2 THEN true ELSE null END) AS "q6.amicaux"
, COUNT(CASE q6 WHEN 3 THEN true ELSE null END) AS "q6.neutres"
, COUNT(CASE q6 WHEN 4 THEN true ELSE null END) AS "q6.inamicaux"
, COUNT(CASE q6 WHEN 5 THEN true ELSE null END) AS "q6.odieux"
, COUNT(CASE WHEN q6 <= 0 OR q6 >= 6 THEN true ELSE null END) AS "q6.unknown"

FROM
  survey_nqvr
;

EOT
		);

		$report = $result[0][0];
		return $report;

	}

	public function generate(){
		$this->create();
		$q3_val = array();
		$q3_val[] = rand(0,6);
		$q3_val[] = rand(0,6);
		$q3_val[] = rand(0,6);
		$q3_val[] = rand(0,6);
		$q3_val[] = rand(0,6);
		$q3_val[] = rand(0,6);
		$q3_val[] = rand(0,6);
		$q3 = '{' . implode(',', $q3_val) . '}';

		$new = array(
			'SurveyNqvr' => array(
					'q1' => rand(0,1) ? true : false
					, 'q2' => rand(0,1) ? true : false
					, 'q3' => rand(0,4)
					, 'q4' => $this->_generateInts(10)
					, 'q5' => $this->_generateInts(20)
					, 'q6' => rand(rand(0,1),5)
			)
		);

		$this->save($new);
	}

	private function _generateInts($lim_max = 10){
		$limit = rand(1,$lim_max);
		$result = array();
		for($i = 0; $i < $limit; ++$i){
			$result[] = rand(rand(0,1),rand(5,6));
		}
		return '{' . implode(',', $result) . '}';
	}
}
