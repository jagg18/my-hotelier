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
          newdiv.innerHTML = "<table><tr><td>Item name " + (counter + 1) + ".</td> <td><input type='text' name='Itemnames[]'></td> <td> Qty: </td><td><input type='text' name='Qty[]'></tr></table>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     
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
				echo "<table width='650' height='142' border='0'>
			 <h3> Add Services </h3>
			
				<tr>";
				$sname=$_POST['servicename'];
				$itemcount=$_POST['itemcount'];
				$itemarray=$_POST['Itemnames'];
				$itemparray=$_POST['Price'];
				date_default_timezone_set("Asia/Manila");
				$date=date("Y-m-d");
			
				$i=0;
				
				$result= mysql_query("SELECT SERVICE_NAME FROM service where SERVICE_NAME='$sname'");
					if(mysql_num_rows($result)){
					//do nothing
					print "<p>ERROR: The service named $sname already exists. Please choose another one.</p>";
					}
					else {
						mysql_query("INSERT INTO service(SERVICE_NAME) VALUES('$sname')");
						print "Service named $sname has been successfully inserted into the database";
						$current_id=mysql_insert_id();
						
						for($i=0;$i<$itemcount;$i++) {
						   
							$result2= mysql_query("SELECT ITEM_NAME FROM service_item where ITEM_NAME='$itemarray[$i]'");
							if(mysql_num_rows($result2)){
							print "<p>ERROR: The item named $itemarray[$i] already exists. Please choose another one.</p>";
							}
							else if($itemarray[$i]!=''){
							mysql_query("INSERT INTO service_item(SERVICE_ID,ITEM_PRICE,ITEM_NAME,DATE_EFFECT) VALUES('$current_id','".floatval($itemparray[$i])."','$itemarray[$i]','$date')");
							
							}
							
						}
						
					}//end of else
				
				
				print" </tr></table>";
			print "<a href='addServices.php'> Back </a>";
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