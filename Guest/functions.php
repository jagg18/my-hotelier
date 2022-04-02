<?php

function printaddreserveform() {
	echo "<table width='500' border='1' cellpadding='1' frame=box><tr><td>
	<form id='addreserve' name='addreserve' action='addReservationsResult.php' method='post' onSubmit=\"return validate_form(this,'addreserve');\">
   <H3>Reservation Details </H3>
				
                    <TABLE width='483' border='0' frame=box cellPadding='1' cellSpacing='0'>
					<TR><TD width='187'><br></td></TR>
                     <TR>
                      <TD>Room Type*: </TD>
                      <TD width='194'><select name='roomtype' class='Width100' id='roomtype'>";
						  $result=mysql_query('SELECT * FROM ROOM_TYPE ORDER BY TYPE_ID');
						  while($row=mysql_fetch_array($result)) {
						  	echo "<option value='".$row['TYPE_ID']."'>".$row['TYPE_NAME']."</option>";
						  } 
					echo"
                        </select></TD>
                    
                      <TD width='17'>&nbsp;</TD>
                      <TD width='17'>&nbsp;</TD>
                      <TD width='17'>&nbsp;</TD>
                      <TD width='17'>&nbsp;</TD>
                      <TD width='20'> </TD>
                     </TR><tr><td></td></tr>
					 <tr><td></td></tr>
                    </TABLE>

                    <table width='483' border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td width='187' height='25'>No. of Rooms *: </td>
                        <td width='193'><input name='norooms' type='text' id='norooms' size='10'></td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='20'></td>
                      </tr><td></td></tr>
					 <tr><td></td></tr>
                    </table>
                    <table width='483' border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td width='187'>Occupancy*:</td>
                        <td width='192'><input type='text' id='noguests' name='noguests' size='10' /></td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='22'></td>
                      </tr><td></td></tr>
					 <tr><td></td></tr>
                    </table>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
                     <TR>

                      <TD>Room Specifications:</TD>
                      <TD><textarea name='roomspecs' id='roomspecs'></textarea></TD>
                     </TR>
					 <TR height='10'>                     </TR>
                     <TR>
                      <TD>Check-in:</TD>
                      <TD>Checkout:</TD>
                      <TD>&nbsp;</TD>
                     </TR>
                     
					 
                      <TR>
                        <TD><select name='monthin' id='monthin'>
                          <option value='1' selected>Jan</option>
                          <option value='2'>Feb</option>
                          <option value='3'>Mar</option>
                          <option value='4'>Apr</option>
                          <option value='5'>May</option>
                          <option value='6'>Jun</option>
                          <option value='7'>Jul</option>
                          <option value='8'>Aug</option>
                          <option value='9'>Sep</option>
                          <option value='10'>Oct</option>
                          <option value='11'>Nov</option>
                          <option value='12'>Dec</option>
                        </select>
                          <select name='dayin' id='dayin'>
                            <option value='1' selected>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                            <option value='22'>22</option>
                            <option value='23'>23</option>
                            <option value='24'>24</option>
                            <option value='25'>25</option>
                            <option value='26'>26</option>
                            <option value='27'>27</option>
                            <option value='28'>28</option>
                            <option value='29'>29</option>
                            <option value='30'>30</option>
                            <option value='31'>31</option>
                                                                              </select>
                          <input type='text' id='yearin' name='yearin' size='4' /></TD>
                        <TD><select name='monthout' id='monthout'>
                          <option value='1'>Jan</option>
                          <option value='2'>Feb</option>
                          <option value='3'>Mar</option>
                          <option value='4'>Apr</option>
                          <option value='5'>May</option>
                          <option value='6'>Jun</option>
                          <option value='7'>Jul</option>
                          <option value='8'>Aug</option>
                          <option value='9'>Sep</option>
                          <option value='10'>Oct</option>
                          <option value='11'>Nov</option>
                          <option value='12'>Dec</option>
                        </select>
                          <select name='dayout' id='dayout'>
                            <option value='1' selected>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                            <option value='22'>22</option>
                            <option value='23'>23</option>
                            <option value='24'>24</option>
                            <option value='25'>25</option>
                            <option value='26'>26</option>
                            <option value='27'>27</option>
                            <option value='28'>28</option>
                            <option value='29'>29</option>
                            <option value='30'>30</option>
                            <option value='31'>31</option>
                          </select>
                        <input type='text' id='yearout' name='yearout' size='4' /></TD>
                        <TD>&nbsp;</TD>
                     </TR>
                     <tr><td></td><td>&nbsp;</td></tr>
                     <TR>
                      <TD width='186'></TD>
                      <TD width='174'></TD>
                      <TD width='127'></TD>
                     </TR>
					</TABLE>
                    
					<table>
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
					 </table>
	  </form></td></tr>
	  </table>";
}

