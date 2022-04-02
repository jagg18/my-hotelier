<?php
	require "header.php";
	require "Config.php";
	require "OpenDB.php";
?>

<script type="text/javascript" language="javascript">
            setTimeout("window.location='index.php'",3000);
</script>


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
		echo "<a href='logout.php'> Sign Out</li>" ; 
	}
	else {
		echo "<a href='login.php'> Login";
	}
	echo "</ul>";
	?></a></li>
    <li></li>
    </ul>
<?php require "CloseDB.php"; ?>
</div>
<!-- end #menu-small -->




<div id="page">
	<div id="content">
		<div class="post">
			<h3 class="title"><a>You have logged out. Redirecting to Index page...</a></h3>
         	<p>Please click <a href="index.php"> here </a> if your browser does not automatically redirect you to homepage.</p>
		</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">

  </div>
<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<?php
require "footer.php";
?>
</body>
</html>
