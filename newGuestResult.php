<?php
	require "header.php";
	require "Config.php";
	require "OpenDB.php";
?>

<div id="nav">
<div id="menu">
<ul>
<li><a href="index.php"><div id="current">Home</div></a></li>
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
</div>
<!-- end #menu-small -->

<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#">New Guest Sign Up </a></h1>
			<p class="meta"> 			<div class="entry">
           	 <?php
			 	if(isset($_POST['submit'])) {
	
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	
	$phone=$_POST['txtphonenumber2'];
	$celloper=$_POST['txtmobilenumber1'];
	$cellnumber=$_POST['txtmobilenumber2'];
	if($cellnumber=='') {
	$mobile='';
	}
	else {
	$mobile=$celloper.$cellnumber;
	}
	$email=$_POST['email'];
	$pass=$_POST['txtpass'];
	$pass2=$_POST['txtrepass'];
	$cardno=$_POST['cardnum'];
	$username=$_POST['username'];
	$type=1;
	//check to prevent bug on refreshing page
	//remove comments for real testing 
	$result = mysql_query("SELECT * FROM USER WHERE USER_LOGIN='$username'");
	if(mysql_num_rows($result)){
	print "There seems to be an error. Your username is already used. This error appears if you have refreshed this page.<br>
	Click <a href='index.php'> here </a> to go back to homepage.";
	}
	else
	{

	//insert into database	
			$result2 = mysql_query("INSERT INTO USER(USER_LNAME,USER_FNAME,USER_MNAME,USER_TYPE,USER_LOGIN, USER_PASS)
			VALUES('$lname','$fname','$mname','$type','$username','$pass')");
			$result3 = mysql_query("SELECT USER_ID FROM USER WHERE USER_LOGIN='$username'");
			if($count=mysql_num_rows($result3)){
				for($i=0;$i<$count;$i++) {
					$arr=mysql_fetch_array($result3);
					$id[$i]=$arr['USER_ID'];
				}
			}
			$result4 = mysql_query("INSERT INTO GUEST(GUEST_ID,GUEST_PHONE,GUEST_MOBILE,GUEST_CC,GUEST_EMAIL)
			VALUES('$id[0]','$phone','$mobile','$cardno','$email')");
			if($result4) {
			print"<p>Congratulations $lname, $fname $mname <br>You have successfully completed account creation.
			</p>
			<p> Click <a href='login.php'> here </a> to log in.";
		
			
			
			}
			else {
			print "There seems to be an error. Please contact the administrator <br>
			Click <a href='index.php'> here </a> to go back to our homepage";
			
			}
	}//end of else
	
	}
		?>
            	
			</div>
            <!-- for every page to have same width -->
            <div class="entry">
                <table width="300" height="142" border="0">
          		<tr align="left">
                </tr></table>
            </div>
          
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
	require "CloseDB.php";
?>
</body>
</html>