function printeditreserveform($id) {
	$result2=mysql_query("SELECT * FROM RESERVATION WHERE RESERVATION_ID='".$id."';");
	$row2=mysql_fetch_array($result2);
	//echo $row2['R_CHECKIN'];
	echo "
	<form id='editreserve' name='editreserve' action='editReservations.php' method='post' onSubmit=\"return validate_form(this,'addreserve');\">
   <H3>Reservation Details </H3>

                    <TABLE width='483' border='0' cellPadding='1' cellSpacing='0'>
					<TR><TD width='187'><br></td></TR>
                     <TR>
                      <TD>Room Type*: </TD>
                      <TD width='194'><select name='roomtype' class='Width100' id='roomtype'>";
						  $result=mysql_query('SELECT * FROM ROOM_TYPE ORDER BY TYPE_ID');
						  while($row=mysql_fetch_array($result)) {
						  	echo "<option value='".$row['TYPE_ID']."' ";
							if($row['TYPE_ID']==$row2['R_ROOM_TYPE']) {
								echo "selected";
							}
							echo ">".$row['TYPE_NAME']."</option>";
						  } 
					echo"
                        </select></TD>
                    
                      <TD width='17'>&nbsp;</TD>
                      <TD width='17'>&nbsp;</TD>
                      <TD width='17'>&nbsp;</TD>
                      <TD width='17'>&nbsp;</TD>
                      <TD width='20'><input type='hidden' name='resid' id='resid' value='".$id."'></input></TD>
                     </TR>
                    </TABLE>

                    <table width='483' border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td width='188' height='25'>No. of Rooms *: </td>
                        <td width='193'><input name='norooms' type='text' id='norooms' size='10' value='".$row2['R_NO_ROOM']."'></td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='20'></td>
                      </tr>
                    </table>
                    <table width='483' border='0' cellpadding='1' cellspacing='0'>
                      <tr>
                        <td width='187'>Occupancy*:</td>
                        <td width='192'><input type='text' id='noguests' name='noguests' size='10' value='".$row2['R_OCCUPANCY']."'/></td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='17'>&nbsp;</td>
                        <td width='22'></td>
                      </tr>
                    </table>
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
                     <TR>

                      <TD>Room Specifications:</TD>
                      <TD><textarea name='roomspecs' id='roomspecs'>".$row2['R_SPECS']."</textarea></TD>
                     </TR>
					 <TR height='10'>                     </TR>
                     <TR>
                      <TD>Check-in:</TD>
                      <TD>Checkout:</TD>
                      <TD>&nbsp;</TD>
                     </TR>
                      <TR>
                        <TD><select name='monthin' id='monthin'>
                          <option value='1' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==1){echo "selected";}
						  echo ">Jan</option>
                          <option value='2' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==2){echo "selected";}
						  echo ">Feb</option>
                          <option value='3' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==3){echo "selected";}
						  echo ">Mar</option>
                          <option value='4' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==4){echo "selected";}
						  echo ">Apr</option>
                          <option value='5' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==5){echo "selected";}
						  echo ">May</option>
                          <option value='6' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==6){echo "selected";}
						  echo ">Jun</option>
                          <option value='7' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==7){echo "selected";}
						  echo ">Jul</option>
                          <option value='8' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==8){echo "selected";}
						  echo ">Aug</option>
                          <option value='9' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==9){echo "selected";}
						  echo ">Sep</option>
                          <option value='10' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==10){echo "selected";}
						  echo ">Oct</option>
                          <option value='11' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==11){echo "selected";}
						  echo ">Nov</option>
                          <option value='12' ";
						  if(date('m', strtotime($row2['R_CHECKIN']))==12){echo "selected";}
						  echo ">Dec</option>
                        </select>
                          <select name='dayin' id='dayin'>
                            <option value='1' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==1){echo "selected";}
						  echo ">1</option>
                            <option value='2' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==2){echo "selected";}
						  echo ">2</option>
                            <option value='3' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==3){echo "selected";}
						  echo ">3</option>
                            <option value='4' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==4){echo "selected";}
						  echo ">4</option>
                            <option value='5' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==5){echo "selected";}
						  echo ">5</option>
                            <option value='6' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==6){echo "selected";}
						  echo ">6</option>
                            <option value='7' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==7){echo "selected";}
						  echo ">7</option>
                            <option value='8' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==8){echo "selected";}
						  echo ">8</option>
                            <option value='9' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==9){echo "selected";}
						  echo ">9</option>
                            <option value='10' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==10){echo "selected";}
						  echo ">10</option>
                            <option value='11' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==11){echo "selected";}
						  echo ">11</option>
                            <option value='12' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==12){echo "selected";}
						  echo ">12</option>
                            <option value='13' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==13){echo "selected";}
						  echo ">13</option>
                            <option value='14' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==14){echo "selected";}
						  echo ">14</option>
                            <option value='15' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==15){echo "selected";}
						  echo ">15</option>
                            <option value='16' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==16){echo "selected";}
						  echo ">16</option>
                            <option value='17' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==17){echo "selected";}
						  echo ">17</option>
                            <option value='18' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==18){echo "selected";}
						  echo ">18</option>
                            <option value='19' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==19){echo "selected";}
						  echo ">19</option>
                            <option value='20' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==20){echo "selected";}
						  echo ">20</option>
                            <option value='21' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==21){echo "selected";}
						  echo ">21</option>
                            <option value='22' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==22){echo "selected";}
						  echo ">22</option>
                            <option value='23' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==23){echo "selected";}
						  echo ">23</option>
                            <option value='24' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==24){echo "selected";}
						  echo ">24</option>
                            <option value='25' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==25){echo "selected";}
						  echo ">25</option>
                            <option value='26' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==26){echo "selected";}
						  echo ">26</option>
                            <option value='27' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==27){echo "selected";}
						  echo ">27</option>
                            <option value='28' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==28){echo "selected";}
						  echo ">28</option>
                            <option value='29' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==29){echo "selected";}
						  echo ">29</option>
                            <option value='30' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==30){echo "selected";}
						  echo ">30</option>
                            <option value='31' ";
						  if(date('d', strtotime($row2['R_CHECKIN']))==31){echo "selected";}
						  echo ">31</option>
                         </select>
                          <input type='text' id='yearin' name='yearin' size='4' value='".date('Y', strtotime($row2['R_CHECKIN']))."'/></TD>
                        <TD><select name='monthout' id='monthout'>
                          <option value='1' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==1){echo "selected";}
						  echo ">Jan</option>
                          <option value='2' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==2){echo "selected";}
						  echo ">Feb</option>
                          <option value='3' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==3){echo "selected";}
						  echo ">Mar</option>
                          <option value='4' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==4){echo "selected";}
						  echo ">Apr</option>
                          <option value='5' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==5){echo "selected";}
						  echo ">May</option>
                          <option value='6' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==6){echo "selected";}
						  echo ">Jun</option>
                          <option value='7' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==7){echo "selected";}
						  echo ">Jul</option>
                          <option value='8' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==8){echo "selected";}
						  echo ">Aug</option>
                          <option value='9' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==9){echo "selected";}
						  echo ">Sep</option>
                          <option value='10' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==10){echo "selected";}
						  echo ">Oct</option>
                          <option value='11' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==11){echo "selected";}
						  echo ">Nov</option>
                          <option value='12' ";
						  if(date('m', strtotime($row2['R_CHECKOUT']))==12){echo "selected";}
						  echo ">Dec</option>
                        </select>
                          <select name='dayout' id='dayout'>
                            <option value='1' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==1){echo "selected";}
						  echo ">1</option>
                            <option value='2' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==2){echo "selected";}
						  echo ">2</option>
                            <option value='3' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==3){echo "selected";}
						  echo ">3</option>
                            <option value='4' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==4){echo "selected";}
						  echo ">4</option>
                            <option value='5' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==5){echo "selected";}
						  echo ">5</option>
                            <option value='6' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==6){echo "selected";}
						  echo ">6</option>
                            <option value='7' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==7){echo "selected";}
						  echo ">7</option>
                            <option value='8' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==8){echo "selected";}
						  echo ">8</option>
                            <option value='9' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==9){echo "selected";}
						  echo ">9</option>
                            <option value='10' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==10){echo "selected";}
						  echo ">10</option>
                            <option value='11' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==11){echo "selected";}
						  echo ">11</option>
                            <option value='12' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==12){echo "selected";}
						  echo ">12</option>
                            <option value='13' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==13){echo "selected";}
						  echo ">13</option>
                            <option value='14' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==14){echo "selected";}
						  echo ">14</option>
                            <option value='15' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==15){echo "selected";}
						  echo ">15</option>
                            <option value='16' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==16){echo "selected";}
						  echo ">16</option>
                            <option value='17' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==17){echo "selected";}
						  echo ">17</option>
                            <option value='18' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==18){echo "selected";}
						  echo ">18</option>
                            <option value='19' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==19){echo "selected";}
						  echo ">19</option>
                            <option value='20' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==20){echo "selected";}
						  echo ">20</option>
                            <option value='21' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==21){echo "selected";}
						  echo ">21</option>
                            <option value='22' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==22){echo "selected";}
						  echo ">22</option>
                            <option value='23' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==23){echo "selected";}
						  echo ">23</option>
                            <option value='24' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==24){echo "selected";}
						  echo ">24</option>
                            <option value='25' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==25){echo "selected";}
						  echo ">25</option>
                            <option value='26' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==26){echo "selected";}
						  echo ">26</option>
                            <option value='27' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==27){echo "selected";}
						  echo ">27</option>
                            <option value='28' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==28){echo "selected";}
						  echo ">28</option>
                            <option value='29' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==29){echo "selected";}
						  echo ">29</option>
                            <option value='30' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==30){echo "selected";}
						  echo ">30</option>
                            <option value='31' ";
						  if(date('d', strtotime($row2['R_CHECKOUT']))==31){echo "selected";}
						  echo ">31</option>
                          </select>
                        <input type='text' id='yearout' name='yearout' size='4' value='".date('Y', strtotime($row2['R_CHECKOUT']))."'/></TD>
                        <TD>&nbsp;</TD>
                     </TR>
                     <tr><td></td><td>&nbsp;</td></tr>
                     <TR>
                      <TD width='186'></TD>
                      <TD width='174'></TD>
                      <TD width='127'></TD>
                     </TR>
          </TABLE>
			<TR></TR>
                    <br />
                      <TR>
                      <TD width='120'></TD>
                      <TD width='350'><input type='reset' name='reset' value='Clear'> 
                      <input type='submit' name='submit' value='Submit'> 
					</TD><TD></TD>
                     </TR>
	  </form>";
}

