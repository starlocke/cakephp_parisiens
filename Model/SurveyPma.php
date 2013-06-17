<?php
App::uses('AppModel', 'Model');
/**
 * SurveyPma Model
 *
 */
class SurveyPma extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'survey_pma';

	public function report(){
		$result = $this->query(<<<EOT

SELECT
  min(q1) AS "q1.min"
, max(q1) AS "q1.max"
, avg(q1) AS "q1.avg"
, sum(q1) AS "q1.sum"
, stddev_pop(q1)  AS "q1.stddev_pop"
, stddev_samp(q1) AS "q1.stddev_samp"
, var_pop(q1)  AS "q1.var_pop"
, var_samp(q1) AS "q1.var_samp"

, min(q2) AS "q2.min"
, max(q2) AS "q2.max"
, avg(q2) AS "q2.avg"
, sum(q2) AS "q2.sum"
, stddev_pop(q2)  AS "q2.stddev_pop"
, stddev_samp(q2) AS "q2.stddev_samp"
, var_pop(q2)  AS "q2.var_pop"
, var_samp(q2) AS "q2.var_samp"

, SUM(CASE WHEN q3[1] = 1 THEN 1 ELSE 0 END) AS "q3.respect.1"
, SUM(CASE WHEN q3[1] = 2 THEN 1 ELSE 0 END) AS "q3.respect.2"
, SUM(CASE WHEN q3[1] = 3 THEN 1 ELSE 0 END) AS "q3.respect.3"
, SUM(CASE WHEN q3[1] = 4 THEN 1 ELSE 0 END) AS "q3.respect.4"
, SUM(CASE WHEN q3[1] = 5 THEN 1 ELSE 0 END) AS "q3.respect.5"
, SUM(CASE WHEN q3[1] <= 0 OR q3[1] >= 6 OR q3[1] IS null THEN 1 ELSE 0 END) AS "q3.respect.unknown"

, SUM(CASE WHEN q3[2] = 1 THEN 1 ELSE 0 END) AS "q3.ponctualité.1"
, SUM(CASE WHEN q3[2] = 2 THEN 1 ELSE 0 END) AS "q3.ponctualité.2"
, SUM(CASE WHEN q3[2] = 3 THEN 1 ELSE 0 END) AS "q3.ponctualité.3"
, SUM(CASE WHEN q3[2] = 4 THEN 1 ELSE 0 END) AS "q3.ponctualité.4"
, SUM(CASE WHEN q3[2] = 5 THEN 1 ELSE 0 END) AS "q3.ponctualité.5"
, SUM(CASE WHEN q3[2] <= 0 OR q3[2] >= 6  OR q3[2] IS null THEN 1 ELSE 0 END) AS "q3.ponctualité.unknown"

, SUM(CASE WHEN q3[3] = 1 THEN 1 ELSE 0 END) AS "q3.propreté.1"
, SUM(CASE WHEN q3[3] = 2 THEN 1 ELSE 0 END) AS "q3.propreté.2"
, SUM(CASE WHEN q3[3] = 3 THEN 1 ELSE 0 END) AS "q3.propreté.3"
, SUM(CASE WHEN q3[3] = 4 THEN 1 ELSE 0 END) AS "q3.propreté.4"
, SUM(CASE WHEN q3[3] = 5 THEN 1 ELSE 0 END) AS "q3.propreté.5"
, SUM(CASE WHEN q3[3] <= 0 OR q3[3] >= 6 OR q3[3] IS null THEN 1 ELSE 0 END) AS "q3.propreté.unknown"

, SUM(CASE WHEN q3[4] = 1 THEN 1 ELSE 0 END) AS "q3.politesse.1"
, SUM(CASE WHEN q3[4] = 2 THEN 1 ELSE 0 END) AS "q3.politesse.2"
, SUM(CASE WHEN q3[4] = 3 THEN 1 ELSE 0 END) AS "q3.politesse.3"
, SUM(CASE WHEN q3[4] = 4 THEN 1 ELSE 0 END) AS "q3.politesse.4"
, SUM(CASE WHEN q3[4] = 5 THEN 1 ELSE 0 END) AS "q3.politesse.5"
, SUM(CASE WHEN q3[4] <= 0 OR q3[4] >= 6 OR q3[4] IS null THEN 1 ELSE 0 END) AS "q3.politesse.unknown"

, SUM(CASE WHEN q3[5] = 1 THEN 1 ELSE 0 END) AS "q3.acueillant.1"
, SUM(CASE WHEN q3[5] = 2 THEN 1 ELSE 0 END) AS "q3.acueillant.2"
, SUM(CASE WHEN q3[5] = 3 THEN 1 ELSE 0 END) AS "q3.acueillant.3"
, SUM(CASE WHEN q3[5] = 4 THEN 1 ELSE 0 END) AS "q3.acueillant.4"
, SUM(CASE WHEN q3[5] = 5 THEN 1 ELSE 0 END) AS "q3.acueillant.5"
, SUM(CASE WHEN q3[5] <= 0 OR q3[5] >= 6 OR q3[5] IS null THEN 1 ELSE 0 END) AS "q3.acueillant.unknown"

, SUM(CASE WHEN q3[6] = 1 THEN 1 ELSE 0 END) AS "q3.indifférent.1"
, SUM(CASE WHEN q3[6] = 2 THEN 1 ELSE 0 END) AS "q3.indifférent.2"
, SUM(CASE WHEN q3[6] = 3 THEN 1 ELSE 0 END) AS "q3.indifférent.3"
, SUM(CASE WHEN q3[6] = 4 THEN 1 ELSE 0 END) AS "q3.indifférent.4"
, SUM(CASE WHEN q3[6] = 5 THEN 1 ELSE 0 END) AS "q3.indifférent.5"
, SUM(CASE WHEN q3[6] <= 0 OR q3[6] >= 6 OR q3[6] IS null THEN 1 ELSE 0 END) AS "q3.indifférent.unknown"

, SUM(CASE WHEN q3[7] = 1 THEN 1 ELSE 0 END) AS "q3.français.1"
, SUM(CASE WHEN q3[7] = 2 THEN 1 ELSE 0 END) AS "q3.français.2"
, SUM(CASE WHEN q3[7] = 3 THEN 1 ELSE 0 END) AS "q3.français.3"
, SUM(CASE WHEN q3[7] = 4 THEN 1 ELSE 0 END) AS "q3.français.4"
, SUM(CASE WHEN q3[7] = 5 THEN 1 ELSE 0 END) AS "q3.français.5"
, SUM(CASE WHEN q3[7] <= 0 OR q3[7] >= 6 OR q3[7] IS null THEN 1 ELSE 0 END) AS "q3.français.unknown"

, SUM(CASE WHEN q4 = true THEN 1 ELSE 0 END) AS "q4.yes"
, SUM(CASE WHEN q4 = false THEN 1 ELSE 0 END) AS "q4.no"
, SUM(CASE WHEN q4 IS null THEN 1 ELSE 0 END) AS "q4.unknown"

FROM
  survey_pma
;

EOT
		);

		$report = $result[0][0];
		foreach($report as $key => $value){
			if(empty($value)){
				$report[$key] = 0;
			}
		}
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
			'SurveyPma' => array(
					'q1' => rand(0,100)
					, 'q2' => rand(0,100)
					, 'q3' => $q3
					, 'q4' => rand(0,1) ? true : false
			)
		);

		$this->save($new);
	}

}
