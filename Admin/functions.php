<?php

function printadduserform($addType) {
	echo " <form id='adduser' name='adduser' action='addUsersResult.php' method='post' onSubmit=\"return validate_form(this,'newuser');\">
   <H3>1. Personal Information </H3>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>First Name*: </TD>
                      <TD> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <INPUT type='text' id='fname' name='fname' size='10'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Middle Name*: </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type='text' id='mname' name='mname' size='10' /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Last Name:* </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='text' id='lname' name='lname' size='10' /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
    
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
					 <tr height='10'>
					 </tr>
                    </TABLE>
                    
                  
                    <H3>2. Account Details </H3>
					
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Username*</TD>
                      <TD><INPUT type='text' name='username' id='username' size='30' onFocus='this.select();'></TD><span id='msgbox2' style='display:none'></span>
                      <INPUT type='hidden' id='nameused' name='nameused'>

                     </TR>
                      <TR>
                      <TD></TD>

                      <TD><SMALL> Must be at least 5 characters in length. This will be used to sign in your account.</SMALL></TD>
                     </TR>
                     <TR><TD><br></td></TR>

                     <TR>
                      <TD width='120'></TD>
                      <TD width='350'></TD>
                     </TR>
                    </TABLE>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>

                     <TR>
                      <TD>Enter password*</TD>
                      <TD><INPUT type='password' name='txtpass' size='20' class='Width100'></TD>
                     </TR>
                     <TR>
                      <TD>Verify password*</TD>
                      <TD><INPUT type='password' name='txtrepass' size='20' class='Width100'></TD>
                     </TR>

                     <TR>
                      <TD></TD>
                      <TD><SMALL>Minimum of 5 characters in length.</SMALL></TD>
                     </TR>
                     <TR>
                      <TD width='120'></TD>
                      <TD width='200'></TD>
                     </TR>

                    </TABLE>";
					
					if($addType==4) {
						printroomdesignation();
					}
					
					echo "<H3>&nbsp;</H3>
					<INPUT type='hidden' id='type' name='type' value=".$addType.">
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
}

function printaddtypeform() {
	echo " <form id='addtype' name='addtype' action='addTypesResult.php' method='post' onSubmit=\"return validate_form(this,'newtype');\" >
    <H3>Room Type Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Room Type Name*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='typename' name='typename' size='10'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Room Rate*: </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type='text' id='typerate' name='typerate' size='10' /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Extra Peson Rate:* </td>
                        <td>&nbsp;
                            <input type='text' id='typeextra' name='typeextra' size='10' /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
					<table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Room Capacity:* </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='text' id='capacity' name='capacity' size='10' /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
    
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
					 <tr height='10'>
					 </tr>
                    </TABLE>";
					echo "<H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
}

function printaddroomform() {
	echo " <form id='addroom' name='addroom' action='addRoomsResult.php' method='post' onSubmit=\"return validate_form(this,'newroom');\">
    <H3>Room Type Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Room Name*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='roomname' name='roomname' size='10'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

					<TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Room Type*: </TD>
                      <TD>";
					  $result=mysql_query("SELECT * from ROOM_TYPE ORDER BY TYPE_ID");
						echo "<td><select name='roomtype'>";
						while($roomtype=mysql_fetch_array($result)) {
							echo "<option value='".$roomtype['TYPE_ID']."'>".$roomtype['TYPE_NAME']."</option>";
						}
                     echo "</select></td>
					  </TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

                   <TABLE cellPadding='1' cellSpacing='0' border='0'>
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
					 <tr height='10'>
					 </tr>
                    </TABLE>
					<H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
}

function printroomdesignationedit($id) {
	echo "<H3>3. Other Information </H3>
	
					<TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Service Designation</TD>";
					  	$result=mysql_query("SELECT SERVICE_ID,SERVICE_NAME from SERVICE");
						$result2=mysql_query("SELECT SERVICE_ID from SERVICE_STAFF WHERE STAFF_ID='".$id."'");
						$sid=mysql_fetch_array($result2);
						echo "<td><select name='servicename'>";
						while($service=mysql_fetch_array($result)) {
		
							echo "<option value='".$service['SERVICE_ID']."' ";
							if($service['SERVICE_ID']==$sid['SERVICE_ID']) {
								echo " selected ";
							}
							echo " >".$service['SERVICE_NAME']."</option> ";
						}
                     echo "</select></td>
                      <span id='msgbox2' style='display:none'></span>
                    </TR>
                    </TABLE>
					
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Room Designation</TD>";
					  	$result=mysql_query("SELECT ROOM_ID,ROOM_NAME from ROOM");
						$result2=mysql_query("SELECT ROOM_ID FROM ROOM_DESIGNATION WHERE STAFF_ID='".$id."'");
						$des= Array(0);
						while($rid=mysql_fetch_array($result2)) {
							$des[]=$rid['ROOM_ID'];
						}
						$i=0;
						while($room=mysql_fetch_array($result)) {
							echo "<tr><TD><input type='checkbox' name='room[]' value='".$room['ROOM_ID']."'";
							if(in_array($room['ROOM_ID'],$des)) {
								echo "checked";
							}
							echo ">".$room['ROOM_NAME']."</TD></tr>";
							$roomid[$i]=$room['ROOM_ID'];
							$roomname[$i]=$room['ROOM_NAME'];
							$i++;
						}
                     echo "
                      <span id='msgbox2' style='display:none'></span>
                    </TR>
                    </TABLE>";
}