function printeditprofileform() {
	$result=mysql_query("SELECT * FROM USER WHERE USER_ID='".$_SESSION['userid']."'");
	$result2=mysql_query("SELECT * FROM GUEST WHERE GUEST_ID='".$_SESSION['userid']."'");
	$info=mysql_fetch_array($result);
	$info2=mysql_fetch_array($result2);
	echo "
	<form id='editprofile' name='editprofile' action='editProfile.php' method='post' onSubmit=\"return validate_form(this,'newguest');\">
   <H3>1. Personal Information </H3>

                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                     <TR>
                      <TD>First Name*: </TD>
                      <TD> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <INPUT type='text' id='fname' name='fname' size='10' value='".$info['USER_FNAME']."'></TD>
                    
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD>&nbsp;</TD>
                      <TD></TD>
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

                      <TD>Landline*</TD>
                      <TD><SELECT id='txtphonenumber1' name='txtphonenumber1'><OPTION value='02'>02</OPTION></SELECT>       <INPUT type='text'  id='txtphonenumber2' name='txtphonenumber2' size='7'  maxlength='7'value='".$info2['GUEST_PHONE']."'></TD>
                     </TR>
                     <TR>
                      <TD>Mobile Number*</TD>
                      <TD><select name='txtmobilenumber1' class='Width100'>
                        <option value='0905'>0905</option>
                        <option value='0906'>0906</option>
                        <option value='0910'>0910</option>
                        <option value='0915'>0915</option>
                        <option value='0916'>0916</option>
                        <option value='0917'>0917</option>
                        <option value='0918'>0918</option>
                        <option value='0919'>0919</option>
                        <option value='0920'>0920</option>
                        <option value='0921'>0921</option>
                        <option value='0922'>0922</option>
                        <option value='0926'>0926</option>
                        <option value='0927'>0927</option>
                        <option value='0928'>0928</option>
                        <option value='0929'>0929</option>
                      </select></TD>
                      <TD><INPUT type='text' name='txtmobilenumber2' size='7' maxlength='7' class='Width100' maxlength='7' value='".$info2['GUEST_MOBILE']."'>(optional)</TD>
                     </TR>
                     <TR>                     </TR>
                      <TR>
                        <TD>Credit Card* </TD>
                       <TD><INPUT type='text' id='cardnum' maxlength='16' name='cardnum' size='16' value='".$info2['GUEST_CC']."'></TD>
                     </TR>
                     <tr><td></td><td>Note: you can still pay for orders by cash. </td></tr>
                     <TR>
                      <TD width='120'></TD>
                      <TD width='060'></TD>
                      <TD width='140'></TD>
                     </TR>
                    </TABLE>
                    
                  
                    <H3>2. Account Details </H3>
					
                    <TABLE cellPadding='1' cellSpacing='0' border='0'>
					<TR><TD><br></td></TR>
                    <TR>
                      <TD>Username*</TD>
                      <TD><INPUT type='text' name='username' id='username' size='30' value='".$info['USER_LOGIN']."'></TD><span id='msgbox2' style='display:none'></span>
                      <INPUT type='hidden' id='nameused' name='nameused'>

                     </TR>
                      <TR>
                      <TD></TD>

                      <TD><SMALL> Must be at least 5 characters in length. This will be used to sign in your account.</SMALL></TD>
                     </TR>
                     <TR><TD><br></td></TR>
                     <TR>
                      <TD>E-mail Address*</TD>
                      <TD><INPUT type='text' name='email' id='email' size='30' value='".$info2['GUEST_EMAIL']."'></TD><span id='msgbox' style='display:none'></span>
                      <INPUT type='hidden' id='emailused' name='emailused'>

                     </TR>
                     <TR>
                      <TD></TD>

                      <TD><SMALL>ex. yourname@yahoo.com. This will be used to send your confirmation code.</SMALL></TD>
                     </TR>
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

function printtable($usertype) {
	if($usertype==="guest") {
		echo "<table width='300' height='142' border='0'>
			<tr>
			<td>>> My Profile</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewProfile.php'> View Profile</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='editProfile.php'> Edit Profile</a></td>
			</tr>
			<tr>
			<td>>> My Reservations</td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewReservations.php'> View Pending Reservations</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='viewProcessedReservations.php'> View Processed Reservations</a></td>
			</tr>
			<tr>
			<td><img src='../images/spacer.gif'></img><a href='addReservations.php'> Add Resevations</a></td>
			</tr>
			</table>";
	}
}


?>
