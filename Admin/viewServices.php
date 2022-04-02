<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>


<body>

<div id="nav">
<div id="menu">
<ul>
<li><a href="admin.php"><div id="current">Home</div></a></li>
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
    <li></li>
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
		<table BORDER=1 RULES=ROWS FRAME=BOX>
			<?php
				//pagination
				$result=mysql_query("SELECT * from SERVICE,SERVICE_ITEM WHERE SERVICE.SERVICE_ID=SERVICE_ITEM.SERVICE_ID ORDER BY SERVICE.SERVICE_ID");
				$totalitems=mysql_num_rows($result);
				$limit		= $_GET['limit'];
				$page		= $_GET['page'];
				if((!$limit)  || (is_numeric($limit) == false) || ($limit < 10) || ($limit > 50)) {
					 $limit = 15; //default
				 } 
				
				if((!$page) || (is_numeric($page) == false) || ($page < 0) || ($page > $totalitems)) {
					  $page = 1; //default
				 } 
				 $total_pages 	= ceil($totalitems / $limit);
				 $set_limit 	= $page * $limit - ($limit);
				 $result=mysql_query("SELECT * from SERVICE,SERVICE_ITEM WHERE SERVICE.SERVICE_ID=SERVICE_ITEM.SERVICE_ID ORDER BY SERVICE.SERVICE_ID LIMIT $set_limit, $limit");
			
				
				echo "<tr align='center'><td width='180'>Service Name</td><td></td><td></td><td width='180'>Item Name</td><td width='150'>Item Price</td><td></td></tr>";
				while($row = mysql_fetch_array($result)) {
			     echo "<tr align='center'>
				 		<td >".$row['SERVICE_NAME']."</td>
						<td><a href='editServices.php?id=".$row['SERVICE_ID']."'><img src='../images/edit.png'></img></a></td>
						<td><a href='addServices.php?id=".$row['SERVICE_ID']."'><img src='../images/add.jpg'></img></a></td>
						<td >".$row['ITEM_NAME']."</td>
						<td>".$row['ITEM_PRICE']."</td>
						<td><a href='editItems.php?id=".$row['ITEM_ID']."'><img src='../images/edit.png'></img></a></td>";
						//echo "<tr align='center'><td width='200'>Service Name: ".$row['SERVICE_NAME']."</td><td></td>";
						//echo "</tr>";
						//$result1=mysql_query("SELECT * from SERVICE_ITEM where SERVICE_ID='".$row['SERVICE_ID']."'");
						//echo "<tr align='center'><td width='250'>Item Name</td><td width='150'>Item Price</td><td></td>";
						//while($row = mysql_fetch_array($result1)) {
							echo "</tr>";
						//}<a href='editItems.php?id=".$row['ITEM_ID']."'>".$row['ITEM_PRICE']."<img src='../images/edit.png'></img></a>
						//<a href='editServices.php?id=".$row['SERVICE_ID']."'>".$row['SERVICE_NAME']."<img src='../images/edit.png'></img></a>
				}
				
				//pagination
				echo "<tr ><td colspan=5 align=center>";
				$prev_page = $page - 1;
				if($prev_page >= 1) { 
  				echo("<b><<</b> <a href=viewTypes.php?limit=$limit&page=$prev_page><b>Prev.</b></a>"); 
				}
				for($a = 1; $a <= $total_pages; $a++) {
				   if($a == $page) {
					  echo("<b> $a</b> | "); //no link
				   }
				   else {
				  		echo("  <a href=viewTypes.php?limit=$limit&page=$a> $a </a> | ");
				   } 
				} 
				$next_page = $page + 1;
				if($next_page <= $total_pages) {
				   echo("<a href=viewTypes.php?limit=$limit&page=$next_page><b>Next</b></a> > >"); 
				} 
				echo "</td></tr>";
			?>
		</table>
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