<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		// Q1
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['oui',     <?= $report['q1.yes'] ?>]
		, ['non',     <?= $report['q1.no'] ?>]
		, ['???',     <?= $report['q1.unknown'] ?>]
		]);

		var options = {
			title: 'Connaissez-vous des français?'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q1'));
		chart.draw(data, options);

		// Q2
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['oui',     <?= $report['q2.yes'] ?>]
		, ['non',     <?= $report['q2.no'] ?>]
		, ['???',     <?= $report['q2.unknown'] ?>]
		]);

		var options = {
			title: 'Connaissez-vous des français résidant à Paris?'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q2'));
		chart.draw(data, options);

		// Q3
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['1-5',     <?= $report['q3.1-5'] ?>]
		, ['6-10',    <?= $report['q3.6-10'] ?>]
		, ['11-50',   <?= $report['q3.11-50'] ?>]
		, ['51+',     <?= $report['q3.51+'] ?>]
		, ['???',     <?= $report['q3.unknown'] ?>]
		]);

		var options = {
			title: 'Combien de parisiens connaissez-vous ?'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q3'));
		chart.draw(data, options);

		// Q4
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['très_amicaux',     <?= $report['q4.très_amicaux'] ?>]
		, ['amicaux',          <?= $report['q4.amicaux'] ?>]
		, ['neutres',          <?= $report['q4.neutres'] ?>]
		, ['inamicaux',        <?= $report['q4.inamicaux'] ?>]
		, ['odieux',           <?= $report['q4.odieux'] ?>]
		, ['???',              <?= $report['q4.unknown'] ?>]
		]);

		var options = {
			title: 'Sur tous les 20% parisiens plus amicales que vous connaissez, notez chaque de 1 à 5 selon votre appréciation :'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q4'));
		chart.draw(data, options);

		// Q5
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['très_amicaux',     <?= $report['q5.très_amicaux'] ?>]
		, ['amicaux',          <?= $report['q5.amicaux'] ?>]
		, ['neutres',          <?= $report['q5.neutres'] ?>]
		, ['inamicaux',        <?= $report['q5.inamicaux'] ?>]
		, ['odieux',           <?= $report['q5.odieux'] ?>]
		, ['???',              <?= $report['q5.unknown'] ?>]
		]);

		var options = {
			title: 'Sur tous les autres parisiens que vous connaissez, notez chaque de 1 à 5 selon votre appréciation :'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q5'));
		chart.draw(data, options);

		// Q6
		var data = google.visualization.arrayToDataTable([
			['reponse', '#']
		, ['très_amicaux',     <?= $report['q6.très_amicaux'] ?>]
		, ['amicaux',          <?= $report['q6.amicaux'] ?>]
		, ['neutres',          <?= $report['q6.neutres'] ?>]
		, ['inamicaux',        <?= $report['q6.inamicaux'] ?>]
		, ['odieux',           <?= $report['q6.odieux'] ?>]
		, ['???',              <?= $report['q6.unknown'] ?>]
		]);

		var options = {
			title: 'Selon votre perception, notez de 1 à 5 votre appréciation de la réputation des parisiens (en général)'
		};
		var chart = new google.visualization.PieChart(document.getElementById('q6'));
		chart.draw(data, options);
	}
</script>
<div id="q1" style="width: 900px; height: 500px;"></div>
<div id="q2" style="width: 900px; height: 500px;"></div>
<div id="q3" style="width: 900px; height: 500px;"></div>
<div id="q4" style="width: 900px; height: 500px;"></div>
<div id="q5" style="width: 900px; height: 500px;"></div>
<div id="q6" style="width: 900px; height: 500px;"></div>

