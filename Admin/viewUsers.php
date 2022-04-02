<?php
	require "header.php";
	require "functions.php";
	require "../Config.php";
	require "../OpenDB.php";
?>
<script type="text/javascript" language="javascript">
	function confirmDelete() {
    	return confirm("Are you sure you wish to delete this user?");
	} 
</script>


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
				$result=mysql_query("SELECT * from USER");
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
				 $result=mysql_query("SELECT * from USER LIMIT $set_limit, $limit");
				 
				 
				 
				 
				 
				echo "<tr align='center'><td width='150'>Username</td><td width='100'>User Type</td><td width='500'>User Name</td>";
				while($row = mysql_fetch_array($result)) {
						echo "<tr align='center'><td>".$row['USER_LOGIN']."</td><td>";
						switch ($row['USER_TYPE']) {
							case 1:	echo "Guest"; break;
							case 2:	echo "Admin"; break;
							case 3:	echo "Clerk"; break;
							case 4:	echo "Staff"; break;
							default: break;
						}
						echo "</td><td>".$row['USER_FNAME']." ".$row['USER_MNAME']." ".$row['USER_LNAME']."</td>";
						echo "<td><a href='editUsers.php?id=".$row['USER_ID']."'><img src='../images/edit.png'></img></a></td>";
						echo "<td><a href='deleteUsers.php?id=".$row['USER_ID']."' onClick='return confirmDelete();'><img src='../images/delete.png'></img></a></td>";
						echo "</tr>";
				}
				echo "</tr>";
				
				
				//pagination
				echo "<tr ><td colspan=5 align=center>";
				$prev_page = $page - 1;
				if($prev_page >= 1) { 
  				echo("<b><<</b> <a href=viewUsers.php?limit=$limit&page=$prev_page><b>Prev.</b></a>"); 
				}
				for($a = 1; $a <= $total_pages; $a++) {
				   if($a == $page) {
					  echo("<b> $a</b> | "); //no link
				   }
				   else {
				  		echo("  <a href=viewUsers.php?limit=$limit&page=$a> $a </a> | ");
				   } 
				} 
				$next_page = $page + 1;
				if($next_page <= $total_pages) {
				   echo("<a href=viewUsers.php?limit=$limit&page=$next_page><b>Next</b></a> > >"); 
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