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
		echo "<a href='login.php'> Login";
	}
	?></a></li>
    <li><a href='newGuest.php'><div id="current">New Guest</div></a></li>
    </ul>
<?php require "CloseDB.php"; ?>
</div>
<!-- end #menu-small -->





<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#">New Guest Sign Up </a></h1>
			<p class="meta"> 			<div class="entry">
           				<!--Form for adding new items-->



  <form id="newguest" name="newguest" action="newGuestResult.php" method="post" onSubmit="return validate_form(this,'newguest');">
   <H3>1. Personal Information </H3>

                    <TABLE cellPadding="1" cellSpacing="0" border="0">
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>First Name*: </TD>
                      <TD> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <INPUT type="text" id="fname" name="fname" size="10"></TD>

                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

                    <table border="0" cellpadding="1" cellspacing="0">
                      <tr>
                        <td>Middle Name*: </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" id="mname" name="mname" size="10" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <table border="0" cellpadding="1" cellspacing="0">
                      <tr>
                        <td>Last Name:* </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="lname" name="lname" size="10" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <TABLE cellPadding="1" cellSpacing="0" border="0">
                     <TR>

                      <TD>Landline*</TD>
                      <TD><SELECT id="txtphonenumber1" name="txtphonenumber1"><OPTION value="02">02</OPTION></SELECT>       <INPUT type="text"  id="txtphonenumber2" name="txtphonenumber2" size="7"  maxlength="7"></TD>
                     </TR>
                     <TR>
                      <TD>Mobile Number*</TD>
                      <TD><select name="txtmobilenumber1" class="Width100">
                        <option value="0905">0905</option>
                        <option value="0906">0906</option>
                        <option value="0910">0910</option>
                        <option value="0915">0915</option>
                        <option value="0916">0916</option>
                        <option value="0917">0917</option>
                        <option value="0918">0918</option>
                        <option value="0919">0919</option>
                        <option value="0920">0920</option>
                        <option value="0921">0921</option>
                        <option value="0922">0922</option>
                        <option value="0926">0926</option>
                        <option value="0927">0927</option>
                        <option value="0928">0928</option>
                        <option value="0929">0929</option>
                      </select></TD>
                      <TD><INPUT type="text" name="txtmobilenumber2" size="7" maxlength="7" class="Width100">(optional)</TD>
                     </TR>
                     <TR>                     </TR>
                      <TR>
                        <TD>Credit Card* </TD>
                       <TD><INPUT type="text" id='cardnum' maxlength='16' name="cardnum" size="16" ></TD>
                     </TR>
                     <tr><td></td><td>Note: you can still pay for orders by cash. </td></tr>
                     <TR>
                      <TD width="120"></TD>
                      <TD width="060"></TD>
                      <TD width="140"></TD>
                     </TR>
                    </TABLE>


                    <H3>2. Account Details </H3>

                    <TABLE cellPadding="1" cellSpacing="0" border="0">
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Username*</TD>
                      <TD><INPUT type="text" name="username" id="username" size="30" onFocus="this.select();"></TD><span id="msgbox2" style="display:none"></span>
                      <INPUT type="hidden" id="nameused" name="nameused">

                     </TR>
                      <TR>
                      <TD></TD>

                      <TD><SMALL> Must be at least 5 characters in length. This will be used to sign in your account.</SMALL></TD>
                     </TR>
                     <TR><TD><br></td></TR>
                     <TR>
                      <TD>E-mail Address*</TD>
                      <TD><INPUT type="text" name="email" id="email" size="30" onFocus="this.select();"></TD><span id="msgbox" style="display:none"></span>
                      <INPUT type="hidden" id="emailused" name="emailused">

                     </TR>
                     <TR>
                      <TD></TD>

                      <TD><SMALL>ex. yourname@yahoo.com. This will be used to send your confirmation code.</SMALL></TD>
                     </TR>
                     <TR>
                      <TD width="120"></TD>
                      <TD width="350"></TD>
                     </TR>
                    </TABLE>

                    <TABLE cellPadding="1" cellSpacing="0" border="0">

                     <TR>
                      <TD>Enter password*</TD>
                      <TD><INPUT type="password" name="txtpass" size="20" class="Width100"></TD>
                     </TR>
                     <TR>
                      <TD>Verify password*</TD>
                      <TD><INPUT type="password" name="txtrepass" size="20" class="Width100"></TD>
                     </TR>

                     <TR>
                      <TD></TD>
                      <TD><SMALL>Minimum of 5 characters in length.</SMALL></TD>
                     </TR>
                     <TR>
                      <TD width="120"></TD>
                      <TD width="200"></TD>
                     </TR>

                    </TABLE>

                     <H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width="120"></TD>
                      <TD width="350"><input type="reset" name="reset" value="Clear">
                      <input type="submit" name="submit" value="Submit">
					</TD><TD></TD>
                     </TR>

            </TABLE>
			</form>

			</div>
            <!-- for every page to have same width -->
            <div class="entry">
                <table width="300" height="142" border="0">
          		<tr align="left" ">
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
?>
</body>
</html>
