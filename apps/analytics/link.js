window.lt=new Date().getTime();
window.sd="";
window.clc=0;
window.postCount=0;
window.onload=function()
{
	try
	{
		a=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			a=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				a=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				cl("Your browser does not support ajax");
				a=false;
			}
		}
	}
	//start stuff
	if(typeof opt=='undefined')
	{
		opt=
		{
			UID:0,
			debug:false,
			debugDisplay:false
		};
	}
	if(opt['debugDisplay'])
	{
		dd=document.createElement("div"); 
		dd.id="dd";
		dd.style.width=screen.width+'px';
		document.body.appendChild(dd);
		
		dd=document.getElementById('dd');
		
		ddh=document.createElement('div');
		ddh.style.width=screen.width+'px';
		ddh.id="ddh";
		dd.appendChild(ddh);
		
		ddh=document.getElementById('ddh');
		
		ddimg=document.createElement('img');
		ddimg.src="https://ramity.com/apps/analytics/img/bars.png";
		ddimg.style.float="left";
		ddimg.style.width="20px";
		ddimg.style.height="20px";
		ddimg.style.marginLeft="5px";
		ddh.appendChild(ddimg);
		
		ddt=document.createElement('div');
		ddt.id="ddt";
		ddt.innerHTML='Ramity Analytics <b>v0.0.169</b>';
		ddh.appendChild(ddt);
		
		ddhb=document.createElement('div');
		ddhb.className="ddhb";
		ddhb.id="ddclose";
		ddhb.style.backgroundImage="url(https://ramity.com/apps/analytics/img/close.png)";
		ddhb.style.backgroundSize="20px 20px";
		ddh.appendChild(ddhb);
		
		ddhb=document.createElement('div');
		ddhb.className="ddhb";
		ddhb.id="ddmax";
		ddhb.style.backgroundImage="url(https://ramity.com/apps/analytics/img/max.png)";
		ddhb.style.backgroundSize="20px 20px";
		ddh.appendChild(ddhb);
		
		ddhb=document.createElement('div');
		ddhb.className="ddhb";
		ddhb.id="ddmin";
		ddhb.style.backgroundImage="url(https://ramity.com/apps/analytics/img/min.png)";
		ddhb.style.backgroundSize="20px 20px";
		ddh.appendChild(ddhb);
		
		ddholder=document.createElement('div');
		ddholder.id="ddholder";
		dd.appendChild(ddholder);
		
		document.getElementById('ddclose').onclick=function(){document.getElementById('dd').style.display="none";};
		document.getElementById('ddmax').onclick=function(){document.getElementById('dd').style.height="auto";};
		document.getElementById('ddmin').onclick=function(){document.getElementById('dd').style.height="30px";};
		
		style=document.createElement('style');
		style.type="text/css";
		css='div#dd{float:left;position:fixed;bottom:0;left:0;background-color:#222;color:#fff;font-family:Arial,Helvetica,sans-serif}div#ddh{height:20px;float:left;padding:5px 0;line-height:20px;background-color:#333}div#ddt{height:20px;float:left;margin-left:5px;line-height:20px;color:#999}div.ddhb{width:20px;height:20px;float:right;color:#fff;background-color:#222;text-align:center;line-height:20px;cursor:pointer;margin-right:5px}div.ddhb:hover{background-color:#29567E;}div#ddholder{width:100%;max-height:200px;float:left;overflow-x:hidden;overflow-y:overlay}div.ddi{float:left;padding:2px;border-top:1px solid #444}div.ddit{padding:2px 5px;float:left;background-color:#00D584;color:#000;margin:2px 0 2px 2px;cursor:pointer}div.ddil{padding:2px 5px;float:left;color:#999;margin:2px 0 2px 2px;cursor:pointer}div.ddite{padding:2px 5px;float:left;color:#fff;margin:2px 0 2px 2px;border-left:2px solid #999}';
		if(!!(window.attachEvent&&!window.opera))
		{
			style.styleSheet.cssText=css;
		}
		else
		{
			var styleText = document.createTextNode(css);
			style.appendChild(styleText);
		}
		document.getElementsByTagName('head')[0].appendChild(style);
	}
	console.log('[UTD][1/14/15][14:36:45PM][RA v0.0.169]');
	if(opt['UID']===parseInt(opt['UID'],10))
	{
		add('UID='+opt['UID']+'&URL='+window.location.href);
		if(navigator)
		{
			add('&navigator=true&navigatorAppCodeName='+navigator.appCodeName+'&navigatorAppName='+navigator.appName+'&navigatorAppVersion='+navigator.appVersion+'&navigatorCookieEnabled='+navigator.cookieEnabled+'&navigatorGeolocation='+navigator.geolocation+'&navigatorOnLine='+navigator.onLine+'&navigatorPlatform='+navigator.platform+'&navigatorProduct='+navigator.product+'&navigatorUserAgent='+navigator.userAgent);
			if(navigator.plugins.length>0)
			{
				string="";
				for(w=0;w<navigator.plugins.length;w++)
				{
					string+='[plugin]['+w+']';
					pname=navigator.plugins[w].name;
					pfname=navigator.plugins[w].filename;
					pdescr=navigator.plugins[w].description;
					for(x=0;x<navigator.plugins[w].length;x++)
					{
						mimetype=navigator.plugins[w][x];
						if(mimetype)
						{
							enabledPlugin = mimetype.enabledPlugin;
							if (enabledPlugin && (enabledPlugin.name == navigator.plugins[w].name))
								string+='[enabled]';
							else
								string+='[disabled]';
							string+='[mimeType]'+mimetype.type+'[/mimeType]';
							string+='[mimeDescription]'+mimetype.description+'[/mimeDescription]';
							string+='[mimeSuffixes]'+mimetype.suffixes+'[/mimeSuffixes]';
						}
					}
					string+='[/plugin]['+w+']';
				}
				add('&navigatorPlugins='+navigator.plugins.length);
				add('&navigatorPluginsList='+string);
			}
			else
			{
				add('&navigatorPlugins=0');
			}
		}
		else
			add('&navigator=false');
		if(screen)
			add('&screen=true&screenAvailHeight='+screen.availHeight+'&screenAvailWidth='+screen.availWidth+'&screenColorDepth='+screen.colorDepth+'&screenHeight='+screen.height+'&screenPixelDepth='+screen.pixelDepth+'&screenWidth='+screen.width);
		else
			add('&screen=false');
		if(location)
			add('&location=true&locationHash='+location.hash+'&locationHost='+location.host+'&locationHref='+location.href+'&locationOrigin='+location.origin+'&locationPathname='+location.pathname+'&locationPort='+location.port+'&locationProtocol='+location.protocol+'&locationSearch='+location.search);
		else
			add('&location=false');
		if(window.performance)
		{
			add('&performance=true');
			//memory
			add('&memoryJSHeapSizeLimit='+window.performance.memory.jsHeapSizeLimit);
			add('&memoryUsedJSHeapSize='+window.performance.memory.usedJSHeapSize);
			add('&memoryTotalJSHeapSize='+window.performance.memory.totalJSHeapSize);
			//navigation
			add('&navigationRedirectCount='+window.performance.navigation.redirectCount);
			add('&navigationType='+window.performance.navigation.type);
			//timing
			add('&timingLoadEventEnd='+window.performance.timing.loadEventEnd);
			add('&timingLoadEventStart='+window.performance.timing.loadEventStart);
			add('&timingDomComplete='+window.performance.timing.domComplete);
			add('&timingDomContentLoadedEventEnd='+window.performance.timing.domContentLoadedEventEnd);
			add('&timingDomContentLoadedEventStart='+window.performance.timing.domContentLoadedEventStart);
			add('&timingDomInteractive='+window.performance.timing.domInteractive);
			add('&timingDomLoading='+window.performance.timing.domLoading);
			add('&timingResponseEnd='+window.performance.timing.responseEnd);
			add('&timingResponseStart='+window.performance.timing.responseStart);
			add('&timingRequestStart='+window.performance.timing.requestStart);
			add('&timingSecureConnectionStart='+window.performance.timing.secureConnectionStart);
			add('&timingConnectEnd='+window.performance.timing.connectEnd);
			add('&timingConnectStart='+window.performance.timing.connectStart);
			add('&timingDomainLookupEnd='+window.performance.timing.domainLookupEnd);
			add('&timingDomainLookupStart='+window.performance.timing.domainLookupStart);
			add('&timingFetchStart='+window.performance.timing.fetchStart);
			add('&timingRedirectEnd='+window.performance.timing.redirectEnd);
			add('&timingRedirectStart='+window.performance.timing.redirectStart);
			add('&timingUnloadEventEnd='+window.performance.timing.unloadEventEnd);
			add('&timingUnloadEventStart='+window.performance.timing.unloadEventStart);
			add('&timingNavigationStart='+window.performance.timing.navigationStart);
		}
		else
			add('&performance=false');
		
		if(history)
		{
			add('&history=true');
			add('&historyLength='+history.length);
		}
		else
			add('&history=false');
	}
	else
	{
		cl('UID is not set or is not an integer');
	}
	//end stuff
	if(a)
	{
		a.onreadystatechange=function()
		{
			if(a.readyState==0)
				cl('Request not initialized');
			if(a.readyState==1)
				cl('Server connection established');
			if(a.readyState==2)
				cl('Request received ');
			if(a.readyState==3)
				cl('Processing request');
			if(a.readyState==4)
				cl('Request finished and response is ready');
			if(a.readyState==4&&a.status==200)
				cl(a.responseText);
			//document.getElementById("div").innerHTML=explode(a.responseText,'[error]','[/error]');
		}
		a.open("POST","https://ramity.com/apps/analytics/connect",true);
		a.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		a.send(window.sd);
	}
	else
	{
		ifrm=document.createElement("iframe"); 
		ifrm.src="https://ramity.com/apps/analytics/connect"; 
		ifrm.width="0px";
		ifrm.height="0px";
		ifrm.style.border="none";
		ifrm.style.display="none";
		document.body.appendChild(ifrm);
	}
}
//begin functions
function cl(input)
{
	clc++;
	if(opt['debug'])
	{
		console.log('[LOG]['+(new Date().getTime()-lt)+'ms] - '+input);
	}
	if(opt['debugDisplay'])
	{
		ddi=document.createElement('div');
		ddi.className="ddi";
		ddi.id="ddi_"+clc;
		ddi.style.width=screen.width-4+'px';
		document.getElementById('ddholder').appendChild(ddi);
		
		ddi=document.getElementById('ddi_'+clc);
		
		ddit=document.createElement('div');
		ddit.className="ddit";
		ddit.innerHTML="LOG";
		ddi.appendChild(ddit);
		
		ddil=document.createElement('div');
		ddil.className="ddil";
		ddil.innerHTML=(new Date().getTime()-lt)+'ms';
		ddi.appendChild(ddil);
		
		ddite=document.createElement('div');
		ddite.className="ddite";
		ddite.innerHTML=input;
		ddi.appendChild(ddite);
	}
}
function add(input)
{
	window.sd+=input;
}
function ots(input)
{
	var str='';
	for(var p in input)
	{
		if (input.hasOwnProperty(p))
		{
			str+=p+'::'+input[p]+'\n';
		}
	}
	return str;
}
function explode(str,begin,end)
{
	t=str.split(begin);
	t=t[1].split(end);
	return t[0];
}
function search(input,phrase)
{
	if(input.indexOf(phrase)!=-1)
		return true;
	else
		return false;
}
function checkAjax()
{
	try
	{
		return a=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			return a=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
				return a=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				cl("Your browser does not support ajax");
				return false;
			}
		}
	}
}
function post(input)
{
	a=checkAjax();
	if(a)
	{
		a.onreadystatechange=function()
		{
			if(a.readyState==0)
				cl('Request not initialized');
			if(a.readyState==1)
				cl('Server connection established');
			if(a.readyState==2)
				cl('Request received ');
			if(a.readyState==3)
				cl('Processing request');
			if(a.readyState==4)
				cl('Request finished and response is ready');
			if(a.readyState==4&&a.status==200)
				cl(a.responseText);
			//document.getElementById("div").innerHTML=explode(a.responseText,'[error]','[/error]');
		}
		a.open("POST","https://ramity.com/apps/analytics/connect",true);
		a.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		a.send(input);
		
		postCount++;
	}
}