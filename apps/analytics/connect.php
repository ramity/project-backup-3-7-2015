<?php
if((isset($_POST)&&!empty($_POST))||(isset($_GET)&&!empty($_GET)))
{
	try
	{
		$db=new PDO('mysql:host=localhost;dbname=A_analytics;charset=utf8','ramity','PASSWORD');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		$stmt=$db->prepare("INSERT INTO data(id,UID,URL,IP,time,hour,day,month,year,navigator,navigatorAppCodeName,navigatorAppName,navigatorAppVersion,navigatorCookieEnabled,navigatorOnLine,navigatorPlatform,navigatorProduct,navigatorUserAgent,navigatorPlugins,navigatorPluginsList,screen,screenAvailHeight,screenAvailWidth,screenColorDepth,screenHeight,screenPixelDepth,screenWidth,location,locationHash,locationHost,locationHref,locationOrigin,locationPathname,locationPort,locationProtocol,locationSearch,performance,memoryJSHeapSizeLimit,memoryUsedJSHeapSize,memoryTotalJSHeapSize,navigationRedirectCount,navigationType,timingLoadEventEnd,timingLoadEventStart,timingDomComplete,timingDomContentLoadedEventEnd,timingDomContentLoadedEventStart,timingDomInteractive,timingDomLoading,timingResponseEnd,timingResponseStart,timingRequestStart,timingSecureConnectionStart,timingConnectEnd,timingConnectStart,timingDomainLookupEnd,timingDomainLookupStart,timingFetchStart,timingRedirectEnd,timingRedirectStart,timingUnloadEventEnd,timingUnloadEventStart,timingNavigationStart,history,historyLength)
		VALUES('',:UID,:URL,:IP,:time,:hour,:day,:month,:year,:navigator,:navigatorAppCodeName,:navigatorAppName,:navigatorAppVersion,:navigatorCookieEnabled,:navigatorOnLine,:navigatorPlatform,:navigatorProduct,:navigatorUserAgent,:navigatorPlugins,:navigatorPluginsList,:screen,:screenAvailHeight,:screenAvailWidth,:screenColorDepth,:screenHeight,:screenPixelDepth,:screenWidth,:location,:locationHash,:locationHost,:locationHref,:locationOrigin,:locationPathname,:locationPort,:locationProtocol,:locationSearch,:performance,:memoryJSHeapSizeLimit,:memoryUsedJSHeapSize,:memoryTotalJSHeapSize,:navigationRedirectCount,:navigationType,:timingLoadEventEnd,:timingLoadEventStart,:timingDomComplete,:timingDomContentLoadedEventEnd,:timingDomContentLoadedEventStart,:timingDomInteractive,:timingDomLoading,:timingResponseEnd,:timingResponseStart,:timingRequestStart,:timingSecureConnectionStart,:timingConnectEnd,:timingConnectStart,:timingDomainLookupEnd,:timingDomainLookupStart,:timingFetchStart,:timingRedirectEnd,:timingRedirectStart,:timingUnloadEventEnd,:timingUnloadEventStart,:timingNavigationStart,:history,:historyLength)");

		//stuff for timezone
		$json=file_get_contents('http://ip-api.com/json/'.$_SERVER['REMOTE_ADDR']);
		$ipData=json_decode($json,true);

		if($ipData['timezone'])
		{
			date_default_timezone_set($ipData['timezone']);
		}
		else
		{
			echo 'could not get user timezone';
		}

		$now=getdate();

		$stmt->bindValue('time',$now['0']);
		$stmt->bindValue('hour',$now['hours']);
		$stmt->bindValue('day',$now['mday']);
		$stmt->bindValue('month',$now['mon']);
		$stmt->bindValue('year',$now['year']);

		if(isset($_POST)&&!empty($_POST))
		{
			$stmt->bindValue(':UID',$_POST['UID'],PDO::PARAM_INT);
			$stmt->bindValue(':URL',$_POST['URL'],PDO::PARAM_STR);
			$stmt->bindValue(':IP',$_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);

			$stmt->bindValue(':navigator',$_POST['navigator'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorAppCodeName',$_POST['navigatorAppCodeName'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorAppName',$_POST['navigatorAppName'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorAppVersion',$_POST['navigatorAppVersion']);
			$stmt->bindValue(':navigatorCookieEnabled',$_POST['navigatorCookieEnabled'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorOnLine',$_POST['navigatorOnLine'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorPlatform',$_POST['navigatorPlatform'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorProduct',$_POST['navigatorProduct'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorUserAgent',$_POST['navigatorUserAgent'],PDO::PARAM_STR);

			$stmt->bindValue(':navigatorPlugins',$_POST['navigatorPlugins'],PDO::PARAM_INT);
			$stmt->bindValue(':navigatorPluginsList',$_POST['navigatorPluginsList'],PDO::PARAM_STR);

			$stmt->bindValue(':screen',$_POST['screen'],PDO::PARAM_STR);
			$stmt->bindValue(':screenAvailHeight',$_POST['screenAvailHeight'],PDO::PARAM_STR);
			$stmt->bindValue(':screenAvailWidth',$_POST['screenAvailWidth'],PDO::PARAM_STR);
			$stmt->bindValue(':screenColorDepth',$_POST['screenColorDepth'],PDO::PARAM_STR);
			$stmt->bindValue(':screenHeight',$_POST['screenHeight'],PDO::PARAM_STR);
			$stmt->bindValue(':screenPixelDepth',$_POST['screenPixelDepth'],PDO::PARAM_STR);
			$stmt->bindValue(':screenWidth',$_POST['screenWidth'],PDO::PARAM_STR);

			$stmt->bindValue(':location',$_POST['location'],PDO::PARAM_STR);
			$stmt->bindValue(':locationHash',$_POST['locationHash'],PDO::PARAM_STR);
			$stmt->bindValue(':locationHost',$_POST['locationHost'],PDO::PARAM_STR);
			$stmt->bindValue(':locationHref',$_POST['locationHref'],PDO::PARAM_STR);
			$stmt->bindValue(':locationOrigin',$_POST['locationOrigin'],PDO::PARAM_STR);
			$stmt->bindValue(':locationPathname',$_POST['locationPathname'],PDO::PARAM_STR);
			$stmt->bindValue(':locationPort',$_POST['locationPort'],PDO::PARAM_STR);
			$stmt->bindValue(':locationProtocol',$_POST['locationProtocol'],PDO::PARAM_STR);
			$stmt->bindValue(':locationSearch',$_POST['locationSearch'],PDO::PARAM_STR);

			$stmt->bindValue(':performance',$_POST['performance'],PDO::PARAM_STR);
			$stmt->bindValue(':memoryJSHeapSizeLimit',$_POST['memoryJSHeapSizeLimit'],PDO::PARAM_STR);
			$stmt->bindValue(':memoryUsedJSHeapSize',$_POST['memoryUsedJSHeapSize'],PDO::PARAM_STR);
			$stmt->bindValue(':memoryTotalJSHeapSize',$_POST['memoryTotalJSHeapSize'],PDO::PARAM_STR);
			$stmt->bindValue(':navigationRedirectCount',$_POST['navigationRedirectCount'],PDO::PARAM_STR);
			$stmt->bindValue(':navigationType',$_POST['navigationType'],PDO::PARAM_STR);
			$stmt->bindValue(':timingLoadEventEnd',$_POST['timingLoadEventEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingLoadEventStart',$_POST['timingLoadEventStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomComplete',$_POST['timingDomComplete'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomContentLoadedEventEnd',$_POST['timingDomContentLoadedEventEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomContentLoadedEventStart',$_POST['timingDomContentLoadedEventStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomInteractive',$_POST['timingDomInteractive'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomLoading',$_POST['timingDomLoading'],PDO::PARAM_STR);
			$stmt->bindValue(':timingResponseEnd',$_POST['timingResponseEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingResponseStart',$_POST['timingResponseStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingRequestStart',$_POST['timingRequestStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingSecureConnectionStart',$_POST['timingSecureConnectionStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingConnectEnd',$_POST['timingConnectEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingConnectStart',$_POST['timingConnectStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomainLookupEnd',$_POST['timingDomainLookupEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomainLookupStart',$_POST['timingDomainLookupStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingFetchStart',$_POST['timingFetchStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingRedirectEnd',$_POST['timingRedirectEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingRedirectStart',$_POST['timingRedirectStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingUnloadEventEnd',$_POST['timingUnloadEventEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingUnloadEventStart',$_POST['timingUnloadEventStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingNavigationStart',$_POST['timingNavigationStart'],PDO::PARAM_STR);

			$stmt->bindValue(':history',$_POST['history'],PDO::PARAM_STR);
			$stmt->bindValue(':historyLength',$_POST['historyLength'],PDO::PARAM_STR);
		}
		elseif(isset($_GET)&&!empty($_GET))
		{
			$stmt->bindValue(':navigator',$_GET['navigator'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorAppCodeName',$_GET['navigatorAppCodeName'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorAppName',$_GET['navigatorAppName'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorAppVersion',$_GET['navigatorAppVersion']);
			$stmt->bindValue(':navigatorCookieEnabled',$_GET['navigatorCookieEnabled'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorOnLine',$_GET['navigatorOnLine'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorPlatform',$_GET['navigatorPlatform'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorProduct',$_GET['navigatorProduct'],PDO::PARAM_STR);
			$stmt->bindValue(':navigatorUserAgent',$_GET['navigatorUserAgent'],PDO::PARAM_STR);

			$stmt->bindValue(':navigatorPlugins',$_GET['navigatorPlugins'],PDO::PARAM_INT);
			$stmt->bindValue(':navigatorPluginsList',$_GET['navigatorPluginsList'],PDO::PARAM_STR);

			$stmt->bindValue(':screen',$_GET['screen'],PDO::PARAM_STR);
			$stmt->bindValue(':screenAvailHeight',$_GET['screenAvailHeight'],PDO::PARAM_STR);
			$stmt->bindValue(':screenAvailWidth',$_GET['screenAvailWidth'],PDO::PARAM_STR);
			$stmt->bindValue(':screenColorDepth',$_GET['screenColorDepth'],PDO::PARAM_STR);
			$stmt->bindValue(':screenHeight',$_GET['screenHeight'],PDO::PARAM_STR);
			$stmt->bindValue(':screenPixelDepth',$_GET['screenPixelDepth'],PDO::PARAM_STR);
			$stmt->bindValue(':screenWidth',$_GET['screenWidth'],PDO::PARAM_STR);

			$stmt->bindValue(':location',$_GET['location'],PDO::PARAM_STR);
			$stmt->bindValue(':locationHash',$_GET['locationHash'],PDO::PARAM_STR);
			$stmt->bindValue(':locationHost',$_GET['locationHost'],PDO::PARAM_STR);
			$stmt->bindValue(':locationHref',$_GET['locationHref'],PDO::PARAM_STR);
			$stmt->bindValue(':locationOrigin',$_GET['locationOrigin'],PDO::PARAM_STR);
			$stmt->bindValue(':locationPathname',$_GET['locationPathname'],PDO::PARAM_STR);
			$stmt->bindValue(':locationPort',$_GET['locationPort'],PDO::PARAM_STR);
			$stmt->bindValue(':locationProtocol',$_GET['locationProtocol'],PDO::PARAM_STR);
			$stmt->bindValue(':locationSearch',$_GET['locationSearch'],PDO::PARAM_STR);

			$stmt->bindValue(':performance',$_GET['performance'],PDO::PARAM_STR);
			$stmt->bindValue(':memoryJSHeapSizeLimit',$_GET['memoryJSHeapSizeLimit'],PDO::PARAM_STR);
			$stmt->bindValue(':memoryUsedJSHeapSize',$_GET['memoryUsedJSHeapSize'],PDO::PARAM_STR);
			$stmt->bindValue(':memoryTotalJSHeapSize',$_GET['memoryTotalJSHeapSize'],PDO::PARAM_STR);
			$stmt->bindValue(':navigationRedirectCount',$_GET['navigationRedirectCount'],PDO::PARAM_STR);
			$stmt->bindValue(':navigationType',$_GET['navigationType'],PDO::PARAM_STR);
			$stmt->bindValue(':timingLoadEventEnd',$_GET['timingLoadEventEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingLoadEventStart',$_GET['timingLoadEventStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomComplete',$_GET['timingDomComplete'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomContentLoadedEventEnd',$_GET['timingDomContentLoadedEventEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomContentLoadedEventStart',$_GET['timingDomContentLoadedEventStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomInteractive',$_GET['timingDomInteractive'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomLoading',$_GET['timingDomLoading'],PDO::PARAM_STR);
			$stmt->bindValue(':timingResponseEnd',$_GET['timingResponseEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingResponseStart',$_GET['timingResponseStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingRequestStart',$_GET['timingRequestStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingSecureConnectionStart',$_GET['timingSecureConnectionStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingConnectEnd',$_GET['timingConnectEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingConnectStart',$_GET['timingConnectStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomainLookupEnd',$_GET['timingDomainLookupEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingDomainLookupStart',$_GET['timingDomainLookupStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingFetchStart',$_GET['timingFetchStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingRedirectEnd',$_GET['timingRedirectEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingRedirectStart',$_GET['timingRedirectStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingUnloadEventEnd',$_GET['timingUnloadEventEnd'],PDO::PARAM_STR);
			$stmt->bindValue(':timingUnloadEventStart',$_GET['timingUnloadEventStart'],PDO::PARAM_STR);
			$stmt->bindValue(':timingNavigationStart',$_GET['timingNavigationStart'],PDO::PARAM_STR);

			$stmt->bindValue(':history',$_GET['history'],PDO::PARAM_STR);
			$stmt->bindValue(':historyLength',$_GET['historyLength'],PDO::PARAM_STR);
		}
		else
		{
			die('no input received');
		}
		$stmt->execute();
		echo '[Server]200[/Server]';
	}
	catch(PDOException $e)
	{
		echo $e;
		die();
	}
}
?>
