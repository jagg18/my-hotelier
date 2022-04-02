<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>


<body>
<script language="Javascript" type="text/javascript">
var counter = 1;

function addInput(divName){
     
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "<table><tr><td>Item name " + (counter + 1) + ".</td> <td><input type='text' name='Itemnames[]'></td> <td> Price: </td><td><input type='text' name='Price[]'></tr></table>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
		document.forms[0].itemcount.value=counter;

     
}
</script>

<div id="nav">
<div id="menu">
<ul>
<li><a href="admin.php"><div id="current">Home</div></a></li>
<li><a href="../about.php">About Us</a></li>
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
		echo "<a href='../logout.php'> Sign Out" ; 
	}
	else {
		echo "<a href='../login.php'> Login";
	}
	?></a></li>
    </ul>
</div>
<!-- end #menu-small -->

<div id="page">
	<div id="content">
		<div class="post">
			<h1 class="title"><a href="#"><h3><?php echo "Hello, $username!";?></h3></a></h1>
			<p class="meta"> 			
            <!-- for every page to have same width -->
            <div class="entry">
				<h2>Control Panel</h2>
                <?php
					printtable("admin");
				?>
            </div>   
	 	</div>
	 </div>
	<!-- end #content -->
	<div id="sidebar">
		<?php
		$addid=$_GET['id'];
		print "<form name='addservice' action='"; if(isset($addid)){echo "addServicesResult2.php";}else{echo "addServicesResult.php";} echo "' method='post' onSubmit=\"return validate_form(this,'newservice');\">";
			
			
			
				echo "<table width='650' height='142' border='0'>
			 <h3> Add Services </h3>
			
				<tr>
				<td> 
					<table> 
						<tr>
						  <td>Service name:</td> 
						  <TD><INPUT type='text' name='servicename' id='servicename' size='20' value='";
						  if(isset($addid)) {
								//printform("$addType");
								$result=mysql_query("SELECT SERVICE_NAME FROM SERVICE WHERE SERVICE_ID='".$addid."'");
								$row=mysql_fetch_array($result);
								echo $row['SERVICE_NAME'];
							}
				echo "'></TD>
						</tr>
						
						<tr> 
						   <td>Service items:</td> 
						</tr></table>";
						
						
				?>
                <table>
                <input type="hidden" name="itemcount" id="itemcount" value="1"/>
                <tr><td>Item name 1.</td><td><input type="text" name="Itemnames[]" value=""></td><td> Price: </td><td><input type='text' name='Price[]'></td></tr>
                </table>
                <div id="dynamicInput">
                
                
                </div>
                <tr><td><input type="button" value="Add another item" onClick="addInput('dynamicInput');"></td></tr>
				<tr><TD><input type='reset' name='reset' value='reset'> <input type='submit' name='submit' value='submit'> 	</TD>
                <?php
				print "		
				</table>
				</td>
				</tr>
			    </form>
				</table>";
		?>
  	</div>
<!-- end #sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #page -->
<?php
	require "../CloseDB.php";
	require "footer.php";
?>
</body>
</html>