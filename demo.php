<?php
require('/home/ramity/smash/ver/0.9.1/api.php');

$s=new Smash();

$s->ho='localhost';
$s->un='ramity';
$s->pw='PASSWORD';
$er=function($in){error_log($in);};

/*$f=$s->shq('App_surl','SELECT * FROM redir','',true,$er);

print_r($f);

if($s->cvar(''))
	echo 'good';
else
	echo 'error';
*/
?>
<!DOCTYPE html>
	<head>
		<title>Demo</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="https://ramity.com/smash/css/topbar.css">
		<link rel="stylesheet" type="text/css" href="https://ramity.com/css/demo.css">
	</head>
	<body>
		<div id="sidebar">
			<div id="sidebarspace"></div>
			<div class="sidebaritem">Front</div>
			<div class="sidebaritem">Watch</div>
			<div class="sidebaritemactive">Discover</div>
			<div class="sidebaritem">My Dashboard</div>
			<div class="sidebaritem">My Feed</div>
			<div class="sidebaritem">My Subs</div>
			<div class="sidebaritem">Community</div>
			<div class="sidebaritem">Friends</div>
			<div class="sidebaritem">History</div>
		</div>
		<?php require('/home/ramity/smash/parts/topbar.php');?>
		<form action="https://ramity.com/demo" method="post">
			<input
				type="text"
				name="in"
			>
			<input type="submit" name="sub" value="login">
		</form>
	</body>
</html>
