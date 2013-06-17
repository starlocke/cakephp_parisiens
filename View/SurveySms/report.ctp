<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		// Virtues
		var data = google.visualization.arrayToDataTable([
			['vertu', 'impression']
		, ['sympathique',   <?= $report['sympathique'] ?>]
		, ['joyeux',        <?= $report['joyeux'] ?>]
		, ['chaleureux',    <?= $report['chaleureux'] ?>]
		, ['généreux',      <?= $report['généreux'] ?>]
		]);

		var options = {
			title: 'Vertus'
		};
		var chart = new google.visualization.PieChart(document.getElementById('virtues'));
		chart.draw(data, options);
		// Vices

		var data = google.visualization.arrayToDataTable([
			['vices', 'impression']
		, ['bavard',			 <?= $report['bavard'] ?>]
		, ['ennuyeux',     <?= $report['ennuyeux'] ?>]
		, ['stressé',			 <?= $report['stressé'] ?>]
		, ['prétentieux',  <?= $report['prétentieux'] ?>]
		]);

		var options = {
			title: 'Vices'
		};
		var chart = new google.visualization.PieChart(document.getElementById('vices'));
		chart.draw(data, options);
	}
</script>
<div id="virtues" style="width: 900px; height: 500px;"></div>
<div id="vices" style="width: 900px; height: 500px;"></div>