function printroomdesignation() {
	echo "<H3>3. Other Information </H3>
					
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Room Designation</TD>";
					  	$i=0;
					  	$result=mysql_query("SELECT ROOM_ID,ROOM_NAME from ROOM");
						while($room=mysql_fetch_array($result)) {
							echo "<tr><TD><input type='checkbox' name='room[]' value='".$room['ROOM_ID']."'>".$room['ROOM_NAME']."</TD></tr>";
							$roomid[$i]=$room['ROOM_ID'];
							$roomname[$i]=$room['ROOM_NAME'];
							$i++;
						}
                     echo "
                      <span id='msgbox2' style='display:none'></span>
                      <INPUT type='hidden' id='nameused' name='nameused'>
                    </TR>
                    </TABLE>
					
					<TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Service Designation</TD>";
					  
					  	$result=mysql_query("SELECT SERVICE_ID,SERVICE_NAME from SERVICE");
						
						echo "<td><select name='servicename'>";
						while($service=mysql_fetch_array($result)) {
		
							echo "<option value='".$service['SERVICE_ID']."'>".$service['SERVICE_NAME']."</option> ";
						}
                     echo "</select></td>
                      <span id='msgbox2' style='display:none'></span>
                      <INPUT type='hidden' id='nameused' name='nameused'>
                    </TR>
                    </TABLE>";
}

function printedituserform($id) {
	$result=mysql_query("SELECT * FROM USER WHERE USER_ID='".$id."'");
	if($info=mysql_fetch_array($result)) {
	echo " <form id='edituser' name='edituser' action='editUsers.php' method='post' onSubmit=\"return validate_form(this,'newuser');\">
   <H3>1. Personal Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>First Name*: </TD>
                      <TD> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <INPUT type='text' id='fname' name='fname' size='10' value='".$info['USER_FNAME']."'/></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> <INPUT type='hidden' id='usertype' name='usertype' value='".$info['USER_TYPE']."'></TD>
                      </TR>
                    </TABLE>

                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Middle Name*: </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type='text' id='mname' name='mname' size='10' value='".$info['USER_MNAME']."'/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Last Name:* </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='text' id='lname' name='lname' size='10' value='".$info['USER_LNAME']."'/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
    
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
					 <tr height='10'>
					 </tr>
                    </TABLE>
                    
                  
                    <H3>2. Account Details </H3>
					
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Username*</TD>
                      <TD><INPUT type='text' name='username' id='username' size='30' value='".$info['USER_LOGIN']."' onFocus='this.select();'></TD><span id='msgbox2' style='display:none'></span>
                      <INPUT type='hidden' id='userid' name='userid' value='".$id."'>

                     </TR>
                      <TR>
                      <TD></TD>

                      <TD><SMALL> Must be at least 5 characters in length. This will be used to sign in your account.</SMALL></TD>
                     </TR>
                     <TR><TD><br></td></TR>

                     <TR>
                      <TD width='120'></TD>
                      <TD width='350'></TD>
                     </TR>
                    </TABLE>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>

                     <TR>
                      <TD>Enter password*</TD>
                      <TD><INPUT type='password' name='txtpass' size='20' class='Width100' value='".$info['USER_PASS']."'></TD>
                     </TR>
                     <TR>
                      <TD>Verify password*</TD>
                      <TD><INPUT type='password' name='txtrepass' size='20' class='Width100' value='".$info['USER_PASS']."'></TD>
                     </TR>

                     <TR>
                      <TD></TD>
                      <TD><SMALL>Minimum of 5 characters in length.</SMALL></TD>
                     </TR>
                     <TR>
                      <TD width='120'></TD>
                      <TD width='200'></TD>
                     </TR>

                    </TABLE>";
					$result=mysql_query("SELECT USER_TYPE from USER WHERE USER_ID='".$id."'");
					$userType=mysql_fetch_array($result);
					if($userType['USER_TYPE']==4) {
						printroomdesignationedit($id);
					}
					echo "<H3>&nbsp;</H3>
					<INPUT type='hidden' id='type' name='type' value='".$addType."'>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
			}
			else {
				echo "<p> There seems to be an error. </p>";
				print "<a href='viewUsers.php'> Back </a>";
			}
}

