<?php
App::uses('AppModel', 'Model');
/**
 * SurveySm Model
 *
 */
class SurveySm extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'survey_sm';

	public function report(){
		$result = $this->query(<<<EOT

SELECT
  SUM(q1[1]) AS "sympathique"
, SUM(q1[2]) AS "joyeux"
, SUM(q1[3]) AS "chaleureux"
, SUM(q1[4]) AS "généreux"
, SUM(q1[1]) + SUM(q1[2]) + SUM(q1[3]) + SUM(q1[4]) AS "vertus"
, SUM(q2[1]) AS "bavard"
, SUM(q2[2]) AS "ennuyeux"
, SUM(q2[3]) AS "stressé"
, SUM(q2[4]) AS "prétentieux"
, SUM(q2[1]) + SUM(q2[2]) + SUM(q2[3]) + SUM(q2[4]) AS "vices"
FROM
  survey_sm
;

EOT
		);

		$report = $result[0][0];
		return $report;
	}
}
