<!DOCTYPE html>
	<head>
		<script>
		/*
 countdown.js v2.5.0 http://countdownjs.org
 Copyright (c)2006-2014 Stephen M. McKamey.
 Licensed under The MIT License.
*/
var module,countdown=function(w){function A(a,b){var c=a.getTime();a.setMonth(a.getMonth()+b);return Math.round((a.getTime()-c)/864E5)}function x(a){var b=a.getTime(),c=new Date(b);c.setMonth(a.getMonth()+1);return Math.round((c.getTime()-b)/864E5)}function y(a,b){b=b instanceof Date||null!==b&&isFinite(b)?new Date(+b):new Date;if(!a)return b;var c=+a.value||0;if(c)return b.setTime(b.getTime()+c),b;(c=+a.millennia||0)&&(c*=10);(c+=+a.centuries||0)&&(c*=10);(c+=+a.decades||0)&&(c*=10);(c+=+a.years||
0)&&b.setFullYear(b.getFullYear()+c);(c=+a.months||0)&&b.setMonth(b.getMonth()+c);(c=+a.weeks||0)&&(c*=7);(c+=+a.days||0)&&b.setDate(b.getDate()+c);(c=+a.hours||0)&&b.setHours(b.getHours()+c);(c=+a.minutes||0)&&b.setMinutes(b.getMinutes()+c);(c=+a.seconds||0)&&b.setSeconds(b.getSeconds()+c);(c=+a.milliseconds||0)&&b.setMilliseconds(b.getMilliseconds()+c);return b}function l(a,b){return a+(1===a?u[b]:v[b])}function p(){}function m(a,b,c,e,g,f){0<=a[c]&&(b+=a[c],delete a[c]);b/=g;if(1>=b+1)return 0;
if(0<=a[e]){a[e]=+(a[e]+b).toFixed(f);switch(e){case "seconds":if(60!==a.seconds||isNaN(a.minutes))break;a.minutes++;a.seconds=0;case "minutes":if(60!==a.minutes||isNaN(a.hours))break;a.hours++;a.minutes=0;case "hours":if(24!==a.hours||isNaN(a.days))break;a.days++;a.hours=0;case "days":if(7!==a.days||isNaN(a.weeks))break;a.weeks++;a.days=0;case "weeks":if(a.weeks!==x(a.refMonth)/7||isNaN(a.months))break;a.months++;a.weeks=0;case "months":if(12!==a.months||isNaN(a.years))break;a.years++;a.months=0;
case "years":if(10!==a.years||isNaN(a.decades))break;a.decades++;a.years=0;case "decades":if(10!==a.decades||isNaN(a.centuries))break;a.centuries++;a.decades=0;case "centuries":if(10!==a.centuries||isNaN(a.millennia))break;a.millennia++;a.centuries=0}return 0}return b}function B(a,b,c,e,g,f){var d=new Date;a.start=b=b||d;a.end=c=c||d;a.units=e;a.value=c.getTime()-b.getTime();0>a.value&&(d=c,c=b,b=d);a.refMonth=new Date(b.getFullYear(),b.getMonth(),15,12,0,0);try{a.millennia=0;a.centuries=0;a.decades=
0;a.years=c.getFullYear()-b.getFullYear();a.months=c.getMonth()-b.getMonth();a.weeks=0;a.days=c.getDate()-b.getDate();a.hours=c.getHours()-b.getHours();a.minutes=c.getMinutes()-b.getMinutes();a.seconds=c.getSeconds()-b.getSeconds();a.milliseconds=c.getMilliseconds()-b.getMilliseconds();var h;0>a.milliseconds?(h=s(-a.milliseconds/1E3),a.seconds-=h,a.milliseconds+=1E3*h):1E3<=a.milliseconds&&(a.seconds+=n(a.milliseconds/1E3),a.milliseconds%=1E3);0>a.seconds?(h=s(-a.seconds/60),a.minutes-=h,a.seconds+=
60*h):60<=a.seconds&&(a.minutes+=n(a.seconds/60),a.seconds%=60);0>a.minutes?(h=s(-a.minutes/60),a.hours-=h,a.minutes+=60*h):60<=a.minutes&&(a.hours+=n(a.minutes/60),a.minutes%=60);0>a.hours?(h=s(-a.hours/24),a.days-=h,a.hours+=24*h):24<=a.hours&&(a.days+=n(a.hours/24),a.hours%=24);for(;0>a.days;)a.months--,a.days+=A(a.refMonth,1);7<=a.days&&(a.weeks+=n(a.days/7),a.days%=7);0>a.months?(h=s(-a.months/12),a.years-=h,a.months+=12*h):12<=a.months&&(a.years+=n(a.months/12),a.months%=12);10<=a.years&&(a.decades+=
n(a.years/10),a.years%=10,10<=a.decades&&(a.centuries+=n(a.decades/10),a.decades%=10,10<=a.centuries&&(a.millennia+=n(a.centuries/10),a.centuries%=10)));b=0;!(e&1024)||b>=g?(a.centuries+=10*a.millennia,delete a.millennia):a.millennia&&b++;!(e&512)||b>=g?(a.decades+=10*a.centuries,delete a.centuries):a.centuries&&b++;!(e&256)||b>=g?(a.years+=10*a.decades,delete a.decades):a.decades&&b++;!(e&128)||b>=g?(a.months+=12*a.years,delete a.years):a.years&&b++;!(e&64)||b>=g?(a.months&&(a.days+=A(a.refMonth,
a.months)),delete a.months,7<=a.days&&(a.weeks+=n(a.days/7),a.days%=7)):a.months&&b++;!(e&32)||b>=g?(a.days+=7*a.weeks,delete a.weeks):a.weeks&&b++;!(e&16)||b>=g?(a.hours+=24*a.days,delete a.days):a.days&&b++;!(e&8)||b>=g?(a.minutes+=60*a.hours,delete a.hours):a.hours&&b++;!(e&4)||b>=g?(a.seconds+=60*a.minutes,delete a.minutes):a.minutes&&b++;!(e&2)||b>=g?(a.milliseconds+=1E3*a.seconds,delete a.seconds):a.seconds&&b++;if(!(e&1)||b>=g){var k=m(a,0,"milliseconds","seconds",1E3,f);if(k&&(k=m(a,k,"seconds",
"minutes",60,f))&&(k=m(a,k,"minutes","hours",60,f))&&(k=m(a,k,"hours","days",24,f))&&(k=m(a,k,"days","weeks",7,f))&&(k=m(a,k,"weeks","months",x(a.refMonth)/7,f))){e=k;var l,p=a.refMonth,q=p.getTime(),r=new Date(q);r.setFullYear(p.getFullYear()+1);l=Math.round((r.getTime()-q)/864E5);if(k=m(a,e,"months","years",l/x(a.refMonth),f))if(k=m(a,k,"years","decades",10,f))if(k=m(a,k,"decades","centuries",10,f))if(k=m(a,k,"centuries","millennia",10,f))throw Error("Fractional unit overflow");}}}finally{delete a.refMonth}return a}
function d(a,b,c,e,g){var f;c=+c||222;e=0<e?e:NaN;g=0<g?20>g?Math.round(g):20:0;var d=null;"function"===typeof a?(f=a,a=null):a instanceof Date||(null!==a&&isFinite(a)?a=new Date(+a):("object"===typeof d&&(d=a),a=null));var h=null;"function"===typeof b?(f=b,b=null):b instanceof Date||(null!==b&&isFinite(b)?b=new Date(+b):("object"===typeof b&&(h=b),b=null));d&&(a=y(d,b));h&&(b=y(h,a));if(!a&&!b)return new p;if(!f)return B(new p,a,b,c,e,g);var d=c&1?1E3/30:c&2?1E3:c&4?6E4:c&8?36E5:c&16?864E5:6048E5,
k,h=function(){f(B(new p,a,b,c,e,g),k)};h();return k=setInterval(h,d)}var s=Math.ceil,n=Math.floor,u,v,q,r,t,z;p.prototype.toString=function(a){var b=z(this),c=b.length;if(!c)return a?""+a:t;if(1===c)return b[0];a=q+b.pop();return b.join(r)+a};p.prototype.toHTML=function(a,b){a=a||"span";var c=z(this),e=c.length;if(!e)return(b=b||t)?"\x3c"+a+"\x3e"+b+"\x3c/"+a+"\x3e":b;for(var d=0;d<e;d++)c[d]="\x3c"+a+"\x3e"+c[d]+"\x3c/"+a+"\x3e";if(1===e)return c[0];e=q+c.pop();return c.join(r)+e};p.prototype.addTo=
function(a){return y(this,a)};z=function(a){var b=[],c=a.millennia;c&&b.push(l(c,10));(c=a.centuries)&&b.push(l(c,9));(c=a.decades)&&b.push(l(c,8));(c=a.years)&&b.push(l(c,7));(c=a.months)&&b.push(l(c,6));(c=a.weeks)&&b.push(l(c,5));(c=a.days)&&b.push(l(c,4));(c=a.hours)&&b.push(l(c,3));(c=a.minutes)&&b.push(l(c,2));(c=a.seconds)&&b.push(l(c,1));(c=a.milliseconds)&&b.push(l(c,0));return b};d.MILLISECONDS=1;d.SECONDS=2;d.MINUTES=4;d.HOURS=8;d.DAYS=16;d.WEEKS=32;d.MONTHS=64;d.YEARS=128;d.DECADES=256;
d.CENTURIES=512;d.MILLENNIA=1024;d.DEFAULTS=222;d.ALL=2047;d.setLabels=function(a,b,c,d,g){a=a||[];a.split&&(a=a.split("|"));b=b||[];b.split&&(b=b.split("|"));for(var f=0;10>=f;f++)u[f]=a[f]||u[f],v[f]=b[f]||v[f];q="string"===typeof c?c:q;r="string"===typeof d?d:r;t="string"===typeof g?g:t};(d.resetLabels=function(){u=" millisecond; second; minute; hour; day; week; month; year; decade; century; millennium".split(";");v=" milliseconds; seconds; minutes; hours; days; weeks; months; years; decades; centuries; millennia".split(";");
q=" and ";r=", ";t=""})();w&&w.exports?w.exports=d:"function"===typeof window.define&&"undefined"!==typeof window.define.amd&&window.define("countdown",[],function(){return d});return d}(module);
		</script>
		<style>
		html,body
		{
			width:100%;
			height:100%;
			margin:0px;
			background-color:#ddd;
			font-family:'Open Sans',sans-serif;
		}
		div#holder
		{
			width:960px;
			height:80px;
			border-right:5px solid #0088A9;
			border-bottom:5px solid #0088A9;
			position:absolute;
			top:50%;
			left:50%;
			background-color:#0cf;
			margin:-40px -482.55555px;
		}
		div.item
		{
			width:160px;
			height:80px;
			line-height:80px;
			text-align:center;
			color:#fff;
			float:left;
		}
		div#last
		{
			background-color:#00A7D0;
		}
		</style>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div id="holder">
			<div class="item" id="months"></div>
			<div class="item" id="days"></div>
			<div class="item" id="hours"></div>
			<div class="item" id="minutes"></div>
			<div class="item" id="seconds"></div>
			<div class="item" id="last">until spring break</div>
		</div>
		<script>
			function geb(input)
			{
				return document.getElementById(input);
			}
			window.onload=function()
			{
				setInterval(function()
				{
					array=countdown(new Date(2015,03,04));
					
					geb('months').innerHTML=array.months+' m';
					geb('days').innerHTML=array.days+' d';
					geb('hours').innerHTML=array.hours+' h';
					geb('minutes').innerHTML=array.minutes+' m';
					geb('seconds').innerHTML=array.seconds+' s';
				},100);
			}
		</script>
	</body>
</html>