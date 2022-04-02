<?php
	require "header.php";
	require "Config.php";
	require "OpenDB.php";
?>
<div id="nav">
<div id="menu">
<ul>
<li><a href="#"><div id="current">Home</div></a></li>
<li><a href="about.php">About Us</a></li>
</ul>
</div>
<!-- end #menu -->

<div id="menu-small">
	<ul>
	<li><?php
	if($userid)  {
		$result=mysql_query("SELECT USER_FNAME from USER WHERE USER_ID=".$userid.";");
		if($result) {
			$arr=mysql_fetch_array($result);
			$username=$arr['USER_FNAME'];
		}
		echo "<a href='logout.php'> Sign Out" ;
	}
	else {
		echo "<a href='login.php'> Login";
	}
	?></a></li>
    <li><a href='newGuest.php'> New Guest</a></li>
    </ul>
<?php require "CloseDB.php"; ?>
</div>
<!-- end #menu-small -->


<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#">Welcome to myHotelier</a></h1>
			<p class="meta"> an Online Reservation System for Club Manila East
				&nbsp;


            <!-- for every page to have same width -->
            <div class="entry">
				myHotelier, is an online reservation system consisting of integrated modules<br />
			  for various aspects of hotel management tailored specifically for CME Taytay.<br />
			  This class of software is often referred to as Property Management System.<br />
			  The system can be divided into four (4) parts: the configuration client, the front<br />
			  desk client, the service staff client and the guest client. The configuration client<br />
			  enables system administrator to create and update information about the system&rsquo;s<br />
			  users, the hotel&rsquo;s rooms and its services. The front desk client handles hotel<br />
			  management and hotel billing and collection. It allows front desk clerks to check-in<br />
			  and checkout guests as well as to generate reports needed by management.<br />
			  The service staff client enables the different services of CME to immediately<br />
			  charge rooms for their availed services. The guest client enables online guests<br />
			  to file reservation requests to CME&rsquo;s facilities.
				<br><br>
				Please Log in.

				For first time guests, please
				<a href="newGuest.php">register</a>.
            </div>

	 </div>

	 </div>
	<!-- end #content -->


	<div id="sidebar">

	</div>
	<!-- end #sidebar -->


</div>
<!-- end #page -->
<?php
	require "footer.php";
?>
</body>
</html>
