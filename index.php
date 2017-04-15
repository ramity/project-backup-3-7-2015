<?php
require('/home/ramity/smash/construct.php');

require('/home/ramity/smash/ver/0.9.1/api.php');

$s=new Smash();

require('/home/ramity/smash/ver/0.9.1/config.php');

require('/home/ramity/smash/ver/0.9.1/scripts/loginStatus.php');
?>
<!DOCTYPE html>
	<head>
		<title>Demo</title>
		<meta charset="utf-8">
		<link rel='stylesheet' text='text/css' href='https://ramity.com/smash/css/topbar.css'>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
			(function(){
			ra=document.createElement('script');ra.type='text/javascript';ra.src=('https://ramity.com/apps/analytics/link.js');
			s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ra,s);
			opt={UID:1,debug:true,debugDisplay:true};
			})();
		</script>
	</head>
	<body>
		<?php require('/home/ramity/smash/ver/0.9.1/parts/topbar.php');?>
		<div id="div"></div>
	</body>
</html>