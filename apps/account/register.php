<?php
require('/home/ramity/smash/ver/0.9.1/api.php');

$s=new Smash();

require('/home/ramity/smash/ver/0.9.1/config.php');

require('/home/ramity/smash/ver/0.9.1/scripts/loginStatus.php');

if($secureLogin)
{
	$s->redirect('https://ramity.com');
}

$e=$cache[0]=$cache[1]=false;

//start catch input
if($s->cvar('R_SM')){
	if($s->cvar('R_UN')){
	if(ctype_alnum($_POST['R_UN'])){
		$cache[0]=true;
		if($s->cvar('R_DN')){
		if(ctype_alnum($_POST['R_DN'])){
			$cache[1]=true;
			if($s->cvar('R_PW')){
			if($s->cvar('R_CPW')){
				if($_POST['R_PW']==$_POST['R_CPW']){
					//goto if(!$e statement)
				}else $e='Passwords do not match';
			}else $e='Confirmation password is not defined';
			}else $e='Password is not defined';
		}else $e='Displayname must be alphanumeric characters (A-Z,a-z,0-9)';
		}else $e='Displayname is not defined';
	}else $e='Username must be alphanumeric characters (A-Z,a-z,0-9)';
	}else $e='Username is not defined';
	
	if(!$e)
	{
		$sql='SELECT username FROM users WHERE username=:username';
		
		$sqlar=array
		(
			':username'=>$_POST['R_UN']
		);
		
		$results=$s->shq('App_account',$sql,$sqlar,true);
		
		if(empty($results))
		{
			$sql='INSERT INTO users (username,displayname,password,est,lastseen,ip,status) VALUES (:username,:displayname,:password,:est,:lastseen,:ip,:status)';
			
			$sqlar=array
			(
				':username'=>$_POST['R_UN'],
				':displayname'=>$_POST['R_DN'],
				':password'=>$s->oneWayHash($_POST['R_PW']),
				':est'=>microtime(true),
				'lastseen'=>microtime(true),
				':ip'=>$_SERVER['REMOTE_ADDR'],
				':status'=>1
			);
			
			$s->shq('App_account',$sql,$sqlar,false);
			
			$s->redirect('https://ramity.com/apps/account/login?success');
		}
		else
		{
			$e='That username has already been taken';
		}
	}
}
?>
<!DOCTYPE html>
	<head>
		<link rel='stylesheet' type='text/css' href='https://ramity.com/apps/account/css/index.css'>
		<link rel='stylesheet' text='text/css' href='https://ramity.com/smash/css/topbar.css'>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width">
		<script type="text/javascript">
			(function(){
			ra=document.createElement('script');ra.type='text/javascript';ra.src=('https://ramity.com/apps/analytics/link.js');
			s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ra,s);
			opt={UID:1,debug:true,debugDisplay:true};
			})();
		</script>
	</head>
	<body>
		<?php require('/home/ramity/smash/parts/topbar.php');?>
		<form id="minimal" action="https://ramity.com/apps/account/register" method="post" autocomplete="off">
			<div id="minimaltitle">ramity.com</div>
			<input
				id="itemfirst"
				class="item"
				name="R_UN"
				type="text"
				placeholder="username"
				<?php
				if($cache[0])
				{
					echo 'value="'.$_POST['R_UN'].'"';
				}
				?>
			>
			<input
				class="item"
				name="R_DN"
				type="text"
				placeholder="displayname"
				<?php
				if($cache[1])
				{
					echo 'value="'.$_POST['R_DN'].'"';
				}
				?>
			>
			<input
				id="itemfirst"
				class="item"
				name="R_PW"
				type="password"
				placeholder="password"
			>
			<input
				class="item"
				name="R_CPW"
				type="password"
				placeholder="confirm password"
			>
			<input
				id="submit"
				name="R_SM"
				type="submit"
				value="register"
			>
			<?php
			if($e)
			{
				echo '<div id="error">'.$e.'</div>';
			}
			?>
		</form>
		<div id="footerbar">
			<div id="kopimi"></div>
		</div>
	</body>
</html>