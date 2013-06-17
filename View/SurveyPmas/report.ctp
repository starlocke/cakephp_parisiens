<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		// Q3
		<?php
			$q3 = array(
					'respect'
				, 'ponctualité'
				, 'propreté'
				, 'politesse'
				, 'acueillant'
				, 'indifférent'
				, 'français'
			);
			foreach($q3 as $subfield):
		?>
			var data = google.visualization.arrayToDataTable([
				['reponse', '#']
			, ['1',     <?= $report['q3.'.$subfield.'.1'] ?>]
			, ['2',     <?= $report['q3.'.$subfield.'.2'] ?>]
			, ['3',     <?= $report['q3.'.$subfield.'.3'] ?>]
			, ['4',     <?= $report['q3.'.$subfield.'.4'] ?>]
			, ['5',     <?= $report['q3.'.$subfield.'.5'] ?>]
			, ['???',   <?= $report['q3.'.$subfield.'.unknown'] ?>]
			]);

			var options = {
				title: '<?= $subfield ?>'
			};
			var chart = new google.visualization.PieChart(document.getElementById('q3_<?= $subfield ?>'));
			chart.draw(data, options);
		<?php
			endforeach;
		?>
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['oui',     <?= $report['q4.yes'] ?>]
		, ['non',     <?= $report['q4.no'] ?>]
		, ['???',     <?= $report['q4.unknown'] ?>]
		]);

		var options = {
			title: 'Adopte'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q4'));
		chart.draw(data, options);

	}
</script>
<h3>Combien de parisiens avez-vous dans vos connaissances ?</h3>
<ul>
	<li><span>Min:</span> <?= $report['q1.min'] ?></li>
	<li><span>Max:</span> <?= $report['q1.max'] ?></li>
	<li><span>Avg:</span> <?= number_format($report['q1.avg'],4) ?></li>
	<li><span>Sum:</span> <?= $report['q1.sum'] ?></li>
	<li><span>Stddev_pop:</span>    <?= number_format($report['q1.stddev_pop'],4) ?></li>
	<li><span>Variance_pop:</span>  <?= number_format($report['q1.var_pop'],4) ?></li>
	<li><span>Stddev_samp:</span>   <?= number_format($report['q1.stddev_samp'],4) ?></li>
	<li><span>Variance_samp:</span> <?= number_format($report['q1.var_samp'],4) ?></li>
</ul>
<h3>Combien de parisiens considérez vous comme plus que de simples connaissance?</h3>
<ul>
	<li><span>Min:</span> <?= $report['q2.min'] ?></li>
	<li><span>Max:</span> <?= $report['q2.max'] ?></li>
	<li><span>Avg:</span> <?= number_format($report['q2.avg'],4) ?></li>
	<li><span>Sum:</span> <?= $report['q2.sum'] ?></li>
	<li><span>Stddev_pop:</span>    <?= number_format($report['q2.stddev_pop'],4) ?></li>
	<li><span>Variance_pop:</span>  <?= number_format($report['q2.var_pop'],4) ?></li>
	<li><span>Stddev_samp:</span>   <?= number_format($report['q2.stddev_samp'],4) ?></li>
	<li><span>Variance_samp:</span> <?= number_format($report['q2.var_samp'],4) ?></li>
</ul>

<div id="q3_respect" style="width: 900px; height: 500px;"></div>
<div id="q3_ponctualité" style="width: 900px; height: 500px;"></div>
<div id="q3_propreté" style="width: 900px; height: 500px;"></div>
<div id="q3_politesse" style="width: 900px; height: 500px;"></div>
<div id="q3_acueillant" style="width: 900px; height: 500px;"></div>
<div id="q3_indifférent" style="width: 900px; height: 500px;"></div>
<div id="q3_français" style="width: 900px; height: 500px;"></div>
<div id="q4" style="width: 900px; height: 500px;"></div>
