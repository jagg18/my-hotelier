<?php
	require "header.php";
	require "Config.php";
	require "OpenDB.php";
?>

<div id="nav">
<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
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
		echo "<a href='login.php'><div id='current'>Login</div>";
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
			<h1 class="title"><a href="#">User Login</a></h1>
			<p class="meta">


            <!-- for every page to have same width -->
            <div class="entry">
                <?php
				$login=isset($_GET['login']) ? $_GET['login'] : "";
				if ($login==1){
					echo "<h2><font color='red'>Login failed.</font></h2>";
				}

			?>
                <table background="images/login.jpg" width="300" height="300" border="0" cellpadding="0" cellspacing="0">

				  <tr>
					<td><table width="325" height="225" border="0" align="left" cellpadding="30" cellspacing="0">
					  <tr>
						<td align="left" valign="top"><form name="login" method="post" action="verify.php" onSubmit="return validate_form(this,'login')">
						  <span class="style1"><h2>Club Manila East: myHotelier</h2></span>
						  <table border="0" cellpadding="1" cellspacing="0" class="text_main">
							<tr>
							  <td width="29" height="23"><div align="right"><span class="style1">&nbsp;&nbsp;</span></div></td>
							</tr>

							<tr>
							  <td height="33">&nbsp;</td>
							  <td width="80" height="33"><div align="right">Username</div></td>
							  <td width="150"><div align="right">
								<input name="username" type="text" id="username" maxlength="30" />
							  </div></td>
							</tr>
							<tr>
							  <td height="5">&nbsp;</td>
							  <td><div align="right">Password</div></td>
							  <td><label>
							  <div align="right">
								<input name="password" type="password" id="password" maxlength="30" />
							  </div>
							  </label></td>
							</tr>
							<tr>
							  <td height="34">&nbsp;</td>
							  <td><div align="right"></div></td>
							  <td>
								<div align="right">
								  <input type="submit" name="submit" id="submit" value="Log In" />
								  </div></td>
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td align="right"><label></label></td>
							</tr>
						  </table>
						  </form>          </td>
					  </tr>
					</table></td>
				  </tr>
				</table>
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
?>
</body>
</html>
