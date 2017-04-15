<?php
require('/home/ramity/smash/construct.php');

require(brq('api.php'));

$s=new Smash();

require(brq('config.php'));

require(brq('scripts/loginStatus.php'));
?>
<!DOCTYPE html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="https://ramity.com/apps/tabemono/css/base.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<meta name="viewport" content="width=device-width">
		<meta charset="utf-8">
	</head>
	<body>
		<div id="top">
			<div id="topbuttonl">+</div>
			<div id="toplogo">Tabemono</div>
			<div id="topbuttonr">-</div>
		</div>
		<div id="tab">
			<?php
			if($secureUsername)
			{
			?>
			
			<div id="tabname">Welcome back, <?php echo $secureUsername;?>.</div>
			
			<?php
			}
			else
			{
			?>
			
			<div id="tabname">Hey there, stranger.</div>
			care to sign up <a href="https://ramity.com/apps/account/register">here</a>?
			<?php
			}
			?>
		</div>
	</body>
</html>