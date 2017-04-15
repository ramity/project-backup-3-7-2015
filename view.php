<!DOCTYPE html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8">
		<script src="https://ramity.com/apps/analytics/js/source/chart.min.js"></script>
		<script src="https://ramity.com/apps/analytics/js/rcplugin.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
		<link href="https://ramity.com/apps/analytics/css/dashboard.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="topbar">
			<div id="topbarlogo">R/Analytics</div>
		</div>
		<div id="topbarpadding"></div>
		<div id="stats">
			<div id="statsinr">
				<canvas id="canvas" width="600" height="450"></canvas>
			</div>
		</div>
		<?php
		try
		{
			$db=new PDO('mysql:host=localhost;dbname=A_analytics;charset=utf8','ramity','PASSWORD');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

			$stmt=$db->prepare('SELECT month FROM data WHERE month=1');
			$stmt->execute();
			$a=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=2');
			$stmt->execute();
			$b=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=3');
			$stmt->execute();
			$c=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=4');
			$stmt->execute();
			$d=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=5');
			$stmt->execute();
			$e=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=6');
			$stmt->execute();
			$f=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=7');
			$stmt->execute();
			$g=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=8');
			$stmt->execute();
			$h=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=9');
			$stmt->execute();
			$i=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=10');
			$stmt->execute();
			$j=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=11');
			$stmt->execute();
			$k=$stmt->fetchAll();

			$stmt=$db->prepare('SELECT month FROM data WHERE month=12');
			$stmt->execute();
			$l=$stmt->fetchAll();
		}
		catch(PDOException $e)
		{
			echo $e;
		}
		?>
		<script>
		//mach data
		var r=function(){return Math.round(Math.random()*20)};

		var barChartData=
		{
			labels:["January","February","March","April","May","June","July","August","September","October","November","December"],
			datasets:[
				{
					fillColor:"rgba(220,220,220,0.5)",
					strokeColor:"rgba(220,220,220,0.8)",
					highlightFill:"rgba(220,220,220,0.75)",
					highlightStroke:"rgba(220,220,220,1)",
					data:
					[
						<?php echo count($a);?>,
						<?php echo count($b);?>,
						<?php echo count($c);?>,
						<?php echo count($d);?>,
						<?php echo count($e);?>,
						<?php echo count($f);?>,
						<?php echo count($g);?>,
						<?php echo count($h);?>,
						<?php echo count($i);?>,
						<?php echo count($j);?>,
						<?php echo count($k);?>,
						<?php echo count($l);?>
					]
				}
			]

		}
		window.onload = function()
		{
			createChart('canvas',barChartData);
		}
		</script>
	</body>
</html>
