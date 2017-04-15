<!DOCTYPE html>
	<head>
		<link type="text/css" rel="stylesheet" href="https://ramity.com/resume/css/resume.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<title>Resume - Lewis Brown</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://ramity.com/resume/js/timer.js"></script>
		<script src="https://ramity.com/resume/js/input.js"></script>
		<script>
		var topbarleftpos="300px";
		$(function()
		{
			if($('#sidebarexp').innerHeight()>$('#sidebar').innerHeight())
			{
				$('#sidebar').css("padding","0px 15px 0px 0px");
				var topbarleftpos="315px";
			}
			else
			{
				$('#sidebar').css("padding","0px");
				var topbarleftpos="300px";
			}
		});
		</script>
	</head>
	<body>
		<div id="sidebar">
			<div id="sidebarexp">
				<div class="sidebarheader">Navigation</div>
				
				<a class="sidebaritem">Home</a>
				<a class="sidebaritem">About me</a>
				<a class="sidebaritem">Personal Objective</a>
				<a class="sidebaritem">Interests</a>
				<a class="sidebaritem">Skills</a>
				<a class="sidebaritem">Experience</a>
				<a class="sidebaritem">Education</a>
				
				<div class="sidebarheader2">Social</div>
				
				<a class="sidebaritem2" target="_blank" href="https://www.facebook.com/DB2.SB">Facebook</a>
				<a class="sidebaritem2" target="_blank" href="mailto:ramitydotcom@gmail.com">Email</a>
				<a class="sidebaritem2" target="_blank" href="https://divirted.tumblr.com">Tumblr</a>
				<a class="sidebaritem2" target="_blank" href="https://www.reddit.com/user/ramity/">Reddit</a>
				<a class="sidebaritem2" target="_blank" >Skype</a>
				<a class="sidebaritem2" target="_blank" href="https://steamcommunity.com/id/DB2">Steam</a>
				<a class="sidebaritem2" target="_blank" href="https://facebook.com/ramitydotcom">Ramity Facebook</a>
				<a class="sidebaritem2" target="_blank" href="https://ramity.com">Website</a>
				
				<script>
				$('.sidebaritem,.sidebaritem2').hover(function(){
					$(this).stop().animate({paddingLeft:"40px",width:"215px",color:"#fff"},250);
				},function(){
					$(this).stop().animate({paddingLeft:"20px",width:"235px",color:"#eee"},250);
				});
				</script>
			</div>
		</div>
		<div id="container">
			<div id="topbar">
				<div class="lines" id="opensidebar"></div>
			</div>
			<div id="header">
				<div id="headerinr">
						<div id="nameline">Lewis Brown</div>
						<div id="nametitle">Developer, designer, gamer, & pizza expert.</div>
						<script>
						$('#nametitle').hover(function(){
							$(this).stop().animate({borderTopWidth:"5px",borderBottomWidth:"0px"},150);
						},function(){
							$(this).stop().animate({borderBottomWidth:"5px",borderTopWidth:"0px"},150);
						});
						</script>
					<!--<div id="contact">
						<div class="contactline">1-479-445-2691</div>
						<div class="contactline">lewisbrown@ramity.com</div>
						<div class="contactline">ramity.com</div>
					</div>-->
				</div>
			</div>
			<div class="panel">
				<canvas id="game" width="900" height="650"></canvas>
				<script>
				var walls=[];
				
				var canvasw=900;
				var canvash=650;
				var gameareaw=900;
				var gameareah=600;
				var mxpos;
				var mypos;
				var cxpos=10;
				var cypos=10;
				
				var cw=20;
				var ch=20;
				var cSpeed=5;
				var walkingSpeed=5;
				var runningSpeed=10;
				
				var cHealth=200;
				var cSprint=200;
				var cMana=200;
				
				var timer=$.timer(function()
				{
					clear();
					draw();
					regen();
				});
				
				function regen()
				{
					
				}
				
				timer.set({time:10,autostart:true});
				
				jQuery('#game').mousedown(function(e){e.preventDefault();});
				
				document.getElementById('game').addEventListener('mousemove', function(evt)
				{
					rect=document.getElementById('game').getBoundingClientRect();
					mxpos=evt.clientX-rect.left;
					mypos=evt.clientY-rect.top;
				});
				
				kd.run(function(){kd.tick();});
				
				kd.W.down(function()
				{
					tmove(cxpos,cypos-cSpeed);
				});
				
				kd.A.down(function()
				{
					tmove(cxpos-cSpeed,cypos);
				});
				
				kd.S.down(function()
				{
					tmove(cxpos,cypos+cSpeed);
				});
				
				kd.D.down(function()
				{
					tmove(cxpos+cSpeed,cypos);
				});
				
				kd.SHIFT.down(function()
				{
					if(cSprint>0)
					{
						cSpeed=runningSpeed;
						cSprint--;
					}
				});
				
				kd.SHIFT.up(function()
				{
					cspeed=walkingSpeed;
				});
				
				function tmove(inputx,inputy)
				{
					if(inputx>=0&&inputx<=gameareaw-cw&&inputy>=0&&inputy<=gameareah-ch)
					{
						cxpos=inputx;
						cypos=inputy;
					}
				}
				
				function clear()
				{
					c=document.getElementById("game");
					ctx=c.getContext("2d");
					ctx.fillStyle="#fff";
					ctx.fillRect(0,0,canvasw,canvash);
				}
				
				function draw()
				{
					//start variables
					c=document.getElementById("game");
					ctx=c.getContext("2d");
					//draw character
					ctx.fillStyle="#000";
					ctx.fillRect(cxpos,cypos,cw,ch);
					//draw ui space
					ctx.fillRect(0,600,canvasw,50);
					//draw mouse cursor
					ctx.strokeStyle="red";
					ctx.beginPath();
					ctx.moveTo(mxpos+5,mypos);
					ctx.lineTo(mxpos,mypos-5);
					ctx.closePath();
					ctx.stroke();
					ctx.moveTo(mxpos,mypos-5);
					ctx.lineTo(mxpos-5,mypos);
					ctx.closePath();
					ctx.stroke();
					//draw ui values
					ctx.fillStyle="#f00";
					ctx.fillRect(10,610,cHealth,10);
					ctx.fillStyle="#0f0";
					ctx.fillRect(10,620,cSprint,10);
					ctx.fillStyle="#00f";
					ctx.fillRect(10,630,cMana,10);
				}
				</script>
			</div>
			<div id="content">
				<div id="contentinr">
					<div class="contentheader">About Me</div>
					<div class="contenttext"></div>
				</div>
			</div>
		</div>
		<script>
		var sideBarOpen=false;
		
		windowWidth=$(window).width();
		reducedWindowWidth=windowWidth-300;
		
		$('#opensidebar').click(function(){
			if(sideBarOpen)
			{
				$('#sidebar').stop().animate({width:"0px"},1000,function(){$('#sidebar').hide()});
				$('#topbar').stop().animate({width:windowWidth,left:"0px"},1000);
				$('#container').stop().animate({width:windowWidth},1000);
				sideBarOpen=false;
			}
			else
			{
				$('#sidebar').show();
				$('#sidebar').stop().animate({width:"300px"},1000);
				
				if($('#sidebarexp').innerHeight()>$('#sidebar').innerHeight())
				{
					topbarleftpos="315px";
					$('#sidebar').css("padding","0px 15px 0px 0px");
				}
				else
				{
					topbarleftpos="300px";
					$('#sidebar').css("padding","0px");
				}
				$('#topbar').stop().animate({width:reducedWindowWidth,left:topbarleftpos},1000);
				$('#container').stop().animate({width:reducedWindowWidth},1000);
				sideBarOpen=true;
			}
		});
		</script>
	</body>
</html>