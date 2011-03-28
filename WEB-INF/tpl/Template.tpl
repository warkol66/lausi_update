<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>|-$parameters.siteName-|</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/main.css" type="text/css">
<!--[if lte IE 6]> <link href="css/styles-ie6.css" rel="stylesheet" type="text/css"> <![endif]-->
<!--[if IE 7]> <link href="css/styles-ie7.css" rel="stylesheet" type="text/css"> <![endif]-->
<!--[if IE 8]> <link href="css/styles-ie8.css" rel="stylesheet" type="text/css"> <![endif]-->
<script type="text/javascript">
  if (screen.width < 1024)
		document.write('<link href="css/style_800.css" rel="stylesheet" type="text/css">');
</script>
<link rel="shortcut icon" href="images/favicon.ico">
<script language="JavaScript" src="scripts/lausi-reports.js" type="text/javascript"></script>
<script language="JavaScript" type="text/JavaScript">
	var url="|-$systemUrl-|";
</script>
|-include file='TemplateJsIncludes.tpl'-|
<script language="JavaScript" src="scripts/lausi-abm.js" type="text/javascript"></script>
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Header -->
	<div id="header">
		<a href="Main.php"><strong>|-$parameters.siteName-|</strong></a>
	</div>
	<!-- End Header -->
	<!-- Begin contentWrapper -->
		<div id="contentWrapper">
			<!-- Begin Left Column -->
				<div id="leftColumn">
					|-include file="MenuLeft.tpl"-|
				</div>
			<!-- End Left Column -->
			<!-- Begin Right Column -->
				<div id="rightColumn">
					<!--centerHTML start-->
					|-$centerHTML-|
					<!--centerHTML end -->
				</div>
			<!-- End Right Column -->
	<!-- Begin contentCloser -->
	<div id="contentCloser"></div>
	<!-- End contentCloser -->
	</div>
	<!-- End contentWrapper -->
	<!-- Begin Footer -->
	<div id="footer">		       
		<p>Desarrollado por Módulos Empresarios.</p>
	</div>
	<!-- End Footer -->
</div>
<!-- End Wrapper -->
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
