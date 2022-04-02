<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><head>
		<meta name='keywords' content='' />
		<meta name='description' content='' />
		<meta http-equiv='content-type' content='text/html; charset=utf-8' />
		<title> Club Manila East: myHotelier </title>
		<link rel=' stylesheet' href='style.css' type='text/css' media='screen'>
		<script language='javascript' src='../jscript.js'> </script>
</head>

<div id="header">
	<div id="logo">
	 <img src='../images/banner.gif' alt='' width='1024' height='153' />
</div>


</div>
<?php
	$userid=isset($_SESSION['userid']) ? $_SESSION['userid'] : "";
?>
<!-- end #header -->