function printeditroomform($id) {
	$result=mysql_query("SELECT * FROM ROOM WHERE ROOM_ID='".$id."';");
	if($info=mysql_fetch_array($result)) {
	echo " <form id='editroom' name='editroom' action='editRooms.php' method='post' onSubmit=\"return validate_form(this,'newroom');\">
    <H3>Room Type Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Room Name*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='roomname' name='roomname' size='10' value='".$info['ROOM_NAME']."'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

					<TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Room Type*: </TD>
                      <TD>";
					  $result=mysql_query("SELECT * from ROOM_TYPE ORDER BY TYPE_ID");
						echo "<td><select name='roomtype'>";
						while($roomtype=mysql_fetch_array($result)) {
							echo "<option value='".$roomtype['TYPE_ID']."'";
														if($info['ROOM_TYPE']==$roomtype['TYPE_ID']) {
								echo "selected";
							}
							echo ">".$roomtype['TYPE_NAME']."</option>";
						}
                     echo "</select></td>
					  </TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD><input type='hidden' id='roomid' name='roomid' value='".$id."'> </TD>
                      </TR>
                    </TABLE>

                   <TABLE cellPadding='1' cellSpacing='0' border='0'>
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
					 <tr height='10'>
					 </tr>
                    </TABLE>
					<H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
			}
			else {
				echo "<p> There seems to be an error. </p>";
				print "<a href='viewRooms.php'> Back </a>";
			}
}

function printedittypeform($id) {
	$result=mysql_query("SELECT * FROM ROOM_TYPE WHERE TYPE_ID='".$id."';");
	if($info=mysql_fetch_array($result)) {
	echo " <form id='edittype' name='edittype' action='editTypes.php' method='post' onSubmit=\"return validate_form(this,'newtype');\">
    <H3>Room Type Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Room Type Name*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='typename' name='typename' size='10' value='".$info['TYPE_NAME']."'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> </TD>
                      </TR>
                    </TABLE>

                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Room Rate*: </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type='text' id='typerate' name='typerate' size='10' value='".$info['TYPE_RATE']."'/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
                    <table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Extra Peson Rate:* </td>
                        <td>&nbsp;
                            <input type='text' id='typeextra' name='typeextra' size='10' value='".$info['TYPE_EXTRA']."'/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                      </tr>
                    </table>
					<table border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td>Room Capacity:* </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type='text' id='capacity' name='capacity' size='10' value='".$info['TYPE_CAPACITY']."'/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type='hidden' name='typeid' id='typeid' value='".$id."'></input></td>
                      </tr>
                    </table>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
    
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
					 <tr height='10'>
					 </tr>
                    </TABLE>";
					echo "<H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
			}
			else {
				echo "<p> There seems to be an error. </p>";
				print "<a href='viewTypes.php'> Back </a>";
			}
}


function printeditserviceform($id) {
	$result=mysql_query("SELECT * FROM SERVICE WHERE SERVICE_ID='".$id."';");
	if($info=mysql_fetch_array($result)) {
	echo " <form id='editservice' name='editservice' action='editServices.php' method='post' onSubmit='return validate_form(this,'profile')'>
    <H3>Room Type Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Service Name*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='servicename' name='servicename' size='10' value='".$info['SERVICE_NAME']."'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> <input type='hidden' id='serviceid' name='serviceid' value='".$info['SERVICE_ID']."'></TD>
                      </TR>
                    </TABLE>
					</TABLE>";
					echo "<H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
			}
			else {
				echo "<p> There seems to be an error. </p>";
				print "<a href='viewServices.php'> Back </a>";
			}
}

function printedititemform($id) {
	$result=mysql_query("SELECT * FROM SERVICE_ITEM WHERE ITEM_ID='".$id."';");
	if($info=mysql_fetch_array($result)) {
	echo " <form id='edititems' name='edititems' action='editItems.php' method='post' onSubmit='return validate_form(this,'profile')'>
    <H3>Item Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Item Name*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='itemname' name='itemname' size='10' value='".$info['ITEM_NAME']."'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD> <input type='hidden' id='itemid' name='itemid' value='".$info['ITEM_ID']."'></TD>
                      </TR>
                    </TABLE>
					<TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>Item Price*: </TD>
                      <TD>&nbsp;
                        <INPUT type='text' id='itemprice' name='itemprice' size='10' value='".$info['ITEM_PRICE']."'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD></TD>
                      </TR>
                    </TABLE>
					</TABLE>";
					echo "<H3>&nbsp;</H3>
                    <TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
 
            </TABLE>
			</form>";
			}
			else {
				echo "<p> There seems to be an error. </p>";
				print "<a href='viewServices.php'> Back </a>";
			}
}

function printtable($usertype) {
	if($usertype==="admin") {
		echo "<table width='300' height='142' border='0'>
			<tr>
			<td>>> Users</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewUsers.php'> View Users</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='addUsers.php'> Add Users</a></td>
			</tr>
			<tr>
			<td>>> Rooms</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewRooms.php'> View Rooms</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='addRooms.php'> Add Rooms</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewRoomClusters.php'> View Room Clusters</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='addRoomClusters.php'> Add Room Clusters</a></td>
			</tr>
			<tr>
			<td>>> Room Types</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewTypes.php'> View Room Types</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='addTypes.php'> Add Room Types</a></td>
			</tr>
			<tr>
			<td>>> Services</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewServices.php'> View Services</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='addServices.php'> Add Services</a></td>
			</tr>
			<tr>
			</table>";
	}
}


?>
