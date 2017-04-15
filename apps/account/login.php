<?php
require('/home/ramity/smash/construct.php');

require(brq('api.php'));

$s=new Smash();

require(brq('config.php'));

require(brq('scripts/loginStatus.php'));

if($secureLogin)
{
	$s->redirect('https://ramity.com');
}

$e=$cache[0]=false;

//start catch input
if($s->cvar('L_SM')){
	if($s->cvar('L_UN')){
	if(ctype_alnum($_POST['L_UN'])){
		$cache[0]=true;
		if($s->cvar('L_PW')){
			//goto if(!$e statement)
		}else $e='Password is not defined';
	}else $e='Username must be alphanumeric characters (A-Z,a-z,0-9)';
	}else $e='Username is not defined';
	
	if(!$e)
	{
		$sql='SELECT id,username,password FROM users WHERE username=:username AND password=:password';
		
		$sqlar=array
		(
			':username'=>$_POST['L_UN'],
			':password'=>$s->oneWayHash($_POST['L_PW'])
		);
		
		$results=$s->shq('App_account',$sql,$sqlar,true);
		
		if(empty($results))
		{
			$e='Login information is incorrect';
		}
		else
		{
			$sql='SELECT uid FROM sessions WHERE uid=:uid';
			
			$sqlar=array
			(
				':uid'=>$results[0]['id']
			);
			
			$check=$s->shq('App_account',$sql,$sqlar,true);
			
			if(!empty($check))
			{
				$sql='DELETE FROM sessions WHERE uid=:uid';
				
				$sqlar=array
				(
					':uid'=>$results[0]['id'],
				);
				
				$s->shq('App_account',$sql,$sqlar,false);
			}
			
			$grab=$s->setToken($results[0]['id']);
			
			$sql='INSERT INTO sessions
			(uid,token,location,ip) VALUES
			(:uid,:token,:location,:ip)';
			
			$sqlar=array
			(
				':uid'=>$results[0]['id'],
				':token'=>$grab['product'],
				':location'=>$grab['location'],
				':ip'=>$_SERVER['REMOTE_ADDR']
			);
			
			$s->shq('App_account',$sql,$sqlar,false);
			
			$s->redirect('https://ramity.com');
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
		<form id="minimal" action="https://ramity.com/apps/account/login" method="post" autocomplete="off">
			<div id="minimaltitle">ramity.com</div>
			<input
				id="itemfirst"
				class="item"
				name="L_UN"
				type="text"
				placeholder="username"
				<?php
				if($cache[0])
				{
					echo 'value="'.$_POST['L_UN'].'"';
				}
				?>
			>
			<input
				class="item"
				name="L_PW"
				type="password"
				placeholder="password"
			>
			<input
				id="submit"
				name="L_SM"
				type="submit"
				value="login"
			>
			<?php
			if($e)
			{
				echo '<div id="error">'.$e.'</div>';
			}
			if(isset($_GET['success']))
			{
				echo '<div id="success">All registered! Try logging in.</div>';
			}
			?>
		</form>
		<div id="footerbar">
			<div id="kopimi"></div>
		</div>
	</body>
</html>